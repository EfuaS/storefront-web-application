<?php
// file works with admin edit icon functionality


// mysql error reporting check
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

/* establish db connection to insert data */
    include_once ("connectdb.php");
    $success  = "";
?>


<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sales Information</title>
    	<!-- External Resources -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    	<!-- CSS -->

    <link rel="stylesheet" href="./css/style_adminedit.css">
    </head>
    
    
    <body>

	<!-- Edit Modal HTML -->
	<div id="editSaleModal">
		<div class="modal-dialog design">
			<div class="modal-content">
			<form action = "admin_edit.php" method= "POST">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Users</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">	
                    <div class="form-group">
                            	<!-- Get user id from URL -->

                            <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>">
						</div>

					<!-- Form Details-->

                    <div class="form-group">
							<label>Full Name</label>
							<input type="text" class="form-control" name="fname"  required>
						</div>
						<div class="form-group">
							<label>Telephone</label>
							<input type="tel" class="form-control" name="tel"  required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
							<label>Business Name</label>
							<input type="text" class="form-control" name="bname"  required>
                        </div>
                        <div class="form-group">
							<label>Business Tax Number</label>
							<input type="number" class="form-control" name="btax"  required>
                        </div>
                        <div class="form-group">
							<label>Business Registration Number</label>
							<input type="number" class="form-control" name="breg"  required>
                        </div>
                        <div class="form-group">
							<label>Digital Address</label>
							<input type="text" class="form-control" name="dig-add"  required>
                        </div>
					</div>
					<div class="modal-footer">
						<a href="admin.php" ><input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"></a>
						<input type="submit" class="btn btn-info" name="update" id="update" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
<?php
// check  if save button is clicked
    if (isset($_POST['update'])) {
/*post form details*/
    $id = $_POST['id'];
    $name = $_POST['fname'];
    $tel  = $_POST['tel'];
    $email = $_POST['email'];
    $bname   = $_POST['bname'];
    $btax  = $_POST['btax'];
    $breg   = $_POST['breg'];
    $digadd   = $_POST['dig-add'];

    // update query
        $res = $conn->query( "UPDATE usertable SET full_name ='$name', telephone='$tel' ,email='$email',business_name='$bname', tax_number = '$btax', registration_number = '$breg', digital_address = '$digadd'  WHERE user_id=$id");
        
        // check if query worked
        if (!$res) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }
        // redirect to main admin page
        header('location: admin.php');

        // execute query
        if (mysqli_query($conn, $res))
        {
            $success    =   "New record updated successfully !";
        }
        else
        {
        echo "Error: " . $res . " " . mysqli_error($conn);
        }
        
    }
?>  

// timeout for message 
<script>
        $(document).ready(function()
        {
            setTimeout(function()
            {
                $('#message').hide();
            },3000);
        });
    </script>

<script src="./js/admin.js"></script>

</body>
</html>             