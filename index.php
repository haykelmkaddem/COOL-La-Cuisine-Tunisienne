<!DOCTYPE html>
<html lang="en">

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

<body>

  <!-- Start your project here-->


  <!--Navbar -->
<?php include_once("includes/header.php") ?>
  <!--/.Navbar -->

  <div class="container">
    <div style="margin-top: 50px;">
      <h1 class="parag">
        Decouvrir les secrets de la cuisine tunisienne <br>
        et deguster les plats traditionnels de 24 gouvernerats avec nos chefs
      </h1>

    </div>
    
    
    <div class="row">
      <div class="col-md-2 col-sm-12" style="max-width: fit-content;margin-top: 72px;">
          <input class="form-control" type="date" style="width: 200px;" placeholder="JJ-MM-aaa" name=""><br>

        <select class="browser-default custom-select" style="width: 200px;">
          <option disabled="" selected>Choisir votre ville </option>
          <option value="1">Tunise</option>
          <option value="2">Nabeul</option>
          <option value="3">Béja</option>
        </select>
       
        <br>
        <br>
        

        <div class="container-fluid">
          <input type="radio" class="hidden" id="input1" name="inputs">
          <label class="entry" for="input1"><div class="circle"></div><div class="entry-label">salée</div></label><br>
          <input type="radio" class="hidden" id="input2" name="inputs">
          <label class="entry" for="input2"><div class="circle"></div><div class="entry-label">sucrée</div></label>
          
        
          <div class="highlight"></div>
          <div class="overlay"></div>
          <input type="submit" class="btn cool-btn button" value="Rechercher" />
        </div>
      </div>
            <div class="col-md-8 ind">

<div class="containerOuter">
  
</div>
<svg width="0" height="0" viewBox="0 0 40 140">
  <defs>
    <mask id="holes">
      <rect x="0" y="0" width="100" height="140" fill="white" />
      <circle r="12" cx="20" cy="20" fill="black"/>
      <circle r="12" cx="20" cy="70" fill="black"/>
      <circle r="12" cx="20" cy="120" fill="black"/>
    </mask>
  </defs>
</svg>



        <!--Carousel Wrapper-->
        <div id="carousel-example-1z" class="carousel slide carousel-fade"  data-ride="carousel">
          <!--Indicators-->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-1z" data-slide-to="1"></li>
            <li data-target="#carousel-example-1z" data-slide-to="2"></li>
          </ol>
          <!--/.Indicators-->
          <!--Slides-->
          <div class="carousel-inner" role="listbox">
            <!--First slide-->

            <div class="carousel-item active">
              <div>
                  <div class="row">
                    <div class="col-md-8">
                      <a href="TAJIN.php">
              <img class="d-block w-100 ind-img" src="img/image 3.jpg"
                alt="First slide"></a>
                  </div>
              <div class=" d-block w-100 col-md-4 col-sm-12">
                <h1 class="titre">TAJIN EL BAY </h1>
                <p>Kosksi Tounsi parmi les plâts le plus connu dans touts les régions du tunis.<br>Ce plat la sera preparé par le grand chef de grand tunise ‘’ELHAJ ABID” soyez pesent pour découvrir le secret de ce plât la et participer pou péparer avec les chefs dans un atelier avec un équipe.</p>

            </div>
            </div>
          </div>
          </div>
            
            <!--/First slide-->

            <!--Second slide-->
            <div class="carousel-item">
              <div >
                  <div class="row">
                    <div class="col-md-8">
            <a href="Kosksi.php">
              <img class="d-block w-100 ind-img" src="img/image 2.png"
                alt="Second slide"></a>
              
              </div>
                <div class="d-block w-100 col-md-4 col-sm-12">
                <h1 class="titre">KOUSKSI TOUNSI</h1>
                <p>Kosksi Tounsi parmi les plâts le plus connu dans touts les régions du tunis.<br>Ce plat la sera preparé par le grand chef de grand tunise ‘’ELHAJ ABID” soyez pesent pour découvrir le secret de ce plât la et participer pou péparer avec les chefs dans un atelier avec un équipe.</p>

            </div>
            </div>
          </div>
        </div>
            <!--/Second slide-->
<div class="carousel-item">
              <div>
                  <div class="row">
                    <div class="col-md-8">
              <a href="makroudh.php">
              <img class="d-block w-100 ind-img" src="img/image 1.png"
                alt="Second slide"></a>
              </div>
                <div class="d-block w-100 col-md-4 col-sm-12">
                <h1 class="titre">MAKROUDH KAROUI</h1>
                <p>Kosksi Tounsi parmi les plâts le plus connu dans touts les régions du tunis.<br>Ce plat la sera preparé par le grand chef de grand tunise ‘’ELHAJ ABID” soyez pesent pour découvrir le secret de ce plât la et participer pou péparer avec les chefs dans un atelier avec un équipe.</p>

            </div>
            </div>
          </div>
        </div>
            <!--Third slide-->


          </div>
          <!--/.Slides-->
          <!--Controls-->
          <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
          <!--/.Controls-->

        </div>
        <!--/.Carousel Wrapper-->
       
      </div>

    </div>
  </div>


<!-- Footer -->
<?php include_once("includes/footer.php") ?>
<!-- Footer -->


  <!-- End your project here-->

  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>
</body>


</html>