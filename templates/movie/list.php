<?php
require_once _ROOTPATH_ . '/templates/header.php';

// use App\Entity\Movie;
// var_dump($movies);
?>

<div class="row">
    <?php foreach ($movies as $movie) { ?>
        <div class="col-md-4 my-2">
            <div class="card w-100">
                <img src="<?= $movie->getImagePath(); ?>" class="card-img-top w-50 h-auto mx-auto mt-1" alt="<?= $movie->getTitle(); ?>">
                <div class="card-body text-center py-2">
                    <h5 class="card-title"><?= $movie->getTitle(); ?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                </ul>
                <div class="card-body text-center py-2">
                    <a href="<?= "/?controller=movie&action=show&movie_id=" . $movie->getMovieId(); ?>" class="btn btn-primary mx-auto stretched-link">Voir la fiche</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>