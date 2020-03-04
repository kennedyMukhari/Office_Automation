<?php
session_start();

if(isset($_SESSION["employeeID"]) && isset($_SESSION["email"]) && isset($_SESSION["f_name"]) && isset($_SESSION["l_name"])){
    $empid = $_SESSION['employeeID'];
    $mail = $_SESSION['email'];
    $name = $_SESSION['f_name'];
    $surname = $_SESSION['l_name'];
}

require_once("../../engine/connection.php");


$Leaveid=$_REQUEST["leaveId"];



    $todaysData= date("Y-m-d");
    $approved="Declined";



    $tsql="UPDATE OATLeaves SET employer_name='$name',approval_date='$todaysData',approval='$approved' WHERE leave_id='$Leaveid'";  

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
         die(print_r(sqlsrv_errors(), true));  
           
    }  
?>