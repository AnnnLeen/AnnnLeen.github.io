<!DOCTYPE html>
<html lang="ru">

  <head>
    <meta charset="UTF-8">
    <title>Backlab3</title>
    <link rel="stylesheet" href="style.css" type="text/css">
  </head>

  <body>
    
    <div class="form-class">
      
<h2>Форма регистрации</h2>
<form action="" method="POST">

<label>
        <div class="txt">Имя:</div>
        <input name="fio"
          type="text"
          placeholder="Введите ваше имя" />
</label>

<label>
        <div class="txt">Email:</div>
        <input name="email"
          type="email"
          placeholder="Введите вашу почту">
</label>

<label>
        <div class="txt">Год рождения:</div>
        <select name="year">
  <?php 
    for ($i = 1922; $i <= 2022; $i++) {
      printf('<option value="%d">%d год</option>', $i, $i);
    } ?>
        </select>
</label>

<label>
      <div class="txt">Пол:</div>
      <select name="gender">
    <?php 
    for ($i = 0; $i <= 1; $i++) {
      printf('<option value="%d">%d</option>', $i, $i);
    } ?>
 </select>
</label>

<label>
      <div class="txt">Количество конечностей:</div>
      <select name="limbs">
  <?php 
    for ($i = 0; $i <= 4; $i++) {
      printf('<option value="%d">%d</option>', $i, $i);
    }
    ?>
</select>
</label>
        
<label><div class="txt">Биография:</div>
        <textarea name="biography" placeholder="Напишите свою биографию"></textarea>
 </label>


<div class="otpr"><label><button>Отправить!</button></label></div>
    
</form>

</div>

</body>

</html> 
