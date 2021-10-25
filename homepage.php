<?php
// establish db connections
include "connectdb.php";

// Check whether user  is logged in already
if(!isset($_SESSION['email'])){
    header('Location: login.php');
}
// save email session variable to variable
$uname = $_SESSION['email'];

// select user from database if email presented is in database
$query = "SELECT user_id FROM usertable WHERE email='".$uname."' ";  
$result = $conn->query($query); 
if (!$result) {
  printf("Error: %s\n", mysqli_error($conn));
  exit();
}
$data = mysqli_fetch_assoc($result);

//end connection
$conn->close(); 

// logout from session on click of logout button
if(isset($_POST['but_logout'])){
    session_destroy();

    // redirect to login page
    header('Location: login.php');
}
?>
<!doctype html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style_homepage.css">
    <title>StoreFront</title>



  </head>
  <header>
    <!--? Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky sticky-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1">
                        <div>
                            <a href="#" class="navbar-brand">
                                <img class="d-none d-md-block logo" src="./images/fav-logo.PNG" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                                                  <!-- Main-menu -->
                        <div class="menu-main d-flex align-items-center justify-content-end">
                                                      <!-- Display User Id of User in header -->
                            <div class='h3 mx-auto'><?php echo 'Your ID is: '.$data["user_id"]; ?></div>
                            <div class=" f-right  d-lg-block ml-30 ">
                                                          <!-- Check if still logged in -->
                            <?php  if (isset($_SESSION['email'])) : ?> 
                                                          <!-- Display logged in username -->
                           <p class="lead"> Logged In as:  <strong> <?php echo $_SESSION['email']; ?> </strong> </p>
                            </div>
                            <?php endif ?>
                            <!-- Logout Button -->
                            <div class=" f-right  d-lg-block ml-30 ">
                                <a href="login.php"> <input type="submit" name="but_logout" class="btn header-btn" value="Logout"></a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>  
<body>


<!-- Design of welcome jumbotron -->

<div class="jumbotron jumbotron-color">
  <div class="container text-center text-lg-left">
    
    <div class="row ">
      <div class="col-lg-5 ">
          <h1 class="display-4">Welcome
            to your <span class="highlight-word">Storefront Overview Page!</span></h1>
  <p class="lead">Here, you can find every sale that you entered, accounted and displayed for easy analysis.</p>
        <span class="text-center d-inline-block">
        </span>
        
      </div>
                                  <!-- Image on homepage -->
      <div class="col-lg-7 align-items-center d-flex">
        <img src="images/analysis-people.jpg" alt="" class="img-fluid img-size">
      </div>
    </div>

 
    </div>
</div>
        <div class="jumbotron text-center ">
        <span class="display-4">Find Below Your Sales Information...</span>
        <br><br><span class="text-center d-inline-block">
<!-- button to sales info table -->
          <a class="btn btn-primary btn-lg w-100" href="salesinfo.php" role="button">My Sales Info</a>
        </span>
        </div>

<!-- short descriptions of storefront -->

        <div class="container values-sec">
          <div class="row ">
            <div class="col-md v1 values-ele">
              <i class="fas fa-shield-alt values-icon"></i> 
              <span> 
                  Analytics  
              </span>
              <br>
               Storefront is built to allow smooth business oversight for retailers.
            </div>

              <div class="col-md v1 values-ele">
                  <i class="fas fa-heart values-icon"></i>
                  <span> 
                     Retail
                  </span>
                  <br>
                  Storefront combines the power of an enterprise level retai; angine for retialers in Africa.
              </div>

              <div class="col-md v1 values-ele">
                  <i class="fas fa-people-arrows values-icon"></i>
                  <span> 
                      Accounting
                  </span>
                  <br>
                     Storefront is an accounting solution which enables retailers to have access to book-keeping and ﬁnancial records.
              </div>
          </div>
      </div>
                            <!-- Motivational Message -->
        <div class="jumbotron text-center ">
        <h1 class="h1">Take Control with <span class="text-success">" The New Smart "</span></h1>
        </div>

        
</body>
</html>