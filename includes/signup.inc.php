<?php
function CleanInputs($input)
{ 
    $input=trim($input);
    $input=stripcslashes($input);
    $input=htmlspecialchars($input);
    return $input; 
}
if(isset($_POST['signup-submit'])){
       require "dbh.inc.php";
       $username=mysqli_real_escape_string($conn, CleanInputs($_POST['uid']));
       $email=mysqli_real_escape_string($conn,CleanInputs($_POST['mail']));
       $password=mysqli_real_escape_string($conn,CleanInputs($_POST['pwd']));
       $passwordRepeat=mysqli_real_escape_string($conn,CleanInputs($_POST['pwd-repeat']));

    if(empty($username)||empty($email)||empty($password)||empty($password)){
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&email=".$email);
        exit();
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                 $s_email = filter_var($email,FILTER_SANITIZE_EMAIL);
                   if(!filter_var($s_email,FILTER_VALIDATE_EMAIL)){
                        header("Location: ../signup.php?error=InvalidEmail&uid=".$username);
                        exit();
                    }
                    
        
     }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)&&!preg_match("/^[a-zA-Z0-9]*$/",$username){
                 header("Location: ../signup.php?error=InvalidEmailuid");
                exit();
      

        
     } elseif($password !== $passwordRepeat){

              header("Location: ../signup.php?error=passwordcheck&uid=".$username."&email=".$email);
              exit();
     }elseif(!preg_match("/^[a-zA-Z]*$/",$username)){
         
               header("Location: ../signup.php?error=InvalidUid&email=".$email);
               exit();
    


     }else{
          


        
      


      
   }
}
 


?>
