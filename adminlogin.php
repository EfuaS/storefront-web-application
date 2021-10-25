<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- External Resources -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style_adminlogin.css">
    <script src="./js/validate_adminlogin.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <title>StoreFront - log in</title>


</head>
<body>

<div class="login-page">
  <div class="form">
    <h3 class=' lead'> Admin Login</h3>
    <form class="login-form" action = "adminlogin.php" method = 'POST' >
    <form action= "admin.php" method= "POST" id="adminlogin-form">
      <input type="text" name="adminlog_email" placeholder="username"/>
      <input type="password" name="adminlog_psswd" placeholder="password"/>
      <button type="submit" name = "adminlogbtn" id = "adminlogbtn">login</button>
    </form>
    </form>
  </div>
</div>


<!---JQuery Plugins -->
<script src="plugins/jquery-validation-1.19.2/dist/jquery.validate.min.js"></script>

<?php

// connect to db
include ("connectdb.php");

// if log in button is clicked
if(isset($_POST['adminlogbtn'])){

// retrieve log in form details
    $admin = mysqli_real_escape_string($conn,$_POST['adminlog_email']);
    $psswd = mysqli_real_escape_string($conn,$_POST['adminlog_psswd']);

// if log in details not empty ...
    if ($admin != "" && $psswd != ""){

// retrieve from database where log in credentials match
        $sqlquery = "select count(*) as cntUser from admin where username='".$admin."' and password='".$psswd."'";
        $result = $conn->query($sqlquery);
        if (!$result) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }

// if user is in system then login  and start session
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];
        if($count > 0){
            $_SESSION['username'] = $admin;
            header('Location: admin.php');
        }else{
            echo '<script>"Invalid username and password"</script>';
        }

    }

}
?>

</body>  
</html>