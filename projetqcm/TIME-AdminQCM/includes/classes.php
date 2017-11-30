
<?php
 
  
class admin{
					public $id;
					public $login;
					public $mdp;
					public $nom;
					public $prenom;
					public $dernierConsultation;

///////////////////////////////////////////////////////////////////////////////////////////////////////////
 static function rechercheadmin( $cnx,$login , $mdp )
	{
		 	 
					if($cnx)
							{							
							$sql=$cnx->prepare("SELECT * FROM admin WHERE login=:login and mdp=:mdp ");
							$sql->bindParam(':login' , $login);							
							$sql->bindParam(':mdp' , $mdp);
							$sql->execute();
								
							if($sql->rowCount()>0)
								{return 1;}
								else return 0;
							
							}
							
				
		 
	}



	static function lectureAdmin($cnx , $login,$mdp)
	{

		if($cnx)
		{	  $sql=$cnx->prepare("SELECT * FROM admin WHERE login=:login and mdp=mdp ");
			$sql->bindParam(':login' , $login);

			$sql->execute();


			if(  $sql->rowCount()>0)
			{
				$admin=$sql->fetch(PDO::FETCH_ASSOC) ;

				$res=new admin ;

				$res->login=$admin["login"];
				$res->password=$admin["mdp"];
				$res->nom=$admin["nom"];
				$res->prenom=$admin["prenom"];


				$sql->closeCursor();
				$cnx=null;
			}

		}

		return $res;
	}



