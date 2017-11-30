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


$res=question::lectureQuestionExamenFinal($a->getConnexionBase(),$_GET['id']);
$res1=question::lectureChoixQuestionExamenFinal($a->getConnexionBase(),$_GET['id']);

if(isset($res)&& count($res)>0){
$lig=$res;
$lig1=$res1;





?>

<form name="altEditor-form" role="form" style="margin-left: 100px;" action="includes/gestionQuestionExamenFinal.php?ng=edit/" method="post">
    <input type='text' hidden name='idQuestion' value='<?php  if(isset($lig[0]['id'])){ echo $lig[0]['id']; } ?>' />
    <input type='text' hidden name='idRep1' value='<?php  if(isset($lig1[0]['idRep'])){ echo $lig1[0]['idRep']; } ?>' />
    <input type='text' hidden name='idRep2' value='<?php  if(isset($lig1[1]['idRep'])){ echo $lig1[1]['idRep']; } ?>' />
    <input type='text' hidden name='idRep3' value='<?php  if(isset($lig1[2]['idRep'])){ echo $lig1[2]['idRep']; } ?>' />
    <input type='text' hidden name='idRep4' value='<?php  if(isset($lig1[3]['idRep'])){ echo $lig1[3]['idRep']; } ?>' />
    <input type='text' hidden name='idRep5' value='<?php  if(isset($lig1[4]['idRep'])){ echo $lig1[4]['idRep']; } ?>' />
    <input type='text' hidden name='idRep6' value='<?php  if(isset($lig1[5]['idRep'])){ echo $lig1[5]['idRep']; } ?>' />
    <input type='text' hidden name='idRep7' value='<?php  if(isset($lig1[6]['idRep'])){ echo $lig1[6]['idRep']; } ?>' />
    <input type='text' hidden name='idRep8' value='<?php  if(isset($lig1[7]['idRep'])){ echo $lig1[7]['idRep']; } ?>' />
    <table border="0">
        <tr>
            <td><label for="Question">Question :</label></td>
            <td> <textarea disabled rows='10' type="text" id="Question" name="Question"  style="overflow:hidden ;resize: vertical;" class="form-control  form-control-sm"  ><?php  if(isset($lig[0]['Questions'])){ echo $lig[0]['Questions']; } ?></textarea>
            </td>

        </tr>

        <tr>
            <td><label for="Reponse">Reponse :</label></td>
            <td> <input type="text" id="Reponse1" name="Reponse1" required placeholder="Reponse1" style="overflow:hidden" class="form-control  form-control-sm" value="<?php if(isset($lig1[0]['reponse'])){  echo $lig1[0]['reponse'];} ?>"/>
            </td>
            <td><div class="checkbox" style="margin-left: 20px;"> <label> <input type="checkbox" name="onof1" data-toggle="toggle" <?php if($lig1[0]['Correct']== true && isset($lig1[0]['Correct'])) {echo 'checked' ;} ?>></label> </div> </td>
        </tr>

        <tr>
            <td></td>
            <td> <input type="text" id="Reponse2" name="Reponse2"   placeholder="Reponse2" style="overflow:hidden" class="form-control  form-control-sm" value="<?php  if(isset($lig1[1]['reponse'])){echo $lig1[1]['reponse']; }?>"/>
            </td>
            <td><div class="checkbox" style="margin-left: 20px;"> <label> <input type="checkbox" name="onof2" data-toggle="toggle" <?php if(isset($lig1[1]['reponse'])&& $lig1[1]['Correct']== true ) {echo 'checked' ;} ?> ></label> </div> </td>
        </tr>

        <tr>
            <td></td>
            <td> <input type="text" id="Reponse3" name="Reponse3"   placeholder="Reponse3" style="overflow:hidden" class="form-control  form-control-sm" value="<?php if(isset($lig1[2]['reponse'])){ echo $lig1[2]['reponse'];} ?>"/>
            </td>
            <td><div class="checkbox" style="margin-left: 20px;"> <label> <input type="checkbox" name="onof3" data-toggle="toggle" <?php if(isset($lig1[2]['Correct']) && $lig1[2]['Correct']== true   ) {echo 'checked' ;} ?>></label> </div> </td>
        </tr>

        <tr>
            <td></td>
            <td> <input type="text" id="Reponse4" name="Reponse4"   placeholder="Reponse4" style="overflow:hidden" class="form-control  form-control-sm" value="<?php  if(isset($lig1[3]['reponse'])){echo $lig1[3]['reponse'];} ?>"/>
            </td>
            <td><div class="checkbox" style="margin-left: 20px;"> <label> <input type="checkbox" name="onof4" data-toggle="toggle" <?php if(isset($lig1[3]['Correct']) && $lig1[3]['Correct']== true  ) {echo 'checked' ;} ?>></label> </div> </td>
        </tr>

        <tr>
            <td></td>
            <td> <input type="text" id="Reponse5" name="Reponse5"   placeholder="Reponse5" style="overflow:hidden" class="form-control  form-control-sm"value="<?php if(isset($lig1[4]['reponse'])){ echo $lig1[4]['reponse']; } ?>"/>
            </td>
            <td><div class="checkbox"  style="margin-left: 20px;"> <label> <input type="checkbox" name="onof5"data-toggle="toggle" <?php if( isset($lig1[4]['Correct']) &&$lig1[4]['Correct']== true   ) {echo 'checked' ;} ?>></label> </div> </td>
        </tr>

        <tr>
            <td></td>
            <td> <input type="text" id="Reponse6" name="Reponse6"   placeholder="Reponse6" style="overflow:hidden" class="form-control  form-control-sm"value="<?php if(isset($lig1[5]['reponse'])){ echo $lig1[5]['reponse']; } ?>"/>
            </td>
            <td><div class="checkbox"  style="margin-left: 20px;"> <label> <input type="checkbox" name="onof6"data-toggle="toggle" <?php if( isset($lig1[5]['Correct']) &&$lig1[5]['Correct']== true   ) {echo 'checked' ;} ?>></label> </div> </td>
        </tr>

        <tr>
            <td></td>
            <td> <input type="text" id="Reponse7" name="Reponse7"   placeholder="Reponse7" style="overflow:hidden" class="form-control  form-control-sm"value="<?php if(isset($lig1[6]['reponse'])){ echo $lig1[6]['reponse']; } ?>"/>
            </td>
            <td><div class="checkbox"  style="margin-left: 20px;"> <label> <input type="checkbox" name="onof7"data-toggle="toggle" <?php if( isset($lig1[6]['Correct']) &&$lig1[6]['Correct']== true   ) {echo 'checked' ;} ?>></label> </div> </td>
        </tr>

        <tr>
            <td></td>
            <td> <input type="text" id="Reponse8" name="Reponse8"   placeholder="Reponse8" style="overflow:hidden" class="form-control  form-control-sm"value="<?php if(isset($lig1[7]['reponse'])){ echo $lig1[7]['reponse']; } ?>"/>
            </td>
            <td><div class="checkbox"  style="margin-left: 20px;"> <label> <input type="checkbox" name="onof8"data-toggle="toggle" <?php if( isset($lig1[7]['Correct']) &&$lig1[7]['Correct']== true   ) {echo 'checked' ;} ?>></label> </div> </td>
        </tr>
        <tr>
            <td> <label for="Note">Note :</label></td>
            <td> <input type="number" id="Note" name="Note"  style="overflow:hidden" class="form-control  form-control-sm" value="<?php  echo $lig[0]['Note'];} ?>" >
            </td>

        </tr>

        <tr>
            <td><label for="Categorie">Categorie :</label></td>
            <td><select class="form-control"  required id="Categrie" style="width: 375px;"   name="Categrie"> <?php  $resu=categorie::listCategorie($a->getConnexionBase()); $lig=$resu;   for($i=0;$i<count($lig);$i++){ ?><option value="<?php echo $lig[$i]['nom']; ?>"><?php echo $lig[$i]['nom'];  ?></option><?php }  ?></select>
            </td>

        </tr>

        <tr><td></td>
            <td><button   type="submit" style="margin-left: 150px;" class="btn btn-primary">Valider</button></td>
            <td></td>
        </tr>








    </table>


</form>

</body></html>



