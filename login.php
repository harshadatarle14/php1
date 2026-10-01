<?php
session_start();
 $conn = mysqli_connect("localhost","root","", "school");

 if (isset($_POST['login'])){ 
   $u = $_POST['username'];
   $p = $_POST['password'];
   $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$u' AND password='$p' ");
   if (mysqli_num_rows($result)==1) {
    $_SESSION['user'] = $u;
    header("Location: view.php");
    exit;
   } else {
    echo "<script>alert('Wrong username/password');</script>";
   }
 }
 ?>
<style>
body{font-family:Arial; background:#f4f6f9; padding:20px;}
a{text-decoration:none; color:#0a58ca;}
table{border-collapse:collapse; width:70%; background:white; box-shadow:0 0 10px #ccc;}
th{background:#0a58ca; color:white; padding:10px;}
td{padding:8px; text-align:center; border:1px solid #ddd;}
input[type=text],input[type=number]{padding:8px; border:1px solid #ccc; border-radius:5px;}
input[type=submit]{padding:8px 15px; background:#0a58ca; color:white; border:none; border-radius:5px; cursor:pointer;}
input[type=submit]:hover{background:#084298;}
</style>
<br>
<form action="" method="post">
            Username: <input type="text" name="username" id="" placeholder="Enter your username"><br><br>
            Password: <input type="password" name="password" id="" placeholder="Enter your password"><br><br>
            <input type="submit" name="login" value="Login">      
        </form>
    