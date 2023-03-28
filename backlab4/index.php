<?php
header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (!empty($_GET['save'])) {
    print('Спасибо, результаты сохранены.');
  }
  
  include('form.php');
  exit();
}

$errors = FALSE;
if (empty($_POST['fio'])) {
  print('Заполните имя.<br/>');
  $errors = TRUE;
}
else if (!preg_match("/^[а-яА-Яa-zA-Z ]+$/u", $_POST['fio'])) {
    print('Некорректное имя.<br>');
    $errors = TRUE;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    print('Некорректный email.<br>');
    $errors = TRUE;
}

if (empty($_POST['year']) || !is_numeric($_POST['year']) || !preg_match('/^\d+$/', $_POST['year'])) {
  print('Заполните год.<br/>');
  $errors = TRUE;
}

$ability_data = ['1', '2', '3', '4', '5', '6'];
if (empty($_POST['abilities'])) {
    print('Выберите сверхспособность.<br>');
    $errors = TRUE;
}
else {
    $abilities = $_POST['abilities'];
    foreach ($abilities as $ability) {
        if (!in_array($ability, $ability_data)) {
            print('Недопустимая способность.<br>');
            $errors = TRUE;
        }
    }
}
$ability_insert = [];
foreach ($ability_data as $ability) {
    $ability_insert[$ability] = in_array($ability, $abilities) ? 1 : 0;
}

if (empty($_POST['biography'])) {
  print('Заполните биографию.<br/>');
  $errors = TRUE;
}

if (empty($_POST['accept'])) {
    print("Вы не приняли соглашение!<br>");
    $errors = TRUE;
}

if ($errors) {
  exit();
}

$user = 'u54906';
$pass = '6634443';
$db = new PDO('mysql:host=localhost;dbname=u54906', $user, $pass, [PDO::ATTR_PERSISTENT => true]);

try {
  $stmt = $db->prepare("INSERT INTO application SET fio = ?, email = ?, year = ?, gender = ?, limbs = ?, biography = ?, accept = ?");
  $stmt -> execute([$_POST['fio'], $_POST['email'], $_POST['year'], $_POST['gender'], $_POST['limbs'], $_POST['biography'], $_POST['accept']]);
  
  $app_id = $db->lastInsertId();
  $stmt = $db->prepare("INSERT INTO app_ability SET app_id = ?, abl_id = ?");
  foreach ($abilities as $ability) {
    $stmt -> execute([$app_id, $ability]);
  }
}
catch(PDOException $e){
  print('Error : ' . $e->getMessage());
  exit();
}

header('Location: ?save=1');
