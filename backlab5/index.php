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
  if (!empty($_COOKIE['save'])) {
    setcookie('save', '', 100000);
    $messages[] = 'Спасибо! Результаты сохранены.';
  }

$errors = array();
$errors['fio_empty'] = !empty($_COOKIE['fio_empty']);
$errors['email_empty'] = !empty($_COOKIE['email_empty']);
$errors['year_empty'] = !empty($_COOKIE['year_empty']);
$errors['gender_empty'] = !empty($_COOKIE['gender_empty']);
$errors['abilities_empty'] = !empty($_COOKIE['abilities_empty']);
$errors['limbs_empty'] = !empty($_COOKIE['limbs_empty']);
$errors['biography_empty'] = !empty($_COOKIE['biography_empty']);
$errors['accept_empty'] = !empty($_COOKIE['accept_empty']);

if ($errors['fio_empty']) {
    setcookie('fio_empty', '', 100000);
    $messages[] = '<div class="error">Заполните имя.</div>';
  }
  
if ($errors['email_empty']) {
    setcookie('email_empty', '', 100000);
    $messages[] = '<div class="error">Заполните почту.</div>';
  }
  
if ($errors['year_empty']) {
    setcookie('year_empty', '', 100000);
    $messages[] = '<div class="error">Заполните год.</div>';
  }
  
if ($errors['gender_empty']) {
    setcookie('gender_empty', '', 100000);
    $messages[] = '<div class="error">Заполните пол.</div>';
  }
  
if ($errors['limbs_empty']) {
    setcookie('limbs_empty', '', 100000);
    $messages[] = '<div class="error">Заполните количество конечностей.</div>';
  }
  
if ($errors['abilities_empty']) {
    setcookie('abilities_empty', '', 100000);
    $messages[] = '<div class="error">Заполните сверхспособности.</div>';
  }
  
if ($errors['biography_empty']) {
    setcookie('biography_empty', '', 100000);
    $messages[] = '<div class="error">Заполните биографию.</div>';
  }
  
