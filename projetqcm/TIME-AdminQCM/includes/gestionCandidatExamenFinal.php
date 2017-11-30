
<?php
include("classes.php");
// connexion
include("connexionBase.php");
$a=new ConnexionBase();

$courant=$_SERVER["PHP_SELF"];


function add(){
global $a;

	$matricule=$_POST['matricule'];
	$cin=$_POST['cin'];
	$login=$_POST['login'];
	$mdp=$_POST['mdp'];
	$mdpRes=$_POST['mdpRes'];

	$msg="";


	if(empty($matricule))
	{$msg.="Le matricule doit etre remplir </br>";}
	if(empty($cin))
	{$msg.="Le cin doit etre remplir </br>";}
	if(empty($login))
	{$msg.="Le login doit etre remplir </br>";}
	if(empty($mdp))
	{$msg.="Le mdp doit etre remplir </br>";}
	if(empty($mdpRes))
	{$msg.="Le mdp de responsable doit etre remplir </br>";}

	if($msg!=""){
		echo $msg;

	}
	else{

		$res=candidatureExamenFinal::ajoutCandidatExamenFinal($a->getConnexionBase(), $login , $mdp ,   $cin , $matricule , $mdpRes);

		echo $res ;
	}

}


function delete(){
	global $a;
	$msg='';
	$id=$_POST['id'];

	if(isset($id)) {
		$resCandidatExiste = candidatureExamenFinal::rechercheCandidatParIdExamenFinal($a->getConnexionBase(), $id);
		if ($resCandidatExiste == 0) {
			$msg .= "Candidat n'existe plus ! </br>";
		}

	}
	if($msg!=""){
		echo $msg;

	}
	else{ $res=candidatureExamenFinal::deleteCandidatExamenFinal($a->getConnexionBase(),$id);
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
		$resCandidatExiste = candidatureExamenFinal::rechercheCandidatParIdExamenFinal($a->getConnexionBase(), $id);
		if ($resCandidatExiste == 0) {
			$msg .= "Candidat n'existe plus ! </br>";
		}

	}

	$matricule=$_POST['matricule'];
	$cin=$_POST['cin'];
	$login=$_POST['login'];
	$mdp=$_POST['mdp'];
	$mdpRes=$_POST['mdpRes'];

	if(empty($matricule))
	{$msg.="Le matricule doit etre remplir </br>";}
	if(empty($cin))
	{$msg.="Le cin doit etre remplir </br>";}
	if(empty($login))
	{$msg.="Le login doit etre remplir </br>";}
	if(empty($mdp))
	{$msg.="Le mots de passe doit etre remplir </br>";}
	if(empty($mdpRes))
	{$msg.="Login de responsable doit etre remplir </br>";}

	if($msg!=""){
		echo $msg;

	}
	else{

		$res=candidatureExamenFinal::editCandidatExamenFinal($a->getConnexionBase(),$id, $matricule , $cin , $login , $mdp , $mdpRes );
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