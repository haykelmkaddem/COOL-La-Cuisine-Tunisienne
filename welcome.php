<?php include"navbar.html" ?>
<?php
session_start();
if(!isset($_SESSION['email'])){header("location: index.php");exit;}


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["email"]); ?></b>. Bienvenue.</h1>
    </div>
	
	
<?php



?>
	
	
	
	
	
	
	
    <p><a href="index.php" class="btn btn-success">Recherchez un evenement</a>
        <a href="logout.php" class="btn btn-danger">Déconnexion</a>
    </p>
</body>
</html>