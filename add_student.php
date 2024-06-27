<?php

session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
elseif($_SESSION['usertype']=='student'){
    header("location:login.php");
}

$conn = new mysqli("localhost", "root", "", "t.school");
if(isset($_POST['add_student']))
{
    $username=$_POST['name'];
    $user_email=$_POST['email'];
    $user_phone=$_POST['phone'];
    $usertype="student";
    $user_password=$_POST['pasword'];

    $check = "SELECT * FROM user WHERE username = '$username'";
     
    $check_user=mysqli_query($conn,$check);

    $row_count=mysqli_num_rows($check_user);


    if($row_count==1){
        echo "user already exists";
    }

    else{

   

    $sql="INSERT INTO user(username,email,phone,usertype,
    pasword) VALUES (' $username','$user_email',  '$user_phone',' $usertype', '$user_password')";
     
     $result=mysqli_query($conn,$sql);
     if($result){
        echo "<script type='text/javascript'> 
        alert('Data uploaded successly');
        </script>";
     }
     else{
        echo "upload failed";
     }
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin home</title>
       <style>
        label{
            display:inline-block;
            text-align:right;
            width:100px;
            padding-top:10px;
            padding-bottom:10px;
        }
        .div_deg{
            background-color:skyblue;
            width:400px;
            padding-top:70px;
            padding-bottom:70px;
        }
       </style>



    <link rel="stylesheet" href="admin.css">
     <!-- bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
   <?php
   
   include 'admin_sidebar.php';
      
   ?>

   <div class="content">
    <h1>Add student</h1>
    <div class="div_deg">

   
        <form action="#" method="POST">
        <div>
            <label for="">username</label>
            <input type="text" required name="name">
    
    </div>
    
  
    
    <div>
       
            <label for="">Email</label>
            <input type="email" required name="email">
      
    </div>
    
    <div>
      
            <label for="">Phone</label>
            <input type="number" required name="phone">
       
    </div>
    <div>
       
            <label for="">Password</label>
            <input type="text" required name="pasword">
   
    </div>
    
 
    
    <div>
        <input type="submit" class="btn btn-primary mx-5" name="add_student" value="Add Student">
    </div>
    </form>
    </div>
    
   </div>

    
</body>
</html>