<?php
require_once _ROOTPATH_ . '/templates/header.php';
use App\Repository\CategoryRepository;
use App\Repository\DirectorRepository;

?>

<div class="row">
    <?php foreach ($movies as $movie) {
        $categoryRepository = new CategoryRepository();
        $categories = $categoryRepository->findAllByMovieId($movie->getMovieId());

        $directorRepository = new DirectorRepository();
        $directors = $directorRepository->findAllByMovieId($movie->getMovieId());
    ?>
        <div class="col-md-4 my-2">
            <div class="card w-100">
                <img src="<?= $movie->getImagePath(); ?>" class="card-img-top w-50 h-auto mx-auto mt-1 rounded-2" alt="<?= $movie->getTitle(); ?>">
                <div class="card-body text-center py-2">
                    <h2 class="card-title"><?= $movie->getTitle(); ?></h2>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Date de sortie : </b>
                    <?php 
                        if ($movie->getReleaseDate()) {
                            echo $movie->getReleaseDate();
                        } else {
                            echo "N/C";
                        }
                    ?>
                    </li>

                    <li class="list-group-item"><b>Réalisateur : </b>
                    <?php 
                        $i = 0;
                        foreach($directors as $director){
                            $i++;
                            echo $director->getFirstName()." ".$director->getLastName();
                            if ($i < count($directors)) {
                                echo ", ";
                            } else {
                                echo ".";
                            }
                        } 
                    ?>
                    </li>

                    <li class="list-group-item"><b>Genre : </b>
                    <?php 
                        $i = 0;
                        foreach($categories as $category){
                            $i++;
                            echo $category->getName();
                            if ($i < count($categories)) {
                                echo ", ";
                            } else {
                                echo ".";
                            }
                        } 
                    ?>
                    </li>

                </ul>
                <div class="card-body text-center py-2">
                    <a href="<?= "/?controller=movie&action=show&movie_id=" . $movie->getMovieId(); ?>" class="btn btn-primary mx-auto stretched-link">Voir la fiche</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>
