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
  
  Имя: <input name="fio" /><br>
  
Год рождения: <select name="year">
     <?php 
    for ($i = 1922; $i <= 2022; $i++) {
      printf('<option value="%d">%d год</option>', $i, $i);
    } ?>
</select><br>
    
  E-mail: <input name="email" /><br>
  
Пол: <select name="gender">
    <?php 
    for ($i = 0; $i <= 1; $i++) {
      printf('<option value="%d">%d</option>', $i, $i);
    } ?>
 </select><br>
    
Конечности: <select name="limbs"> 
  <?php 
    for ($i = 0; $i <= 4; $i++) {
      printf('<option value="%d">%d</option>', $i, $i);
    }
    ?>
</select><br>

Биография: <input name="biography" /><br>
    
Согласие на обработку данных: <select name="checkbox">
  <?php 
    for ($i = 0; $i <= 1; $i++) {
      printf('<option value="%d">%d</option>', $i, $i);
    } ?>
</select><br>
  
  <input type="submit" value="ok" />
</form>

</div>

</body>

</html> 
