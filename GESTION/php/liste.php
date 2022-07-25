<?php 
include "conx.php";
$conn=returnConn();
 session_start();
if(!isset($_SESSION['name'])){
    header("Location: ../../LOGIN/login.php");
 }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../assets/liste.css">
  <link rel="stylesheet" href="../assets/msg.css" >
 <script src="../assets/alert.js"></script>
</head>
<style>

body{
   min-height: 100vh;
   background-position: center;
   background-repeat: no-repeat;
   background-size: cover;
   position: relative;
   background-image: url("../icons/loginback.gif");
}
table{
  position: absolute;
  left: 0;
  font-size: 12px;
 

}
@media only screen and (max-width: 600px){
  #myModal{
    width: 30%;
    margin: 100px auto;
  }
  #tModal{
    width: 30%;
    margin: 100px auto;
  }

}


</style>
<body>
    <section id="contenu">
    <div class="container">
<h2>Liste d'entretien</h2>
<table class="table">
   <thead>
       <tr>
           <th>id</th>
           <th>nom</th>
           <th>prenom</th>
           <th>Tel</th>
           <th>Email</th>
           <th>Poste</th>
           <th>etat</th>
           <th>date</th>
           <th>date heure</th>
           <th>CV</th>
           <th>lien LinkDin</th>
           <th>Modifier</th>
           <th>supprimer</th>
      
       </tr>
   </thead> 
   <tbody>
   <?php 
                            
$result=mysqli_query($conn,'SELECT * FROM entre');


                            while($row=mysqli_fetch_assoc($result)){
                             
        
                         ?>
                              <tr id="<?php echo $row['id'];?>">
                        
                            <td><?php echo $row['id']; ?></td>
                            <td data-target="nom"><?php echo $row['nom'] ?></td>
                            <td data-target="prenom"><?php echo $row['prenom'] ?></td>
                            <td data-target="tel"><?php echo $row['tel'] ?></td>
                            <td data-target="email"><?php echo $row['email'] ?></td>
                            <td data-target="poste"><?php echo $row['poste'] ?></td>
                            <td data-target="etat"><?php echo $row['etat'] ?></td>
                            <td data-target="date"><?php echo $row['date'] ?></td>
                            <td data-target="date_heure"><?php echo $row['date_heure']?></td>
                            <td><button class="alert-success"><a href="download.php?filename=<?php echo $name;?>&f=<?php echo $row['fname'] ?>">Telecharger</a></button></td>
                            <td data-target="lien"><a href="<?php echo $row['lien']?>">Voir le compte</a></td>

                            <td><a  href="#" data-role="update" data-id="<?php  echo $row['id']; ?>">Update</a></td>
                            <td><button  class="bou" data-role="supprimer" data-id="<?php  echo $row['id']; ?>" >supprimer</button></td>
                       
                            </tr>        
                                <?php
                              }  
                               ?>   
                             </tbody>
                                </table>

    </div>
    <div  class="Attention">
            <h2>êtes vous sûr de vouloir supprimer </h2>
        <a style="text-decoration:none ; color:red ;" class="msg" href="supprimer.php?Del=<?php echo $row['id']; ?>">oui</a>/<button class="non" onclick="non()">non<button>

            </div>
    <div style="position:fixed ; top : 3%;  right :4% ;">
<button class="btn btn-primary"><a class="lien_ajout" href="../index.php">Ajouter Entretien</a></button>
</div>  
    <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modifier</h4>
                </div>
                <div class="modal-body">
                 <div class="form-group">
                 <input type="text" class="form-control mb-2" placeholder=" NOM " id="nom" name="nom" >
                            <input type="text" class="form-control mb-2" placeholder=" PRENOM " id="prenom" name="prenom" >
                            <input type="text" class="form-control mb-2" placeholder=" TEL " id="tel" name="tel" >
                            <input type="email" class="form-control mb-2" placeholder=" EMAIL" id="email" name="email" >
                            <input type="text" class="form-control mb-2" placeholder=" POSTE" id="poste" name="poste" >
