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
  
      <label><div class="raddio">
        <input type="radio" name="gender" id="gender1" value="0">
        Мужской<span></span></div></label>
  
      <label><div class="raddio">
        <input type="radio" name="gender" id="gender2" value="1">
        Женский<span></span></div></label>
                                                              
</label>

<label>
      <div class="txt">Количество конечностей:</div>
      <label><div class="raddio">
           <input type="radio" name="limbs" id="limb1" value="1">
        1<span></span></div></label>
  
      <label><div class="raddio">
           <input type="radio" name="limbs" id="limb2" value="2">
        2<span></span></div></label>
  
      <label><div class="raddio">
           <input type="radio" name="limbs" id="limb3" value="3">
        3<span></span></div></label>
  
        <label><div class="raddio">
  <input type="radio" name="limbs" id="limb4" value="4">
        4<span></span></div></label>
  
  <label><div class="raddio">
           <input type="radio" name="limbs" id="limb5" value="5">
        5<span></span></div></label>
  
  <label><div class="raddio">
           <input type="radio" name="limbs" id="limb6" value="6">
        6<span></span></div></label>
  
  <label><div class="raddio">
           <input type="radio" name="limbs" id="limb7" value="7">
        7<span></span></div></label>
  
      <label><div class="raddio">
           <input type="radio" name="limbs" id="limb8" value="8">
        8<span></span></div></label>
</label>
                                                                
<label>
        <div class="txt">Сверхспособности:</div>
        <select class="form-select" name="abilities[]" multiple="multiple">
          <option value="1">Бессмертие</option>
          <option value="2">Прохождение сквозь стены</option>
          <option value="3">Понимание теории диффур</option>
          <option value="4">Левитация</option>
          <option value="5">Телекинез</option>
          <option value="6">Телепатия</option>
        </select>
</label>
        
<label><div class="txt">Биография:</div>
        <textarea name="biography" placeholder="Напишите свою биографию"></textarea>
 </label>
                                                                        
 <label>
    <div class="check"><input type="checkbox" name="accept" value="1">
        С контрактом ознакомлен(а)<span1></span1></div></label>

<div class="otpr"><label><button type="submit" value="send">Отправить!</button></label></div>
    
</form>

</div>

</body>

</html> 
