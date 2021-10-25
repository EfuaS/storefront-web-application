
<?php

//start session
session_start();
/* create a connection with database. (OOB method)*/

    $servername =   'localhost';
    $username   =   'root';
    $password   =   '';
    $dbname     =   "storefrontdb";
    $conn = new mysqli($servername,$username,$password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
      ?>