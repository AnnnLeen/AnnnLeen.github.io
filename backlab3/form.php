<form action="" method="POST">
  <input name="fio">
  <select name="year">
  <input name="email">
  <select name="gender">
  <select name="limbs">
  <input name="biography">
  <select name="checkbox">
    
    <?php 
    for ($i = 1922; $i <= 2022; $i++) {
      printf('<option value="%d">%d год</option>', $i, $i);
    }
    ?>
  </select>
    
    <?php 
    for ($i = 0; $i <= 4; $i++) {
      printf('<option value="%d">%d Кол-во конечностей</option>', $i, $i);
    }
    ?>
  </select>
  
  <input type="submit" value="ok" />
</form>