	static function miseAJourCompte($cnx , $login,$mdp , $dernierConsultation)
	{
		if($cnx)
		{
			$sql=$cnx->prepare("UPDATE admin SET    dernierConsultation=:b  where login=:a and mdp=:c  ");

			$sql->bindParam(':a' , $login);
			$sql->bindParam(':b' , $dernierConsultation);
			$sql->bindParam(':c' , $mdp);



			$nblignes=$sql->execute();

			if($nblignes!=1)
			{	return 0 ;			}
			else	{
				return 1 ; }		}



	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////					
					
					

 







	static function listAdmin ($cnx){
		$result=array();
		if($cnx)
		{
			$sql=$cnx->prepare("SELECT    idAdmin,login,mdp,nom,prenom,dernierConsultation  FROM admin  ");
			$sql->execute();
			if(  $sql->rowCount()>0)
			{ $i=0 ;
				while($admin=$sql->fetch(PDO::FETCH_ASSOC) )
				{
					$ress= array(
							"idAdmin"=>$admin["idAdmin"],
							"login"=> $admin["login"],
							"mdp"=>$admin["mdp"],
							"nom"=>$admin["nom"],
							"prenom"=>$admin["prenom"],
							"dernierConsultation"=>$admin["dernierConsultation"],

					);
					$result[$i]=$ress;
					$i++;

				}
				$sql->closeCursor();
				$cnx=null;

			} }

		return $result;
	}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	static function ajoutAdmin($cnx , $login , $mdp , $nom , $prenom  )
	{
		if($cnx)
		{
			$sql=$cnx->prepare('insert into admin values ("" , :b , :c , :d , :e , "")');


			$sql->bindParam(':b' , $login);
			$sql->bindParam(':c' , $mdp);
			$sql->bindParam(':d' , $nom);
			$sql->bindParam(':e' , $prenom);
			try {
				$nblignes = $sql->execute();
				return $nblignes;
			}
			catch (Exception $e){
				return $e->getMessage();
			}

		}

		else{return 0 ;}

	}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	static function rechercheAdminParId( $cnx,$idAdmin )
	{

		if($cnx)
		{
			$sql=$cnx->prepare("SELECT * FROM admin WHERE idAdmin=:idAdmin  ");
			$sql->bindParam(':idAdmin' , $idAdmin);
			$sql->execute();

			if($sql->rowCount()>0)
			{return 1;}
			else return 0;

		}



	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	static function deleteAdmin( $cnx,$id )
	{

		if($cnx)
		{
			$sql=$cnx->prepare("delete FROM admin WHERE idAdmin=:id ");
			$sql->bindParam(':id' , $id);
			$sql->execute();

			if($sql->rowCount()>0)
			{return 1;}
			else return 0;

		}



	}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	static function editAdmin($cnx , $id , $login, $mdp , $nom , $prenom  )
	{
		if($cnx)
		{
			try {
				$nblignes=$cnx->exec("update  admin set  login='".$login."' , mdp='".$mdp."' , nom='".$nom."', prenom= '".$prenom."' where idAdmin=".$id );
				return $nblignes;
			}
			catch (Exception $e ){ return $e->getMessage().$e->getCode();}


		}

		else{return 0 ;}

	}



}



 
class candidat{
					public $id;
					public $cin;
					public $Nom;
					public $prenom;
					public $matricule;
					public $classe;
					public $Email;
					
					
				 
static function listCandidat ($cnx){
		$result=array();
		 if($cnx)
		{	 
		 $sql=$cnx->prepare("SELECT    id,nom,email,prenom,cin,matricule,classe FROM authentification  ");	  
						$sql->execute();
			if(  $sql->rowCount()>0)
			{ $i=0 ; 
					while($candidat=$sql->fetch(PDO::FETCH_ASSOC) )
					 {		  	 
						$ress= array(
								"id"=>$candidat["id"],
								"nom"=> $candidat["nom"],
								"email"=>$candidat["email"],
								"prenom"=>$candidat["prenom"],
								"cin"=>$candidat["cin"],
								"matricule"=>$candidat["matricule"],
								"classe"=>$candidat["classe"]
			 				 );
			$result[$i]=$ress;
			$i++;
			
				} 
		$sql->closeCursor();
		$cnx=null;
				
		 } }
		
	 return $result;
		}

	static function rechercheCandidatParId( $cnx,$id )
	{

		if($cnx)
		{
			$sql=$cnx->prepare("SELECT * FROM authentification WHERE id=:id  ");
			$sql->bindParam(':id' , $id);
			$sql->execute();

			if($sql->rowCount()>0)
			{return 1;}
			else return 0;

		}



	}

	static function deleteCandidat( $cnx,$id )
	{

		if($cnx)
		{
			$sql=$cnx->prepare("delete FROM authentification WHERE id=:id ");
			$sql->bindParam(':id' , $id);
			$sql->execute();

			if($sql->rowCount()>0)
			{return 1;}
			else return 0;

		}



	}


	/////////////// ajout produit  //////////////////////////////////////////////////////////////////////////////////////
 
	static function ajoutCandidat($cnx ,   $nom , $email , $prenom , $cin , $matricule , $classe  )
{  
if($cnx)
		{
	 $sql=$cnx->prepare('insert into authentification values (" ",:b , :c , :d , :e , :f , :g )');


							$sql->bindParam(':b' , $nom);
							$sql->bindParam(':c' , $email);
							$sql->bindParam(':d' , $prenom);
							$sql->bindParam(':e' , $cin);
							$sql->bindParam(':f' , $matricule);
							$sql->bindParam(':g' , $classe);							
							try {
								$nblignes = $sql->execute();
								return $nblignes;
							}
							catch (Exception $e){
								return $e->getMessage();
							}

		}
	 
	 		else{return 0 ;}
	
	 }
//////////////////////////////////////////////////////////////////////////////////////////////
	static function editCandidat($cnx , $id , $nom , $email , $prenom , $cin , $matricule , $classe  )
	{
		if($cnx)
		{
			try {
				$nblignes=$cnx->exec("update  authentification set  nom='".$nom."' , email='".$email."' , prenom='".$prenom."', cin=".$cin." , matricule=".$matricule." , classe='".$classe."' where id=".$id );
				return $nblignes;
			}
			catch (Exception $e ){ return $e->getMessage().$e->getCode();}


		}

		else{return 0 ;}

	}
 
}
					
					
	
class categorie{
					 
					public $nom;
				public $nbrQuestionQCM;
					
					 	
					
									 
static function listCategorie ($cnx){
	$result=array();
	if($cnx)
	{
		$sql=$cnx->prepare("SELECT     * FROM categorie  ");
		$sql->execute();
		if(  $sql->rowCount()>0)
		{ $i=0 ;
			while($categorie=$sql->fetch(PDO::FETCH_ASSOC) )
			{
				$ress= array(

						"nom"=> $categorie["nom"],
						"nbr"=> $categorie["nbrQuestionQCM"],

				);
				$result[$i]=$ress;
				$i++;

			}
			$sql->closeCursor();
			$cnx=null;

		} }

	return $result;
		}
	 
	 
	 
	 
	 
	 static function ajoutCategorie($cnx , $nom ,$nbrQ  )
{    if($cnx)
		{
	 $sql=$cnx->prepare("insert into categorie values (  :b,:a )");
							 
							$sql->bindParam(':b' , $nom);
							$sql->bindParam(':a' , $nbrQ);
							$nblignes=$sql->execute();
							return $nblignes ;
		}
	 
	 		else{return 0 ;}
	
	 }







	static function rechercheCategorieParId( $cnx,$nom )
	{

		if($cnx)
		{
			$sql=$cnx->prepare("SELECT * FROM categorie WHERE nom=:nom  ");
			$sql->bindParam(':nom' , $nom);
			$sql->execute();

			if($sql->rowCount()>0)
			{return 1;}
			else return 0;

		}



	}

	static function deleteCategorie( $cnx,$nom )
	{

		if($cnx)
		{
			$sql=$cnx->prepare("delete FROM categorie WHERE nom=:nom ");
			$sql->bindParam(':nom' , $nom);
			$sql->execute();

			if($sql->rowCount()>0)
			{return 1;}
			else return 0;

		}



	}



	static function editCategorie($cnx ,  $nom ,$nomAncien,  $nbr   )
	{
		if($cnx)
		{
			try {
				$nblignes=$cnx->exec("update  categorie set  nom='".$nom."',nbrQuestionQCM='".$nbr."'  where nom='".$nomAncien."'" );

				return $nblignes;
			}
			catch (Exception $e ){ return $e->getMessage().$e->getCode();}


		}

		else{return 0 ;}

	}

	 
	 
	 
	 

	 
	 

}






class question
{
	public $id;
	public $question;
	public $note;
	public $nomCat;





	static function listQuestionReponce($cnx)
	{
		$result = array();
		if ($cnx) {
			$sql = $cnx->prepare("SELECT  q.id,q.Questions,q.Note,q.nomCat,r.Id,r.reponse,r.Correct FROM questions q ,reponse r  where r.reponse !='' and q.Id=r.Id_Question  ORDER BY q.Questions ");
			$sql->execute();
			if ($sql->rowCount() > 0) {
				$i = 0;
				while ($QuestionReponce = $sql->fetch(PDO::FETCH_ASSOC)) {
					$ress = array(
							"id" => $QuestionReponce["id"],
							"Questions" => $QuestionReponce["Questions"],
							"Note" => $QuestionReponce["Note"],
							"nomCat" => $QuestionReponce["nomCat"],
							"IdRep" => $QuestionReponce["Id"],
							"reponse" => $QuestionReponce["reponse"],
							"Correct" => $QuestionReponce["Correct"]

					);
					$result[$i] = $ress;
					$i++;

				}
				$sql->closeCursor();
				$cnx = null;

			}
		}

		return $result;
	}







	static function listQuestionReponceExamFinal($cnx)
	{
		$result = array();
		if ($cnx) {
			$sql = $cnx->prepare("SELECT  q.id,q.Questions,q.Note,q.nomCat,r.Id,r.reponse,r.Correct FROM questionexamenfinal q ,reponseexamenfinal r  where r.reponse !='' and q.Id=r.Id_Question  ORDER BY q.Questions ");
			$sql->execute();
			if ($sql->rowCount() > 0) {
				$i = 0;
				while ($QuestionReponce = $sql->fetch(PDO::FETCH_ASSOC)) {
					$ress = array(
							"id" => $QuestionReponce["id"],
							"Questions" => $QuestionReponce["Questions"],
							"Note" => $QuestionReponce["Note"],
							"nomCat" => $QuestionReponce["nomCat"],
							"IdRep" => $QuestionReponce["Id"],
							"reponse" => $QuestionReponce["reponse"],
							"Correct" => $QuestionReponce["Correct"]

					);
					$result[$i] = $ress;
					$i++;

				}
				$sql->closeCursor();
				$cnx = null;

			}
		}

		return $result;
	}









	static function deleteReponse($cnx, $reponse)
	{

		if ($cnx) {
			$sql = $cnx->prepare("delete FROM reponse WHERE reponse LIKE :d ");
			$sql->bindParam(':d', $reponse);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				return 1;
			} else return 0;

		}


	}

	static function deleteReponseExamenFinal($cnx, $reponse)
	{

		if ($cnx) {
			$sql = $cnx->prepare("delete FROM reponseexamenfinal WHERE reponse LIKE :d ");
			$sql->bindParam(':d', $reponse);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				return 1;
			} else return 0;

		}


	}


