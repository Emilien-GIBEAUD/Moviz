<?php
require_once _ROOTPATH_ . '/templates/header.php';

use App\Entity\Movie;

?>

<div class="row flex-lg-row-reverse align-items-start g-5 py-5">
    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?= $movie->getTitle(); ?>
    </h1>
    <div class="row">
        <div class="col-6 col-xl-3">
            Date de sortie : 
            <?php 
                if ($movie->getReleaseDate()) {
                    echo $movie->getReleaseDate();
                } else {
                    echo "N/C";
                }
            ?>
        </div>
        <div class="col-6 col-xl-3">
            Durée : 
            <?php 
                if ($movie->getDuration()) {
                    echo $movie->getDuration()->format('G\hi');
                } else {
                    echo "N/C";
                }
            ?>
        </div>
        <div class="col-6 col-xl-3">
            Réalisateur(s) :
        </div>
        <div class="col-6 col-xl-3">
            Genre :
        </div>
    </div>
    <div class="col-10 col-sm-8 col-lg-6 mx-auto">
        <img src="<?= $movie->getImagePath(); ?>" class="d-block mx-lg-auto img-fluid" alt="<?= $movie->getTitle(); ?>" width="700" height="500" loading="lazy">
    </div>
    <div class="col-lg-6">
        <p class="lead"> <?= $movie->getSynopsis() ?></p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a href="/" type="button" class="btn btn-primary btn-lg px-2 py-1 me-md-2">Poster une critique</a>
            <a href="/" type="button" class="btn btn-outline-secondary btn-lg px-2 py-1">Lire les critiques</a>
        </div>
    </div>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>