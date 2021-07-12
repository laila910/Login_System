<?php
session_start();
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
     }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)&&!preg_match("/^[a-zA-Z0-9]*$/",$username)){
              header("Location: ../signup.php?error=invalidemailuid");
              exit();
     }elseif($password !== $passwordRepeat){

              header("Location: ../signup.php?error=passwordcheck&uid=".$username."&email=".$email);
              exit();
     }elseif(!preg_match("/^[a-zA-Z]*$/",$username)){
         
               header("Location: ../signup.php?error=InvalidUid&email=".$email);
               exit();
     }else{ //check if the user enter username is already exist in the database 
          $sql= "SELECT uidUsers FROM users WHERE uidUsers=?;"; 
          $stmt=mysqli_stmt_init($conn); //if the connection to the database is opened
          if(! mysqli_stmt_prepare($stmt,$sql)){ //check if the connection is  open between my query sql statment and the database
               header("Location: ../signup.php?error=sqlerror");
               exit();
          }else{
              mysqli_stmt_bind_param($stmt,'s',$username); //send the username that the user is already enter it to the database to check
              mysqli_stmt_execute($stmt);//open the connection 
              mysqli_stmt_store_result($stmt);//the result of the select statment from the database
              $resultcheck = mysqli_stmt_num_rows($stmt);//check the number of rows of the result 
              if($resultcheck > 0 ){
                   header("Location: ../signup.php?error=usertaken&email".$email);
                   exit();
              }else{
                  $sql = "INSERT INTO users (uidUsers,emailUsers,pwdUsers) VALUES (?,?,?); ";
                    $stmt=mysqli_stmt_init($conn); //if the connection to the database is opened
                    if(! mysqli_stmt_prepare($stmt,$sql)){ //check if the connection is  open between my query sql statment and the database
                         header("Location: ../signup.php?error=sqlerror");
                         exit();
                    }else{
                        $hashedPassword=password_hash($password,PASSWORD_DEFAULT);
                         mysqli_stmt_bind_param($stmt,'sss',$username,$email,$hashedPassword); 
                         mysqli_stmt_execute($stmt);
                         header("Location: ../signup.php?signup=success");
                         exit();
                   
                    }
              }  
          }
   }
   mysqli_stmt_close($stmt);
   mysqli_close($conn);
}
else{
     header("Location: ../signup.php");
     exit();
}
 


?>
