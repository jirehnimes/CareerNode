<?php
    require("php/database.php");
    include('php/session.php');
    include('php/homestudentphp.php');
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

    <link rel="stylesheet" type="text/css" href="css/homestudentlayout.css">
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

    <script>var status = '<?php echo $status; ?>'</script>
    <script src="js/homestudent.js"></script>
    <script src="js/help.js"></script>

    <!-- Google Maps -->

    <script 
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyK0a58Tzko3TwI9g7cm7u8aFP8mxFtkI&sensor=false">
    </script>
    <script src="js/map.js"></script>

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
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="modalbtn" data-toggle="modal" data-target="#helpModal">Help</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contactus">Contact</a>
                    </li>
                    <li class="dropdown">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#" >School Reports
                          <span class="caret"></span></a>
                          <ul class="dropdown-menu" style="background-color:#4E3838">
                            <li><a href="licensure.php" >School Passing Rate</a></li>
                            <li><a href="graduates.php"  >Program Graduates</a></li>
                            <li><a href="tution_analytics.php" >School Tution Fee</a></li> 
                          </ul>
                        </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="modalbtn" data-toggle="modal" data-target="#loginModal"><?php echo $fullname; ?></a>
                    </li>
                    <li>
                        <a href="php/logout.php" name="logout">Logout</a>
                    </li>
                    <li>
                        <img id="profpic" src="images/logoicon.png" />
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h1>
                        Hello <br> <?php echo $fullname; ?>!
                    </h1>
                    <p>
                        You don't have a university yet. Find one!
                    </p>
                    <button type="button" class="btn btn-success btn-lg" id="find">FIND NOW!</button>
                </div>
            </div>
        </div>
    </section>
    <section id="studentnav">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8" id="mapcontainer">
                    <div>
                        <form class="form-inline" role="form">
                            <div class="form-group">
                                <label for="sel1">Select Program:</label>
                                <select class="form-control" id="sel1">
                                    <option>Computer Engineering</option>
                                    <option>Civil Engineering</option>
                                    <option>Nursing</option>
                                    <option>Policeman</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sel1">Select Price Range:</label>
                                <select class="form-control" id="sel2">
                                    <option>1000-2000</option>
                                    <option>2000-3000</option>
                                    <option>3000-4000</option>
                                    <option>4000-5000</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div id="map"></div>
                </div>
                <div class="col-sm-4" id="navpane">
                    <div class="row">
                        <div class="col-sm-12" >
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">HOME</a></li>
                                <li><a data-toggle="tab" href="#top5">SCHOOLS</a></li>
                                <li><a data-toggle="tab" href="#searches">PROFILE</a></li>
                                <li><a data-toggle="tab" href="#nearest">NEAREST</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <h3>HOME</h3>
                                    <p>Browse to find the university you want.</p>
                                </div>
                                <div id="top5" class="tab-pane fade">
                                    <h3>SCHOOLS</h3>
                                    <div id="top5div"></div>
                                    <script>
                                        (function refreshNews()
                                        {
                                            $("#top5div").load("php/ajaxnearest.php", function(){setTimeout(refreshNews, 1000);});
                                        })(); 
                                    </script>
                                </div>
                                <div id="searches" class="tab-pane fade">
                                    <h3>SCHOOL PROFILE</h3>
                                    <p>Some content about the school.</p>
                                </div>
                                <div id="nearest" class="tab-pane fade">
                                    <h3>NEAREST SCHOOL</h3>
                                    <div id="nearestdiv"></div>
                                    <script>
                                        (function refreshNews()
                                        {
                                            $("#nearestdiv").load("php/ajaxschools.php", function(){setTimeout(refreshNews, 1000);});
                                        })(); 
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
</body>
</html>