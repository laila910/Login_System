<?php
require "header.php";


?>
<main>
    <h1>Sign Up</h1>
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
