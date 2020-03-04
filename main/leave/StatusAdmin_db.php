<?php
//include 'php/Connection.php';
require_once("../../engine/connection.php");

if(isset($_SESSION["employeeID"]) && isset($_SESSION["email"]) && isset($_SESSION["f_name"]) && isset($_SESSION["l_name"])){
    $empid = $_SESSION['employeeID'];
    $mail = $_SESSION['email'];
    $name = $_SESSION['f_name'];
    $surname = $_SESSION['l_name'];
}
 $EmployeeID=$_POST['EmployeeID'];

$tsql = " SELECT * FROM OATLeaves Where employeeID=$EmployeeID";

//$stmt = sqlsrv_query( $conn, $tsql);    
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$stmt = sqlsrv_query( $conn, $tsql , $params, $options );

?>