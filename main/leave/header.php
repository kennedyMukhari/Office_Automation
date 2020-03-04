
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/src/css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="/src/css/Custom.css">
        <script src="/src/js/bootstrap/bootstrap.min.js"></script>
        <script src="/src/js/Calender.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    </head>

    <body class="container contain">
        <header>
            <!--Menu Navigation bar-->
            <div class="fixed-top">
                <nav class="navbar navbar-expand-md navbar-dark mb-3" style="background:black; border-radius: 20px;">
                    <div class="container-fluid">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                        <h6 class="text-white"></h6>
      
                        <?php echo"<td><a class='nav-link text-white'  style='text-decoration: none;' href ='../profile/profile.php?employeeid=$empid' target='_blank'><i class='fas fa-user-secret'></i>&nbsp;<strong>&nbsp;&nbsp; $name $surname</strong></a>" ?>
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <div class="navbar-nav ml-auto">
                                <ul class="navbar-nav text-center">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/welcome.php" target="_blank" style=" color: white; padding-right:20px;"><i class="fas fa-home"></i>&nbsp;&nbsp;Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/main/users/list.php" target="_blank"><i class=" fas fa-users"></i>&nbsp;&nbsp;Users</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/main/portal/custom.html" target="_blank"><i class="fas fa-network-wired"></i>&nbsp;&nbsp;Network Portal</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/main/booking/Booking.php" target="_blank"><i class=" fas fa-book"></i>&nbsp;&nbsp;Booking</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/main/leave/" target="_blank"><i class="fas fa-plane-departure"></i>&nbsp;&nbsp;Leave Request</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/main/signature/PrintSignature.php" target="_blank"><i class="fas fa-signature"></i>&nbsp;&nbsp;Print Signature</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/main/blog/blog.php" target="_blank"><i class=" fas fa-blog"></i>&nbsp;&nbsp;New Post</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/main/contact/ContactsUs.php" target="_blank"><i class="fas fa-id-card"></i>&nbsp;&nbsp;Contact Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" target="_blank"><i class=" fas fa-info"></i>&nbsp;&nbsp;About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/logout.php" target="_blank" style="color: white;"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Sign out&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
    </body>

    </html>