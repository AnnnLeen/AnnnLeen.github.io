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
          placeholder="Введите ваше имя">
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
      <label><div class="raddio"><input type="radio" checked="checked"
        name="gender" value="Male">
        Мужской<span></span></div></label>
      <label><div class="raddio"><input type="radio"
        name="radio-group-1" value="Female">
        Женский<span></span></div></label>
</label>

<label>
      <div class="txt">Количество конечностей:</div>
      <label><div class="raddio"><input type="radio" checked="checked"
        name="limbs" value="2">
        2
        <span></span></div></label>
      <label><div class="raddio"><input type="radio"
        name="radio-group-2" value="3">
        3<span></span></div></label>
      <label><div class="raddio"><input type="radio"
        name="radio-group-2" value="4">
        4<span></span></div></label>
</label>

<label>
        <div class="txt">Сверхспособности:</div>
        <select name="possibilities"
          multiple="multiple">
          <option value="poss_1">Бессмертие</option>
          <option value="poss_2">Прохождение сквозь стены</option>
          <option value="poss_3">Понимание теории диффур</option>
          <option value="poss_4">Левитация</option>
          <option value="poss_5">Телекинез</option>
          <option value="poss_6">Телепатия</option>
        </select>
</label>
        
<label><div class="txt">Биография:</div>
        <textarea name="biography" placeholder="Напишите свою биографию"></textarea>
 </label>

<label><div class="check"><input type="checkbox" name="checkbox">
        С контрактом ознакомлен(а)<span1></span1></div></label>

<div class="otpr"><label><button>Отправить!</button></label></div>
    
</form>

</div>

</body>

</html> 
