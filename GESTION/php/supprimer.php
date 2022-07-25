<?php
include "conx.php";
$conn=returnConn();
session_start();


if(!isset($_SESSION['name'])){
    header("Location: ../../LOGIN/login.php");
 }

$id=$_GET["Del"];


$sql="DELETE FROM entre where id='".$id."' ";
$result=mysqli_query($conn,$sql);
if($result){

}

?>