	static function dernierIdReponse($cnx)
	{

		if ($cnx) {
			$sql = $cnx->prepare("SELECT MAX(Id) as tt  FROM questions ");
			$nblignes = $sql->execute();
			$i = 0;
			while ($QuestionReponce = $sql->fetch(PDO::FETCH_ASSOC)) {
				return $QuestionReponce['tt'];
			}

			return $nblignes;
		} else return 0;

	}


	static function dernierIdReponseExamenFinal($cnx)
	{

		if ($cnx) {
			$sql = $cnx->prepare("SELECT MAX(Id) as tt  FROM questionexamenfinal ");
			$nblignes = $sql->execute();
			$i = 0;
			while ($QuestionReponce = $sql->fetch(PDO::FETCH_ASSOC)) {
				return $QuestionReponce['tt'];
			}

			return $nblignes;
		} else return 0;

	}


	static function ajoutQuestion($cnx,  $Question, $Note, $Categrie, $Reponse1,$onof1,$Reponse2,$onof2,$Reponse3,$onof3,$Reponse4,$onof4,$Reponse5,$onof5,$Reponse6,$onof6,$Reponse7,$onof7,$Reponse8,$onof8, $idQuestion)
	{
		if ($cnx) {

			$sql1 = $cnx->prepare('insert into questions values (" ",:e , :f , :g  )');
			$sql2 = $cnx->prepare('insert into reponse values (" ",:a , :b , :c )');
			$sql3 = $cnx->prepare('insert into reponse values (" ",:aa , :bb , :cc )');
			$sql4 = $cnx->prepare('insert into reponse values (" ",:aaa , :bbb , :ccc )');
			$sql5 = $cnx->prepare('insert into reponse values (" ",:aaaa , :bbbb , :cccc )');
			$sql6 = $cnx->prepare('insert into reponse values (" ",:aaaaa , :bbbbb , :ccccc )');
			$sql7 = $cnx->prepare('insert into reponse values (" ",:aaaaaa , :bbbbbb , :cccccc )');
			$sql8 = $cnx->prepare('insert into reponse values (" ",:aaaaaaa , :bbbbbbb , :ccccccc )');
			$sql9 = $cnx->prepare('insert into reponse values (" ",:aaaaaaaa , :bbbbbbbb , :cccccccc )');

			$sql1->bindParam(':e', $Question);
			$sql1->bindParam(':f', $Note);
			$sql1->bindParam(':g', $Categrie);

			$sql2->bindParam(':a', $Reponse1);
			$sql2->bindParam(':b', $onof1);
			$sql2->bindParam(':c', $idQuestion);

			$sql3->bindParam(':aa', $Reponse2);
			$sql3->bindParam(':bb', $onof2);
			$sql3->bindParam(':cc', $idQuestion);

			$sql4->bindParam(':aaa', $Reponse3);
			$sql4->bindParam(':bbb', $onof3);
			$sql4->bindParam(':ccc', $idQuestion);

			$sql5->bindParam(':aaaa', $Reponse4);
			$sql5->bindParam(':bbbb', $onof4);
			$sql5->bindParam(':cccc', $idQuestion);

			$sql6->bindParam(':aaaaa', $Reponse5);
			$sql6->bindParam(':bbbbb', $onof5);
			$sql6->bindParam(':ccccc', $idQuestion);

			$sql7->bindParam(':aaaaaa', $Reponse6);
			$sql7->bindParam(':bbbbbb', $onof6);
			$sql7->bindParam(':cccccc', $idQuestion);

			$sql8->bindParam(':aaaaaaa', $Reponse7);
			$sql8->bindParam(':bbbbbbb', $onof7);
			$sql8->bindParam(':ccccccc', $idQuestion);

			$sql9->bindParam(':aaaaaaaa', $Reponse8);
			$sql9->bindParam(':bbbbbbbb', $onof8);
			$sql9->bindParam(':cccccccc', $idQuestion);
			try {
				$nblignes1 = $sql1->execute();
				$nblignes2 = $sql2->execute();
				$nblignes3 = $sql3->execute();
				$nblignes4 = $sql4->execute();
				$nblignes5 = $sql5->execute();
				$nblignes6 = $sql6->execute();
				$nblignes7 = $sql7->execute();
				$nblignes8 = $sql8->execute();
				$nblignes9 = $sql9->execute();

				return $nblignes1  + $nblignes2+$nblignes3 + $nblignes4 + $nblignes5 + $nblignes6+ $nblignes7+ $nblignes8+ $nblignes9;
			} catch (Exception $e) {
				return $e->getMessage();
			}

		} else {
			return 0;
		}

	}




