<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Backlab7</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>

<?php

    $user='u54906';
    $pass='6634443';
    $db = new PDO('mysql:host=localhost;dbname=u54906', $user, $pass, array(PDO::ATTR_PERSISTENT => true));

    try {
        $stmt = $db->prepare("SELECT password FROM admin WHERE login=:login");
        $stmt->execute(array("login"=>$_SERVER['PHP_AUTH_USER']));
        $password = current(current($stmt->fetchAll(PDO::FETCH_ASSOC)));
    }
    catch(PDOException $e) {
        print('Error : ' . $e->getMessage());
        exit();
    }

    if (empty($_SERVER['PHP_AUTH_USER']) || empty($_SERVER['PHP_AUTH_PW']) || md5($_SERVER['PHP_AUTH_PW']) != $password) {
        header('HTTP/1.1 401 Unanthorized');
        header('WWW-Authenticate: Basic realm="My site"');
        echo '<h1>401 Требуется авторизация</h1>';
        exit();
    }

    session_start();
    $_SESSION['is_admin']=true;

    echo '<h1>Вы успешно авторизовались и видите защищенные паролем данные.</h1>';

    $first_stmt = $db->prepare("SELECT * FROM users");
    try {
        $first_stmt->execute();
        $data = $first_stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        print('Error : ' . $e->getMessage());
        exit();
    }
    $second_stmt = $db->prepare("SELECT * FROM abilities");
    try {
        $second_stmt->execute();
        $abilities = $second_stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        print('Error : ' . $e->getMessage());
        exit();
    }

    $value = 1;
    $get_immort_amount = $db->prepare("SELECT count(*) FROM ability WHERE 1=:value");
    try {
        $get_immort_amount->execute(array('value'=>$value));
        $immort_amount = current(current($get_immort_amount->fetchAll(PDO::FETCH_ASSOC)));
    } catch(PDOException $e) {
        print('Error : ' . $e->getMessage());
        exit();
    }
    $get_wall_amount = $db->prepare("SELECT count(*) FROM ability WHERE 2=:value");
    try {
        $get_wall_amount->execute(array('value'=>$value));
        $wall_amount = current(current($get_wall_amount->fetchAll(PDO::FETCH_ASSOC)));
    } catch(PDOException $e) {
        print('Error : ' . $e->getMessage());
        exit();
    }
   $get_diff_amount = $db->prepare("SELECT count(*) FROM ability WHERE 3=:value");
    try {
        $get_diff_amount->execute(array('value'=>$value));
        $diff_amount = current(current($get_diff_amount->fetchAll(PDO::FETCH_ASSOC)));
    } catch(PDOException $e) {
        print('Error : ' . $e->getMessage());
        exit();
    }
    $get_levitation_amount = $db->prepare("SELECT count(*) FROM ability WHERE 4=:value");
    try {
        $get_levitation_amount->execute(array('value'=>$value));
        $levitation_amount = current(current($get_levitation_amount->fetchAll(PDO::FETCH_ASSOC)));
    } catch(PDOException $e) {
        print('Error : ' . $e->getMessage());
        exit();
    }
    $get_telek_amount = $db->prepare("SELECT count(*) FROM ability WHERE 5=:value");
    try {
        $get_telek_amount->execute(array('value'=>$value));
        $telek_amount = current(current($get_telek_amount->fetchAll(PDO::FETCH_ASSOC)));
    } catch(PDOException $e) {
        print('Error : ' . $e->getMessage());
        exit();
    }
    $get_telepathy_amount = $db->prepare("SELECT count(*) FROM ability WHERE 6=:value");
    try {
        $get_telepathy_amount->execute(array('value'=>$value));
        $telepathy_amount = current(current($get_telepathy_amount->fetchAll(PDO::FETCH_ASSOC)));
    } catch(PDOException $e) {
        print('Error : ' . $e->getMessage());
        exit();
    }
?>
    <div class="container1">

            <h2>Abilities</h2>

        <table style="width: 600px;">
            <thead style="background: #65b5b5">
            <tr>
                <td>Immort</td>
                <td>Wall</td>
                <td>Diff</td>
                <td>Levitation</td>
                <td>Telek</td>
                <td>Telepathy</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo $immort_amount;?></td>
                <td><?php echo $wall_amount;?></td>
                <td><?php echo $diff_amount;?></td>
                <td><?php echo $levitation_amount;?></td>
                <td><?php echo $telek_amount;?></td>
                <td><?php echo $telepathy_amount;?></td>
            </tr>
            </tbody>
        </table>

    </div>



    <div class="container1">

        <h2>Users' data</h2>

        <table style="width: 600px;">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Fio</td>
                    <td>Year</td>
                    <td>Gender</td>
                    <td>Email</td>
                    <td>Biography</td>
                    <td>Limbs</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($data as $user_data){
                    echo '<tr>';
                    foreach ($user_data as $item){
                        echo '<td>';
                         echo filter_var($item,FILTER_SANITIZE_SPECIAL_CHARS);
                        echo '</td>';
                    }
                    echo '<td>';
                    echo '<form method="POST"><input class="button" type="submit" name="change'.$user_data["id"].'" value="Edit"/></form>';
                    echo '</td>';
                    echo '<td>';
                    echo '<form method="POST"><input class="button" type="submit" name="delete'.$user_data["id"].'" value="Delete"/></form>';
                    echo '</td>';
                    echo '</tr>';
                }
            ?>
    </div>
</body>

<?php

    foreach ($data as $user_data){
        if(isset($_POST['change'.$user_data['id']])){
            $stmt = $db->prepare("SELECT login FROM login WHERE user_id=:id");
            try {
                $stmt->execute(array('id'=>$user_data['id']));
                $login = current(current($stmt->fetchAll(PDO::FETCH_ASSOC)));
            } catch(PDOException $e) {
                print('Error : ' . $e->getMessage());
                exit();
            }
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $user_data['id'];
            header('Location: index.php');
            exit();
        }
    }
    foreach ($data as $user_data){
        if(isset($_POST['delete'.$user_data['id']])){
            $stmt = $db->prepare("DELETE FROM users WHERE id=:id");
            try {
                $stmt->execute(array('id'=>$user_data['id']));
            } catch(PDOException $e) {
                print('Error : ' . $e->getMessage());
                exit();
            }
            header('Location: admin.php');
            exit();
        }
    }

?>
