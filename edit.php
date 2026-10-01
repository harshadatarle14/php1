<?php
$conn = mysqli_connect("localhost", "root", "" , "school");
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    mysqli_query($conn, "UPDATE students SET name='$name',age='$age' WHERE id=$id");
    header("Location: view.php");
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
<form action="" method="post">
            Name: <input type="text" name="name" id="" value="<?php echo $row['name']; ?>" placeholder="Enter your name"><br><br>
            Age: <input type="number" name="age" id="" value="<?php echo $row['age']; ?>"  placeholder="Enter your age"><br><br>
            <input type="submit" name="update" value="Update">        
        </form>