<?php
require_once _ROOTPATH_ . '/templates/header.php';
use App\Repository\CategoryRepository;
use App\Repository\DirectorRepository;

?>
<div class="row">
    <h1>Les films</h1>
</div>

<!-- A FAIRE A FAIRE A FAIRE A FAIRE A FAIRE, copié en l'état depuis Okaz -->
<div class="row">
    <div class="col-md-3">
        <form action="" method="get">
            <h2>Filtres</h2>
            <div class="p-2 border-bottom">
                <input type="text" name="search" class="form-control" placeholder="Rechercher" 
                value="<?php 
                    if(isset($_GET["search"])){
                        echo htmlspecialchars($_GET["search"]);
                    } ?>" >
            </div>
            <div class="p-2 border-bottom">
                <label for="price">Prix : </label>
                <div class="input-group p-1">
                    <input type="number" name="min_price" class="form-control" placeholder="mini" 
                    value="<?php 
                    if(isset($_GET["min_price"])){
                        echo htmlspecialchars($_GET["min_price"]);
                    } ?>" >
                    <span class="input-group-text">€</span>
                </div>
                <div class="input-group p-1">
                    <input type="number" name="max_price" class="form-control" placeholder="maxi" 
                    value="<?php 
                    if(isset($_GET["max_price"])){
                        echo htmlspecialchars($_GET["max_price"]);
                    } ?>" >
                    <span class="input-group-text">€</span>
                </div>
            </div>
            <div class="p-2 border-bottom">
                <label class="form-label" for="category">Catégorie :</label>
                <select name="category" id="category" class="form-select">
                    <option value>- catégorie -</option>    
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category["id"]?>" 
                            <?php if (isset($_GET["category"]) && $category["id"] === (int)$_GET["category"]) {
                                    echo 'selected="selected"';
                                } ?>>
                            <?= $category["name"] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mt-2">
                <button class="btn btn-primary w-100" type="submit">Filtrer</button>
            </div>
        </form>
    </div>

    <div class="col-md-9">
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
    </div>
</div>



<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>
