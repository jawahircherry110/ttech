<?php
  error_reporting(0);
  session_start();
  session_destroy();

  if($_SESSION['message']){
    $message=$_SESSION['message'];
    echo"<script type='text/javascript'>
    alert('$message');
    </script>";
  }

$conn = new mysqli("localhost", "root", "", "t.school");

$sql = "SELECT * FROM teacher ";
$result=mysqli_query($conn,$sql);

$sql2 = "SELECT * FROM course";
$result2=mysqli_query($conn,$sql2);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
     <!-- Fontawesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=
    =" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
       <div class="main " style="background-color: #FF597B; height: 100vh; color:black;">
       <nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand mx-5" href="#">T.School</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" style="margin-left:25%;" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active mx-5" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active mx-5" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active mx-5" href="#" tabindex="-1" aria-disabled="true">Admissions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-success active mx-5" href="login.php" tabindex="-1" aria-disabled="true">Login</a>
        </li>
      </ul>
     
    </div>
  </div>
</nav>

           <div class="container">
               <div class="row">
                   <div class="col md-6 sm-12">
                      <label class="heading1 " style="margin-top:25%;">We Teach To Students<br> With Cares</label>
                      </div>
                 <div class="col md-6 first_img">
                      <img src="images/cartoon5.png" alt="" srcset="">
                   </div>
              </div>
          </div>
      </div>
<!-- welcome section -->

  <div class="row p-5 my-5">
    <div class="col-lg-6 col-md-6 my-auto">
      <img src="images/skill.jpeg" alt="" width="95%">
    </div>

    <div class="col-lg-6 md-6 col-sm-6 my-auto">
      <i class="fa-solid fa-cloud-arrow-down p-2  "></i>
      <h1 class="heading ">welcome to T.School</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi rem
        inventore molestias amet
        voluptate provident quos dolorem minima nostrum ut
        voluptate provident quos dolorem minima nostrum ut.</p>
        <button type="button" class="btn btn- button text-light">Get Started</button> 

    </div>
  </div>

<!-- Teachers section -->
    <h1 class="text-center">Our Teachers</h1>
    <div class="container">
      
  <div class="row">
    <?php  while($info=$result->fetch_assoc()) {

    ?>
            <div class="col-lg-4 col-md-4 col-sm-12 my-auto pt-3">
              <div class="card mx-auto " style="width: 18rem;">

                <img src="<?php  echo "{$info['image']}"  ?>" class="card-img-top" alt="...">
                
                <div class="card-body">
                  <h2><?php echo "{$info['name']}" ?></h2>
                  <h6><?php echo "{$info['description']}" ?></h6>
                  </div>
              </div>
            </div>
            <?php  } ?>
    </div>







<!-- courses section -->
  <center>
    <h1>Our Courses</h1>
  </center>
  <div class="container">
      
      <div class="row">
        <?php  while($info=$result->fetch_assoc()) {
    
        ?>
                <div class="col-lg-4 col-md-4 col-sm-12 my-auto pt-3">
                  <div class="card mx-auto " style="width: 18rem;">
                    <img src="<?php  echo "{$info['image']}"  ?>" class="card-img-top" alt="...">                        
                    <div class="card-body">
                      <h2><?php echo "{$info['name']}" ?></h2>
                      <h6><?php echo "{$info['description']}" ?></h6>
                      </div>
                  </div>
                </div>
                <?php 
               } ?>
        </div>



          <div align="center" class="admission_form">
            <form action="data_check.php" method="POST">

              <div class="name">
              <label >Name</label>
             <input type="text required" name="name" id="">
              </div>
            <div class="name mt-3">
            <label >Email</label>
             <input type="text required" name="email" id="">
            </div>
             <div  class="name mt-3">
             <label  >Phone</label>
             <input type="number required" name="phone" id="">
             </div>
             <div  class=" mt-3">
             <label >Massage</label>
             <textarea class="text_area" name="message" ></textarea>
            
             </div>
             <input class="btn btn-primary mt-2" type="Submit" value="apply" id="submit" name="apply">
            </form>

          </div>





          <!-- footer -->
          <footer class="footer mt-5">
        <div class="footer-content">
            <p>&copy; 2024 T.techcompany. All rights reserved.</p>
            <ul class="footer-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <div class="social-media">
                <a href="#"><i class="fa-brands fa-facebook text-light"></i> facebook </a>
                <a href="#"><i class="fa-brands fa-twitter text-light"></i> Twitter</a>
                <a href="#"><i class="fa-brands fa-linkedin text-light"></i> linkedin</a>
            </div>
        </div>
    </footer>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>