<?php
// file works with admin delete user functionality

/* establish db connection*/
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="./css/style_admindelete.css">
    
    
    </head>
    
    
    <body class='lead'>

	<!-- Delete Modal HTML -->
	<div id="deleteSaleModal" >
		<div class="modal-dialog">
			<div class="modal-content">
				<form action= "admin_delete.php" method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Delete Sale</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                                                <!-- Warning Message -->

					<div class="modal-body">					
						<p>Are you sure you want to delete this Record?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" name="del" id='del' value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>

<?php
    /* check if delete button is clicked */
    if(isset($_POST['del']))
    {  
/*get user id from URL*/
$User_Id = $_POST['del'];

// check if user id is available
if ($User_Id != ""){
// sql to delete a record
        $delsql = "delete from usertable where user_id = '$User_Id'";
        $delres = $conn->query($delsql);

        // redirect to main admin page
        header('Location: admin.php');

        // check for errors
        if (!$delres) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }else{
            $success    =   "Record Deleted successfully !";

        }
    }else{
        echo "Error no deletion";
    }
}
    

?> 
                            <!-- timout for confirmation message -->

<script>
        $(document).ready(function()
        {
            setTimeout(function()
            {
                $('#message').hide();
            },3000);
        });
    </script>


                            <!-- JS -->

<script src="./js/admin.js"></script>

</body>

</html> 
