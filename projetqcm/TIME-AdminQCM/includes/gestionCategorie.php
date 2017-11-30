
<?php
include("classes.php");
// connexion
include("connexionBase.php");
$a=new ConnexionBase();

$courant=$_SERVER["PHP_SELF"];


function add(){
global $a;
	$nom=$_POST['nom'];
	$nbrQ=$_POST['nbrQ'];

	$msg="";

	if(empty($nom))
	{$msg.="Le nom doit etre remplir </br>";}


	if($msg!=""){
		echo $msg;

	}
	else{

		$res=categorie::ajoutCategorie($a->getConnexionBase(), $nom,$nbrQ );

		echo $res ;
	}

}


function delete(){
	global $a;
	$msg='';
	$nom=$_POST['nom'];

	if(isset($nom)) {
		$resCandidatExiste = categorie::rechercheCategorieParId($a->getConnexionBase(), $nom);

		if ($resCandidatExiste == 0) {
			$msg .= "Categorie n'existe plus ! </br>";
		}

	}
	if($msg!=""){
		echo $msg;

	}
	else{ $res=categorie::deleteCategorie($a->getConnexionBase(),$nom);
		if($res==1){
			echo 1;
		}
		else {
			echo "Le catégorie n'est pas supprimer.";
		}
	}

}




function edit(){
	global $a;
	$msg="";
	$nomAncien=$_POST['nomAncien'];
	$nom=$_POST['nom'];

	$nbr=$_POST['nbr'];
	if(isset($nom)) {
		$resCandidatExiste = categorie::rechercheCategorieParId($a->getConnexionBase(), $nomAncien);
		if ($resCandidatExiste == 0) {
			$msg .= "Catégorie n'existe plus ! </br>";
		}

	}



	if(empty($nom))
	{$msg.="Le nom doit etre remplir </br>";}


	if($msg!=""){
		echo $msg;

	}
	else{ $res=categorie::editCategorie($a->getConnexionBase(), $nom , $nomAncien, $nbr );
		echo $res;
	}

}






$route=explode('/',$_GET['ng']);
$action=$route['0'];

switch($action){

	case "add":
	add();
		;break;
	case "delete":
	delete();
		break;
	case "edit":
		edit();
		break;
	default: echo "Action non définie"; break;

}


	 ?>