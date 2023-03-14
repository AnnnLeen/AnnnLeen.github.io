<form action="" method="POST">
  
  <input name="fio">
  
  <select name="year">
     <?php 
    for ($i = 1922; $i <= 2022; $i++) {
      printf('<option value="%d">%d год</option>', $i, $i);
    }
    ?>
  </select>   
    
  <input name="email">
  
  <select name="gender">
   </select>
    
  <select name="limbs">
  <?php 
    for ($i = 0; $i <= 4; $i++) {
      printf('<option value="%d">%d</option>', $i, $i);
    }
    ?>
  </select>

  <input name="biography">
    
  <select name="checkbox">
    

  
  <input type="submit" value="ok" />
</form>