	static function ajoutQuestionExamenFinal($cnx,  $Question, $Note, $Categrie, $Reponse1,$onof1,$Reponse2,$onof2,$Reponse3,$onof3,$Reponse4,$onof4,$Reponse5,$onof5,$Reponse6,$onof6,$Reponse7,$onof7,$Reponse8,$onof8, $idQuestion)
	{
		if ($cnx) {

			$sql1 = $cnx->prepare('insert into questionexamenfinal values (" ",:e , :f , :g  )');
			$sql2 = $cnx->prepare('insert into reponseexamenfinal values (" ",:a , :b , :c )');
			$sql3 = $cnx->prepare('insert into reponseexamenfinal values (" ",:aa , :bb , :cc )');
			$sql4 = $cnx->prepare('insert into reponseexamenfinal values (" ",:aaa , :bbb , :ccc )');
			$sql5 = $cnx->prepare('insert into reponseexamenfinal values (" ",:aaaa , :bbbb , :cccc )');
			$sql6 = $cnx->prepare('insert into reponseexamenfinal values (" ",:aaaaa , :bbbbb , :ccccc )');
			$sql7 = $cnx->prepare('insert into reponseexamenfinal values (" ",:aaaaaa , :bbbbbb , :cccccc )');
			$sql8 = $cnx->prepare('insert into reponseexamenfinal values (" ",:aaaaaaa , :bbbbbbb , :ccccccc )');
			$sql9 = $cnx->prepare('insert into reponseexamenfinal values (" ",:aaaaaaaa , :bbbbbbbb , :cccccccc )');

			$sql1->bindParam(':e', $Question);
			$sql1->bindParam(':f', $Note);
			$sql1->bindParam(':g', $Categrie);

			$sql2->bindParam(':a', $Reponse1);
			$sql2->bindParam(':b', $onof1);
			$sql2->bindParam(':c', $idQuestion);

			$sql3->bindParam(':aa', $Reponse2);
			$sql3->bindParam(':bb', $onof2);
			$sql3->bindParam(':cc', $idQuestion);

			$sql4->bindParam(':aaa', $Reponse3);
			$sql4->bindParam(':bbb', $onof3);
			$sql4->bindParam(':ccc', $idQuestion);

			$sql5->bindParam(':aaaa', $Reponse4);
			$sql5->bindParam(':bbbb', $onof4);
			$sql5->bindParam(':cccc', $idQuestion);

			$sql6->bindParam(':aaaaa', $Reponse5);
			$sql6->bindParam(':bbbbb', $onof5);
			$sql6->bindParam(':ccccc', $idQuestion);

			$sql7->bindParam(':aaaaaa', $Reponse6);
			$sql7->bindParam(':bbbbbb', $onof6);
			$sql7->bindParam(':cccccc', $idQuestion);

			$sql8->bindParam(':aaaaaaa', $Reponse7);
			$sql8->bindParam(':bbbbbbb', $onof7);
			$sql8->bindParam(':ccccccc', $idQuestion);

			$sql9->bindParam(':aaaaaaaa', $Reponse8);
			$sql9->bindParam(':bbbbbbbb', $onof8);
			$sql9->bindParam(':cccccccc', $idQuestion);
			try {
				$nblignes1 = $sql1->execute();
				$nblignes2 = $sql2->execute();
				$nblignes3 = $sql3->execute();
				$nblignes4 = $sql4->execute();
				$nblignes5 = $sql5->execute();
				$nblignes6 = $sql6->execute();
				$nblignes7 = $sql7->execute();
				$nblignes8 = $sql8->execute();
				$nblignes9 = $sql9->execute();

				return $nblignes1  + $nblignes2+$nblignes3 + $nblignes4 + $nblignes5 + $nblignes6+ $nblignes7+ $nblignes8+ $nblignes9;
			} catch (Exception $e) {
				return $e->getMessage();
			}

		} else {
			return 0;
		}

	}
















