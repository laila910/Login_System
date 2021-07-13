<?php
require "header.php";


?>
<main>
    <h1>Sign Up</h1>
    <?php 
    if(isset($_GET['error'])){
        if($_GET['error']=="emptyfields"){
            echo'<p> Fill in all fields!</p>';
        }elseif($_GET['error']=="invalidemailuid"){
            echo'<p>Invalid username and email </p>';

        }elseif($_GET['error']=="InvalidUid"){
            echo'<p>Invalid username </p>';

        }elseif($_GET['error']=="InvalidEmail"){
            echo'<p>Invalid E-mail </p>';

        }elseif($_GET['error']=="passwordcheck"){
            echo'<p>Your Passwords are not match!</p>';

        }elseif($_GET['error']=="usertaken"){
            echo'<p>Username is already taken! </p>';

        }
    } elseif(isset($_GET['signup'])){
          if($_GET['signup']=="success"){
           echo'<p>You are sign-up! </p>';
    }}

    ?>
    <form action="includes/signup.inc.php" method="post">
        <input type="text" name="uid" placeholder="Enter UserName">
        <input type="text" name="mail" placeholder="Enter Your E-mail">
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="pwd-repeat" placeholder=" Repeat Password">
        <button type="submit" name='signup-submit'>Sign Up</button>
    </form>
    <main>

        <?php

require "footer.php";
?>
