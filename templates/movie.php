<div class="row flex-lg-row-reverse align-items-start g-5 py-5 pb-3">
    <h1 class="display-5 fw-bold text-body-emphasis lh-1 my-3"><?= $movie->getTitle(); ?>
    </h1>
    <div class="row mx-auto">
        <div class="col-6 col-xl-3">
            <b>Date de sortie : </b>
            <?php 
                if ($movie->getReleaseDate()) {
                    echo $movie->getReleaseDate();
                } else {
                    echo "N/C";
                }
            ?>
        </div>
        <div class="col-6 col-xl-3">
            <b>Durée : </b>
            <?php 
                if ($movie->getDuration()) {
                    echo $movie->getDuration()->format('G\hi');
                } else {
                    echo "N/C";
                }
            ?>
        </div>
        <div class="col-6 col-xl-3">
            <b>Réalisateur : </b>
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
        </div>
        <div class="col-6 col-xl-3">
            <b>Genre : </b>
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
        </div>
    </div>

    <div class="<?= ($_GET["action"] === "show")? "col-6 col-sm-6 col-lg-4" : "col-4 col-sm-3 col-lg-2" ?> mt-3 mx-auto">
        <img src="<?= $movie->getImagePath(); ?>" class="d-block mx-lg-auto img-fluid w-100" alt="<?= $movie->getTitle(); ?>" loading="lazy">
    </div>
    <div class="<?= ($_GET["action"] === "show")? "col-lg-8" : "col-lg-10" ?> col-11 mt-3 mx-auto">
        <p class="lead"> <?= $movie->getSynopsis() ?></p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
        <?php if ($_GET["action"] === "show") {?>
            <a href="<?= "/?controller=movie&action=review&movie_id=" . $movie->getMovieId(); ?>" type="button" class="btn btn-primary btn-lg px-2 py-1 me-md-2">Poster une critique</a>
            <a href="#reviews" type="button" class="btn btn-outline-secondary btn-lg px-2 py-1">Lire les critiques</a>
            <?php }else{?>
                <a href="<?= "/?controller=movie&action=show&movie_id=" . $movie->getMovieId(); ?>" type="button" class="btn btn-primary btn-lg px-2 py-1 me-md-2">Voir la fiche</a>
            <?php }?>
        </div>
    </div>

</div>

