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
			<th>Nom</th><th>nbr Question sur QCM</th><th>Action</th>
		</tr>        
	</thead>
    <tbody>
    <?php 
	include("includes/classes.php");
 				// connexion 
 			 include("includes/connexionBase.php");
  			 $a=new ConnexionBase();
  			 
  			 $courant=$_SERVER["PHP_SELF"];
			 $res=categorie::listCategorie($a->getConnexionBase());
			 
		if(isset($res)&& count($res)>0){
					$lig=$res;
					$j=0;
				 

		 
		 for($i=0;$i<count($lig);$i++)
		 {
	?>
    	<tr id="<?php  echo $lig[$i]['nom']; ?>">

        	<?php 
			for($j=0;$j<2;$j++)
			{
				if($j==1){ ?>	<td width="25%"><a class="btn btn-info cedit" href="javascript:void(0)" ><i class="fa fa-pencil"></i> Editer</a>
                				<a class="btn btn-danger cdelete" href="javascript:void(0)"  ><i class="fa fa-trash-o"></i> Supprimer</a></td>
						<?php }
						else{
  								echo "<td class='nom'>". $lig[$i]['nom']."</td>" ;
							echo "<td class='nbr'>". $lig[$i]['nbr']."</td>" ;
												}

								?>
					 
			
			<?php }}}

			?>
        </tr>
    </tbody>
      </table>
      <br>
    </div>
 
   
    <script>
      $(document).ready(function() {
		  function add(){
			  $.post('includes/gestionCategorie.php?ng=add/',    {
						  nom: $('#nom').val(),
						  nbrQ: $('#nbrQ').val(),
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
			  $.post('includes/gestionCategorie.php?ng=edit/',    {
						  id:id,
						  nom: $('#nom').val(),
						  nomAncien: $('#nomAncien').val(),

						  nbr: $('#nbrQ').val(),

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


        var myTable;

        myTable = $('#example').DataTable({
          "sPaginationType": "full_numbers",
          "language": {
                "url": "js/French.json"
            },         
          responsive: true
 
        });
		  $("#addCategorie").click(function(e) {
			  bootbox.dialog({
				  title:"Ajouter Categorie" ,
				  message: ' <div class="modal-body"><pre><form name="altEditor-form" role="form"><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="nom">Nom :</label></div><div class="col-sm-9 col-md-9 col-lg-9"><input type="text" id="nom" name="nom" placeholder="nom" style="overflow:hidden" class="form-control  form-control-sm" value=""></div><div style="clear:both;"></div></div><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="nbrQ">Nombre question :</label></div><div class="col-sm-9 col-md-9 col-lg-9"><input type="number" id="nbrQ" name="nbrQ" placeholder="nombre question" style="overflow:hidden" class="form-control  form-control-sm" value=""></div><div style="clear:both;"></div></div> </form></pre></div>',
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
				  message: "Voulez vous supprimer ce catégorie ?",
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

							var nom=that.closest('tr').attr('id');
						  data={"nom":nom};
						  url="includes/gestionCategorie.php?ng=delete/";
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
			  var nom=that.closest('tr').find('.nom').text() ;
			  var nbr=that.closest('tr').find('.nbr').text() ;
			  bootbox.dialog({
				  title:"Modifier Catégorie" ,
				  message: ' <div class="modal-body"><pre><form name="altEditor-form" role="form"><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="nom">Nom :</label></div><div class="col-sm-9 col-md-9 col-lg-9"><input type="text" id="nom" value="'+nom+'" name="nom" placeholder="nom" style="overflow:hidden" class="form-control  form-control-sm" value=""></div><div style="clear:both;"><input type="text" id="nomAncien" value="'+nom+'" name="nomAncien" hidden /></div></div><div class="form-group"><div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding-top:7px;"><label for="nbrQ">Nombre question :</label></div><div class="col-sm-9 col-md-9 col-lg-9"><input type="number" id="nbrQ" name="nbrQ" placeholder="nombre question" style="overflow:hidden" class="form-control  form-control-sm" value="'+nbr+'"></div><div style="clear:both;"></div></div>  </form></pre></div>',
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