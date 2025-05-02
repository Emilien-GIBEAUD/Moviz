<?php

use App\Tools\DateTools;

require_once _ROOTPATH_ . '/templates/header.php';

require_once _ROOTPATH_ . '/templates/movie.php';

?>

<h2 id="reviews">Critiques du film</h2>
<div class="list-group">
    <?php if(empty($reviews)) { ?>
        <p class="fw-light fst-italic">Aucune critique n'a encore été postée.</p>
    <?php } ?>
    <?php foreach ($reviews as $review) { ?>
        <div class="list-group-item d-flex gap-2 w-100 justify-content-between">
            <div>
                <h6 class="mb-2">Critique de <b><?= $review->getPseudo() ?></b> postée le <b><?= DateTools::dateEnToFr($review->getDateReview()->format('Y-m-d')) ?></b></h6>
                <p class="mb-0 opacity-75"><?= $review->getReview() ?></p>
            </div>
            <small class="text-nowrap">note : <?= $review->getNote() ?></small>
        </div>
    <?php } ?>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>