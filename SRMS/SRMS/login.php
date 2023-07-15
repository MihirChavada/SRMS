<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="normalize.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body style="background-color:#2B3467">
<div class="title">
<a href="index.html" style="color: white"><span class="fa fa-home fa-2x">Home</span></a>

</div>



    <section class="gradient-custom">
<div class="login container py-5 h-100">
  <div class="row justify-content-center align-items-center h-100">
    <div class="col-12 col-lg-9 col-xl-7">
      <div class="card shadow-2-strong card-registration" style="border-radius: 15px; background-color:#EAFDFC">
        <div class="card-body p-4 p-md-5">
          <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Login Form</h3>
          <form method="post" action="">



            <div class="row">
              <div class="col mb-4 d-flex align-items-center">

                <div class="form-outline datepicker w-100">
                  <input  type="text" class="form-control form-control-lg" id="birthdayDate" name="unms" />
                  <label for="birthdayDate" class="form-label">Enter username</label>
                </div>

              </div>


            </div>

            <div class="row">

              <div class="col-sm-12 mb-4 pb-2">

                <div class="form-outline">
                  <input type="password" id="password" class="form-control form-control-lg" name="pwds"/>
                  <label class="form-label" for="password">Enter your password</label>
                </div>

              </div>


            </div>



            <div class="mt-4 pt-2 ">
              <input class="btn btn-primary btn-lg " type="submit" name="submit" value="Submit" />
            </div>
            

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</body>
</html>
<?php
    include("init.php");
    session_start();

    if (isset($_POST["unms"],$_POST["pwds"]))
    {
        $username=$_POST["unms"];
        $password=$_POST["pwds"];
        $sql = "SELECT userid FROM admin_login WHERE userid='$username' and password = '$password'";
        $result=mysqli_query($conn,$sql);

        $count=mysqli_num_rows($result);

        if($count==1) {
            session_start();
            $_SESSION['login_user']=$username;
            $_SESSION['logged_in']=true;
            header("Location: dashboard.php");
        }else {
            echo '<script language="javascript">';
            echo 'alert("Invalid Username or Password")';
            echo '</script>';
        }

    }
?>
