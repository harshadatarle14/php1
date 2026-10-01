<!-- Day 3 + Day 5 -->
<?php
        $conn = mysqli_connect("localhost","root", "", "school");
    if (isset($_POST['submit'])) {
        
        $name = trim($_POST['name']);
        $age = trim($_POST['age']);
       
        if ($name == "" || $age == "") {
            echo "<script>alert('Fill the name and age of student');</script>";
        }else {
        $pic = $_FILES['photo']['name'];
        $tmp = $_FILES['photo']['tmp_name'];
        move_uploaded_file($tmp, "uploads/".$pic);

         $sql = mysqli_query($conn, "INSERT INTO students (name, age,  photo) VALUES ('$name','$age', '$pic')");
         
         if ($sql) {
         echo "<script>alert('Student Data inserted successfully!'); window.location='view.php';</script>";
         }
          else{
            echo "Error: " .mysqli_error($conn);
        }
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
<br><br>
<form action="" method="post" enctype="multipart/form-data">
            Name: <input type="text" name="name" id="" placeholder="Enter your name" required><br><br>
            Age: <input type="number" name="age" id="" placeholder="Enter your age" required><br><br>
            Photo: <input type="file" name="photo" id=""  placeholder="upload your photo"> <br><br>
            <input type="submit" name="submit" value="Save"> 
            
        </form>
    