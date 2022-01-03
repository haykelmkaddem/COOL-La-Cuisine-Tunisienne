<?php include"navbar.html" ?>

<?php
session_start();
if(isset($_SESSION["email"])){ header("location: welcome.php"); exit; }
$errors = ""; 
$has_error = ""; 
if($_SERVER["REQUEST_METHOD"] == "POST"):
    require_once "connect.php";
    $nom = isset($_POST['nom'])?htmlspecialchars($_POST['nom']):'';
    $prenom = isset($_POST['prenom'])?htmlspecialchars($_POST['prenom']):'';
    $email = isset($_POST['email'])?htmlspecialchars($_POST['email']):'';
    $password = isset($_POST['password'])?htmlspecialchars($_POST['password']):'';
    $re_password = isset($_POST['re_password'])?htmlspecialchars($_POST['re_password']):'';
    
    $register = new MySQL();
    $errors = $register->check_empty(['E-mail'=>$email,'Password'=>$password,'Repeated Password'=>$re_password,'Nom'=>$prenom,'Prenom'=>$prenom]);

if(empty($errors)) if(!$register->is_email_valid($email))$errors.= "l'Email n'est pas valide<br>";
if(empty($errors)) if($register->isUserExist($email))$errors .= "Le compte est déjà enregisté<br>";
if(empty($errors)) if($password != $re_password)$errors .= "Les deux mots de passe ne sont pas identiques<br>";
if(empty($errors)) if(strlen($password) < 6)$errors .= "Le mot de passe doit etre supérieur égale a 6 caractères<br>";
if(empty($errors)) {
    $hashed_password = md5($password);
    if(!$register->execute("INSERT INTO user (email,nom,prenom,password) VALUES ('$email','$nom','$prenom','$hashed_password')"))$errors .= "Erreur de création de compte";
    else{
        $_SESSION['id'] = $register->getUserId($email);
        $_SESSION['email'] = $email;
        $_SESSION['active'] = 1;
        header("location: welcome.php");        
    }
}
if(!empty($errors)) $has_error = "has-error";
endif;
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <style type="text/css">
	img{
		width:auto;
		
	}
       
    </style>
</head>
<body>

				
    <div class="wrapper container">
	<div class="row " style="margin:20px;">
		 <img class="col-lg-6 col-md-8 col-sm-12 " src= "h2.jpg" />
       
        
        <form class="col-lg-6 col-md-6 col-sm-12  "  action="register.php" method="post">

             <div class="form-group <?php echo $has_error;?>">
               
                <input type="text" name="nom" class="form-control"  placeholder="Votre Nom">
                </div>
				<div class="form-group <?php echo $has_error;?>">
                
                <input type="text" name="prenom" class="form-control"  placeholder="Votre Prénom">
                
                
            </div>    

            <div class="form-group <?php echo $has_error;?>">
                
                <input type="email" name="email" class="form-control" placeholder="Enter your E-mail">
            </div>    

            <div class="form-group <?php echo $has_error;?>">
                
                <input type="password" name="password" class="form-control" placeholder="Enter your password">
            </div>
            <div class="form-group <?php echo $has_error;?>">
                
                <input type="password" name="re_password" class="form-control" placeholder="Repeat your password">
            </div>
           

            <div class="form-group <?php echo $has_error;?>">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Vous n'avez pas un compte?   <a href="login.php">Inscrivez-Vous </a>.</p><br>
            <span class="help-block"><?php echo $errors; ?></span>

        </form>
    </div>    
</body>

</html>
        