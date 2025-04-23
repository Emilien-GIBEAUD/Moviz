<?php 
require_once _ROOTPATH_ . '/templates/header.php'; 
use App\Entity\User;
?>

<h1>Bienvenue sur la page d'accueil du projet
    <?php if (User::isLogged()) { ?>
        <?=$pseudo?>
    <?php }?>
</h1>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>