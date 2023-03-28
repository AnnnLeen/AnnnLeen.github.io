<?php
header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $messages = array();
  if (!empty($_COOKIE['save'])) {
    setcookie('save', '', 100000);
    $messages[] = 'Спасибо! Результаты сохранены.';
  }

$errors = array();
$errors['fio'] = !empty($_COOKIE['fio_error']);
$errors['email'] = !empty($_COOKIE['email_error']);
$errors['year'] = !empty($_COOKIE['year_error']);
$errors['gender'] = !empty($_COOKIE['gender_error']);
$errors['abilities'] = !empty($_COOKIE['abilities_error']);
$errors['limbs'] = !empty($_COOKIE['limbs_error']);
$errors['biography'] = !empty($_COOKIE['biography_error']);
$errors['accept'] = !empty($_COOKIE['accept_error']);

if ($errors['fio']) {
    setcookie('fio_error', '', 100000);
    $messages[] = '<div class="error">Заполните имя.</div>';
  }
  
if ($errors['email']) {
    setcookie('email_error', '', 100000);
    $messages[] = '<div class="error">Заполните почту.</div>';
  }
  
if ($errors['year']) {
    setcookie('year_error', '', 100000);
    $messages[] = '<div class="error">Заполните год.</div>';
  }
  
if ($errors['gender']) {
    setcookie('gender_error', '', 100000);
    $messages[] = '<div class="error">Заполните пол.</div>';
  }
  
if ($errors['limbs']) {
    setcookie('limbs_error', '', 100000);
    $messages[] = '<div class="error">Заполните количество конечностей.</div>';
  }
  
if ($errors['abilities']) {
    setcookie('abilities_error', '', 100000);
    $messages[] = '<div class="error">Заполните сверхспособности.</div>';
  }
  
if ($errors['biography']) {
    setcookie('biography_error', '', 100000);
    $messages[] = '<div class="error">Заполните биографию.</div>';
  }
  
if ($errors['accept']) {
    setcookie('accept_error', '', 100000);
    $messages[] = '<div class="error">Заполните пользовательское соглашение.</div>';
  }
  
  
 $values = array();
 $values['fio'] = empty($_COOKIE['fio_value']) ? '' : $_COOKIE['fio_value'];
 $values['email'] = empty($_COOKIE['email_value']) ? '' : $_COOKIE['email_value'];
 $values['year'] = empty($_COOKIE['year_value']) ? '' : $_COOKIE['year_value'];
 $values['gender'] = empty($_COOKIE['gender_value']) ? '' : $_COOKIE['gender_value'];
 $values['limbs'] = empty($_COOKIE['limbs_value']) ? '' : $_COOKIE['limbs_value'];
 $values['abilities'] = empty($_COOKIE['abilities_value']) ? '' : $_COOKIE['abilities_value'];
 $values['biography'] = empty($_COOKIE['biography_value']) ? '' : $_COOKIE['biography_value'];
 $values['accept'] = empty($_COOKIE['accept_value']) ? '' : $_COOKIE['accept_value'];
 include('form.php');
 }
 
 else {
  $errors = FALSE;
  if (empty($_POST['fio'])) {
    setcookie('fio_error', '1', time() + 24 * 60 * 60);
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
    setcookie('year_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('year_value', $_POST['year'], time() + 30 * 24 * 60 * 60);
  }
  
  if (empty($_POST['gender'])) {
    setcookie('gender_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('gender_value', $_POST['gender'], time() + 30 * 24 * 60 * 60);
  }
  
if (empty($_POST['limbs'])) {
    setcookie('limbs_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('limbs_value', $_POST['limbs'], time() + 30 * 24 * 60 * 60);
  }
  
 $ability_data = ['1', '2', '3', '4', '5', '6'];
if (empty($_POST['abilities'])) {
    setcookie('abilities_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
}
else {
    $abilities = $_POST['abilities'];
    foreach ($abilities as $ability) {
        if (!in_array($ability, $ability_data)) {
            setcookie('abilities_value', $_POST['abilities'], time() + 30 * 24 * 60 * 60);
        }
    }
}
$ability_insert = [];
foreach ($ability_data as $ability) {
    $ability_insert[$ability] = in_array($ability, $abilities) ? 1 : 0;
}
   
  if (empty($_POST['biography'])) {
    setcookie('biography_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('biography_value', $_POST['biography'], time() + 30 * 24 * 60 * 60);
  }
  
  if (empty($_POST['accept'])) {
    setcookie('accept_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('accept_value', $_POST['accept'], time() + 30 * 24 * 60 * 60);
  }
  
  if ($errors) {
    header('Location: index.php');
    exit();
  }
  
  else {
    setcookie('fio_error', '', 100000);
    setcookie('email_error', '', 100000);
    setcookie('year_error', '', 100000);
    setcookie('gender_error', '', 100000);
    setcookie('limbs_error', '', 100000);
    setcookie('biography_error', '', 100000);
    setcookie('accept_error', '', 100000);
  }

  // Сохранение в БД.
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

  setcookie('save', '1');
  header('Location: index.php');
}

  
  



