<?php
 $user = 'u54906';
 $pass = '6634443';
header('Content-Type: text/html; charset=UTF-8');

function getUserId($login){
    $user = 'u54906';
    $pass = '6634443';
    $db = new PDO('mysql:host=localhost;dbname=u54906', $user, $pass, array(PDO::ATTR_PERSISTENT => true));
    try {
        $get_id = $db->prepare("SELECT user_id FROM login WHERE login=:login");
        $db->beginTransaction();
        $get_id->execute(array("login" => $login));
        $id = (current(current($get_id->fetchAll(PDO::FETCH_ASSOC))));
        $db->commit();
    }
    catch(PDOException $e) {
        print('Error : ' . $e->getMessage());
        exit();
    }
    return $id;
}


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $messages = array();
    if (empty($_COOKIE['gender_value'])) $_COOKIE['gender_value'] = 1;
    if (empty($_COOKIE['limbs_value'])) $_COOKIE['limbs_value'] = 2;
    if (!empty($_COOKIE['save'])) {
        setcookie('save', '', 100000);
        setcookie('login', '', 100000);
        setcookie('pass', '', 100000);
        $messages[] = '<div class="alert alert-secondary" role="alert">Спасибо, результаты сохранены</div>';
        if (!empty($_COOKIE['pass'])) {
            $messages[] = sprintf('
<div class="alert alert-secondary" role="alert">Вы можете <a href="login.php"><button class="btn btn-secondary">войти</button></a> с логином <strong>%s</strong>
        и паролем <strong>%s</strong> для изменения данных.</div>',
                strip_tags($_COOKIE['login']),
                strip_tags($_COOKIE['pass']));
        }
    }
    
    $errors = array();
    $errors['fio_error'] = !empty($_COOKIE['fio_error']);
    $errors['email_error'] = !empty($_COOKIE['email_error']);
    $errors['year_error'] = !empty($_COOKIE['year_error']);
    $errors['abilities_error'] = !empty($_COOKIE['abilities_error']);
    $errors['accept_error'] = !empty($_COOKIE['accept_error']);

    if ($errors['fio_empty']) {
        setcookie('fio_empty', '', 100000);
        $messages[] = '<div class="error">Заполните имя.</div>';
    }

    if ($errors['email_error']) {
        setcookie('email_error', '', 100000);
        $messages[] = '<div class="error">Ошибка при заполнении email.</div>';
    }

    if ($errors['abilities_error']) {
        setcookie('abilities_error', '', 100000);
        $messages[] = '<div class="error">Некорректные данные в поле: способности.</div>';
    }
    if ($errors['accept_error']) {
        setcookie('accept_error', '', 100000);
        $messages[] = '<div class="error">Вы не согласились.</div>';
    }

    $values = array();
    $values['fio_value'] = empty($_COOKIE['fio_value']) ? '' : $_COOKIE['fio_value'];
    $values['email_value'] = empty($_COOKIE['email_value']) ? '' : $_COOKIE['email_value'];
    $values['year_value'] = empty($_COOKIE['year_value']) ? '' : $_COOKIE['year_value'];
    $values['biography_value'] = empty($_COOKIE['biography_value']) ? '' : $_COOKIE['biography_value'];
    $values['gender_value'] = empty($_COOKIE['gender_value']) ? '' : $_COOKIE['gender_value'];
    $values['limbs_value'] = empty($_COOKIE['limbs_value']) ? '' : $_COOKIE['limbs_value'];

    for($i=0; $i<6; $i++){
        $values['ability'.$i] = empty($_COOKIE['ability'.$i]) ? '' : ($_COOKIE['ability'.$i]);
    }

    if (!isset($_SESSION)) {
        session_start();
    }

    $check = true;
    foreach($errors as $error){
        if($error){
            $check = false;
        }
    }

    if ($check && !empty($_COOKIE[session_name()]) && !empty($_SESSION['login'])) {
        $db = new PDO('mysql:host=localhost;dbname=u54906', $user, $pass, array(PDO::ATTR_PERSISTENT => true));
        $id = getUserId($_SESSION['login']);
        try {
            $stmt = $db->prepare("SELECT * FROM users WHERE id=:id");
            $result = $stmt->execute(array("id"=>$id));
            $data = current($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
        catch(PDOException $e) {
            print('Error : ' . $e->getMessage());
            exit();
        }

        $values['fio_value'] = filter_var($data['name'],  FILTER_SANITIZE_SPECIAL_CHARS);
        $values['email_value'] = filter_var($data['email'], FILTER_SANITIZE_SPECIAL_CHARS);
        $values['year_value'] = filter_var($data['year'],  FILTER_SANITIZE_SPECIAL_CHARS);
        $values['gender_value'] = $data['gender'];
        $values['limbs_value'] = $data['limbs'];
        $values['biography_value'] = filter_var($data['biography'], FILTER_SANITIZE_SPECIAL_CHARS);

        try {
            $stmt = $db->prepare("SELECT * FROM abilities WHERE user_id=:id");
            $result = $stmt->execute(array("id"=>$id));
            $data = current($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
        catch(PDOException $e) {
            print('Error : ' . $e->getMessage());
            exit();
        }

        $ability_data = ['1', '2', '3', '4', '5', '6'];
        for($i=0; $i<6; $i++){
            $values['ability'.$i] = $data[$ability_data[$i]];
        }

        printf('<div class="alert alert-secondary" role="alert">
  Вход с логином %s', $_SESSION['login']);
        printf('</div>');
    }
    include('form.php');
}


else{
    $errors = FALSE;

    if (empty($_POST['fio'])) {
        setcookie('fio_empty', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
    }
   
    else{
        setcookie('fio_value', $_POST['fio'], time() + 30 * 24 * 60 * 60);
    }

    //email
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        setcookie('email_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
    }
    else{
        setcookie('email_value', $_POST['email'], time() + 30 * 24 * 60 * 60);
    }

    //year
    if (empty($_POST['year'])) {
        setcookie('year_error', '1', time() + 24 * 60 * 60);
        $errors = TRUE;
    }
    else {
            setcookie('year_value', $_POST['year'], time() + 30 * 24 * 60 * 60);
        }
    

    //abilities
    $ability_data = ['1', '2', '3', '4', '5', '6'];
    if (empty($_POST['abilities'])) {
        setcookie('abilities_empty', '1', time() + 24 * 60 * 60);
        //print('Выберите способность<br>');
        $errors = TRUE;
    }
    else {
        $abilities = $_POST['abilities'];
        foreach ($abilities as $ability) {
            if (!in_array($ability, $ability_data)) {
                setcookie('abilities_error', '1', time() + 24 * 60 * 60);
                $errors = TRUE;
            }
        }
        if(!$errors){
            $ability_insert = [];
            $i=0;
            foreach ($ability_data as $ability) {
                $ability_insert[$ability] = in_array($ability, $abilities) ? 1 : 0;
                setcookie('ability'.$i, $ability_insert[$ability], time() + 30 * 24 * 60 * 60);
                $i++;
            }
        }
    }

    if (!$errors) {
        setcookie('gender_value', $_POST['gender'], time() + 30 * 24 * 60 * 60);
        setcookie('biography_value', $_POST['biography'], time() + 30 * 24 * 60 * 60);
        setcookie('limbs_value', $_POST['limbs'], time() + 30 * 24 * 60 * 60);
        setcookie('accept_value', $_POST['accept'], time() + 30 * 24 * 60 * 60);
    }

    if ($errors) {
        header('Location: index.php');
        exit();
    }
    else{
        setcookie('fio_error', '', 100000);
        setcookie('email_error', '', 100000);
        setcookie('gender_error', '', 100000);
        setcookie('abilities_error', '', 100000);
        setcookie('accept_error', '', 100000);
    }

    
    if (!isset($_SESSION)) { session_start(); }
    
    $db = new PDO('mysql:host=localhost;dbname=u54906', $user, $pass,
        [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    try {
        $first_stmt = $db->prepare("INSERT INTO application SET fio = ?,email=?,year=?,gender=?,limbs=?,biography=?, accept=?");
        $first_stmt->execute([$_POST['fio'],$_POST['email'],$_POST['year'], $_POST['gender'],$_POST['limbs'],$_POST['biography'], $_POST['accept']]);
  
        $app_id = $db->lastInsertId();
        $second_stmt = $db->prepare("INSERT INTO app_ability SET app_id=?, abl_id = ?");
        foreach ($abilities as $ability) {
             $second_stmt -> execute([$app_id, $ability]);
            
        $third_stmt = $db->prepare("INSERT INTO login SET user_id=?, login=?, pwd=?);
        $third_stmt->execute(array($id, $login, password_hash($pwd, PASSWORD_DEFAULT)));
        }
    }
    catch(PDOException $e) {
        print('Error : ' . $e->getMessage());
        exit();
    }

    setcookie('save', '1');
    header('Location: index.php');
}
