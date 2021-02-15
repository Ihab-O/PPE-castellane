<?php
session_start();
require_once("controleur/controleur.class.php");
require_once("conf/conf.ini.php");
$unControleur = new Controleur($server, $bdd, $user, $mdp);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Auto-école Castellane</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/style.css">

</head>
<body>
<?php
if (!isset($_SESSION['email'])) //pas de connexion
{
    require_once("vue/vue_connexion.php");
}
if (isset($_POST['seconnecter'])) {
    $unUser = $unControleur->verifConnexion($_POST['email'], $_POST['mdp']);
    if ($unUser != null && isset($unUser['droits'])) {

        $_SESSION['email'] = $unUser["email"];
        $_SESSION['droits'] = $unUser["droits"];
        header("Location: index.php"); //recharge la page sur l'index.

    } else {
        echo '<br/> Verifiez vos identifiants';
    }
}

if (isset($_SESSION['email'])) {
?>
<nav class="navbar bg-dark navbar-dark">
    <ul class="navbar">
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=1">Acceuil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=2">Gestions des étudiants</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=3">Gestion des moniteurs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=4">Gestion des véhicules</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=5">Gestion des Cours</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=6">Gestion Planning</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=7">Gestion Examen</a>
        </li>
        <li class="nav-item">
            <a href="index.php?page=8">
                <img src="images/deconnexion.png" height="35" width="80">
            </a>
        </li>
    </ul>
</nav>
<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : 0;

switch ($page) {
    case  1:
        require_once("home.php");
        break;
    case  2:
        require_once("etudiant.php");
        break;
    case  3:
        require_once("moniteur.php");
        break;
    case  4:
        require_once("vehicule.php");
        break;
    case  5:
        require_once("cours.php");
        break;
    case  6:
        require_once("planning.php");
        break;
    case  7:
        require_once("examens.php");
        break;
    case  8:
        session_destroy();
        header("Location: index.php");
        break;
    default:
        require_once("home.php");
        break;
    }
}
?>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
