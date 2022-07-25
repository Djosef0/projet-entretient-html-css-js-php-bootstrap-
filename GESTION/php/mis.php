<?php
include "conx.php";
$conn=returnConn();
 session_start();
if(!isset($_SESSION['name'])){
    header("Location: ../../LOGIN/login.php");
 }
 else{
if(isset($_POST['email'])){
    $id=$_POST['id'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $tel=$_POST['tel'];
    $email=$_POST['email'];
    $poste=$_POST['poste'];
    $etat=$_POST['etat'];
    $date=$_POST['date'];
    $date_heure=$_POST['date_heure'];



$query=" UPDATE entre set  nom='".$nom."' ,prenom= '".$prenom."' , tel='".$tel."', email='".$email."',poste='".$poste."', etat='".$etat."', date='".$date."',date_heure='".$date_heure."' Where id='".$id."' ";
$result=mysqli_query($conn,$query);

if($result){
    echo ' Data Updated !';
}
 }
}

?>
