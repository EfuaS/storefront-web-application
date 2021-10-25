
<?php 
// conect to database
	include ('connectdb.php');

// include insert data file to enable user insert record functionality
	include ('insert_data.php');

// Check user login or not
if(!isset($_SESSION['email'])){

	// redirect to login page
    header('Location: login.php');
}
$uname = $_SESSION['email'];

// query to select id of logged in user
$query = "SELECT user_id FROM usertable WHERE email='".$uname."' ";  

// execute query
$result = $conn->query($query); 
if (!$result) {
  printf("Error: %s\n", mysqli_error($conn));
  exit();
}
$data = mysqli_fetch_assoc($result);
$u_id = $data["user_id"];

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: login.php');
}

// select information of logged in user
$result1 = $conn->query(
"SELECT usertable.email,saletable.sales_id,saletable.products,saletable.total_price,saletable.cash_in,saletable.balance,saletable.date_time
FROM usertable ,saletable
WHERE  usertable.user_id =saletable.user_id AND usertable.email = '".$uname."' ");
if (!$result1) {
	printf("Error: %s\n", mysqli_error($conn));
	exit();
  }

  $result2 =$conn->query("SELECT SUM(total_price) AS value_sum FROM saletable WHERE user_id = '$u_id' "); 
  $r2 = mysqli_fetch_assoc($result2); 
  $sum = $r2['value_sum'];        


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
<div class='row mx-auto' style='  text-align: center;'>
<!--- display user's id -->
<div class='h1 col-md-11 '><?php echo 'Your ID is: '.$data["user_id"]; ?></div>
</div>
	<br>
	<h3 class="text-center text-success" id="message"><?php echo  $success; ?></h3>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2> <b>Sales Information</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addSaleModal" class="btn btn-success"  data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Sale</span></a>
						<a href="deleteall_data.php?" class="btn btn-danger" name= 'dele' data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
                </div>
			</div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						<!--- Table Column Names --->
						</th>
                        <th>Sales ID</th>
                        <th>Products Bought</th>
						<th>Total Price</th>
                        <th>Cash In</th>
						<th>Balance</th>
                        <th>Date Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
					<!--- display records as many as retrieved by query --->
				<?php
                while($row = mysqli_fetch_array($result1))
                {
                ?>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<!--- display each instance of the record --->
						<td><?php echo $row["sales_id"]; ?></td>
						<td><?php echo $row["products"]; ?></td>
						<td><?php echo $row["total_price"]; ?></td>
                        <td><?php echo $row["cash_in"]; ?></td>
                        <td><?php echo $row["balance"]; ?></td>
						<td><?php echo $row["date_time"]; ?></td>
						<td>
							<!--- send sales id to URL --->
							<a href="edit_data.php?edit=<?php echo $row['sales_id']; ?>" class="edit" name='edit' id='edit' data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="#deleteSaleModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					<?php 
                    } 
                ?>
    <?php
    
     // close connection database
     mysqli_close($conn);
                ?>
                </tbody>
			</table>
			<!--- page navigation --->
			<div class="clearfix">
                <div class="hint-text">Take note of your ID</div>
                <ul class="pagination">
				<h3>Total Profit: <?php echo $sum ?></h3>
                </ul>
			</div>
			<div >
			<a class="btn btn-primary btn-lg w-100 " href="homepage.php" role="button">Home</a>
				</div>
        </div>
	</div>
	
	<!-- Add Sale Modal HTML -->
	<div id="addSaleModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" action="salesinfo.php">
					<div class="modal-header">						
						<h4 class="modal-title">Add Sale</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>User ID</label>
							<input type="number" class="form-control" name="user_id" placeholder="What is your ID?" required>
						</div>

						<div class="form-group">
							<label>Product(s)</label>
							<input type="text" class="form-control" name="products" placeholder="What was bought?" required>
						</div>
						<div class="form-group">
							<label>Total Price</label>
							<input type="number" class="form-control" name="total" placeholder="0.00 ...." min="0" step="0.01" required>
						</div>
						<div class="form-group">
							<label>Cash In</label>
							<input type="number" class="form-control" name="cashin" placeholder="0.00 ...." min="0" step="0.01" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" name="add" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>

<!--- JQUERY --->
	<script>
        $(document).ready(function()
        {
            setTimeout(function()
            {
                $('#message').hide();
            },3000);
        });
    </script>

<!--- JS --->
<script src="./js/salesinfo.js"></script>

</body>
</html>                                		                            