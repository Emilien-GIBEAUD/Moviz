<?php
require_once _ROOTPATH_ . '/templates/header.php';
use App\Tools\DateTools;

?>
<h2>Valider les critiques</h2>
<div class="list-group">
    <form action="" method="post">
        <?php foreach ($reviews_to_validate as $review) { ?>
            <div class="list-group-item d-flex gap-2 w-100 justify-content-between">
                <div>
                    <h6 class="mb-2"><b><?= $review->getTitle() ?> : </b>Critique de <b><?= $review->getPseudo() ?> (<?= $review->getEmail() ?>)</b> postée le <b><?= DateTools::dateTimeEnToFr($review->getDateReview()->format('Y-m-d H:i:s')) ?></b></h6>
                    <p class="fw-light fst-italic"><?= $review->getReview() ?></p>
                </div>
                <small class="text-nowrap text-center ms-4">
                    <label for="<?= $review->getReviewId(); ?>">Valider/<br>Rejeter : </label><br><br>
                    <select name="<?= $review->getReviewId(); ?>" id="<?= $review->getReviewId(); ?>">
                        <option value="reject">Rejeter</option>
                        <option value="validate">Valider</option>
                    </select><br><br>
                </small>
            </div>
        <?php } ?>
        <div class="text-center">
        <input type="submit" name="saveReviewValidation" class="btn btn-primary mt-2" value="Valider/Rejeter les critiques">
        </div>
    </form>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>


