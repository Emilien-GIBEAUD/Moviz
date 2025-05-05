<?php

use App\Entity\User;
use App\Tools\NavigationTools;

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/override-bootstrap.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <title>Moviz</title>
</head>

<body>

    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-1 mb-4 border-bottom">
            <div class="col-md-3 mb-2 mb-md-0">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <img width="120" src="./assets/images/logo-moviz.png" alt="Logo de Okaz">
                </a>
            </div>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="/" class="nav-link px-2 <?= NavigationTools::addActiveClass('page', 'home') ?>">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="/?controller=movie&action=list" class="nav-link px-2 <?= NavigationTools::addActiveClass('movie', 'list') ?>">Films</a>
                </li>
            </ul>

            <?php if (User::isAdmin()) { ?>
                <ul class="nav nav-pills">
                    <span class="text-end ms-4 me-1 my-auto text-decoration-underline"><b>Admin :</b></span>
                    <li class="nav-item">
                        <a href="/?controller=movie&action=add" class="nav-link px-2 text-center <?= NavigationTools::addActiveClass('movie', 'add') ?>">Ajouter<br>film</a>
                    </li>
                    <li class="nav-item">
                        <a href="/?controller=review&action=reviewsToValidate" class="nav-link px-2 text-center <?= NavigationTools::addActiveClass('review', 'reviewsToValidate') ?>">Valider<br>critique</a>
                    </li>
                </ul>
            <?php } ?>

            <div class="col-md-3 text-end">
                <?php if (User::isLogged()) { ?>
                    <span><b><?= $pseudo ?></b> est connecté</span>
                    <a href="/index.php?controller=auth&action=logout" class="btn btn-primary py-1">Déconnexion</a>
                <?php } else { ?>
                    <a href="/index.php?controller=auth&action=login" class="btn btn-outline-primary me-2 py-1 <?= NavigationTools::addActiveClass('auth', 'login') ?>">Connexion</a>
                    <a href="/index.php?controller=user&action=register" class="btn btn-outline-primary me-2 py-1 <?= NavigationTools::addActiveClass('user', 'register') ?>">Inscription</a>
                <?php } ?>
            </div>
        </header>

        <main>