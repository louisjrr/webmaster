<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Needs.com</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fascinate&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/0c87a70838.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container-fluid d-flex flex-row">
                <a class="navbar-brand" href="index.php"><img class ="logo"src="assets/images/logo.png"></a>
                <div class ="d-md-none mobile" data-toggle="collapse" data-target="#navbarResponsive">
                    <div class = 'bg-dark line1' data-toggle="collapse" data-target="#navbarResponsive"></div>
                    <div class = 'bg-dark line2' data-toggle="collapse" data-target="#navbarResponsive"></div>
                    <div class = 'bg-dark line3' data-toggle="collapse" data-target="#navbarResponsive"></div>
                </div>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="account.php">Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Avis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <h2>My Profil</h2>
                </div> 
            </div>
        </div>
    </header>

    <p><a href="register.php">Create a account</a></p>
    <script type='text/javascript' src='./assets/vendors/jquery/jquery-ui.min.js'></script>
    <script type="text/javascript" src="./assets/js/script.js" ></script>
</body>