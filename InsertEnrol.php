<?php
$serverName = "filesrv.hages.co.za\HU1";   
$uid = "sa";     
$pwd = "Hages12345!";    
$databaseName = "OAT";   

$connectionInfo = array( "UID"=>$uid,                              
                         "PWD"=>$pwd,                              
                         "Database"=>$databaseName); 

/* Connect using SQL Server Authentication. */    
$conn = sqlsrv_connect( $serverName, $connectionInfo); 

    $name = $_REQUEST['name'];
    $Lname = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];
    $dob = $_POST['dob'];
    $gender = $_REQUEST['gender'];
    $role = $_REQUEST['position'];
    $manager = $_REQUEST['manager'];
    $pass = $_REQUEST['passcode'];
    //$pic = $_REQUEST['image'];
    $cell = $_REQUEST['cellphone'];
//     $image = $_FILES['image']['tmp_name'];
//     $pic = file_get_contents($image);

    //Password_hash() capacity is beyond 60 characters,
    //setting the column size to 255 might be a good choice.

    $options = array("cost"=>4);
    $passHashed = password_hash($pass,PASSWORD_BCRYPT,$options);
    //$passHashed = password_hash($pass,PASSWORD_DEFAULT);

if (isset($_POST['submit'])) { // if save button on the form is clicked
    // name of the uploaded file
    $image = $_FILES['image']['name'];

    // destination of the file on the server
   
    // get the file extension
    $extension = pathinfo($image, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['image']['tmp_name'];
    $size = $_FILES['image']['size'];
   $target = "src/img/icons/" .basename($_FILES['image']['name']);
    //$destination = 'imge/'.basename($image);
    $tsql = "insert into Employees (f_name, l_name, email, DOB, passcode, gender, job_type, employer_name,cell_number,imagees) 
    values ('$name','$Lname','$email','$dob', '$pass', '$gender', '$role', '$manager', '$cell','$image')";

    //Execute the query. 
    $stmt = sqlsrv_query( $conn, $tsql);

    if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
        echo "You file extension must be jpg jpeg png";
    } elseif ($_FILES['myfile']['size'] > 8000000) { // file shouldn't be larger than 8Megabyte
        echo "File too large!";
    } else 
          {
        // move the uploaded (temporary) file to the specified destination

        if (move_uploaded_file($file,$target)) {

             
                echo "Submission successful.";
            }     
            else     
            {    
                 echo "Submission unsuccessful.";
                 die( print_r( sqlsrv_errors(), true));  
                   
            }         
    }

}
    
        $output=$something;
        echo $output;
    /* Free statement and connection resources. */    
    sqlsrv_free_stmt( $stmt);    
    sqlsrv_close( $conn);
?>       