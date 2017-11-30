
 <!DOCTYPE html>
<html lang="fr">

    <head>

        <meta charset="utf-8">
        <title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Connexion à mon application">
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
        <!-- ci-dessous notre fichier CSS -->
        <link rel="stylesheet" type="text/css" href="/css/app.css" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:400,700,300" />
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


        <link rel="stylesheet" type="text/css" href="assets/css/styleIndex.css" />
        <script type="text/javascript" src="assets/js/indexCnx.js"></script>


    </head>
    <body>

    <div class="container" >
        <div class="form-container flip" >


            <form action="index.php" name="login" role="form"   class="login-form" method="post"  accept-charset="utf-8" style=" height: 260px;">
                <label style="color: #FFFFFF; margin-left: 160px;font-size: 22px;margin-top: 30px;">Admin</label>
                <div class="form-group" id="username" style="margin-left: 90px;">
                    <input class="form-input" tooltip-class="username-tooltip" placeholder="Username" id="email" name="login" style="height: 25px; margin-top: 10px;" required/>
                    <span id="username-tool"class="tooltip username-tooltip">What's your username?</span>
                </div>


                <div class="form-group" id="password" style="margin-left: 90px;">
                    <input type="password" class="form-input"  name="mdp" tooltip-class="password-tooltip" placeholder="Password" required style="height: 25px;"/>
                    <span class="tooltip password-tooltip">What's your password?</span>
                </div>


                <div class="form-group" style="margin-left: 120px;">
                    <button type="submit" onclick="clickListener();"class="login-button">Connexion</button>

                </div>



            </form>

        </div>
        </div>






    <?php

    include("includes/classes.php");
 // connexion
  include("includes/connexionBase.php");
   $a=new ConnexionBase();
   $a->getConnexionBase();
    $courant=$_SERVER["PHP_SELF"];
    session_start();

    if (isset($_POST['login']) && isset($_POST['mdp']))
   {
	   $login=$_POST['login'];
	   $mdp=$_POST['mdp'];
	$res=admin::rechercheAdmin($a->getConnexionBase(),$login,$mdp);
	if($res==1)
	{ $resAd=admin::lectureAdmin($a->getConnexionBase(),$login,$mdp);

        $_SESSION['con']='true';
		 $_SESSION['login']=$resAd->login;
		 $_SESSION['mdp']=$resAd->mdp;
		 $_SESSION['nom']=$resAd->nom;
		 $_SESSION['prenom']=$resAd->prenom;
		   header("location:interfaceAdmin.php");

	}
	else{
        $_SESSION['con']='false';
	}


   }
?>




    </body>
</html>
