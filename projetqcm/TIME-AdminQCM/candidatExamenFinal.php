<?php
session_start();
if($_SESSION['con'] != 'true')
    echo "<script type='text/javascript'>window.location='index.php';</script>";

$_SESSION['newTry'] = 1;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TIME université</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    
 
 

   
      
  
      
   
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
font-size: 16px;">  Dernier accès : <?php echo date("d-m-Y H:i:s");   ?> &nbsp; <a  href="includes/deconnexion.php"s class="btn btn-danger square-btn-adjust">Déconnexion</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                <li>
                   <a class="active-menu"  href="interfaceAdmin.php"><i class="fa fa-dashboard fa-3x"></i>Tableau de bord</a>
                    </li>
                    <li>
                        <a href="candidat.php"><i class="fa fa-briefcase fa-3x" aria-hidden="true"></i> Etudiants</a>
                    </li>
                    <li>
                        <a href="candidatExamenFinal.php"><i class="fa fa-plus-circle fa-3x"></i> Candidats</a>
                    </li>
                     <li>
                        <a  href="admin.php"><i class="fa fa-users fa-3x"></i>Admin</a>
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
                                <a href="resultatExamenFinal.php">Résultat examen Final</a>
                            </li>
                            
                        </ul>
                      </li>  
                  <li>
                        <a  href="includes/deconnexion.php"><i class="fa fa-sign-out fa-3x"></i>Déconnexion</a>
                    </li>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 style="display:inline-block; position:relative;"><b>Les Candidats enregistrés</b></h4>
                            
                            <a id="addCandidat" href="javascript:void(0);" style="float:right; display:inline-block;position:relative;margin-top:15px;" class="btn btn-primary btn-xs "><i class="fa fa-plus"></i> Ajouter Candidat</a>

                        </div>
                        <br/>
                        <div hidden  class="alert alert-danger" id="emsg" style="display:none; ">
                            <span id="emsgbody">Sélectionnez un contact<br> Un élément doit être sélectionné au minimum <br> </span>
                        </div>
       <?php
	   include("includes/datatableCandidatExamenFinal.php");
	   ?>
    
                    </div>
                    <!--  end  Context Classes  -->
                </div>
            </div>
                <!-- /. ROW  -->
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
             
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
  
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/bootbox.min.js"></script>
<script>
    $('#emsg').hide();
</script>
</body>
</html>
