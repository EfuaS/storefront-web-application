<?php
// Include config file
require_once "connectdb.php";
 
// Define variables and initialize with empty values
$fname     = $bname     = $tel     = $email     = $btax     = $breg     = $digadd = "";
$fname_err = $bname_err = $tel_err = $email_err = $btax_err = $breg_err = $digadd =  "";

// Processing form data when form is submitted
if(isset($_POST["user_d"]) && !empty($_POST["user_id"]))
{
    // Get hidden input value
    $id = $_POST["user_id"];
    
    // Validate name
    $input_fname = trim($_POST["fname"]);
    if(empty($input_fname))
    {
        $fname_err = "Please enter a name.";
    }
    elseif(!filter_var($input_fname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))))
    {
        $fname_err = "Please enter a valid name.";
    }
    else
    {
        $fname = $input_fname;
    }

    // Validate bname
    $input_bname = trim($_POST["bname"]);
    if(empty($input_bname))
    {
        $bname_err = "Please enter your Business name.";
    }
    elseif(!($input_bname))
    {
        $bname_err = "Please enter a valid business name.";
    }
    else
    {
        $business_name = $input_bname;
    }

    // Validate office
    $input_tel = trim($_POST["tel"]);
    if(empty($input_tel))
    {
        $office_err = "Please enter a telephone.";
    }
    elseif(!($input_tel))
    {
        $tel_err = "Please enter a valid telephone.";
    }
    else
    {
        $tel = $input_tel;
    }

    // Validate age
    $input_email = trim($_POST["email"]);
    if(empty($input_email))
    {
        $email_err = "Please enter the email.";     
    } 
    elseif(!($input_email))
    {
        $email_err = "Please enter a email.";
    }
    else
    {
        $email = $input_email;
    }

    // Validate date
    $input_btax = trim($_POST["btax"]);
    if(empty($input_btax))
    {
        $btax_err = "Please enter a tax number.";     
    } 
    elseif(!($input_btax))
    {
        $btax_err = "Please enter a tax number.";
    }
    else
    {
        $btax = $input_btax;
    }
    
    // Validate registration number
    $input_breg = trim($_POST["breg"]);
    if(empty($input_breg))
    {
        $breg_err = "Please enter the Business Registration Number.";     
    } 
    elseif(!ctype_digit($input_breg))
    {
        $breg_err = "Please enter a Business Registration Number.";
    }
    else
    {
        $breg = $input_breg;
    }

        // Validate digital address
        $input_digadd = trim($_POST["dig_add"]);
        if(empty($input_digadd))
        {
            $digadd_err = "Please enter a Digital Address.";     
        } 
        elseif(!ctype_digit($input_breg))
        {
            $digadd_err = "Please enter a Digital Address.";
        }
        else
        {
            $digadd = $input_digadd;
        }
    
    // Check input errors before inserting in database
    if(empty($fname_err) && empty($tel_err) && empty($email_err) && empty($bname_err) && empty($btax_err) && empty($breg_err) &&empty($digadd_err))
    {
        // insert statement
        $sql = "INSERT INTO usertable (full_name, telephone, email, business_name, tax_number,registration_number, digital_address) VALUES (?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($connection, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $fullname,$tel,$email,$bname,$btax,$breg,$digadd);
            
            // Set parameters
            $fullname = $fullname;
            $tel  = $tel;
            $email = $email;
            $bname = $bname;
            $btax = $btax;
            $breg = $breg;
            $digadd = $digadd;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: admin.php");
                exit();
            }
            else
            {
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
else
{
    // Check existence of id parameter before processing further
    if(isset($_GET["user_id"]) && !empty(trim($_GET["user_id"])))
    {
        // Get URL parameter
        $id =  trim($_GET["user_id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM usertable WHERE id = ?";
        if($stmt = mysqli_prepare($conn, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1)
                {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name       = $row["full_name"];
                    $tele   = $row["tel"];
                    $email     = $row["email"];
                    $bname        = $row["business_name"];
                    $btax = $row["tax_number"];
                    $breg     = $row["registration_number"];
                    $digadd = $row["digital_Address"];

                }
                else
                {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
            }
            else
            {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($conn);
    }
    else
    {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
   <!-- add style css -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="container">
        <div class="signup-form">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add user record to the database.</p>
                    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?= (!empty($fullname_err)) ? 'has-error' : ''; ?>">
                            <label>Full Name</label>
                            <input type="text" name="fname" class="form-control" value="<?= $fname; ?>">
                            <span class="help-block"><?= $fname_err;?></span>
                        </div>
                        <div class="form-group <?= (!empty($tel_err)) ? 'has-error' : ''; ?>">
                            <label>Telephone</label>
                            <input type="tel" name="tel" class="form-control" value="<?= $tel; ?>">
                            <span class="help-block"><?= $tel_err;?></span>
                        </div>
                        <div class="form-group <?= (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?= $email; ?>">
                            <span class="help-block"><?= $email_err;?></span>
                        </div>
                        <div class="form-group <?= (!empty($bname_err)) ? 'has-error' : ''; ?>">
                            <label>Business Name</label>
                            <input type="text" name="bname" class="form-control" value="<?= $bname; ?>">
                            <span class="help-block"><?= $bname_err;?></span>
                        </div>
                        <div class="form-group<?= (!empty($btax_err)) ? 'has-error' : ''; ?>">
                            <label>Business Tax Number</label>
                            <input type="text" name="btax" class="form-control" value="<?= $btax; ?>">
                            <span class="help-block"><?= $btax_err;?></span>
                        </div>
                        <div class="form-group <?= (!empty($btax_err)) ? 'has-error' : ''; ?>">
                            <label>Business Registration Number</label>
                            <input type="text" name="breg" class="form-control" value="<?= $btax; ?>">
                            <span class="help-block"><?= $btax_err;?></span>
                        </div>
                        <div class="form-group <?= (!empty($digadd_err)) ? 'has-error' : ''; ?>">
                            <label>Digital Address</label>
                            <input type="text" name="digadd" class="form-control" value="<?= $digadd; ?>">
                            <span class="help-block"><?= $digadd_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="admin.php" class="btn btn-default" style="color:red;">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>