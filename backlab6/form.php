<!DOCTYPE html>
<html lang="ru">

  <head>
    <meta charset="UTF-8">
    <title>Backlab6</title>
    <link rel="stylesheet" href="style.css" type="text/css">
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
               <?php if ($errors['fio_error']) {print 'class="error"';} ?> value="<?php print $values['fio_value']; ?>" />
</label>

<label>
        <div class="txt">Email:</div>
        <input name="email" type="email" placeholder="Введите вашу почту"
               <?php if ($errors['email_error']) {print 'class="error"';} ?> value="<?php print $values['email_value']; ?>" />
</label>

<label>
        <div class="txt">Год рождения:</div>
        <select name="year"
                <?php if ($errors['year_error']) {print 'class="error"';} ?> value="<?php print $values['year_value']; ?>" />
  <?php 
    for ($i = 1922; $i <= 2022; $i++) { 
      printf('<option value="%d">%d год</option>', $i, $i);
    } ?>
        </select>
</label>

      

<label>
      <div class="txt" <?php if ($errors['gender_error']) {print 'class="error"';}?>>Пол:</div>
  
      <label><div class="raddio">
        <input type="radio" name="gender" id="gender1" value="0" <?php if($values['gender_value'] == 0) print 'checked';?>
               
               >Мужской<span></span>
        </div></label>
  
      <label><div class="raddio">
        <input type="radio" name="gender" id="gender2" value="1"
               <?php if($values['gender_value'] == 1) print 'checked';?>
               >Женский<span></span>
        </div></label>
                                                              
</label>

  
  
<label>
      <div class="txt">Количество конечностей:</div>
      <label><div class="raddio">
           <input type="radio" name="limbs" id="limb1" value="1"
                  <?php if ($errors['limbs_error']) {print 'class="error"';} ?> value="<?php print $values['limbs_value']; ?>" />
        1<span></span></div></label>
  
      <label><div class="raddio">
           <input type="radio" name="limbs" id="limb2" value="2" 
                  <?php if ($errors['limbs_error']) {print 'class="error"';} ?> value="<?php print $values['limbs_value']; ?>" />
        2<span></span></div></label>
  
      <label><div class="raddio">
           <input type="radio" name="limbs" id="limb3" value="3" 
                  <?php if ($errors['limbs_error']) {print 'class="error"';} ?> value="<?php print $values['limbs_value']; ?>" />
        3<span></span></div></label>
  
        <label><div class="raddio">
  <input type="radio" name="limbs" id="limb4" value="4"
         <?php if ($errors['limbs_error']) {print 'class="error"';} ?> value="<?php print $values['limbs_value']; ?>" />
        4<span></span></div></label>
  
  <label><div class="raddio">
           <input type="radio" name="limbs" id="limb5" value="5"
                  <?php if ($errors['limbs_error']) {print 'class="error"';} ?> value="<?php print $values['limbs_value']; ?>" />
        5<span></span></div></label>
  
  <label><div class="raddio">
           <input type="radio" name="limbs" id="limb6" value="6" 
                  <?php if ($errors['limbs_error']) {print 'class="error"';} ?> value="<?php print $values['limbs_value']; ?>" />
        6<span></span></div></label>
  
  <label><div class="raddio">
           <input type="radio" name="limbs" id="limb7" value="7"
                  <?php if ($errors['limbs_error']) {print 'class="error"';} ?> value="<?php print $values['limbs_value']; ?>" />
        7<span></span></div></label>
  
      <label><div class="raddio">
           <input type="radio" name="limbs" id="limb8" value="8"
                  <?php if ($errors['limbs_error']) {print 'class="error"';} ?> value="<?php print $values['limbs_value']; ?>" />
        8<span></span></div></label>
</label>
                                                                
<label>
        <div class="txt" <?php if ($errors['abilities_error']) {print 'class="error"';} ?>>Сверхспособности:</div>
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
                  <?php if ($errors['biography_error']) {print 'class="error"';} ?> value="<?php print $values['biography_value']; ?>"></textarea>
 </label>
                                                                        
 <label>
    <div class="check"><input type="checkbox" name="accept" value="1"
                              <?php if ($errors['accept_error']) {print 'class="error"';} ?> value="<?php print $values['accept_value']; ?>" />
        С контрактом ознакомлен(а)<span1></span1></div></label>

<div class="otpr"><label><button type="submit" value="send">Отправить!</button></label></div>
    
</form>

</div>

</body>

</html> 
