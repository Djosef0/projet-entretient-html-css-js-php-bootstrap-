
<?php
session_start();

// if(isset($_SESSION(['nom']))){
//     header("Location: index.php");
// }session_start();

if(!isset($_SESSION['name'])){
    header("Location: ../LOGIN/login.php");
 }

?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <script src="assets/index.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="assets/alert.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<link rel="stylesheet" href="assets/msg.css"> 
<link rel="stylesheet" href="assets/affiche.css">
<title>Registration Form</title>
</head>
<body class="bg-dark">
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
    Menu
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
    <li><legend>Menu</legend></li>
    <li ><a class="autre" href="php/liste.php">La Liste</a>
    <li ><a class="deco" href="php/dec.php">Deconnexion</a></li>
  </ul>
</div>

    
 <h2><span>Admin </span><?php  echo $_SESSION["name"]; ?></h2>
          <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class=" text-black text-center "> Ajouter entretient</h3>
                        </div>
                        <div class="card-body">
                        <div id="warning" class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>ATTENTION!</strong> Les champs sont obligatoire !
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
                       
                            <form action="php/insert.php" method="post">
                               
                                <input type="text" class="form-control mb-2" placeholder=" ID " name="id">  
                                <input type="text" class="form-control mb-2" placeholder=" NOM " name="nom">
                                <input type="text" class="form-control mb-2" placeholder=" PRENOM " name="prenom">
                                <div class="alert" style="display:none" role="alert"  >
  <strong>ATTENTION!</strong> Le numero du telephone doit 8 nombres !
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"  ></button>
</div>
            
                                <input type="text" class="form-control mb-2" placeholder=" TEL " name="tel" id="tel">
                                <input type="email" class="form-control mb-2" placeholder=" EMAIL " name="email">
                                <input type="text" class="form-control mb-2" placeholder=" POSTE " name="poste">
                             <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="etat">
                                <option value="En attente d'entretien">En attente d'entretien</option>
                                <option value="Entretien fait"> Entretien fait</option>
                                <option value="Accepté">Accepté</option>
                                <option value="refusé">refusé</option>

                             </select><br>
<!-- ANGULAR -->
<!-- <div ng-app="myApp" ng-controller="myCtrl"> -->
<input  ng-model="date" name="date" type="date" value="<?php echo Date('Y-m-d',time()) ?>"><br><br>
<input class="date_heure" type="time"  name="date_heure" value="<?php echo Date('H:i',time()) ?>"  ><br><br>
<input type="texte" placeholder="Saisir votre lien de LinkDin" name="lien"><br>
<label>Upload fichier</label><br>
<input type="file" name="file" id="file" class="panel-control" />
<br><br>





<!-- </div> -->
<!-- <script>
    var app = angular.module('myApp', []);
    app.controller('myCtrl', function($scope) {
    $scope.date =  "<?php echo Date('H:i',time()) ?>";  
 });
</script> -->



                            <button class="btn btn-primary" name="submit" >Submit</button>
                                
                          </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    
</body>
</html>
