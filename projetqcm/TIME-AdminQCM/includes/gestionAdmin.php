

<?php
include("classes.php");
// connexion
include("connexionBase.php");
$a=new ConnexionBase();

$courant=$_SERVER["PHP_SELF"];


function add(){
global $a;
	$login=$_POST['login'];
	$mdp=$_POST['mdp'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$msg="";

	if(empty($login))
	{$msg.="Le login doit etre remplir </br>";}
	if(empty($mdp))
	{$msg.="Le mdp doit etre remplir </br>";}
	if(empty($nom))
	{$msg.="Le nom doit etre remplir </br>";}
	if(empty($prenom))
	{$msg.="Le prénom doit etre remplir </br>";}



	if($msg!=""){
		echo $msg;

	}
	else{

		$res=admin::ajoutAdmin($a->getConnexionBase(), $login, $mdp , $nom , $prenom );

		echo $res ;
	}

}


function delete(){
	global $a;
	$msg='';
	$id=$_POST['id'];

	if(isset($id)) {
		$resCandidatExiste = admin::rechercheAdminParId($a->getConnexionBase(), $id);
		if ($resCandidatExiste == 0) {
			$msg .= "Admin n'existe plus ! </br>";
		}

	}
	if($msg!=""){
		echo $msg;

	}
	else{ $res=admin::deleteAdmin($a->getConnexionBase(),$id);
		if($res==1){
			echo 1;
		}
		else {
			echo "Le candidat n'est pas supprimer.";
		}
	}

}




function edit(){
	global $a;
	$msg="";
	$id=$_POST['id'];

	if(isset($id)) {
		$resCandidatExiste = admin::rechercheAdminParId($a->getConnexionBase(), $id);
		if ($resCandidatExiste == 0) {
			$msg .= "admin n'existe plus ! </br>";
		}

	}

	$login=$_POST['login'];
	$mdp=$_POST['mdp'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];

	if(empty($login))
	{$msg.="Le login doit etre remplir </br>";}
	if(empty($mdp))
	{$msg.="Le mdp doit etre remplir </br>";}
	if(empty($nom))
	{$msg.="Le nom doit etre remplir </br>";}
	if(empty($prenom))
	{$msg.="Le prenom doit etre remplir </br>";}


	if($msg!=""){
		echo $msg;

	}
	else{ $res=admin::editAdmin($a->getConnexionBase(),$id, $login, $mdp , $nom , $prenom  );
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