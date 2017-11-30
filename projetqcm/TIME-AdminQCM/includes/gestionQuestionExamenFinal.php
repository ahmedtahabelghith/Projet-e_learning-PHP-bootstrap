
<?php
include("classes.php");
// connexion
include("connexionBase.php");
$a=new ConnexionBase();

$courant=$_SERVER["PHP_SELF"];


function add(){
    global $a;
    $Question=$_POST['Question'];
    $Reponse1=$_POST['Reponse1'];
    $Reponse2=$_POST['Reponse2'];
    $Reponse3=$_POST['Reponse3'];
    $Reponse4=$_POST['Reponse4'];
    $Reponse5=$_POST['Reponse5'];
    $Reponse6=$_POST['Reponse6'];
    $Reponse7=$_POST['Reponse7'];
    $Reponse8=$_POST['Reponse8'];
    $Note=$_POST['Note'];
    $Categrie=$_POST['Categrie'];



    if(isset($_POST['onof1']) && $_POST['onof1']=="on")
    { $onof1=1;}
    else{$onof1=0;}

    if(isset($_POST['onof2']) &&$_POST['onof2']=="on")
    { $onof2=1;}
    else{$onof2=0;}

    if(isset($_POST['onof3']) &&$_POST['onof3']=="on")
    { $onof3=1;}
    else{$onof3=0;}

    if(isset($_POST['onof4']) &&$_POST['onof4']=="on")
    { $onof4=1;}
    else{$onof4=0;}

    if(isset($_POST['onof5']) &&$_POST['onof5']=="on")
    { $onof5=1;}
    else{$onof5=0;}

    if(isset($_POST['onof6']) &&$_POST['onof6']=="on")
    { $onof6=1;}
    else{$onof6=0;}

    if(isset($_POST['onof7']) &&$_POST['onof7']=="on")
    { $onof7=1;}
    else{$onof7=0;}

    if(isset($_POST['onof8']) &&$_POST['onof8']=="on")
    { $onof8=1;}
    else{$onof8=0;}




        $result=question::dernierIdReponseExamenFinal($a->getConnexionBase());

        $res = question::ajoutQuestionExamenFinal($a->getConnexionBase(), $Question, $Note, $Categrie, $Reponse1,$onof1,$Reponse2,$onof2,$Reponse3,$onof3,$Reponse4,$onof4,$Reponse5,$onof5,$Reponse6,$onof6,$Reponse7,$onof7,$Reponse8,$onof8,$result+1);

   header('Location:../questionExamenFinal.php?page=ajoutQcmExamenFinal');



}


function delete(){
    global $a;
    $msg='';

    $reponse=$_POST['id'];

  $res=question::deleteReponseExamenFinal($a->getConnexionBase(),$reponse);
        if($res==1){
            echo 1;
        }
        else {
            echo "Le ligne n'est pas supprimer.";
        }


}




function edit(){
    global $a;
    $msg="";


    $idQuestion=$_POST['idQuestion'];


    $idRep1=$_POST['idRep1'];
    $reponse1=$_POST['Reponse1'];
    if(isset($_POST['onof1'])&&$_POST['onof1']=='on'){$correct1='1';}else{$correct1='0';}


    $idRep2=$_POST['idRep2'];
    $reponse2=$_POST['Reponse2'];
    if(isset($_POST['onof2'])&&$_POST['onof2']=='on'){$correct2='1';}else{$correct2='0';}

    $idRep3=$_POST['idRep3'];
    $reponse3=$_POST['Reponse3'];
    if(isset($_POST['onof3'])&&$_POST['onof3']=='on'){$correct3='1';}else{$correct3='0';}

    $idRep4=$_POST['idRep4'];
    $reponse4=$_POST['Reponse4'];
    if(isset($_POST['onof4'])&&$_POST['onof4']=='on'){$correct4='1';}else{$correct4='0';}

    $idRep5=$_POST['idRep5'];
    $reponse5=$_POST['Reponse5'];
    if(isset($_POST['onof5'])&&$_POST['onof5']=='on'){$correct5='1';}else{$correct5='0';}

    $idRep6=$_POST['idRep6'];
    $reponse6=$_POST['Reponse6'];
    if(isset($_POST['onof6'])&&$_POST['onof6']=='on'){$correct6='1';}else{$correct6='0';}

    $idRep7=$_POST['idRep7'];
    $reponse7=$_POST['Reponse7'];
    if(isset($_POST['onof7'])&&$_POST['onof7']=='on'){$correct7='1';}else{$correct7='0';}

    $idRep8=$_POST['idRep8'];
    $reponse8=$_POST['Reponse8'];
    if(isset($_POST['onof8'])&&$_POST['onof8']=='on'){$correct8='1';}else{$correct8='0';}


   $res=question::editReponseExamenFinal($a->getConnexionBase(),$idQuestion, $idRep1 , $reponse1 , $correct1 ,  $idRep2  ,$reponse2  ,$correct2 , $idRep3,$reponse3,$correct3,$idRep4,$reponse4 ,$correct4,$idRep5 ,$reponse5  ,$correct5,$idRep6 ,$reponse6  ,$correct6,$idRep7 ,$reponse7,$correct7,$idRep8 ,$reponse8  ,$correct8);
    header('Location:../questionExamenFinal.php');

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