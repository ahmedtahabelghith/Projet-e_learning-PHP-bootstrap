<?php
session_start();
if($_SESSION['con'] != 'true')
    echo "<script type='text/javascript'>window.location='index.php';</script>";

$_SESSION['newTry'] = 1;
?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>TIME université</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet"/>
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet"/>
        <!-- MORRIS CHART STYLES-->
        <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet"/>
        <!-- CUSTOM STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet"/>
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>


        <!---- slides ---->

        <link rel="stylesheet" href="assets/cssSlides/slideshow.css">
        <style>
            .slideshow {
                float: left;
                margin: 50px;
            }
        </style>

        <!---------------->
    </head>
    <body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Administrateur</a>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Dernier accès <?php echo date("d-m-Y H:i:s"); ?> &nbsp; <a href="includes/deconnexion.php"
                                                                              class="btn btn-danger square-btn-adjust">Déconnexion</a>
            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" style="height: 90.4%;" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive"/>
                    </li>


                    <li>
                        <a class="active-menu" href="interfaceAdmin.php"><i class="fa fa-dashboard fa-3x"></i>Tableau de
                            bord</a>
                    </li>
                    <li>
                        <a href="candidat.php"><i class="fa fa-briefcase fa-3x" aria-hidden="true"></i> Etudiants</a>
                    </li>
                    <li>
                        <a href="candidatExamenFinal.php"><i class="fa fa-plus-circle fa-3x"></i> Candidats</a>
                    </li>
                    <li>
                        <a href="admin.php"><i class="fa fa-users fa-3x"></i>Admin</a>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-edit fa-3x"></i> QCM<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="categorie.php">Catégories</a>
                            </li>
                            <li>
                                <a href="question.php">Questions examen blanc</a>
                            </li>
                            <li>
                                <a href="questionExamenFinal.php">Questions examen Final</a>
                            </li>

                            <li>
                                <a href="resultatExamenFinal.php">Résultats examen final</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="includes/deconnexion.php"><i class="fa fa-sign-out fa-3x"></i>Déconnexion</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->

        <div id="kenburns" class="slideshow" style="margin-left: 260px; margin-top: 0;  ">
            <img src="assets/imagesSlides/a.jpg" alt="1">


            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/jsSlides/mootools.js"></script>
    <script src="assets/jsSlides/mootools.js"></script>
    <script src="assets/jsSlides/slideshow.js"></script>
    <script src="assets/jsSlides/slideshow.flash.js"></script>
    <script src="assets/jsSlides/slideshow.fold.js"></script>
    <script src="assets/jsSlides/slideshow.kenburns.js"></script>
    <script src="assets/jsSlides/slideshow.push.js"></script>
    <script>
        window.addEvent('domready', function () {
            var data = {
                'a.jpg': {caption: 'TIME'},
                'b.jpg': {caption: 'TIME'},
                'c.jpg': {caption: 'TIME'},
                'd.jpg': {caption: 'TIME'}
            };
            new Slideshow.KenBurns('kenburns', data, {
                duration: 1800,
                hu: 'assets/imagesSlides/',
                width: 1089,
                height: 616
            });
        });
    </script>

    </body>
    </html>