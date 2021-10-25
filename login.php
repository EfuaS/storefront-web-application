<?php

// process information from signup page

// mysql error reporting check
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

/* establish db connection to insert data */
include ('connectdb.php');

/* check if signup button is clicked */

if(isset($_POST['signup']))
{	 
    /*post form details*/

	 $full_name = $_POST['name'];
	 $bus_name = $_POST['bname'];
	 $tel = $_POST['tel'];
     $email = $_POST['email'];
     $btax = $_POST['btax'];
     $breg = $_POST['breg'];
     $digadd = $_POST['digadd'];
     $p1 = $_POST['psswd1'];
     $p1_hash = password_hash($p1,PASSWORD_ARGON2ID);
     $p2 = $_POST['psswd2'];

    //check if email already exists
    $emailquery="SELECT user_id FROM usertable WHERE email='".$email."' ";  

    $res=$conn->query($emailquery);

    if (mysqli_num_rows($res) > 0) {
      echo '<script> alert ("Email already exists. Why dont you log in rather?")</script>';
  }else{

/* insert data from sign up form to database */

     $sql = "INSERT INTO usertable (full_name, telephone, email, business_name, tax_number,registration_number, digital_address, password_first)
	 VALUES ('$full_name','$tel','$email','$bus_name','$btax','$breg','$digadd','$p1_hash')";


/*check if successful*/
        if ($conn->query( $sql))
        {
            echo   "New record created successfully !";
        }
        else
        {
        echo "Error: " . $sql . " " . mysqli_error($conn);

    
        }
    }
}

?>  


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@200&family=Merriweather:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style_login.css">
    <script src="./js/validate_login.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <title>StoreFront - log in</title>
 

</head>

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                  <!-- Image next to form -->
                    <div class="signin-image">
                        <figure><img src="images/login.png" alt="sing up image"></figure>
                        <a href="index.html" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Log In Credentials</h2>
                        <form method="POST" class="register-form" id="login-form" action = "login.php">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="log_email" id="log_email" placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <label for="psswd"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="log_psswd" id="log_psswd" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="logbtn" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>


<?php

// if log in button is clicked ...
if(isset($_POST["logbtn"]))  
 {  
      if(empty($_POST["log_email"]) || empty($_POST["log_psswd"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($conn, $_POST["log_email"]);  
           $password = mysqli_real_escape_string($conn, $_POST["log_psswd"]);  
           $query = "SELECT * FROM usertable WHERE email = '$username'";  
           $result = mysqli_query($conn, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
            $row = mysqli_fetch_array($result);
                     if(password_verify($password, $row["password_first"]))  
                     {  
                          //return true;  
                          $_SESSION["email"] = $username;  
                          header("location:homepage.php");  
                     }  
                     else  
                     {  
                          //return false;
                          echo $row["password_first"];
                          echo '<script>alert("Wrong User Details")</script>';  
                     }  
                  
           }  
           else  
           {  
                echo '<script>alert("Wrong User Details")</script>';  
           }  
      }  
 }  
?>

<!---JQuery Plugins -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="plugins/jquery-validation-1.19.2/dist/jquery.validate.min.js"></script>

</body>  
</html>


