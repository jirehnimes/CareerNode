<?php
    include('php/login.php'); // Includes Login Script

    if(isset($_SESSION['login_user'])){
        header("location: homestudent.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!--Author: CodeRED Group-->

    <title>careernode | connect to your dreams</title>

    <!--Bootstrap and JQuery Online-->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!--Bootstrap Core CSS-->

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <!--Logo-->

    <link rel="shortcut icon" type="image/x-icon" href="images/logoicon.png" />

    <!--CSS-->

    <link rel="stylesheet" type="text/css" href="css/indexlayout.css">
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom Fonts -->

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- jQuery -->

    <script src="js/jquery-1.11.3.js"></script>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/jquery-migrate-1.2.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->

    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->

    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Slick CSS -->

    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>

    <!-- Slick JavaScript -->

    <script type="text/javascript" src="slick/slick.min.js"></script>

    <!-- Custom Theme JavaScript -->

    <script src="js/index.js"></script>
    <script src="js/help.js"></script>

</head>
<body id="page-top">
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                style="margin: 5px; padding: 5px;">
                    <span class="sr-only">Toggle navigation</span>
                    <img src="images/logoicon.png" style="height: 30px;" />
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <span>
                        <img class="namelogo" src="images/logoname.png" />
                    </span>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="modalbtn" data-toggle="modal" data-target="#helpModal">About</a>
                    </li>
                    <li>
                        <a class="modalbtn" data-toggle="modal" data-target="#helpModal">Help</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contactus">Contact</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="modalbtn" data-toggle="modal" data-target="#loginModal">Login</a>
                    </li>
                    <li>
                        <a class="modalbtn" data-toggle="modal" data-target="#signupModal">Signup</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 slidercontainer">
                    <center>
                        <div class="slider">
                            <div class="slidercontent">
                                <p>
                                    We will help you to get the best<br>
                                    university, college, institution<br>
                                    that fits your needs.
                                </p>
                            </div>
                            <div class="slidercontent">
                                <p>
                                    asdadas
                                </p>
                            </div>
                            <div class="slidercontent">
                                <p>
                                    Achieve your dream company according to your 
                                    profession.
                                </p>
                            </div>
                        </div>
            </div>
                    </center>
                </div>
        </div>
    </header>
    <section id="user">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <div class="userbox col-sm-4">
                        <h2>STUDENT</h2>
                        <img src="images/student1.jpg" />
                        <p>
                            Find a school where your abilities
                            are compatible in order for them to be 
                            enhanced. Be part of the community 
                            where companies can hire you after you graduate. 
                        </p>
                        <button type="button" class="btn btn-success">SIGN UP</button>
                    </div>
                    <div class="userbox col-sm-4">
                        <h2>SCHOOL</h2>
                        <img src="images/university.jpg" />
                        <p>
                            Monitor the students enrolled in your school
                            using this application. Update and maintain
                            your current information. 
                            <br><br>
                        </p>
                        <button type="button" class="btn btn-success">SIGN UP</button>
                    </div>
                    <div class="userbox col-sm-4">
                        <h2>COMPANY</h2>
                        <img src="images/company.jpg" />
                        <p>
                            Be part of the community where we can recommend
                            students into your company based on their skills
                            and knowledge.
                            <br><br>
                        </p>
                        <button type="button" class="btn btn-success">SIGN UP</button>
                    </div>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    careernode | connect to your dreams <br>
                    Copyright &copy; 2015 
                </div>
            </div>
        </div>
    </footer>
    <div class="modal fade" id="loginModal" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">LOGIN</h4>
                </div>
                <form role="form" action="" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd" name="pwd">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox"> Remember me</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default" name="login">Login</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#signupModal">Signup</button>
                        <button type="reset" class="btn btn-default">Clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="signupModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">SIGNUP</h4>
                </div>
                <form action="php/signup.php" method="post" class="form" role="form">
                    <div class="modal-body"> 
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <input class="form-control" name="firstname" placeholder="First Name" type="text"
                                    required autofocus />
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <input class="form-control" name="lastname" placeholder="Last Name" type="text" required />
                            </div>
                        </div>
                        <input class="form-control" name="signupemail" placeholder="Email" type="email" />
                        <input class="form-control" name="signuppassword" placeholder="Password" type="password" />
                        <input class="form-control" name="reenterpassword" placeholder="Re-enter Password" type="password" />
                        <label for="">Gender</label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="inlineCheckbox1" value="Male" />
                            Male
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="inlineCheckbox2" value="Female" />
                            Female
                        </label><br />
                        <label for="">Birth Date</label>
                        <div class="row">
                            <div class="col-xs-4 col-md-4">
                                <select class="form-control" name="months" id="months">
                                </select>
                            </div>
                            <div class="col-xs-4 col-md-4">
                                <select class="form-control" name="days" id="days">
                                </select>
                            </div>
                            <div class="col-xs-4 col-md-4">
                                <select class="form-control" name="years" id="years">
                                </select>
                            </div>
                        </div>
                        <input class="form-control" name="address" placeholder="Address" type="text" />
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default" name="signup">Submit</button>
                        <button type="reset" class="btn btn-default">Clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>