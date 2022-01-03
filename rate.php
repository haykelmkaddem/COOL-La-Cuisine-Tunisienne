<?php
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST"):
    require_once "connect.php";

    $rating = new MySQL();
    $stars = isset($_POST['rate'])?htmlspecialchars($_POST['rate']):0;
    $idevent = isset($_POST['id'])?htmlspecialchars($_POST['id']):0;
    if($stars && $idevent):
        $id_user = $_SESSION['id'];
        if($rating->checkUniqueRate($id_user,$idevent)){
            $rating->execute("INSERT INTO avis (id_user, idevent, stars) VALUES ('".$id_user."','".$idevent."','".$stars."')");
        }else{
            $rating->execute("UPDATE avis SET stars = $stars WHERE id_user = $id_user AND idevent = $idevent");
        }
        $new_rate = $rating->getAvgRates($id_atelier);
        $rating->execute("UPDATE atelier SET avis = $new_rate WHERE idevent = $idevent");
        echo "Votre avis a ete ajouter";

    else : 
        echo "Erreurs d'avis";
    endif;
endif;