<?php
include '../GESTION/php/conx.php';
$conn=returnConn();

error_reporting(0);

session_start();
if(isset($_SESSION['name'])){
    header("Location: login.php");
 }

if(isset($_POST["submit"])){
 $name=$_POST['name'];                                           
 $email=$_POST['email'];                                           
 $password=md5($_POST['password']);                                           
 $cpassword=md5($_POST['cpassword']);     
 
    if(($password==$cpassword) && strlen($password) ){
        $sql="SELECT * FROM users WHERE email='$email' ";
        $result=mysqli_query($conn,$sql);
        
     if(!mysqli_num_rows($result)>0){
    
    $sql=insert('users',['name','email','password'],[$name,$email,$password]);
                $result=mysqli_query($conn,$sql);
                if($result){
            echo"<script>alert('User registre! ')</script>";
            $name="";
            $email="";
            $_POST['password'];
            $_POST['cpassword'];
        }
        else {
            echo"<script>alert('Erreur ! ')</script>";
        }
     
    
     } else{
        echo"<script>alert('Email Deja Exist')</script>";
    }
 }
    else {
    echo"<script>alert(' Taille doit au minimum de 8 caractere !')</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="../GESTION/assets/media.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link  rel="stylesheet" href="../GESTION/assets/login.css">
    <title>Registre</title>
</head>
<style>
   @media screen and (max-width: 600px){
       form{
           width:80%;
           height: 400px;
       }
        
    }
    </style>
<body>
<section style="background-size:cover ; min-height: 100vh ; background-repeat: no-repeat ; background-image:url('../GESTION/icons/loginback.gif') ; background-position:center;">
    <div class="container">
     <form class="bg-light"  action="" method="POST">
      <p class="login-text" style="font-size:2rem ; font-weight:800;">Registre</p>
      <div class="input-group">
          <input type="text" placeholder="UserName" name="name" value="<?php echo $name ?>" required>
      </div>
      <div class="input-group">
          <input type="email" placeholder="Email" name="email" value="<?php echo $email ?>" required>
      </div>
      <div class="input-group">
          <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password'] ?>" required>
      </div> 
      <div class="input-group">
          <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']?>" required>
      </div>
      <div class="input-group">
         <button class="btn-primary" name="submit">Registre</button>
      </div>
      <p class="login-registre-text">Tu as un compte ?<a href="login.php">Inscri Ici</a></p>
     </form>

    </div>
</section>
</body>
</html>