	static function lectureQuestion($cnx, $id)
	{
		$result = array();
		if ($cnx) {
			$sql = $cnx->prepare("SELECT  q.id,q.Questions,q.Note,q.nomCat,r.Id,r.reponse,r.Correct FROM questions q ,reponse r  where q.Id=:id and r.Id_Question=:id   ");
			$sql->bindParam(':id', $id);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				$i = 0;
				while ($QuestionReponce = $sql->fetch(PDO::FETCH_ASSOC)) {
					$ress = array(
							"id" => $QuestionReponce["id"],
							"Questions" => $QuestionReponce["Questions"],
							"Note" => $QuestionReponce["Note"],
							"nomCat" => $QuestionReponce["nomCat"],
							"IdRep" => $QuestionReponce["Id"],
							"reponse" => $QuestionReponce["reponse"],
							"Correct" => $QuestionReponce["Correct"]

					);
					$result[$i] = $ress;
					$i++;

				}
				$sql->closeCursor();
				$cnx = null;

			}
			return $result;
		}
	}



	static function lectureQuestionExamenFinal($cnx, $id)
	{
		$result = array();
		if ($cnx) {
			$sql = $cnx->prepare("SELECT  q.id,q.Questions,q.Note,q.nomCat,r.Id,r.reponse,r.Correct FROM questionexamenfinal q ,reponseexamenfinal r  where q.Id=:id and r.Id_Question=:id   ");
			$sql->bindParam(':id', $id);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				$i = 0;
				while ($QuestionReponce = $sql->fetch(PDO::FETCH_ASSOC)) {
					$ress = array(
							"id" => $QuestionReponce["id"],
							"Questions" => $QuestionReponce["Questions"],
							"Note" => $QuestionReponce["Note"],
							"nomCat" => $QuestionReponce["nomCat"],
							"IdRep" => $QuestionReponce["Id"],
							"reponse" => $QuestionReponce["reponse"],
							"Correct" => $QuestionReponce["Correct"]

					);
					$result[$i] = $ress;
					$i++;

				}
				$sql->closeCursor();
				$cnx = null;

			}
			return $result;
		}
	}



	static function lectureChoixQuestion($cnx, $id)
	{
		$result = array();
		if ($cnx) {
			$sql = $cnx->prepare("SELECT r.Id,r.reponse,r.Correct FROM reponse r  where   r.Id_Question=:id   ");
			$sql->bindParam(':id', $id);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				$i = 0;
				while ($QuestionReponce = $sql->fetch(PDO::FETCH_ASSOC)) {
					$ress = array(
							"idRep" => $QuestionReponce["Id"],
							"reponse" => $QuestionReponce["reponse"],
							"Correct" => $QuestionReponce["Correct"]

					);
					$result[$i] = $ress;
					$i++;

				}
				$sql->closeCursor();
				$cnx = null;

			}
			return $result;
		}
	}






	static function lectureChoixQuestionExamenFinal($cnx, $id)
	{
		$result = array();
		if ($cnx) {
			$sql = $cnx->prepare("SELECT r.Id,r.reponse,r.Correct FROM reponseexamenfinal r  where   r.Id_Question=:id   ");
			$sql->bindParam(':id', $id);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				$i = 0;
				while ($QuestionReponce = $sql->fetch(PDO::FETCH_ASSOC)) {
					$ress = array(
							"idRep" => $QuestionReponce["Id"],
							"reponse" => $QuestionReponce["reponse"],
							"Correct" => $QuestionReponce["Correct"]

					);
					$result[$i] = $ress;
					$i++;

				}
				$sql->closeCursor();
				$cnx = null;

			}
			return $result;
		}
	}






