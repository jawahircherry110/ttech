<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
elseif($_SESSION['usertype']=='student'){
    header("location:login.php");
}

$conn = new mysqli("localhost", "root", "", "t.school");




if(isset($_POST['add-course'])){
    $t_name=$_POST['name'];
    $t_description=$_POST['description'];
    $file=$_FILES['image']['name'];
    $dst="./image/".$file;

    $dst_db="image/".$file;

    move_uploaded_file($_FILES['image']['tmp_name'],$dst);

    
    
    $sql="INSERT INTO course (name, description,image) VALUES
    (' $t_name',' $t_description',' $dst_db')";


    $result=mysqli_query($conn,$sql);
    if($result){
        header('location: add-course.php');
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add course</title>
    <link rel="stylesheet" href="admin.css">
     <!-- bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <style>
        .div_deg{
             background-color:skyblue;
             padding-top:70px;
             padding-bottom:70px;
             width:500px;
        }
      </style>
    </head>
<body>
   <?php
   
   include 'admin_sidebar.php';
      
   ?>

   <div class="content">
<center>
    <h1>Add Course</h1>
    <br>
    <div class="div_deg">
        <form action="#" method="POST" enctype="multipart/form-data">
            <div>
                <label for="">Course Name</label>
                <input type="text" name="name">
            </div>
            <br>
            <div>
                <label for="">Description</label>
                <textarea name="description" id=""></textarea>
            </div>
            <br>
            <div>
                <label for="">Image</label>
                <input type="file" name="image">
            </div>
            <br>
              <div>
                <input type="submit" value="Add course" name="add-course" class="btn btn-primary ">
              </div>
        </form>
    </div>
</center>    
   </div>

    
</body>
</html>