<br>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="etat" name="etat" >
                                <option value="1">En attente d'entretien</option>
                                <option value="2"> Entretien fait</option>
                                <option value="3">Accepté</option>
                                <option value="4">refusé</option>

                            </select><br>
                            <input type="date" placeholder="date" id="date" name="date" ><br>
                            <input type="text" placeholder="date-heure en H" id="date_heure" name="date_heure"><br><br>  
                           
                       
                        </div>
                    <input type="hidden" id="userId" class="form-control">    
                </div>
                <div class="modal-footer">
                    <a href="#" id="save" class="btn btn-primary pull-right" >Update</a>
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                </div>
                </div>

            </div>
            </div>

<!-- Modal -->
<div class="modal fade" id="tModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vous etes sur de supprimer ?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <input type="hidden" id="userI" class="form-control">    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button id="supp" type="button" class="btn btn-danger" >Supprimer</button>
      </div>
    </div>
  </div>
</div>
</section> 
</body>
<script>
$(document).ready(function(){
    $(document).on('click','a[data-role=update]',function(){

        var id = $(this).data('id');

        var nom = $('#'+id).children('td[data-target=nom]').text();
        var prenom = $('#'+id).children('td[data-target=prenom]').text();
        var tel = $('#'+id).children('td[data-target=tel]').text();
        var email = $('#'+id).children('td[data-target=email]').text();
        var poste = $('#'+id).children('td[data-target=poste]').text();
        var etat = $('#'+id).children('td[data-target=etat]').text();
        var date = $('#'+id).children('td[data-target=date]').text();
        var date_heure = $('#'+id).children('td[data-target=date_heure]').text();
         
         $('#nom').val(nom);
         $('#prenom').val(prenom);
         $('#tel').val(tel);
         $('#email').val(email);
         $('#poste').val(poste);
         $('#etat').val(etat);
         $('#date').val(date);
         $('#date_heure').val(date_heure);
         
         $('#userId').val(id);
         $('#myModal').modal('toggle');

    })
    
$('#save').click(function(){
     var id = $('#userId').val();
     var nom =  $('#nom').val();
     var prenom = $('#prenom').val();
     var tel = $('#tel').val();
     var email = $('#email').val();
     var poste =  $('#poste').val();
     var etat =  $('#etat').val();
     var date =  $('#date').val();
     var date_heure = $('#date_heure').val();

   $.ajax({
     url    : 'mis.php' ,
     method :'post',
     data   : {id:id, nom : nom , prenom:prenom ,tel:tel ,email:email,poste:poste , etat:etat , date:date , date_heure:date_heure},
     success: function(response){
        $('#'+id).children('td[data-target=nom]').text(nom);
        $('#'+id).children('td[data-target=prenom]').text(prenom);
        $('#'+id).children('td[data-target=tel]').text(tel);
        $('#'+id).children('td[data-target=email]').text(email);
        $('#'+id).children('td[data-target=poste]').text(poste);
        $('#'+id).children('td[data-target=etat]').text(etat);
        $('#'+id).children('td[data-target=date]').text(date);
        $('#'+id).children('td[data-target=date_heure]').text(date_heure);
        $("#myModal").modal("toggle");

     }
   });

});

});
                    
                    
                    
                    
</script>


<script>
    
$(document).ready(function(){
    $(document).on('click','button[data-role=supprimer]',function(){
        var id = $(this).data('id');

        $('#userI').val(id);
        $('#tModal').modal('toggle');


    })
    $('#supp').click(function(){
        var id = $('#userI').val();
    $.ajax({
     url    : 'supprimer.php' ,
     method :'get',
     data   : {Del:id},
     success: function(response){
        $("#tModal").modal("toggle");
        location.reload();
     }
    });

    });

    });

    
    </script>

</html>