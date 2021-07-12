<?php
require "header.php";


?>
<main>
   <?php
   if(isset($_SESSION['userId'])){
       echo '<p>You are Logged in!</p>';
   }else{
       echo '<p>You are Logged out!</p>';
   }

?>

  
    
</main>

<?php

require "footer.php";
?>
