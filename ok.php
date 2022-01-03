<!DOCTYPE html>
<?php
// session_start();
// if(!isset($_SESSION['email'])){header("location: login.php");exit;}
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PHP Live MySQL Database Search</title>
<style type="text/css">
    body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    /* .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    } */
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    .table{
        text-align:center;
        /* border: 2px solid ; */
    }
    /* Formatting result items */
    /* .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    } */
    .table tr th, td {
    padding: 2px 20px;
    max-width: 200px;
    box-shadow: 0px 1px 2px black;}
    .search-box{
  width: 40%
}
.search-box label{
  font-size: 24px;
  font-weight:bold;
}
#search-option{
    height: 40px;

text-align: center;

font-size: 24px;
}
#term,#date{
    height: 40px;

font-size: 24px;

margin: 50px 0;
}
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<body>
    <div class="search-box">
        <form action="" name="f" method="GET">
        <ul>
        <?php 
        require_once "connect.php";
        $search = new MySQL();
        $rows = $search->getData("SELECT * FROM categorie LIMIT 6");
        foreach($rows as $row){
            ?>

        <li><input type="checkbox" name="cat[]" value="<?php echo $row['idcat']?>"/> <?php echo $row['nomcat']?></li>
        <?php } ?>
        </ul>
        <ul>
        <?php 
        $rows = $search->getData("SELECT * FROM lieux");
        foreach($rows as $row){
            ?>

        <li><input type="checkbox" name="lieu[]" value="<?php echo $row['idlieux']?>"/> <?php echo $row['nom']?></li>
        <?php } ?>
        </ul>
        <input type="date" name="date_in" id="date-d">
        <input type="date" name="date_out" id="date-f">
        <input type="submit" value="Search" />
    </div>
            </form>
    <br>
    <br>
    <br>
    <br>
        <div class="result">
        <?php
if($_SERVER["REQUEST_METHOD"] == "GET"):
    $cat = isset($_GET['cat'])?$_GET['cat']:'';
    $lieu = isset($_GET['lieu'])?$_GET['lieu']:'';
    $date_in = isset($_GET['date_in'])?$_GET['date_in']:'';
    $date_out = isset($_GET['date_out'])?$_GET['date_out']:'';
?>
<table class="table">
        <tr> <th> #id </th> <th> Nom Atelier </th> <th> Description </th> <th> Date </th> <th> Lieu </th> <th> Places </th> <th> Cathégorie </th> <th> Avis </th><th> Action </th></tr>
        <?php 
        $q = '    ';
        if(!empty($cat)){
            foreach($cat as $c){
                $q.="idcat = ".$c." AND ";
            }
        }
        if(!empty($lieu)){
            foreach($lieu as $l){
                $q.="idlieux = ".$l." AND ";
            }
        }
        $query = substr($q, 0, -4);
        $sub = '';
        if(strlen($query)>4){
            $sub = "WHERE ".$query;
            if(!empty($date_out)&&!empty($date_in))$sub = "WHERE ".$query." AND `date` BETWEEN '".$date_in."' AND '".$date_out."'";
        }else if(!empty($date_out)&&!empty($date_in))$sub = "WHERE `date` BETWEEN '".$date_in."' AND '".$date_out."'";
       
        echo "SELECT * FROM atelier ".$sub;

$results = $search->getData("SELECT * FROM atelier ".$sub);
$active = isset($_GET['active'])?'':'0';
           if(isset($results)){
            foreach($results as $row){
                $cat = $search->getCat($row['idcat']);
                $lieu = $search->getLieu($row['idlieux']);
                echo "<tr><td>".$row['idat']."</td><td>".$row['nomat']."</td><td>".$row['description']."</td><td>".$row['date']."</td><td>".$lieu."</td><td>".$row['nbrplacedispo']."</td><td>".$cat."</td><td>".$row['avis']."</td><td><a href='reserver$active.php?id=".$row['idat']."'>Afficher</a></td></tr>";
            }

        }
        

        endif;
        ?>
</table>
        </div>

</body>
</html>