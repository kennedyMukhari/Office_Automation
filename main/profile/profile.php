<?php 
        $serverName = "filesrv.hages.co.za\HU1";   
        $uid = "sa";     
        $pwd = "Hages12345!";    
        $databaseName = "OAT";

        $connectionInfo = array( "UID"=>$uid,                              
        "PWD"=>$pwd,                              
        "Database"=>$databaseName); 

        $conn = sqlsrv_connect( $serverName, $connectionInfo);
        $emp=$_REQUEST["employeeid"];


        // if ($conn){
        //     // echo "Connection Successful";
        // }
        // else{
        //     echo "Failed to connect to database!";
        //     die (print_r(sqlsrv_errors(),true));
        // }
        $tsql = "select * from Employees where employeeID = $emp";

        // $params = array();
        // $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
        // $stmt = sqlsrv_query( $conn, $tsql , $params, $options );

        // if($stmt == false){
        //     die (print_r(sqlsrv_errors(),true));
        // }

        $stmt = sqlsrv_query( $conn, $tsql );

        session_start();

        if(!isset($_SESSION["email"])){
            header("location: ../../login.php");
        }
        
        if(isset($_SESSION["employeeID"]) && isset($_SESSION["email"]) && isset($_SESSION["f_name"]) && isset($_SESSION["l_name"])){
            $empid = $_SESSION['employeeID'];
            $mail = $_SESSION['email'];
            $name = $_SESSION['f_name'];
            $surname = $_SESSION['l_name'];
        }

    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <!-- <link rel="stylesheet" href="../../src/css/profile.css">  -->
    <link rel="stylesheet" href="../../src/css/Custom.css">
    <link rel="stylesheet" href="../../src/css/bootstrap/bootstrap.min.css">
</head>

<?php include("../../header.php") ?>

<body class="container mb-2">
    <!--Heading-->
    <div class="container pt-2">
        <div style="margin-top: 55px;">
            <div class="text-white" style="border-radius: 20px; background: linear-gradient(rgba(0, 0, 0, 0.799), rgba(0, 0, 0, 0.799));">
                <div style="margin-top: auto;">
                    <h1 class="title text-center"><strong>Profile of <?php $name ?>&nbsp;&nbsp;<?php $surname?></strong></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-2">
        <div class="inputs" style="height:100%;">
            <div class="row">
                <div class="col-md-6">
                    <div class="container">
                        <?php while($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
                            { 
                            $emp=$row['employeeID']; 
                            $image = $row['imagees'];
                            ?>
                        <div class="container mt-4 mb-4">
                            <h1><strong>
                                <?php echo $row['f_name']; ?>
                                <?php echo $row['l_name']; ?>
                            </strong></h1>
                            <br>
                            <h4 class="h4">Date Of Birth:
                                <?php echo date_format($row['DOB'],'Y-m-d'); ?>
                            </h4>
                            <h4 class="h4">Email:
                                <a href="" class="email">
                                    <?php echo $row['email']; ?>
                                </a>
                            </h4>
                            <h4 class="h4">Gender:
                                <?php echo $row['gender']; ?>
                            </h4>
                            <h4 class="h4">Role:
                                <?php echo $row['job_type']; ?>
                            </h4>

                            <div class="buttons">
                                <!-- <input type="submit" value="Approve" class="accept"> -->
                                <!-- <input type="submit" onclick="location.href='profile.php';" value="Disapprove" class="decline"> -->
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="container">
                        <div class="contianer mt-3 mb-3">
                            <!-- <img class="img smaller-image" src="../../src/img/david-beckham-lede.jpg" alt="no-photo"> -->
                            <img class="img smaller-image" src='<?php echo '../../src/img/icons/'.$row['imagees'];?>'>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("../../footer.php") ?>
</body>



</html>