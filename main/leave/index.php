<!DOCTYPE PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link href="pageicon.png" type="image/png" rel="icon"></link>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Leave Form</title>

    <script src="../../src/js/leaveValidate.js"></script>


    <!-- <style>
    
            body{
            
                background-image:url("../img/bg.jpg");
            }
        
        label{margin-top: 10px;}
            </style> -->


</head>
<script>
    function foo() {
        alert("submit button clicked")
        return true;
    }
</script>

<!--<div class="header"style="background-color:black;height:50px;margin-bottom:12px">-->
<?php include("../../header.php") ?>

<body class="container">
<div class="container pt-2">
        <div style="margin-top: 55px;">
            <div class="text-white" style="border-radius: 20px; background: linear-gradient(rgba(0, 0, 0, 0.799), rgba(0, 0, 0, 0.799));">
                <div style="margin-top: auto;">
                    <h1 class="title text-center"><strong>Apply for leave</strong></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-2 pt-2">
                <nav class="navbar" style="background:linear-gradient(rgba(0, 0, 0, 0.799), rgba(0, 0, 0, 0.799)); border-radius: 20px;">
                    <div class="navbar-nav" id="navb">
                        <ul class="navbar-nav text-white text-center">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="./index.php" target="_blank">&nbsp;&nbsp;Apply for leave</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="./php/LeaveStatus.php" target="_blank">&nbsp;&nbsp;Check status</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="col-md-8 pt-2" id="form1">
                <form class="container blog" name="myForm" action="./php/display.php" enctype="multipart/form-data" onsubmit="return validateForm()" method="POST">
                    <table>
                        <hr>
                        <tr>
                            <th> <label style="border-tEndDateop:2px;">Type of leave</label></th>
                            <td style="height:150px">
                                <input type="radio" name="leaveType" style="width:20px;margin-bottom:30px" value="Anual Leave">Annual Leave
                                <input type="radio" name="leaveType" style="width:20px;margin-left:80px;" value="sick leave"> Certified Sick Leave <br>
                                <input type="radio" name="leaveType" style="width:20px;margin-bottom:30px" value="Uncertified sick leave" />Uncertified Sick Leave
                                <input type="radio" name="leaveType" style="width:20px;margin-left:30px;" value="family Resposebility" />Family Resposebility Leave<br>
                                <input type="radio" name="leaveType" style="width:20px" value="Unpaid Leave" />Unpaid Leave
                                <input type="radio" name="leaveType" style="width:20px;margin-left:80px;" value="Unpaid Maternity leave" />Unpaid Maternity Leave<br>
                            </td>
                        </tr>
                        <!--jsjsjsiji-->
                        <tr>
                            <th><label>Start Date</label></th>

                            <td class="enter pl-3">
                                <input class="form-control input" type="date" name="StartDate" id="StartDate">
                                
                            </td>
                        </tr>
                        <tr>
                            <th><label>End Date</label></th>
                            <td class="enter pl-3">
                                    <input class="form-control input" type="date" name="EndDate" id="EndDate">
                               
                            </td>
                        </tr>

                        <tr>
                            <th><label>Number of days:</label></th>
                            <td class="enter pl-3">
                                    <input class="form-group input" type="text" name="NumberOfDaysWorked">
                            </td>

                        </tr>

                        <tr>
                            <th><label>Comment</label></th>
                            <td>
                                    <textarea class="form-control" style="background:transparent; border: 1px solid"  row="3" cols="30" name="comment" placeholder="Enter your comment"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th><label>Attach proff</label>
                                <th>
                                    <div class="form-group"><input type="file" name="myfile" accept="pdf"></div>
                        </tr>
                    </table>
                    <input class="btn btn-primary" type="submit" name="submit" id="lButton">

                </form>

                <hr>

            </div>

        </div>
    </div>
    <?php 
        include("../bot/leave.php")
    ?>   
    <?php include 'php/footer.php';?>
</body>

</html>


Enter your comment