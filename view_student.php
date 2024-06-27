<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
elseif($_SESSION['usertype']=='student'){
    header("location:login.php");
}

$conn = new mysqli("localhost", "root", "", "t.school");

$sql="SELECT * FROM user";

$result=mysqli_query($conn,$sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student data</title>
    <link rel="stylesheet" href="admin.css">
     <!-- bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .table_th{
            padding:20px;
            font-size:20px;
            border:1px solid grey;
        }
        .table_td{
           padding:20px;
           border:1px solid grey;


        }
    </style>
    </head>
<body>
   <?php
   
   include 'admin_sidebar.php';
      
   ?>

   <div class="content" style="width:8%;">
    <h1>Student Data</h1>
     <?php
   if($_SESSION['message']){
    echo $_SESSION['message'];
   }
   unset($_SESSION['message']);

?>

     <table >
        <tr>
            <th class="table_th">Username  </th> 
            <th class="table_th">Email   </th>
            <th class="table_th">Phone   </th>
            <th class="table_th">Password</th>
            <th class="table_th">Delete</th>
            <th class="table_th">Update</th>


            

             
        </tr>
        <?php
    while ($info=$result->fetch_assoc()){

   
?>
  <tr >
    <td class="table_td">
    <?php  echo "{$info['username']}";
       ?></td>
    <td class="table_td">
    <?php  echo "{$info['email']}";
       ?></td>
    <td class="table_td">
    <?php  echo "{$info['phone']}";
       ?></td>
        <td class="table_td">
    <?php  echo "{$info['pasword']}";
       ?></td>
        <td class="table_td">
    <?php  echo "<a class='btn btn-danger' onClick=\" javascript:return confirm('Are you sure to delete this'); \" href='delete.php?student_id={$info['id']}'>Delete</a>";
       ?></td>
         <td class="table_td">
    <?php  echo "<a class='btn btn-primary'  href='update.php?student_id={$info['id']}'>update</a>";
       ?></td>
       
  

  </tr>
  <?php
    }
  ?>
     </table>
   </div>

    
</body>
</html>