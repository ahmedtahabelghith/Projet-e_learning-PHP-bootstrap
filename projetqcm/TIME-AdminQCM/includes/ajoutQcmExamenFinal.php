<?php

if($_SESSION['con'] != 'true')
    echo "<script type='text/javascript'>window.location='../index.php';</script>";

$_SESSION['newTry'] = 1;
?>
 <html><head>




     <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
     <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
     <style>
         td{width: 100px;}
         tr{height: 50px;}

     </style>
 </head>

<body>
<?php
include("includes/classes.php");
// connexion
include("includes/connexionBase.php");
$a=new ConnexionBase();

$courant=$_SERVER["PHP_SELF"];
?>


 <form name="altEditor-form" role="form" style="margin-left: 100px;" action="includes/gestionQuestionExamenFinal.php?ng=add/" method="post">
<table border="0">
    <tr>
        <td><label for="Question">Question :</label></td>
        <td> <textarea rows="10 "   type="text" id="Question" name="Question"   placeholder="Question" style="overflow:hidden;resize:none; " class="form-control  form-control-sm" value=""></textarea>
        </td>

    </tr>

    <tr>
        <td><label for="Reponse">Reponse :</label></td>
        <td> <input type="text" id="Reponse1" name="Reponse1" required placeholder="Reponse1" style="overflow:hidden" class="form-control  form-control-sm" value=""/>
        </td>
        <td><div class="checkbox" style="margin-left: 20px;"> <label> <input type="checkbox" name="onof1" data-toggle="toggle"></label> </div> </td>
    </tr>

    <tr>
        <td></td>
        <td> <input type="text" id="Reponse2" name="Reponse2"   placeholder="Reponse2" style="overflow:hidden" class="form-control  form-control-sm" value=""/>
        </td>
        <td><div class="checkbox" style="margin-left: 20px;"> <label> <input type="checkbox" name="onof2" data-toggle="toggle"></label> </div> </td>
    </tr>

    <tr>
        <td></td>
        <td> <input type="text" id="Reponse3" name="Reponse3"   placeholder="Reponse3" style="overflow:hidden" class="form-control  form-control-sm" value=""/>
        </td>
        <td><div class="checkbox" style="margin-left: 20px;"> <label> <input type="checkbox" name="onof3" data-toggle="toggle"></label> </div> </td>
    </tr>

    <tr>
        <td></td>
        <td> <input type="text" id="Reponse4" name="Reponse4"   placeholder="Reponse4" style="overflow:hidden" class="form-control  form-control-sm" value=""/>
        </td>
        <td><div class="checkbox" style="margin-left: 20px;"> <label> <input type="checkbox" name="onof4" data-toggle="toggle"></label> </div> </td>
    </tr>

    <tr>
        <td></td>
        <td> <input type="text" id="Reponse5" name="Reponse5"   placeholder="Reponse5" style="overflow:hidden" class="form-control  form-control-sm" value=""/>
        </td>
        <td><div class="checkbox"  style="margin-left: 20px;"> <label> <input type="checkbox" name="onof5"data-toggle="toggle"></label> </div> </td>
    </tr>

    <tr>
        <td></td>
        <td> <input type="text" id="Reponse6" name="Reponse6"   placeholder="Reponse6" style="overflow:hidden" class="form-control  form-control-sm" value=""/>
        </td>
        <td><div class="checkbox"  style="margin-left: 20px;"> <label> <input type="checkbox" name="onof6"data-toggle="toggle"></label> </div> </td>
    </tr>

    <tr>
        <td></td>
        <td> <input type="text" id="Reponse7" name="Reponse7"   placeholder="Reponse7" style="overflow:hidden" class="form-control  form-control-sm" value=""/>
        </td>
        <td><div class="checkbox"  style="margin-left: 20px;"> <label> <input type="checkbox" name="onof7"data-toggle="toggle"></label> </div> </td>
    </tr>

    <tr>
        <td></td>
        <td> <input type="text" id="Reponse8" name="Reponse8"   placeholder="Reponse8" style="overflow:hidden" class="form-control  form-control-sm" value=""/>
        </td>
        <td><div class="checkbox"  style="margin-left: 20px;"> <label> <input type="checkbox" name="onof8"data-toggle="toggle"></label> </div> </td>
    </tr>
    <tr>
        <td> <label for="Note">Note :</label></td>
        <td> <input type="number" id="Note" name="Note" required placeholder="Note" style="overflow:hidden" class="form-control  form-control-sm" value="">
        </td>

    </tr>

    <tr>
        <td><label for="Categorie">Categorie :</label></td>
        <td><select class="form-control" required id="Categrie" style="width: 375px;"   name="Categrie"> <?php  $resu=categorie::listCategorie($a->getConnexionBase()); $lig=$resu;   for($i=0;$i<count($lig);$i++){ ?><option value="<?php echo $lig[$i]['nom']; ?>"><?php echo $lig[$i]['nom'];  ?></option><?php }  ?></select>
        </td>

    </tr>

    <tr><td></td>
        <td><button   type="submit" style="margin-left: 150px;" class="btn btn-primary">Valider</button></td>
        <td></td>
    </tr>























</table>


    </form>

</body></html>



