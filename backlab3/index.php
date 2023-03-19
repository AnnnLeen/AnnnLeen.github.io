<?php
// Отправляем браузеру правильную кодировку,
// файл index.php должен быть в кодировке UTF-8 без BOM.
header('Content-Type: text/html; charset=UTF-8');

// В суперглобальном массиве $_SERVER PHP сохраняет некторые заголовки запроса HTTP
// и другие сведения о клиненте и сервере, например метод текущего запроса $_SERVER['REQUEST_METHOD'].
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // В суперглобальном массиве $_GET PHP хранит все параметры, переданные в текущем запросе через URL.
  if (!empty($_GET['save'])) {
    // Если есть параметр save, то выводим сообщение пользователю.
    print('Спасибо, результаты сохранены.');
  }
  // Включаем содержимое файла form.php.
  include('form.php');
  // Завершаем работу скрипта.
  exit();
}
// Иначе, если запрос был методом POST, т.е. нужно проверить данные и сохранить их в XML-файл.

// Проверяем ошибки.
$errors = FALSE;
if (empty($_POST['fio'])) {
  print('Заполните имя.<br/>');
  $errors = TRUE;
}

if (empty($_POST['year']) || !is_numeric($_POST['year']) || !preg_match('/^\d+$/', $_POST['year'])) {
  print('Заполните год.<br/>');
  $errors = TRUE;
}

if (empty($_POST['gender']) || !is_numeric($_POST['gender']) || !preg_match('/^\d+$/', $_POST['gender'])) {
  print('Заполните пол.<br/>');
  $errors = TRUE;
}

if (empty($_POST['limbs']) || !is_numeric($_POST['limbs']) || !preg_match('/^\d+$/', $_POST['limbs'])) {
  print('Заполните количество конечностей.<br/>');
  $errors = TRUE;
}

$errors = FALSE;
if (empty($_POST['email'])) {
  print('Заполните почту.<br/>');
  $errors = TRUE;
}

/*$errors = FALSE;
if (empty($_POST['possibilities'])) {
  print('Заполните сверхспособности.<br/>');
  $errors = TRUE;
}*/

$errors = FALSE;
if (empty($_POST['biography'])) {
  print('Заполните биографию.<br/>');
  $errors = TRUE;
}

if (empty($_POST['checkbox']) || !is_numeric($_POST['checkbox']) || !preg_match('/^\d+$/', $_POST['checkbox'])) {
  print('Заполните чекбокс.<br/>');
  $errors = TRUE;
}


// *************
// Тут необходимо проверить правильность заполнения всех остальных полей.
// *************

if ($errors) {
  // При наличии ошибок завершаем работу скрипта.
  exit();
}

// Сохранение в базу данных.

$user = 'u54906';
$pass = '6634443';
$db = new PDO('mysql:host=localhost;dbname=u54906', $user, $pass, [PDO::ATTR_PERSISTENT => true]);

// Подготовленный запрос. Не именованные метки.
try {
  $stmt = $db->prepare("INSERT INTO application SET name = ?, year = ?, email = ?, gender = ?, limbs = ?, biography = ?");
  $stmt -> execute([$_POST['fio'], $_POST['year'], $_POST['email'], $_POST['gender'], $_POST['limbs'], $_POST['biography']]);
}
catch(PDOException $e){
  print('Error : ' . $e->getMessage());
  exit();
}

//  stmt - это "дескриптор состояния".
 
//  Именованные метки.
//$stmt = $db->prepare("INSERT INTO test (label,color) VALUES (:label,:color)");
//$stmt -> execute(['label'=>'perfect', 'color'=>'green']);
 
//Еще вариант
/*$stmt = $db->prepare("INSERT INTO users (firstname, lastname, email) VALUES (:firstname, :lastname, :email)");
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email', $email);
$firstname = "John";
$lastname = "Smith";
$email = "john@test.com";
$stmt->execute();
*/

// Делаем перенаправление.
// Если запись не сохраняется, но ошибок не видно, то можно закомментировать эту строку чтобы увидеть ошибку.
// Если ошибок при этом не видно, то необходимо настроить параметр display_errors для PHP.
header('Location: ?save=1');
