<?php

if($_SESSION['con'] != 'true')
	echo "<script type='text/javascript'>window.location='../index.php';</script>";

$_SESSION['newTry'] = 1;
?>
<!DOCTYPE html>
<html lang="en-us">
   <head>

	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	   <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>

 <!------------------------>
 
      <style>
        table.dataTable tbody>tr.selected,
        table.dataTable tbody>tr>.selected {
          background-color: #A2D3F6;
        }
      </style>





   </head>
   <body  >



   <div class="container"  style=" width:100%">
      <br>
      <table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="example">
	<thead>
    	<tr>
			<th>Question</th><th>Note</th><th>Catégorie</th><th>Réponse</th><th>Correct</th> <th>Action</th>
		</tr>
	</thead>
    <tbody>
    <?php
	include("includes/classes.php");
 				// connexion
 			 include("includes/connexionBase.php");
  			 $a=new ConnexionBase();

  			 $courant=$_SERVER["PHP_SELF"];
			 $res=question::listQuestionReponce($a->getConnexionBase());

		if(isset($res)&& count($res)>0){
					$lig=$res;
					$j=0;



		 for($i=0;$i<count($lig);$i++)
		 {
	?>
    	<tr id="<?php  echo $lig[$i]['reponse']; ?>" style=" <?php if($lig[$i]['Correct']==1){echo 'color:#008000';}else{echo 'color:red';}   ?>" >

        	<?php
			for($j=0;$j<8;$j++)
			{
				if($j==7){ ?>	<td width="25%"><a class="btn btn-info cedit" href="question.php?page=modifQcm&id=<?php echo $lig[$i]['id']; ?>" ><i class="fa fa-pencil"></i> Editer</a>
                				<a class="btn btn-danger cdelete" href="javascript:void(0)"  ><i class="fa fa-trash-o"></i> Supprimer</a></td>
						<?php }
						else{

												switch ($j){

													case 1: echo  "<td class='Questions'>". $lig[$i]['Questions']."</td>"; break;
													case 2: echo  "<td class='Note'>". $lig[$i]['Note']."</td>"; break;
													case 3: echo "<td class='nomCat'>". $lig[$i]['nomCat']."</td>"; break;
													case 4: echo "<td class='reponse'>". $lig[$i]['reponse']."</td>"; break;
													case 5: echo "<td class='Correct'>"?><?php if($lig[$i]['Correct']==0){echo "Faux";} else{echo "Vrai";}  ?><?php "</td>"; break;

												}

								?>
					 
			
			<?php } }}		}

			?>
        </tr>
    </tbody>
      </table>
      <br>
    </div>



    <script >
      $(document).ready(function() {
		 function add(){
			  $.post('includes/gestionQuestion.php?ng=add/',    {
						  Question: $('#Question').val(),
						  Reponse1: $('#Reponse1').val(),
						  Reponse2: $('#Reponse2').val(),
						  Reponse3: $('#Reponse3').val(),
						  Reponse4: $('#Reponse4').val(),
						  Reponse5: $('#Reponse5').val(),
						  Note: $('#Note').val(),
						  Categrie: $('#Categrie').val(),
						  Correcte: $('#Correcte').val(),
			  					},
					  function(result, status){

						  if(status=='success'){

							  if(result>0){   location.reload();
							  }
							  else{
								  $("#emsgbody").html(result); $("#emsg").show("slow");
							  }
						  }
					  });}

		  function edit(id){
			  $.post('includes/gestionQuestion.php?ng=edit/',    {
						  id:id,
						  matricule: $('#Matricule').val(),
						  cin: $('#CIN').val(),
						  nom: $('#Nom').val(),
						  prenom: $('#Prénom').val(),
						  classe: $('#Classe').val(),
						  email: $('#Email').val(), },
					  function(result, status){

						  if(status=='success'){

							  if(result>0){   location.reload();
							  }
							  else{
								  $("#emsgbody").html(result); $("#emsg").show("slow");
							  }
						  }
					  });}
	 


        var myTable;

        myTable = $('#example').DataTable({
          "sPaginationType": "full_numbers",
          "language": {
                "url": "js/French.json"
            },         
          responsive: true
 
        });

		   $("#addCandidat").click(function(e) {
			  bootbox.dialog({

				  title:"Ajouter QCM" ,
				  message: '<html><head>   </head><pre><form name="altEditor-form" role="form"> <div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="Question">Question :</label></div><div class="col-sm-9 col-md-9 col-lg-9"><input type="text" id="Question" name="Question"   placeholder="Question" style="overflow:hidden" class="form-control  form-control-sm" value=""></div><div style="clear:both;"></div></div><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="Reponse">Reponse :</label></div>' +
				  '<div class="col-sm-9 col-md-9 col-lg-9">' +
				  '<input type="text" id="Reponse1" name="Reponse1" required placeholder="Reponse1" style="overflow:hidden" class="form-control  form-control-sm" value=""> <input type="checkbox" value="1" name="rep1" id="rep1">Vrai' +
				  ' <input type="text" id="Reponse2" name="Reponse2" placeholder="Reponse2" style="overflow:hidden" class="form-control  form-control-sm" value=""><input type="checkbox" value="1" name="rep2" id="rep2">Vrai' +
				  '<input type="text" id="Reponse3" name="Reponse3" placeholder="Reponse3" style="overflow:hidden" class="form-control  form-control-sm" value=""><input type="checkbox" value="1" name="rep3" id="rep3">Vrai' +
				  '<input type="text" id="Reponse4" name="Reponse4" placeholder="Reponse4" style="overflow:hidden" class="form-control  form-control-sm" value=""><input type="checkbox" value="1" name="rep4" id="rep4">Vrai' +
				  '<input type="text" id="Reponse5" name="Reponse5" placeholder="Reponse5" style="overflow:hidden" class="form-control  form-control-sm" value=""><input type="checkbox" value="1" name="rep5" id="rep5">Vrai' +
				  '</div><div style="clear:both;"></div></div><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="Note">Note :</label></div><div class="col-sm-9 col-md-9 col-lg-9"><input type="number" id="Note" name="Note" required placeholder="Note" style="overflow:hidden" class="form-control  form-control-sm" value=""></div><div style="clear:both;"></div></div><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="Categorie">Categorie :</label></div> <select class="form-control" required id="Categrie" style="width: 375px; margin-left: 148px; margin-top: -20px;" name="size"> <?php  $resu=categorie::listCategorie($a->getConnexionBase()); $lig=$resu;   for($i=0;$i<count($lig);$i++){ ?><option value="<?php echo $lig[$i]['nom']; ?>"><?php echo $lig[$i]['nom'];  ?></option><?php }  ?></select><div style="clear:both;"></div></div>   </form></pre> </body></html>',
				  buttons: {
					  main: {
						  label: "Valider",
						  className: "btn-primary",
						  callback: function (e) { add();}
					  },
					  cancel: {label: "Annuler ",
						  className: "btn-cancel",
						  callback: function (){}

					  }
				  }
			  });



    });
		  $(".cdelete").click(function(e){
			  var that=$(this);
			  bootbox.confirm({
				  message: "Voulez vous supprimer ce Question avec ces réponce ?",
				  size:"small",
				  buttons: {
					  confirm: {
						  label: 'Valider',
						  className: 'btn-primary'
					  },
					  cancel: {
						  label: 'Anuler',
						  className: 'btn-cancel'
					  }
				  },
				  callback: function (result) {

					  if(result){

							var id=that.closest('tr').attr('id');
						  data={"id":id};
						  url="includes/gestionQuestion.php?ng=delete/";
						  $.post(url,data).done(function(result){
							  if(result>0){   location.reload();
							  }
							  else{
								  $("#emsgbody").html(result); $("#emsg").show("slow");
							  }
						  });
					  }
				  }
			  });
		  });

		   $(".cedit").click(function(e) {
			  var that=$(this);
			  var matricule=that.closest('tr').find('.matricule').text() ;
			  var cin=that.closest('tr').find('.cin').text() ;
			  var nom=that.closest('tr').find('.nom').text() ;
			  var prenom=that.closest('tr').find('.prenom').text() ;
			  var classe=that.closest('tr').find('.classe').text() ;
			  var email=that.closest('tr').find('.email').text();
			  bootbox.dialog({
				  title:"Modifier Question" ,
				  message: ' <div class="modal-body"><pre> <form name="altEditor-form" role="form"><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="Matricule">Matricule:</label></div><div class="col-sm-9 col-md-9 col-lg-9"><input type="text" id="Matricule" value="'+matricule+'" name="Matricule" placeholder="Matricule" style="overflow:hidden" class="form-control  form-control-sm" value=""></div><div style="clear:both;"></div></div><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="CIN">CIN:</label></div><div class="col-sm-9 col-md-9 col-lg-9"><input type="text" id="CIN" name="CIN" placeholder="CIN" style="overflow:hidden" class="form-control  form-control-sm" value="'+cin+'"></div><div style="clear:both;"></div></div><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="Nom">Nom:</label></div><div class="col-sm-9 col-md-9 col-lg-9"><input type="text" id="Nom"  value="'+nom+'" name="Nom" placeholder="Nom" style="overflow:hidden" class="form-control  form-control-sm" value=""></div><div style="clear:both;"></div></div><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="Prénom">Prénom:</label></div><div class="col-sm-9 col-md-9 col-lg-9"><input type="text" id="Prénom" value="'+prenom+'" name="Prénom" placeholder="Prénom" style="overflow:hidden" class="form-control  form-control-sm" value=""></div><div style="clear:both;"></div></div><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="Classe">Classe:</label></div><div class="col-sm-9 col-md-9 col-lg-9"><input type="text" id="Classe" value="'+classe+'" name="Classe" placeholder="Classe" style="overflow:hidden" class="form-control  form-control-sm" value=""></div><div style="clear:both;"></div></div><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="Email">Email:</label></div><div class="col-sm-9 col-md-9 col-lg-9"><input type="text" id="Email" value="'+email+'" name="Email" placeholder="Email" style="overflow:hidden" class="form-control  form-control-sm" value=""></div><div style="clear:both;"></div></div></form></pre></div>',
				  buttons: {
					  main: {
						  label: "Valider",
						  className: "btn-primary",
						  callback: function (e) {  edit(that.closest('tr').attr('id'));}
					  },
					  cancel: {label: "Annuler ",
						  className: "btn-cancel",
						  callback: function (){}

					  }
				  }
			  });
		  });
	    });


    </script>


<!-------------------------------------------------------------------------------------------------------------------------->
 
                  

<!--------------------------------------------------------------------------------------------------------------------------->



   </body>
</html>