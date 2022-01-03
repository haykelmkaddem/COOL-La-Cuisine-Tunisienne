<?php include"navbar.html" ?>
<?php
session_start();
if(isset($_SESSION["email"])){ header("location: welcome.php"); exit; }
$errors = ""; 
$has_error = ""; 
$id=isset($_GET['id'])?$_GET['id']:"erreur";
if($_SERVER["REQUEST_METHOD"] == "POST"):
    require_once "connect.php";
    $email = isset($_POST['email'])?htmlspecialchars($_POST['email']):'';
    $password = isset($_POST['password'])?htmlspecialchars($_POST['password']):'';
    
    $login = new MySQL();
    $errors = $login->check_empty(['E-mail'=>$email,'Password'=>$password]);

if(empty($errors)) if(!$login->is_email_valid($email))$errors.= "l'Email n'est pas valide<br>";
if(empty($errors)) if(!$login->isUserExist($email))$errors .= "Aucun Compte Trouver<br>";
if(empty($errors)) {
    $hashed_password = md5($password);
    if(!$login->isLoginCorrect($email,$hashed_password))$errors .= "l'E-mail ou Mot de passe ne sont pas correct";
    else{
        $_SESSION['id'] = $login->getUserId($email);
        $_SESSION['email'] = $email;
        $_SESSION['active'] = 1;
        if(isset($_POST['id_action'])) header("location: bienvenue.php?id=".$_POST['id_action']);        
        else header("location: acceuil.php");        
    }
}
if(!empty($errors)) $has_error = "has-error";
endif;
?>
 
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap.min.css">	
</head>
<style type="text/css">
	
       .footer{
		   position:fixed;
		   lef:0;
		   bottom:0;
		   height:80px;
		   width:1920px;
		   background-color:F1F2F2;
		   color:red;
		   text-align:center;
		   padding:20px;
 
 color:939598;
	   }
	   .adresse{float:left;
	   padding:20px;
		   
	   }
	 
    </style>

<body>



				
    <div class="wrapper container ">
	    <div class="row"  style= "margin:20px;" >

	 <img class="col-lg-6 col-md-8 col-sm-12 " src= "h1.jpg" /> 
        
        <form  class="col-lg-6 col-md-6 col-sm-12" action="login.php" method="post">
            <div class="form-group <?php echo $has_error;?>" >
            
                <input type="email" name="email" class="form-control" placeholder="Enter your E-mail...">
            </div>   
            <div class="form-group <?php echo $has_error;?>">
                
                <input type="password" name="password" class="form-control" placeholder="Enter your Password...">
                <input type="hidden" name="id_action" value="">
                <!-- <span class="help-block"></span> -->
            </div>
            <div class="form-group">
                 <input type="submit" class="btn btn-primary b"  value="connexion">
            </div>
            <p>Vous n'avez pas un compte? <a href="register.php">Inscrivez-Vous</a>.</p>
            <br></br>
            <span class="help-block"><?php echo $errors; ?></span>
        </form>
    </div>  
	    </div>  

   
 

 <div class="footer">
<p class="adresse">malek</p>
<p class="adresse" >marwa</p>
</div>
</body>
 
 
</html>