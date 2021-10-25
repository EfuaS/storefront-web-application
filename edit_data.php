<?php
// file works with salesinfo edit icon functionionality

//mysql error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

/* establish db connection  */
    include_once ("connectdb.php");

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
    <!--- CSS --->
    <link rel="stylesheet" href="./css/style_edit.css">
    </head>
    
    
    <body>

	<!-- Edit Sale Modal HTML -->
	<div id="editSaleModal">
		<div class="modal-dialog">
			<div class="modal-content">
			<form action = "edit_data.php" method= "POST">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Sales</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                        <!--- retrieve id of specified sale record from URL --->
					<input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>">
					<div class="modal-body">					
						<div class="form-group">
							<label>Products Bought</label>
							<input type="text" name='product'  class="form-control" required>
						</div>
						<div class="form-group">
							<label>Total Price</label>
							<input type="number" name='price'  class="form-control" required>
						</div>
						<div class="form-group">
							<label>Cash In</label>
							<input type="number" name='cash'  class="form-control" required</textarea>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" name="update" id="update" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
<?php

// if save button is clicked ...
    if (isset($_POST['update'])) {
        // retrieve form details and save sale id
        $id = $_POST['id'];
        $products = $_POST['product'];
        $total = $_POST['price'];
        $cash = $_POST['cash'];


        // update specified sale record with form details
        $res = $conn->query( "UPDATE saletable SET products ='$products', total_price='$total' ,cash_in='$cash' WHERE sales_id=$id");
        if (!$res) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }
        // redirect to sales table page
        header('location: salesinfo.php');
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
</body>
</html>             