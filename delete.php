<?php
 session_start();
$conn = new mysqli("localhost", "root", "", "t.school");

if($_GET['student_id']){
    $user_id=$_GET['student_id'];

    $sql="DELETE FROM user WHERE id='$user_id' ";

    $result=mysqli_query($conn,$sql);
    if($result){
     $_SESSION['message']='Delete Student Data successfuly';

     header("location:view_student.php");
          
    }
}






?>