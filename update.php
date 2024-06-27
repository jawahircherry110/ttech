<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
elseif($_SESSION['usertype']=='student'){
    header("location:login.php");
}

$conn = new mysqli("localhost", "root", "", "t.school");

$id=$_GET['student_id'];
$sql = "SELECT * FROM user WHERE id='$id'";

$result=mysqli_query($conn,$sql);

$info=$result->fetch_assoc();

if(isset($_POST['update'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    
    $query="UPDATE user SET username='$name',phone='$phone',email='$email',
    pasword='$password' WHERE id='$id' ";


    $result2=mysqli_query($conn,$query);
    if($result2){
        echo "update successfly";
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update student</title>
    <link rel="stylesheet" href="admin.css">
     <!-- bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <style>
        label{
            display:inline-block;
            width:100px;
            text-align:right;
            padding-top:10px;
            padding-bottom:10px;

        }
        .div_deg{
            background-color:skyblue;
            width:400px;
            padding-bottom:70px;
            padding-top:70px;
        }
     </style>
    </head>
<body>
   <?php
   
   include 'admin_sidebar.php';
      
   ?>

   <div class="content">
    <center>   <h1>update student</h1>
      <div class="div_deg">
        <form action="#" method="POST">
            <div>
                <label for="">Username</label>
                <input type="text" name="name" 
                value="<?php echo "{$info['username']}"; ?>">
            </div>
            <div>
                <label for="">Email</label>
                <input type="email" name="email" 
                value="<?php echo "{$info['email']}"; ?>">
            </div>
            <div>
                <label for="">Phone</label>
                <input type="number" name="phone" 
                value="<?php echo "{$info['phone']}"; ?>">
            </div>
            <div>
                <label for="">Password</label>
                <input type="text" name="password" 
                value="<?php echo "{$info['pasword']}"; ?>">
            </div>
            <div>
                <input class="btn btn-success"
                 type="submit" name="update" id="">
            </div>
        </form>
      </div>
      </center>
 
    
   </div>

    
</body>
</html>