if ($errors['accept_empty']) {
    setcookie('accept_empty', '', 100000);
    $messages[] = '<div class="error">Заполните пользовательское соглашение.</div>';
  }
  
  
 $values = array();
 $values['fio_value'] = empty($_COOKIE['fio_value']) ? '' : $_COOKIE['fio_value'];
 $values['email_value'] = empty($_COOKIE['email_value']) ? '' : $_COOKIE['email_value'];
 $values['year_value'] = empty($_COOKIE['year_value']) ? '' : $_COOKIE['year_value'];
 $values['gender_value'] = empty($_COOKIE['gender_value']) ? '' : $_COOKIE['gender_value'];
 $values['limbs_value'] = empty($_COOKIE['limbs_value']) ? '' : $_COOKIE['limbs_value'];
 $values['biography_value'] = empty($_COOKIE['biography_value']) ? '' : $_COOKIE['biography_value'];
 $values['accept_value'] = empty($_COOKIE['accept_value']) ? '' : $_COOKIE['accept_value'];
  
 for ($i=0; $i<6; $i++) {
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

        $values['fio_value'] = filter_var($data['fio'],  FILTER_SANITIZE_SPECIAL_CHARS);
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
 
 else {
  $errors = FALSE;
  if (empty($_POST['fio'])) {
    setcookie('fio_empty', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  } 

  else {
    setcookie('fio_value', $_POST['fio'], time() + 30 * 24 * 60 * 60);
  }
  
  if (empty($_POST['email'])) {
    setcookie('email_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('email_value', $_POST['email'], time() + 30 * 24 * 60 * 60);
  }
  
  if (empty($_POST['year'])) {
    setcookie('year_empty', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('year_value', $_POST['year'], time() + 30 * 24 * 60 * 60);
  }
  
  if (empty($_POST['gender'])) {
    setcookie('gender_empty', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('gender_value', $_POST['gender'], time() + 30 * 24 * 60 * 60);
  }
  
if (empty($_POST['limbs'])) {
    setcookie('limbs_empty', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('limbs_value', $_POST['limbs'], time() + 30 * 24 * 60 * 60);
  }
   
   if (empty($_POST['biography'])) {
    setcookie('biography_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('biography_value', $_POST['biography'], time() + 30 * 24 * 60 * 60);
  }
  
  if (empty($_POST['accept'])) {
    setcookie('accept_empty', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('accept_value', $_POST['accept'], time() + 30 * 24 * 60 * 60);
  }
  
 $ability_data = ['1', '2', '3', '4', '5', '6'];
if (empty($_POST['abilities'])) {
    setcookie('abilities_empty', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
}
else {
    $abilities = $_POST['abilities'];
    foreach ($abilities as $ability) {
        if (!in_array($ability, $ability_data)) {
            setcookie('abilities_empty', '1', time() + 30 * 24 * 60 * 60);
          $errors = TRUE;
        }
    }
  if(!$errors) {
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

  
  else {
    setcookie('fio_empty', '', 100000);
    setcookie('email_empty', '', 100000);
    setcookie('year_empty', '', 100000);
    setcookie('gender_empty', '', 100000);
    setcookie('limbs_empty', '', 100000);
    setcookie('biography_empty', '', 100000);
    setcookie('accept_empty', '', 100000);
  }

 if (!isset($_SESSION)) { session_start(); }

    if (!empty($_COOKIE[session_name()]) && !empty($_SESSION['login'])) {
        $db = new PDO('mysql:host=localhost;dbname=u54906', $user, $pass, array(PDO::ATTR_PERSISTENT => true));
        try {
            $id = getUserId($_SESSION['login']);
            $second_stmt = $db->prepare("UPDATE application SET fio=:fio,email=:email, year=:year, gender=:gender,  limbs=:limbs, biography=:biography  WHERE id =:id");
            $second_stmt -> execute(array("fio" => $_POST['fio'],"email" => $_POST['email'], "year" => $_POST['year'], "gender" => $_POST['gender'], "limbs"=>$_POST['limbs'], "biography"=>$_POST['biography'], "id"=>$id));
            $third_stmt = $db->prepare("UPDATE app_ability SET abl_id WHERE app_id=:id");
        }
        catch(PDOException $e) {
            print('Error : ' . $e->getMessage());
            exit();
        }
    }
    else {
        $login = uniqid("user");
        $pwd = rand(10000000,100000000);
        setcookie('login', $login);
        setcookie('pass', $pwd);

        try {
            $db = new PDO('mysql:host=localhost;dbname=u54906', $user, $pass);
            $first_stmt = $db->prepare("INSERT INTO application (fio,email,year,gender,limbs,biography) VALUES (?,?,?,?,?,?)");

            try{
                $db->beginTransaction();
                $first_stmt->execute(array($_POST['fio'],  $_POST['email'], $_POST['year'], $_POST['gender'], $_POST['limbs'],$_POST['biography'],));
                $id = $db->lastInsertId();
                $db->commit();
            } catch (PDOException $exception){
                print "Error: " . $exception->getMessage() . "</br>";
            }

             $app_id = $db->lastInsertId();
             $second_stmt = $db->prepare("INSERT INTO app_ability SET app_id=?, abl_id = ?");
             foreach ($abilities as $ability) {
             $second_stmt -> execute([$app_id, $ability]);
             }
         
            try {
                $third_stmt = $db->prepare("INSERT INTO login (app_id, login, pwd) VALUES (?,?,?)");
                $db->beginTransaction();
                $third_stmt->execute(array($id, $login, password_hash($pwd, PASSWORD_DEFAULT)));
                $db->commit();
            } catch (PDOException $exception){
                print "Error: " . $exception->getMessage() . "</br>";
            }
        }
        catch(PDOException $e) {
            print('Error : ' . $e->getMessage());
            exit();
        }
    }
    setcookie('save', '1');

    header('Location: index.php');
}
