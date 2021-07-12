<?php
session_start();

?>
 <!DOCTYPE html>
 <html lang="en">

     <head>
         <title>ValidationForm</title>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="styles.css">

     </head>

     <body>
         <header>
             <nav>

                 <label for="menuBut"><i class="fas fa-bars"></i></label>
                 <input type="checkbox" id="menuBut">
                 <ul class='container'>
                     <li><a href='index.php'>Home</a></li>
                     <li><a href='#'>Portfolio</a></li>
                     <li><a href='#'>About me</a></li>
                     <li><a href='#'>Contact</a></li>


                 </ul>
                 <?php 
                //     if(isset($_SESSION['userId'])){
                //       echo '<form method="post" action="includes/login.inc.php" enctype="multipart/form-data">
                //          <input type="text" name="mailuid" placeholder="Enter UserName/E-mail...">
                //          <input type="password" name="pwd" placeholder="Password">
                //          <button type="submit" name='login-submit'>login</button>
                //      </form>';
                //     }else{
                //       echo ' <a href='signup.php'>Sign-Up</a>
                //      <form method="post" action="includes/logout.inc.php" enctype="multipart/form-data">
                //          <button type="submit" name='logout-submit'>logout</button>
                //      </form>';
                //    }
                 
                 
                 ?> 
                 <div>
                     <form method="post" action="includes/login.inc.php" enctype="multipart/form-data">
                         <input type="text" name="mailuid" placeholder="Enter UserName/E-mail...">
                         <input type="password" name="pwd" placeholder="Password">
                         <button type="submit" name='login-submit'>login</button>
                     </form>

                     <a href='signup.php'>Sign-Up</a>
                     <form method="post" action="includes/logout.inc.php" enctype="multipart/form-data">
                         <button type="submit" name='logout-submit'>logout</button>
                     </form>
                 </div>

             </nav>
         </header>
     </body>

 </html>
