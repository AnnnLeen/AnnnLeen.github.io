<?php

header('Content-Type: text/html; charset=UTF-8');

// Начинаем сессию.
session_start();

// В суперглобальном массиве $_SESSION хранятся переменные сессии.
// Будем сохранять туда логин после успешной авторизации.
if (!empty($_SESSION['login'])) {
    print('
    <form method="POST">
        <div class="d-grid gap-2 col-6 mx-auto">
            <input class="btn btn-light" type="submit" name="sessiondestroy" value="Выход"/>
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
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Backlab5</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
              rel="stylesheet"
              integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
              crossorigin="anonymous">

</head>
    <body>
    <div class="container">
<form action="" method="post">
<div class="mb-3">
                <label for="login" class="form-label">Ваш логин</label>
                <input type="login" class="form-control" name="login" id="login" aria-describedby="Enter your login">
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Ваш пароль</label>
                <input type="pwd" class="form-control" name="pwd" id="pwd">
            </div>
            <input type="submit" class="btn btn-primary" value="Войти"/>
</form>
</div>
</body>
</html>


<?php
}
// Иначе, если запрос был методом POST, т.е. нужно сделать авторизацию с записью логина в сессию.
else {

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
        print('<div class="alert alert-secondary" role="alert">Пользователь с таким именем или паролем не найден</div>');
    }
    else {
        if (password_verify($_POST['pwd'], $data['pwd'])) {
            $_SESSION['uid'] = $data['user_id'];
            $_SESSION['login'] = $_POST['login'];
            header('Location: ./');
            exit();
        } else {
            print('<div class="alert alert-secondary" role="alert">Неверный пароль</div>');
        }
    }

    exit();
}
?>
