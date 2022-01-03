<?php include"navbar.html" ?>
<html lang="en">
<head>
<link rel="stylesheet" href="bootstrap.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
  

</head>
<body>
<div class="wrapper container ">
	    <div class="row" style= "margin:20px;">


<div  class=" col-md-8 ">
    <div class="search-box form-group  ">
        <form action="" name="f" method="GET">

        <input type="date"  class="form-control input" name="date_in" id="date-d">
        <input type="date"  class="form-control input" name="date_out" id="date-f">


        <ul>
		
        <?php 
        require_once "connect.php";
        $search = new MySQL();
        $rows = $search->getData("SELECT * FROM categorie LIMIT 6");
        foreach($rows as $row){
            ?>

        <li><input type="radio" name="cat[]" value="<?php echo $row['idcat']?>"/> <?php echo $row['nomcat']?></li>
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
        
        <input type="submit" class="btn btn-primary button" value="Search" />
		
    </div>
            </form>
            </div>
    <br>
    <br>
    <br>
    <br>
    <div class="col-md-8">
        <div class="result">
        <?php
if($_SERVER["REQUEST_METHOD"] == "GET"):
    $cat = isset($_GET['cat'])?$_GET['cat']:'';
    $lieu = isset($_GET['lieu'])?$_GET['lieu']:'';
    $date_in = isset($_GET['date_in'])?$_GET['date_in']:'';
    $date_out = isset($_GET['date_out'])?$_GET['date_out']:'';
?>
<table class="table table-hover ">
        <tr>  <th> Nom evenement </th> <th> Description </th> <th> Date debut </th>  <th> Date fin </th> <th> Lieu </th> <th> Places </th> <th> Catégorie </th> <th> Avis </th><th>  </th></tr>
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
            if(!empty($date_out)&&!empty($date_in))$sub = "WHERE ".$query." AND `date_in` >= '".$date_in."' AND  `date_out` <= '".$date_out."'";
            else if(!empty($date_in)) $sub = "WHERE ".$query." AND `date_in` >= '".$date_in."'";
            else if(!empty($date_out)) $sub = "WHERE ".$query." AND `date_out` <= '".$date_out."'";

        }
        else if(!empty($date_out)&&!empty($date_in))$sub = "WHERE `date_in` >= '".$date_in."' AND  `date_out` <= '".$date_out."'";
        else if(!empty($date_in))$sub = "WHERE `date_in` >= '".$date_in."'";
        else if(!empty($date_out))$sub = "WHERE `date_out` <= '".$date_out."'";





       
       

$results = $search->getData("SELECT * FROM event ".$sub);
session_start();
$active = isset($_SESSION['active'])?'':'0';
           if(isset($results)){
            foreach($results as $row){
                $cat = $search->getCat($row['idcat']);
                $lieu = $search->getLieu($row['idlieux']);
                echo "<tr><td>".$row['nomevent']."</td><td>".$row['description']."</td><td>".$row['date_in']."</td><td>".$row['date_out']."</td><td>".$lieu."</td><td>".$row['nbrplacedispo']."</td><td>".$cat."</td><td>".$row['avis']."</td><td><a  class='btn btn-warning'   href='reserver$active.php?id=".$row['idevent']."'>Afficher</a></td></tr>";
            }

        }
        

        endif;
        ?>
</table>
        </div>
        </div>


        </div>
        </div>
  <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
	</div>
	</div>
</body>

</html>