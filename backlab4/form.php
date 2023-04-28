<!DOCTYPE html>
<html lang="ru">

  <head>
    <meta charset="UTF-8">
    <title>Backlab4</title>
    <link rel="stylesheet" href="styl.css" type="text/css">
    <style>
      .error {
      border: 2px solid #dc143c;
      }
</style>
  </head>

  <body>
    
<?php
if (!empty($messages)) {
  print('<div id="messages">');
  foreach ($messages as $message) {
    print($message);
  }
  print('</div>');
}?>
    
    
    
    
    <div class="form-class">
      
<h2>Форма регистрации</h2>
<form action="" method="POST">

<label>
        <div class="txt">Имя:</div>
        <input name="fio" type="text" placeholder="Введите ваше имя"
               <?php if ($errors['fio']) {print 'class="error"';} ?> value="<?php print $values['fio']; ?>" />
</label>

<label>
        <div class="txt">Email:</div>
        <input name="email" type="email" placeholder="Введите вашу почту"
               <?php if ($errors['email']) {print 'class="error"';} ?> value="<?php print $values['email']; ?>" />
</label>

<label>
        <div class="txt">Год рождения:</div>
        <select name="year"
                <?php if ($errors['year']) {print 'class="error"';} ?> value="<?php print $values['year']; ?>" />
  <?php 
    for ($i = 1922; $i <= 2022; $i++) { 
      printf('<option value="%d">%d год</option>', $i, $i);
    } ?>
        </select>
</label>

<label>
      <div class="txt">Пол:</div>
  
      <label <?php if ($errors['gender']) {print 'class="error"';} ?> value="<?php print $values['gender']; ?>" />><div class="raddio">
        <input type="radio" name="gender" id="gender1" value="0" <?php if($values['gender'] == 0) print 'checked';?>
               
        Мужской<span></span></div></label>
  
      <label><div class="raddio">
        <input type="radio" name="gender" id="gender2" value="1"
               <?php if($values['gender'] == 1) print 'checked';?>
        Женский<span></span></div></label>
                                                              
</label>

<label>
      <div class="txt">Количество конечностей:</div>
      <label><div class="raddio">
           <input type="radio" name="limbs" id="limb1" value="1"
                  <?php if ($errors['limbs']) {print 'class="error"';} ?> value="<?php print $values['limbs']; ?>" />
        1<span></span></div></label>
  
      <label><div class="raddio">
           <input type="radio" name="limbs" id="limb2" value="2" 
                  <?php if ($errors['limbs']) {print 'class="error"';} ?> value="<?php print $values['limbs']; ?>" />
        2<span></span></div></label>
  
      <label><div class="raddio">
           <input type="radio" name="limbs" id="limb3" value="3" 
                  <?php if ($errors['limbs']) {print 'class="error"';} ?> value="<?php print $values['limbs']; ?>" />
        3<span></span></div></label>
  
        <label><div class="raddio">
  <input type="radio" name="limbs" id="limb4" value="4"
         <?php if ($errors['limbs']) {print 'class="error"';} ?> value="<?php print $values['limbs']; ?>" />
        4<span></span></div></label>
  
  <label><div class="raddio">
           <input type="radio" name="limbs" id="limb5" value="5"
                  <?php if ($errors['limbs']) {print 'class="error"';} ?> value="<?php print $values['limbs']; ?>" />
        5<span></span></div></label>
  
  <label><div class="raddio">
           <input type="radio" name="limbs" id="limb6" value="6" 
                  <?php if ($errors['limbs']) {print 'class="error"';} ?> value="<?php print $values['limbs']; ?>" />
        6<span></span></div></label>
  
  <label><div class="raddio">
           <input type="radio" name="limbs" id="limb7" value="7"
                  <?php if ($errors['limbs']) {print 'class="error"';} ?> value="<?php print $values['limbs']; ?>" />
        7<span></span></div></label>
  
      <label><div class="raddio">
           <input type="radio" name="limbs" id="limb8" value="8"
                  <?php if ($errors['limbs']) {print 'class="error"';} ?> value="<?php print $values['limbs']; ?>" />
        8<span></span></div></label>
</label>
                                                                
<label>
        <div class="txt" <?php if ($errors['abilities']) {print 'class="error"';} ?>>Сверхспособности:</div>
        <select class="form-select" name="abilities[]" multiple="multiple">
          <option <?php if($values['ability0']==1) print 'selected="selected"';?> value="1">Бессмертие</option>
          <option <?php if($values['ability1']==1) print 'selected="selected"';?> value="2">Прохождение сквозь стены</option>
          <option <?php if($values['ability2']==1) print 'selected="selected"';?> value="3">Понимание теории диффур</option>
          <option <?php if($values['ability3']==1) print 'selected="selected"';?> value="4">Левитация</option>
          <option <?php if($values['ability4']==1) print 'selected="selected"';?> value="5">Телекинез</option>
          <option <?php if($values['ability5']==1) print 'selected="selected"';?> value="6">Телепатия</option>
        </select>
</label>
        
<label><div class="txt">Биография:</div>
        <textarea name="biography" placeholder="Напишите свою биографию"
                  <?php if ($errors['biography']) {print 'class="error"';} ?> value="<?php print $values['biography']; ?>"></textarea>
 </label>
                                                                        
 <label>
    <div class="check"><input type="checkbox" name="accept" value="1"
                              <?php if ($errors['accept']) {print 'class="error"';} ?> value="<?php print $values['accept']; ?>" />
        С контрактом ознакомлен(а)<span1></span1></div></label>

<div class="otpr"><label><button type="submit" value="send">Отправить!</button></label></div>
    
</form>

</div>

</body>

</html> 
