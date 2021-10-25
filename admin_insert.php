<?php
// file works with admin insert functionnality

/* establish db connection to insert data */
    include_once ("connectdb.php");
    $success  = "";

/* check if add user button is clicked */
    if(isset($_POST['add']))
    {  
/*post form details*/
        $name = $_POST['fname'];
        $tel  = $_POST['tel'];
        $email = $_POST['email'];
        $bname   = $_POST['bname'];
        $btax  = $_POST['btax'];
        $breg   = $_POST['breg'];
        $digadd   = $_POST['dig-add'];




/* insert data from add form to database */
        $sql = "INSERT INTO usertable (full_name,telephone,email,business_name,tax_number,registration_number,digital_address)
        VALUES ('$name','$tel','$email','$bname','$btax','$breg','$digadd')";
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
