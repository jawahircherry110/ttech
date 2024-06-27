<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}

elseif($_SESSION['usertype']=='admin'){
    header("location:login.php");
}

$conn = new mysqli("localhost", "root", "", "t.school");

$name=$_SESSION['username'];

$sql = "SELECT * FROM user WHERE username= '$name'";

$result = mysqli_query($conn, $sql);

$info = mysqli_fetch_assoc($result);



if(isset($_POST['update_profile'])){
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    
    $query="UPDATE user SET email='$email', phone='$phone',
    pasword='$password' WHERE username='$name' ";


    $result2=mysqli_query($conn,$query);

    if($result2){
        if($_SESSION['message']){
            $message=$_SESSION['message'];
            echo"<script type='text/javascript'>
            alert('$message');
            </script>";
          } ;
    }
}

?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student profile</title>
    <link rel="stylesheet" href="admin.css">
     <!-- bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

     <style>
        label{
             display:inline-block;
             text-align:right;
             width:100px;
             padding-top:10px;
             padding-bottom:10px;
        }
        .dev_deg{
            background-color:skyblue;
            width:500px;
            padding-top:70px;
            padding-bottom:70px;

        }
     </style>
    </head>

<body>
    <?php
 
 include 'student_sidebar.php';

?>
<div class="content">
    <h1>Update Profile</h1><br><br>
    <form action="#" method="POST">
        <div class="dev_deg">
        
        <div>
        <label for="">Email</label>
        <input require type="email" name="email" value="<?php echo"{$info['email']}"   ?>">
        </div>
        <div>
        <label for="">Phone</label>
        <input require type="number" name="phone" value="<?php echo"{$info['phone']}"   ?>">
        </div>
        <div>
        <label for="">Password</label>
        <input type="text" name="password" value="<?php echo"{$info['pasword']}"   ?>">
        </div>
        <div>
        
        <input class="btn btn-primary" style="margin-left:150px;" type="submit" name="update_profile" value="Update">
        </div>
        </div>
    </form>

</div>

    
</body>
</html>