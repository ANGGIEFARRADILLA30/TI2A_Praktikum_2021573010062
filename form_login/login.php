<?php 
session_start(); 
if(!empty($_SESSION['username_xyz'])){
     header("location: dashboard.php"); 
     exit(); 
}  
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Document</title> 
</head> 
<body> 
    <H1>Login</H1> 
    <form action="proses_login.php" method="POST"> 
        <table border ="0"> 
            <tr> 
                <td>Username</td> 
                <td><input type="text" name="Username"></td> 
            </tr> 
            <tr> <td>Password</td> 
            <td><input type="password" name="Password"></td> 
        </tr> 
        <tr> 
            <td><input type="submit" value="Login"></td> 
        </tr> 
        <tr> 
            <td>daftar akun</td> 
            <td> <a href="register.php">register</a></td>
         </tr>
 </body>
</html>