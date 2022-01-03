
<!DOCTYPE html>

   
   


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>acceuil</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/logo.png" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">
  <script defer src="https://friconix.com/cdn/friconix.js"> </script>
</head>

</head>
<body>
<?php include_once("includes/header.php") ?>
<?php

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])):
$id =  $_GET['id'];
require_once "connect.php";
$reservation = new MySQL();
$results = $reservation->getData("SELECT * FROM event WHERE idevent = '".$id."'");
?>

<div class="container reserv-cont">
    <div class="row">
        <div class="col-md-2">
            
        </div>
        <div class="col-md-8">
            <table class="table">
        <?php 
           if(isset($results)){
            foreach($results as $row){
                $cat = $reservation->getCat($row['idevent']);
                $lieu = $reservation->getLieu($row['idlieux']);
                
                echo "<tr ><td class='td-title'>id</td><td class='td-info'>".$row['idevent']."</td><tr>";
                echo "<tr><td class='td-title'>Nom event</td><td class='td-info'>".$row['nomevent']."</td><tr>";
                echo "<tr><td class='td-title'>Description</td><td class='td-info'>".$row['description']."</td><tr>";
                echo "<tr><td class='td-title'>Date Debut</td><td class='td-info'>".$row['date_in']."</td><tr>";
                echo "<tr><td class='td-title'>Date Fin</td><td class='td-info'>".$row['date_out']."</td><tr>";
                echo "<tr><td class='td-title'>Lieu</td><td class='td-info'>".$lieu."</td><tr>";
                echo "<tr><td class='td-title'>Places</td><td class='td-info'>".$row['nbrplacedispo']."</td><tr>";
                echo "<tr><td class='td-title'>Cathégorie</td><td class='td-info'>".$cat."</td><tr>";
                echo "<tr><td class='td-title'>Donnez votre avis</td><td class='td-info'>";
                for($i=0;$i<5;$i++){
                    if($i<$row['avis']) echo "<span data-rate='".($i+1)."' class='star starGold'><img src='image/gold.png'>  </span>";
                    else echo "<span data-rate='".($i+1)."' class='star starSilver'><img src='image/grey.png'>  </span>";
                };
                echo "<input id='avis' type='number' min=1 max=5 value='5'/> <button class='btn btn-warning'  id='rate' type='button'>voter</button></td><tr>";
                echo "<tr><td class='td-title'>Nbr de places pour reserver</td><td class='td-info'><input type='number' name='nbr_place' id='nb_places' value='1' max='".$row['nbrplacedispo']."' min='1'></td><tr>"; 
                echo "<tr><td class='td-title'>Effectur la réservation</td><td class='td-info' ><button class='btn cool-btn' id='reserver' type='button'>Reserver</button></td><tr>";

                }
            }
?>
</table>
        </div>
        <div class="col-md-2">
            
        </div>
    </div>
</div>

<div class="result"></div>

<?php include_once("includes/footer.php") ?>
<?php
else : header("location: index.php");        
endif;
?>
<script type="text/javascript">
$(document).ready(function(){
    $("#reserver").click(function(){
        location.href = "login.php?id=<?php echo $_GET['id']?>";
    });
});
</script>
</body>