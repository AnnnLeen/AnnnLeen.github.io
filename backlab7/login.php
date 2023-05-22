<?php

header('Content-Type: text/html; charset=UTF-8');

// Начинаем сессию.
session_start();

function generate_token(){
    return $_SESSION['csrf_token'] = md5(str_shuffle( 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM'));
}

// В суперглобальном массиве $_SESSION хранятся переменные сессии.
// Будем сохранять туда логин после успешной авторизации.
if (!empty($_SESSION['login'])) {
    print('
    <form method="POST">
        <div>
            <input class="button" type="submit" name="sessiondestroy" value="Выход"/>
        </div>
    </form>
    ');
}

if( isset( $_POST['sessiondestroy'] ) ) {
    session_destroy();
    header('Location: ./');
    exit();
}

// В суперглобальном массиве $_SERVER PHP сохраняет некторые заголовки запроса HTTP
// и другие сведения о клиненте и сервере, например метод текущего запроса $_SERVER['REQUEST_METHOD'].
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
?>


<!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Backlab7</title>
       <link rel="stylesheet" href="style.css" type="text/css">

</head>

    <body>

<form action="" method="POST">
<div class="container1">
    <input name="csrf_token" value="<?php print generate_token() ?>">


                <label for="login">
                <div class="txt">Введите логин</div>
                <input type="login" name="login" id="login"></label>


                <label for="pwd">
                    <div class="txt">Введите пароль</div>
                <input type="pwd" name="pwd" id="pwd"></label>

            <div class="otpr"><label><button type="submit" value="send">Войти</button></label></div>

        </div>
</form>


</div>
</body>
</html>


<?php
}
// Иначе, если запрос был методом POST, т.е. нужно сделать авторизацию с записью логина в сессию.
else else if (isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token']) {

   $user = 'u54906';
   $pass = '6634443';
   $db = new PDO('mysql:host=localhost;dbname=u54906', $user, $pass, array(PDO::ATTR_PERSISTENT => true));
   try {
        $stmt = $db->prepare("SELECT * FROM login WHERE login=:login");
        $stmt->execute(array("login"=>$_POST['login']));
        $data = current($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    catch(PDOException $e) {
        print('Error : ' . $e->getMessage());
        exit();
    }

    if (empty($data)){
        print('<div class="alert alert-secondary" role="alert">Такого имени не существует.</div>');
    }
    else {
        if (password_verify($_POST['pwd'], $data['pwd'])) {
            $_SESSION['id'] = $data['user_id'];
            $_SESSION['login'] = $_POST['login'];
            header('Location: ./');
            exit();
        } else {
            print('<div role="alert">Неверный пароль.</div>');
        }
    }

    exit();
}
?>
