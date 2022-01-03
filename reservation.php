<?php
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST"):
    require_once "connect.php";

    $reservation = new MySQL();
    $idevent = isset($_POST['idevent'])?htmlspecialchars($_POST['idevent']):0;
    $places = isset($_POST['nbrplacedispo'])?htmlspecialchars($_POST['nbrplacedispo']):0;
if($idevent && $places && $reservation->getPlaces($idevent)>0):
        $id_user = $_SESSION['id'];
        $reservation->execute("INSERT INTO reservation (id_user, idevent, nbr_places) VALUES ('".$id_user."','".$idevent."','".$places."')");
        $reste_places = $reservation->getPlaces($idevent) - $places;
        
        $reservation->execute("UPDATE event SET nbrplacedispo = $reste_places WHERE idevent = $idevent");
        echo "La reservation effectuer";
    else :
        echo "Erreurs de reservation";
    endif;
endif;
?>