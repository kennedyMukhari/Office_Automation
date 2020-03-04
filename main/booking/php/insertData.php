

<?php 
session_start();

include("./validation.php");
require_once("../../../engine/connection.php");
if(!isset($_SESSION["email"])){
    header("location: ../../../login.html");
}

if(isset($_SESSION["employeeID"]) && isset($_SESSION["f_name"]) && isset($_SESSION["l_name"])){

    $empid = $_SESSION['employeeID'];
    $name = $_SESSION['f_name'];
    $surname = $_SESSION['l_name'];
}



$room=$_REQUEST["room"];
$date=$_REQUEST["dateofbirth"];
$starttime=$_REQUEST["starttime"];
$endtime=$_REQUEST["endtime"];



  
#searches for user and password in the database
// $query = ("SELECT * FROM OATBookings WHERE booking_date = '$date' AND start_time='$starttime' And end_time='$endtime'");
 $query = ("SELECT * FROM OATBookings WHERE booking_date = '$date'  And end_time>'$starttime'");




$result = sqlsrv_query($conn, $query);  //$conn is your connection in 'connection.php'
$today = date("m-d-Y");
$time=date('H:i:s');
if(sqlsrv_has_rows($result) != 1){
 

     //die( print_r( sqlsrv_errors(), true));
     $tsql="INSERT INTO OATBookings(booking_date,start_time,end_time,room_number,employeeID)
VALUES('$date','$starttime','$endtime','$room','$empid')";

/* Execute the query. */    

$stmt = sqlsrv_query( $conn, $tsql);    
    header("location:../Booking.php?ed=2");
  
}else{

    header("location:../Booking.php?check=1");
}

   
sqlsrv_free_stmt( $stmt);  
sqlsrv_close($conn);

?>