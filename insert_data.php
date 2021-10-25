<?php
// file works with salesinfo add function

/* establish db connection to insert data */
    include_once ("connectdb.php");
    $success  = "";

/* check if add button is clicked */
    if(isset($_POST['add']))
    {  
/*post form details*/
        $User_Id = $_POST['user_id'];
        $products  = $_POST['products'];
        $total = $_POST['total'];
        $cashin   = $_POST['cashin'];
        $balance = '';

// calculate balance
        function getBalance (){
            
            $GLOBALS['balance'] = $GLOBALS['total'] + $GLOBALS['cashin'];
        }

        getBalance();


/* insert data from add form to database */
        $sql = "INSERT INTO saletable (products,total_price,cash_in,balance,user_id)
        VALUES ('$products','$total','$cashin','$balance','$User_Id')";
/*check if successful*/
        if (mysqli_query($conn, $sql))
        {
            $success    =   "New record created successfully !";
        }
        else
        {
        echo "Error: " . $sql . " " . mysqli_error($conn);
        }
/*end connection */
    }
?>     
