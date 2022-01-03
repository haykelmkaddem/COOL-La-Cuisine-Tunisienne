<style>
    .table{
        text-align:center;
        margin-top: 0;

    }
    .table tr th, td {
  
    max-width: 200px;

    padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
</style>
<?php
session_start();
if(!isset($_SESSION['email'])){header("location: login.php");exit;}



?>
<h4>Historique des activitées</h4>

<table class="table table-hover ">
        <tr>  <th> date de reservaion </th> <th> Nom evenement </th> <th> nombre de place </th>  <th> votre avis </th></tr>
        <?php 
require_once "connect.php";
$log = new MySQL();        
        
$id_user =  $_SESSION['id'];

$logs = $log->getData("SELECT * FROM reservation WHERE id_user = ".$id_user);
//var_dump($logs);exit();
            foreach($logs as $row){
                $nom = $log->getNomevent($row['idevent']);
                $avis = $log->checkUniqueRate($id_user,$row['idevent']);
				$avis = (isset($avis['stars'])) ? $avis['stars'] : "N/A";
                echo "<tr><td>".$row['date']."</td><td>".$nom."</td><td>".$row['nbr_places']."</td><td>".$avis."</td><td><button type='button'>Annuler</button></td></tr>";
            }



?>
</table>






