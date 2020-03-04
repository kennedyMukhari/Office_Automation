<?php
include 'php/Connection.php';
session_start();

if(!isset($_SESSION["email"])){
    header("location: ../../../index.php");
}

if(isset($_SESSION["employeeID"]) && isset($_SESSION["email"]) && isset($_SESSION["f_name"]) && isset($_SESSION["l_name"])){
    $empid = $_SESSION['employeeID'];
    $mail = $_SESSION['email'];
    $name = $_SESSION['f_name'];
    $surname = $_SESSION['l_name'];
}

 $todaysDate=date("Y/m/d");
 $leaveType = $_POST['leaveType'];
 $StartDate = $_POST['StartDate'];
 $EndDate = $_POST['EndDate'];

 $Date1= strtotime($StartDate);
 $Date2 = strtotime($EndDate);
 $diff= $Date1-$Date2;
$totalDay =  floor($diff/(60*60*24));
$days_have=5;
$days_left=$days_have+($totalDay);
//attachment




$tsql = "SELECT * FROM OATLeaves where employeeID= $empid ";

//$stmt = sqlsrv_query( $conn, $tsql);    
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$stmt = sqlsrv_query( $conn, $tsql , $params, $options );
 
?>