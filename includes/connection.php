<?php

// $website="https://gcct.donatecrp.in/";
$servername="localhost";
$username="root";
$password="";
$dbname="logic_crud";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
    die("connection failed:".mysqli_connect_error());
}
// else{
//     echo "success";
// }

?>