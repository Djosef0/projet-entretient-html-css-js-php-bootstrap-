<?php
include "conx.php";
$conn=returnConn();

session_start();


if(!isset($_SESSION['name'])){
    header("Location: ../../LOGIN/login.php");}

if (isset($_POST["submit"])){
  $name=$_FILES['file']['name'];
  $size=$_FILES['file']['size'];
  $type=$_FILES['file']['type'];
  $temp=$_FILES['file']['tmp_name'];
  // $caption1=$_POST['caption'];
  // $link=$_POST['link'];
  $fname = date("YmdHis").'_'.$name;
  $move =  move_uploaded_file($temp,"upload/".$fname);
 if($move){
 	echo "true";
	if($query){
	header("location:../index.php");
	}
	else{
	die();
	}
 }
          
          $id=$_POST["id"];
          $nom=$_POST["nom"];
          $prenom=$_POST["prenom"];
          $tel=$_POST["tel"];
          $email=$_POST["email"];
          $poste=$_POST["poste"];
          $etat=$_POST["etat"];
          $date=$_POST["date"];
          $date_heure=$_POST["date_heure"];
          $lien=$_POST["lien"];
   
    
    if(empty($_POST['id']) || empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['tel']) || empty($_POST['email']) || empty($_POST['poste']) || empty($_POST['etat']) || empty($_POST['date']) || empty($_POST['date_heure']) )
      {
        header("Location: ../index.php");
       
      }  

else
    {    
        $sql= insert('entre',['id','nom','prenom','tel','email','poste','etat','date','date_heure','lien','name','fname'],[$id,$nom,$prenom,$tel,$email,$poste,$etat,$date,$date_heure,$lien,$name,$fname]);
        $result=mysqli_query($conn,$sql);
          if($result){
               
                header("Location: liste.php");
               
                }  
    else {
                echo "<script>alert('il y a un eurreur')</script>";
             }  
        } 
      }            
        
?>

