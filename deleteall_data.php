<?php
// file works with salesinfo add function
/* establish db connection to insert data */
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
    
    <link rel="stylesheet" href="./css/style_salesinfo.css">
    
    
    </head>
    
    
    <body>
    
    <!-- Delete Modal HTML -->
	<div id="deleteSaleModal" >
		<div class="modal-dialog">
			<div class="modal-content">
				<form action=deleteall_data.php method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Delete Sale</h4>
					</div>
					<div class="form-group">
							<label>User ID</label>
							<input type="number" class="form-control" name="userid" id='userid' placeholder="What is your ID?" required>
						</div>

					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
					<a href='salesinfo.php'>	<input type="button"  class="btn btn-default" data-dismiss="modal" value="Cancel"></a>
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

/*retrieve user id from form*/
$User_Id = mysqli_real_escape_string($conn,$_POST['userid']);

/* if user data is available delete all records for the specific user */
if ($User_Id != ""){

        $delsql = "delete from saletable where user_id = '$User_Id'";
        $delres = $conn->query($delsql);
        header('Location: salesinfo.php');

    } else {
        echo '<script> alert(No User ID entered);</script>';
    }
    }

?> 
</body>

</html> 


