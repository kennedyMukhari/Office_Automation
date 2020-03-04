
<?php
session_start();
require_once("../../engine/connection.php");


if(isset($_SESSION["email"]) && isset($_SESSION["f_name"]) && isset($_SESSION["l_name"])){
    $empid = $_SESSION['employeeID'];
    $mail = $_SESSION['email'];
    $name = $_SESSION['f_name'];
    $surname = $_SESSION['l_name'];
}
$Leaveid=$_REQUEST["leaveId"];

    $todaysDate= date("Y/m/d");
    $approved="Approved";

    $tsql="UPDATE OATLeaves SET employer_name='$name',approval_date='$todaysDate',approval='$approved' WHERE leave_id='$Leaveid'";  

//Execute the query.    

$stmt = sqlsrv_query($conn, $tsql);    

if ( $stmt )    
    {    
        $pproved= "Information Updated.";
         include 'login.php';
    }     
    else     
    {    
        $pproved = "Update failed.";
         die( print_r( sqlsrv_errors(), true));  
           
    }  
?>
