
<?php
include("classes.php");
// connexion
include("connexionBase.php");
$a=new ConnexionBase();

$courant=$_SERVER["PHP_SELF"];


function add(){
global $a;
	$nom=$_POST['nom'];
	$matricule=$_POST['matricule'];
	$cin=$_POST['cin'];
	$prenom=$_POST['prenom'];
	$classe=$_POST['classe'];
	$email=$_POST['email'];

	$msg="";

	if(empty($nom))
	{$msg.="Le nom doit etre remplir </br>";}
	if(empty($matricule))
	{$msg.="Le matricule doit etre remplir </br>";}
	if(empty($cin))
	{$msg.="Le cin doit etre remplir </br>";}
	if(empty($prenom))
	{$msg.="Le prenom doit etre remplir </br>";}
	if(empty($classe))
	{$msg.="Le classe doit etre remplir </br>";}
	if(empty($email))
	{$msg.="L' email doit etre remplir </br>";}

	if($msg!=""){
		echo $msg;

	}
	else{

		$res=candidat::ajoutCandidat($a->getConnexionBase(), $nom , $email , $prenom , $cin , $matricule , $classe);

		echo $res ;
	}

}


function delete(){
	global $a;
	$msg='';
	$id=$_POST['id'];

	if(isset($id)) {
		$resCandidatExiste = candidat::rechercheCandidatParId($a->getConnexionBase(), $id);
		if ($resCandidatExiste == 0) {
			$msg .= "Candidat n'existe plus ! </br>";
		}

	}
	if($msg!=""){
		echo $msg;

	}
	else{ $res=candidat::deleteCandidat($a->getConnexionBase(),$id);
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
		$resCandidatExiste = candidat::rechercheCandidatParId($a->getConnexionBase(), $id);
		if ($resCandidatExiste == 0) {
			$msg .= "Candidat n'existe plus ! </br>";
		}

	}

	$nom=$_POST['nom'];
	$matricule=$_POST['matricule'];
	$cin=$_POST['cin'];
	$prenom=$_POST['prenom'];
	$classe=$_POST['classe'];
	$email=$_POST['email'];

	if(empty($nom))
	{$msg.="Le nom doit etre remplir </br>";}
	if(empty($matricule))
	{$msg.="Le matricule doit etre remplir </br>";}
	if(empty($cin))
	{$msg.="Le cin doit etre remplir </br>";}
	if(empty($prenom))
	{$msg.="Le prenom doit etre remplir </br>";}
	if(empty($classe))
	{$msg.="Le classe doit etre remplir </br>";}
	if(empty($email))
	{$msg.="L' email doit etre remplir </br>";}

	if($msg!=""){
		echo $msg;

	}
	else{ $res=candidat::editCandidat($a->getConnexionBase(),$id, $nom , $email , $prenom , $cin , $matricule , $classe);
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