//////////////////////////////////////////////////////////////////////////////////////////////
	static function editReponse($cnx ,$idReponse, $idRep1 , $reponse1 , $correct1 ,  $idRep2  ,$reponse2  ,$correct2 , $idRep3,$reponse3,$correct3,$idRep4,$reponse4 ,$correct4,$idRep5 ,$reponse5  ,$correct5,$idRep6,$reponse6 ,$correct6,$idRep7,$reponse7 ,$correct7,$idRep8 ,$reponse8  ,$correct8)
	{
		if($cnx)
		{
			try {
				$nblignes1=$cnx->exec("update  reponse set  reponse='".$reponse1."' , Correct='".$correct1."' where Id=".$idRep1 );
				$nblignes2=$cnx->exec("update  reponse set  reponse='".$reponse2."' , Correct='".$correct2."' where Id=".$idRep2 );
				$nblignes3=$cnx->exec("update  reponse set  reponse='".$reponse3."' , Correct='".$correct3."' where Id=".$idRep3 );
				$nblignes4=$cnx->exec("update  reponse set  reponse='".$reponse4."' , Correct='".$correct4."' where Id=".$idRep4 );
				$nblignes5=$cnx->exec("update  reponse set  reponse='".$reponse5."' , Correct='".$correct5."' where Id=".$idRep5 );
				$nblignes6=$cnx->exec("update  reponse set  reponse='".$reponse6."' , Correct='".$correct6."' where Id=".$idRep6 );
				$nblignes7=$cnx->exec("update  reponse set  reponse='".$reponse7."' , Correct='".$correct7."' where Id=".$idRep7 );
				$nblignes8=$cnx->exec("update  reponse set  reponse='".$reponse8."' , Correct='".$correct8."' where Id=".$idRep8 );
				return 1;
			}
			catch (Exception $e ){ return $e->getMessage().$e->getCode();}


		}

		else{return 0 ;}

	}





	static function editReponseExamenFinal($cnx ,$idReponse, $idRep1 , $reponse1 , $correct1 ,  $idRep2  ,$reponse2  ,$correct2 , $idRep3,$reponse3,$correct3,$idRep4,$reponse4 ,$correct4,$idRep5 ,$reponse5  ,$correct5,$idRep6,$reponse6 ,$correct6,$idRep7,$reponse7 ,$correct7,$idRep8 ,$reponse8  ,$correct8)
	{
		if($cnx)
		{
			try {
				$nblignes1=$cnx->exec("update  reponseexamenfinal set  reponse='".$reponse1."' , Correct='".$correct1."' where Id=".$idRep1 );
				$nblignes2=$cnx->exec("update  reponseexamenfinal set  reponse='".$reponse2."' , Correct='".$correct2."' where Id=".$idRep2 );
				$nblignes3=$cnx->exec("update  reponseexamenfinal set  reponse='".$reponse3."' , Correct='".$correct3."' where Id=".$idRep3 );
				$nblignes4=$cnx->exec("update  reponseexamenfinal set  reponse='".$reponse4."' , Correct='".$correct4."' where Id=".$idRep4 );
				$nblignes5=$cnx->exec("update  reponseexamenfinal set  reponse='".$reponse5."' , Correct='".$correct5."' where Id=".$idRep5 );
				$nblignes6=$cnx->exec("update  reponseexamenfinal set  reponse='".$reponse6."' , Correct='".$correct6."' where Id=".$idRep6 );
				$nblignes7=$cnx->exec("update  reponseexamenfinal set  reponse='".$reponse7."' , Correct='".$correct7."' where Id=".$idRep7 );
				$nblignes8=$cnx->exec("update  reponseexamenfinal set  reponse='".$reponse8."' , Correct='".$correct8."' where Id=".$idRep8 );
				return 1;
			}
			catch (Exception $e ){ return $e->getMessage().$e->getCode();}


		}

		else{return 0 ;}

	}




}











