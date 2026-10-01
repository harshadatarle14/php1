<!-- Day 5 -->
 <?php
session_start();
if(!isset($_SESSION['user'])){
  header("Location: login.php");
  exit;
}
 $conn = mysqli_connect("localhost","root","", "school");
 
 if (isset($_GET['search']) && $_GET['search'] != '') {
   $s = $_GET['search'];
   $result = mysqli_query($conn, "SELECT * FROM students WHERE name LIKE '%$s%'");
   } else {
    $result = mysqli_query($conn, "SELECT * FROM students");
   }

   if (mysqli_num_rows($result)==0) {
    echo "<h3 style='color:red; text-align:center;'>No Record Found!</h3>";
    echo "<p>No Student $s Found in the record<br> </p>";
   }
   else{
    while ($row = mysqli_fetch_assoc($result)) {
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
 <a href="add.php">+ Add New Student</a>
 <br><br>
 <form action="" method="get">
   <input type="text" name="search" placeholder="Search by name" value="<?php if(isset($_GET['search'])) echo $_GET['search']; ?>">
   <input type="submit" value="Search">
    <a href="view.php">  Reset</a>
    <a href="logout.php" style="float: right;">Logout</a>
 </form>

 <?php 
  echo "<table border='1'>";
 echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Upload</th><th>Action</th></tr>";
 while ($row=mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['age']."</td>";
     echo "<td><img src='uploads/" .$row['photo']." ' width='50' height='50'></td>";
     echo "<td><a href='edit.php?id=" .$row['id']." '>Edit</a> | <a href='delete.php?id=" .$row['id']." 'onclick=\"return confirm('Are you sure to delete?')\">Delete</a>
    </td> </tr>";  
}
echo "</table>";
    }
   }
?>