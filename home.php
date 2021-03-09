<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fascinate&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./assets/css/anime.css">
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
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Account</a>
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
            <div class="recherche_p">
                <form class="form-inline my-2 my-lg-0">
                    <div class="recherche-barr">
                        <input class="recherche-input" type="search" placeholder="Recherche" aria-label="Search">
                        <a href="#" class="recherche-icone">
                            <i class="fas fa-search"></i>
                        </a>
                    </div>
                </form>
            </div>
        </header>
        <div class="stages">
            <div class="stage">
                <h2>Stage N°1</h2>
                <i class="far fa-heart"></i>
            </div>
            <div class="stage">
                <h2>Stage N°2</h2>
                <i class="far fa-heart"></i>
            </div>
        </div>
        <div class="stages">
            <div class="stage">
                <h2>Stage N°3</h2>
                <i class="far fa-heart"></i>
            </div>
            <div class="stage">
                <h2>Stage N°4</h2>
                <i class="far fa-heart"></i>
            </div>
        </div>
        <script type='text/javascript' src='./assets/vendors/jquery/jquery-ui.min.js'></script>
        <script type="text/javascript" src="./assets/js/script.js" ></script>
    </body>
</html>