<?php

if($_SESSION['con'] != 'true')
	echo "<script type='text/javascript'>window.location='../index.php';</script>";

$_SESSION['newTry'] = 1;
?>
<!DOCTYPE html>
<html lang="en-us">
   <head>
 
            
      
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
			<th>Matricule</th><th>CIN</th><th>Login</th><th>Mots de passe</th><th>Mots de passe responsable</th><th>Action</th>
		</tr>        
	</thead>
    <tbody>
    <?php 
	include("includes/classes.php");
 				// connexion 
 			 include("includes/connexionBase.php");
  			 $a=new ConnexionBase();
  			 
  			 $courant=$_SERVER["PHP_SELF"];
			 $res=candidatureExamenFinal::listCandidatExamenFinal($a->getConnexionBase());

		if(isset($res)&& count($res)>0){
					$lig=$res;
					$j=0;
				 

		 
		 for($i=0;$i<count($lig);$i++)
		 {
	?>
    	<tr id="<?php  echo $lig[$i]['id']; ?>">

        	<?php 
			for($j=0;$j<6;$j++)
			{
				if($j==5){ ?>	<td width="25%"><a class="btn btn-info cedit" href="javascript:void(0)" ><i class="fa fa-pencil"></i> Editer</a>
                				<a class="btn btn-danger cdelete" href="javascript:void(0)"  ><i class="fa fa-trash-o"></i> Supprimer</a></td>
						<?php }
						else{

												switch ($j){
													case 0: echo "<td class='matricule'>". $lig[$i]['matricule']."</td>";break;
													case 1: echo  "<td class='cin'>". $lig[$i]['cin']."</td>"; break;
													case 2: echo  "<td class='login'>". $lig[$i]['login']."</td>"; break;
													case 3: echo "<td class='mdp'>". $lig[$i]['mdp']."</td>"; break;
													case 4: echo "<td class='mdpRes'>". $lig[$i]['mdpResponsable']."</td>"; break;

												}

								?>
					 
			
			<?php }
			}}		}

			?>
        </tr>
    </tbody>
      </table>
      <br>
    </div>
 
   
    <script>
      $(document).ready(function() {
		  function add(){
			  $.post('includes/gestionCandidatExamenFinal.php?ng=add/',    {
						  id: $('#id').val(),
						  matricule: $('#matricule').val(),
						  cin: $('#cin').val(),
						  login: $('#login').val(),
						  mdp: $('#mdp').val(),
						  mdpRes: $('#mdpRes').val(),
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
			  $.post('includes/gestionCandidatExamenFinal.php?ng=edit/',    {
						  id:id,
						  matricule: $('#Matricule').val(),
						  cin: $('#CIN').val(),
						  login: $('#login').val(),
						  mdp: $('#mdp').val(),
						  mdpRes: $('#mdpRes').val(), },
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
				  title:"Ajouter étudiant" ,
				  message: ' <div class="modal-body"><pre><form name="altEditor-form" role="form"><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="matricule">Matricule:</label></div><div class="col-sm-9 col-md-9 col-lg-9"><input type="text" id="matricule" required name="matricule" maxlength="4" placeholder="matricule" style="overflow:hidden" class="form-control  form-control-sm" value=""></div><div style="clear:both;"></div></div><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="CIN">CIN:</label></div><div class="col-sm-9 col-md-9 col-lg-9"><input type="text" maxlength="9" id="cin" required  name="cin" placeholder="cin" style="overflow:hidden" class="form-control  form-control-sm" value=""></div><div style="clear:both;"></div></div><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="login">Login :</label></div><div class="col-sm-9 col-md-9 col-lg-9"><input type="text" id="login" required name="login" placeholder="login" style="overflow:hidden" class="form-control  form-control-sm" value=""></div><div style="clear:both;"></div></div><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="mdp">Mots de passe :</label></div><div class="col-sm-9 col-md-9 col-lg-9"><input type="text" id="mdp" required name="mdp" placeholder="*****" style="overflow:hidden" class="form-control  form-control-sm" value=""></div><div style="clear:both;"></div></div><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="mdpRes">Mdp responsable :</label></div><div class="col-sm-9 col-md-9 col-lg-9"><input type="text" id="mdpRes" required name="mdpRes" placeholder="******" style="overflow:hidden" class="form-control  form-control-sm" value=""></div><div style="clear:both;"></div></div></form></pre></div>',
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
				  message: "Voulez vous supprimer ce candidat ?",
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
						  url="includes/gestionCandidatExamenFinal.php?ng=delete/";
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
			  var login=that.closest('tr').find('.login').text() ;
			  var mdp=that.closest('tr').find('.mdp').text() ;
			  var mdpRes=that.closest('tr').find('.mdpRes').text() ;

			  bootbox.dialog({
				  title:"Modifier Candidat" ,
				  message: ' <div class="modal-body"><pre><form name="altEditor-form" role="form"><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="Matricule">Matricule:</label></div><div class="col-sm-9 col-md-9 col-lg-9"><input type="text" id="Matricule" value="'+matricule+'" name="Matricule" placeholder="Matricule" style="overflow:hidden" class="form-control  form-control-sm" value=""></div><div style="clear:both;"></div></div><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="CIN">CIN:</label></div><div class="col-sm-9 col-md-9 col-lg-9"><input type="text" id="CIN" name="CIN" placeholder="CIN" style="overflow:hidden" class="form-control  form-control-sm" value="'+cin+'"></div><div style="clear:both;"></div></div><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="login">Login :</label></div><div class="col-sm-9 col-md-9 col-lg-9"><input type="text" id="login"  value="'+login+'" name="login" placeholder="login" style="overflow:hidden" class="form-control  form-control-sm" value=""></div><div style="clear:both;"></div></div><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="mdp">Mots de passe :</label></div><div class="col-sm-9 col-md-9 col-lg-9"><input type="text" id="mdp" value="'+mdp+'" name="mdp" placeholder="*****" style="overflow:hidden" class="form-control  form-control-sm" value=""></div><div style="clear:both;"></div></div><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="mdpRes">Mdp responsable :</label></div><div class="col-sm-9 col-md-9 col-lg-9"><input type="text" id="mdpRes" value="'+mdpRes+'" name="mdpRes"  style="overflow:hidden" class="form-control  form-control-sm" value=""></div><div style="clear:both;"></div></div></form></pre></div>',
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