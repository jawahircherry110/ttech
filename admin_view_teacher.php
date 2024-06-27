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

$sql="SELECT * FROM teacher";

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
           background-color:skyblue;


        }
        .square-image {
       width: 200px;
       height: 200px;
       object-fit: cover; /* Ensures the image covers the area while maintaining aspect ratio */
   }
    </style>
    </head>
<body>
   <?php
   
   include 'admin_sidebar.php';
      
   ?>

   <div class="content" >
   
    <h1> view all teacher Data</h1>
       <table border="1px">
        <tr>
            <th class="table_th">Teacher Name</th>
            <th class="table_th">About Teacher</th>

            <th class="table_th">Teacher Img</th>

        </tr>
        <?php
         while($info=$result->fetch_assoc()){

        
        ?>
        <tr>
            <td class="table_td">
           <?php echo "{$info['name']}";
            ?>
            </td>
            <td class="table_td">
            <?php echo "{$info['description']}";
            ?>
            </td>

            <td class="table_td">
              <img class="rounded-circle" width="100" height="100" src=" <?php echo "{$info['image']}";
            ?>" alt="" srcset="">
            </td>

        </tr>
        <?php
         }
        ?>

       </table>
      
      
   </div>

    
</body>
</html>