class candidatureExamenFinal
{
	public $id;
	public $login;
	public $mdp;
	public $noteEnPourcentage;
	public $cin;
	public $matricule;
	public $dateExamen;




	static function listResultat($cnx)
	{
		$result = array();
		if ($cnx) {
			$sql = $cnx->prepare("SELECT  * FROM examencerificat  ");
			$sql->execute();
			if ($sql->rowCount() > 0) {
				$i = 0;
				while ($list = $sql->fetch(PDO::FETCH_ASSOC)) {
					$ress = array(
							"id" => $list["id"],
							"login" => $list["login"],
							"mdp" => $list["mdp"],
							"noteEnPourcentage" => $list["noteEnPourcentage"],
							"cin" => $list["cin"],
							"matricule" => $list["matricule"],
							"dateExamen" => $list["dateExamen"]

					);
					$result[$i] = $ress;
					$i++;

				}
				$sql->closeCursor();
				$cnx = null;

			}
		}

		return $result;
	}




	static function listCandidatExamenFinal ($cnx){
		$result=array();
		if($cnx)
		{
			$sql=$cnx->prepare("SELECT   * FROM examencerificat  ");
			$sql->execute();
			if(  $sql->rowCount()>0)
			{ $i=0 ;
				while($candidat=$sql->fetch(PDO::FETCH_ASSOC) )
				{
					$ress= array(
							"id"=>$candidat["id"],
							"login"=>$candidat["login"],
							"mdp"=> $candidat["mdp"],
							"cin"=>$candidat["cin"],
							"matricule"=>$candidat["matricule"],
							"mdpResponsable"=>$candidat["mdpResponsable"],

					);
					$result[$i]=$ress;
					$i++;

				}
				$sql->closeCursor();
				$cnx=null;

			} }

		return $result;
	}




