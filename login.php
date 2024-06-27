<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <link rel="stylesheet" href="style.css">
</head>
<body background="images/institute.jpeg" style=" background-size:cover;">
    <center>
        <div class=" bg-dark" style="width:400px; padding-top:70px; padding-bottom:70px;margin-top:10%;" >
        <h2 class="text-light">Login form</h2>   
           <h4>
            <?php
            error_reporting(0);
            session_start();
            session_destroy();
           echo $_SESSION['loginMessage'];
           
           
           ?>
           </h4>

        <form action="login_check.php" method ="POST" >
                <div class="">
                    <label class=""   style="   display: inline-block;color: skyblue;width: 100px;text-align: right;padding-top: 10px;padding-bottom: 10px;">Username</label>
                    <input type="text" name="username">
                </div>
                <div>
                    <label class=""style="  display: inline-block; color: skyblue; width: 100px; text-align: right; padding-top: 10px; padding-bottom: 10px;">Password</label>
                    <input type="pasword" name="pasword">
                </div>
                <div>
                   
                    <input class="btn btn-primary" type="submit" name="submit" value="Login">
                </div>
            </form>
        </div>
    </center>
</body>
</html>