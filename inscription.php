<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>inscription</title>
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
</head>

<body>

  <!-- Start your project here-->


  <!-- Footer -->
<?php include_once("includes/header.php") ?>
<!-- Footer -->



<div class="container-fluid">
  <div class="row">
    

  <div  class="col-md-6 col-sm-12">
    <img src="img/foire.png" class="ins-img">
  </div>



     <div class="col-md-6 col-sm-12">
          <form class="text-center p-5" action="#!">
              <p class="h4 mb-4">Inscription</p>
                <div class="form-row mb-4">
                    <div class="col">
          <!-- First name -->
                      <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="Nom">
                    </div>
                    <div class="col">
          <!-- Last name -->
                      <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Prenom">
                    </div>
                </div>
                      <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail">
                      <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Mot de Passe" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                      <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        </small>
                      <input type="text" id="defaultRegisterPhonePassword" class="form-control" placeholder="Numero de Telephone" aria-describedby="defaultRegisterFormPhoneHelpBlock">
                      <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
                      </small>
                      <button class="btn cool-btn" type="submit">Inscrivez-vous</button>
          </form>
<!-- Default form register -->
       


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