	static function ajoutCandidatExamenFinal($cnx ,   $login , $mdp , $cin , $matricule , $mdpRes  )
	{
		if($cnx)
		{
			$sql=$cnx->prepare('insert into examencerificat values (" ",:b , :c ,:e , :f ," "," ", :g )');


			$sql->bindParam(':b' , $login);
			$sql->bindParam(':c' , $mdp);
			$sql->bindParam(':e' , $cin);
			$sql->bindParam(':f' , $matricule);
			$sql->bindParam(':g' , $mdpRes);
			try {
				$nblignes = $sql->execute();
				return $nblignes;
			}
			catch (Exception $e){
				return $e->getMessage();
			}

		}

		else{return 0 ;}

	}





	static function rechercheCandidatParIdExamenFinal( $cnx,$id )
	{

		if($cnx)
		{
			$sql=$cnx->prepare("SELECT * FROM examencerificat WHERE id=:id  ");
			$sql->bindParam(':id' , $id);
			$sql->execute();

			if($sql->rowCount()>0)
			{return 1;}
			else return 0;

		}



	}




	static function deleteCandidatExamenFinal( $cnx,$id )
	{

		if($cnx)
		{
			$sql=$cnx->prepare("delete FROM examencerificat WHERE id=:id ");
			$sql->bindParam(':id' , $id);
			$sql->execute();

			if($sql->rowCount()>0)
			{return 1;}
			else return 0;

		}



	}








	static function editCandidatExamenFinal($cnx ,   $id, $matricule , $cin , $login , $mdp , $mdpRes )
	{
		if($cnx)
		{
			try {
				$nblignes=$cnx->exec("update  examencerificat set  login='".$login."',  mdp='".$mdp."',  cin='".$cin."',  matricule='".$matricule."',  mdpResponsable='".$mdpRes."'   where id=$id" );
				return $nblignes;
			}
			catch (Exception $e ){ return $e->getMessage().$e->getCode();}


		}

		else{return 0 ;}

	}






}

?>