<?php
require_once _ROOTPATH_ . '/templates/header.php';

?>

<div class="row">
    <?php foreach ($movies as $movie) { ?>
        <div class="col-md-4 my-2">
            <div class="card w-100">
                <img src="<?= $movie->getImagePath(); ?>" class="card-img-top w-50 h-auto mx-auto mt-1 rounded-2" alt="<?= $movie->getTitle(); ?>">
                <div class="card-body text-center py-2">
                    <h2 class="card-title"><?= $movie->getTitle(); ?></h2>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Date de sortie : </b></li>
                    <li class="list-group-item"><b>Durée : </b></li>
                    <li class="list-group-item"><b>Réalisateur : </b></li>
                    <li class="list-group-item"><b>Genre : </b></li>
                </ul>
                <div class="card-body text-center py-2">
                    <a href="<?= "/?controller=movie&action=show&movie_id=" . $movie->getMovieId(); ?>" class="btn btn-primary mx-auto stretched-link">Voir la fiche</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>