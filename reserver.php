<?php include"navbar.html" ?>
<head>
 <meta charset="UTF-8">
<link rel="stylesheet" href="bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<?php
session_start();
if(!isset($_SESSION['email'])){header("location: login.php");exit;}
?>
<style>
    .table tr th, td {
		border:0px;
    padding: 2px 20px;
    max-width: 200px;
    }
    .starSilver img{
        width:3%;
    }
    .starGold img{
        color:gold;
		 width:3%;

    }
	#rate{
		margin-left:10px;
	}
</style>
<?php
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])):
$id =  $_GET['id'];
require_once "connect.php";
$reservation = new MySQL();
$results = $reservation->getData("SELECT * FROM event WHERE idevent = '".$id."'");
?>
<table class="table" style= "margin:20px;">
        <?php 
           if(isset($results)){
            foreach($results as $row){
                $cat = $reservation->getCat($row['idcat']);
                $lieu = $reservation->getLieu($row['idlieux']);

                echo "<tr ><td class='td-title'>id</td><td class='td-info'>".$row['idevent']."</td><tr>";
                echo "<tr><td class='td-title'>Nom event</td><td class='td-info'>".$row['nomevent']."</td><tr>";
                echo "<tr><td class='td-title'>Description</td><td class='td-info'>".$row['description']."</td><tr>";
                echo "<tr><td class='td-title'>Date</td><td class='td-info'>".$row['date_in']."</td><tr>";
                echo "<tr><td class='td-title'>Date</td><td class='td-info'>".$row['date_out']."</td><tr>";
                echo "<tr><td class='td-title'>Lieu</td><td class='td-info'>".$lieu."</td><tr>";
                echo "<tr><td class='td-title'>Places</td><td class='td-info'>".$row['nbrplacedispo']."</td><tr>";
						echo "<tr><td class='td-title'>Cathégorie</td><td class='td-info'>".$cat."</td><tr>";
               
                echo "<tr><td class='td-title'>Nbr de places pour reserver</td><td class='td-info'><input type='number' name='nbr_place' id='nb_places' value='1' max='".$row['nbrplacedispo']."' min='1'></td><tr>"; 
                echo "<tr><td class='td-title'>Effectur la réservation</td><td class='td-info' ><button class='btn btn-primary' id='reserver' type='button'>Reserver</button></td><tr>";

                }
            }
?>
</table>
<div class="result"></div>
<?php
else : header("location: index.php");        
endif;
?>
<script type="text/javascript">
$(document).ready(function(){
    $('#rate').on('click',function(){
       var stars = $('#avis').val();
       $.post("rate.php", {rate: stars,id: <?php echo $id;?>},function(data){
                $('.result').html(data);
            });
    });
    $('#reserver').on('click',function(){
       var places = $('#nb_places').val();
       $.post("reservation.php", {idevent: <?php echo $id;?>,nbrplacedispo: places},function(data){
                $('.result').html(data);
				setTimeout(function () {
					location.href = "profil.php";
				},4000);

            });
    });
});
</script>