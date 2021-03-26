<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Needs.com</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fascinate&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./assets/css/animation.css">
    <script src="https://kit.fontawesome.com/0c87a70838.js"></script>
</head>

<body class="bodyConnexion">
    <div class="shadow"></div>
    <div class="present">
        <h1 class="titreAccueil">Needs.com</h1>
        <h2 class="slogan">Le site N°1 de recherche de stages</h2>
        <div class="compte">
            <form class="formInscription" method="POST" action="Saving">
                <i class="fas fa-arrow-left btnBack"></i>
                <fieldset>
                    <legend>Register</legend>
                    <section class='pageInscription'>
                        <div>
                            <label for='permission' class="labelPermission">Choose the permission</label><br>
                            <select id='permission' name='role'>
                                <option value='student' class='optionStudent'>student</option>
                                <option value='delegate' class='optionDelegate'>delegate</option>
                                <option value='tutor' class='optionPilote'>tutor</option>
                                <option value='admin' class='optionAdmin'>admin</option>
                            </select><br>
                            <input type="text" placeholder='First name' class='textBox' name='Fname'><br>
                            <input type="text" placeholder='Last name' class='textBox' name='Lname'><br>
                            <input type="date" placeholder='Birthdate' class='textBox' name='birthdate'><br>
                            <input type="text" placeholder='city' class='textBox' name='city'><br>
                            <input type="Email" placeholder='Email' class='textBox' name='mail'><br>
                            <input type="password" placeholder='Password' class='textBox' name='password'><br>
                            <select id='centres' name='campus'>
                                <option value="1">Rouen</option>
                                <option value="2">Nanterre</option>
                                <option value="3">Arras</option>
                                <option value="4">Caen</option>
                                <option value="5">Bordeaux</option>
                                <option value="6">Lyon</option>
                                <option value="7">Toulouse</option>
                                <option value="8">Orléans</option>
                                <option value="9">Lille</option>
                                <option value="10">Brest</option>
                                <option value="11">Saint-Nazaire</option>
                                <option value="12">Le Mans</option>
                                <option value="13">Reims</option>
                                <option value="14">Nancy</option>
                                <option value="15">Strasbourg</option>
                                <option value="16">Dijon</option>
                                <option value="17">Grenoble</option>
                                <option value="18">Nice</option>
                                <option value="19">Aix-en-Provence</option>
                                <option value="20">Montpelier</option>
                                <option value="21">Pau</option>
                                <option value="22">Angoulême</option>
                                <option value="23">La Rochelle</option>
                                <option value="24">Châteauroux</option>
                                <option value="25">Nantes</option>
                            </select>
                            <label></label>
                            <select id='promotion' name='promotion'>
                                <option value="1">A1</option>
                                <option value="2">A2</option>
                                <option value="A3">A3</option>
                                <option value="A4">A4</option>
                                <option value="A5">A5</option>
                            </select></br></br>
                        </div>
                        <div class="block">
                            <h3>Delegate permission :</h3>
                            <hr>
                            <div class="checkbox">
                                <label>SFx2</label>
                                <input type="checkbox" name="SFx2">
                                <label>SFx3</label>
                                <input type="checkbox" name="SFx3">
                                <label>SFx4</label>
                                <input type="checkbox" name="SFx'">
                                <label>SFx5</label>
                                <input type="checkbox" name="SFx5">
                                <label>SFx6</label>
                                <input type="checkbox" name="SFx6"></br>
                                <label>SFx7</label>
                                <input type="checkbox" name="SFx7">
                                <label>SFx8</label>
                                <input type="checkbox" name="SFx8">
                                <label>SFx9</label>
                                <input type="checkbox" name="SFx9">
                                <label>SFx10</label>
                                <input type="checkbox" name="SFx10">
                                <label>SFx11</label>
                                <input type="checkbox" name="SFx11"></br>
                                <label>SFx12</label>
                                <input type="checkbox" name="SFx12">
                                <label>SFx13</label>
                                <input type="checkbox" name="SFx13">
                                <label>SFx14</label>
                                <input type="checkbox" name="SFx14">
                                <label>SFx15</label>
                                <input type="checkbox" name="SFx15">
                                <label>SFx16</label>
                                <input type="checkbox" name="SFx16"></br>
                                <label>SFx17</label>
                                <input type="checkbox" name="SFx17">
                                <label>SFx18</label>
                                <input type="checkbox" name="SFx18">
                                <label>SFx19</label>
                                <input type="checkbox" name="SFx19">
                                <label>SFx20</label>
                                <input type="checkbox" name="SFx20">
                                <label>SFx22</label>
                                <input type="checkbox" name="SFx22"></br>
                                <label>SFx23</label>
                                <input type="checkbox" name="SFx23">
                                <label>SFx24</label>
                                <input type="checkbox" name="SFx24">
                                <label>SFx25</label>
                                <input type="checkbox" name="SFx25">
                                <label>SFx26</label>
                                <input type="checkbox" name="SFx26">
                                <label>SFx32</label>
                                <input type="checkbox" name="SFx32"></br>
                                <label>SFx33</label>
                                <input type="checkbox" name="SFx33">
                            </div>
                        </div>
                    </section>

                    <button type="submit" name="submit" class="btn btn-outline-light btn-lg btnInscription">Register</button>
                </fieldset>
            </form><br>
            
        </div>
    </div>
    <script type='text/javascript' src='./assets/vendors/jquery/jquery-ui.min.js'></script>
    <script type="text/javascript" src="./assets/js/script.js" ></script>
    <?php
        if($_SESSION['role'] == "Pilote"){
            echo "<script type='text/javascript' src='./assets/js/pilote.js' ></script>";
        }
    ?>
</body>
</html>