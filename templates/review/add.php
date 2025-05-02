<?php
require_once _ROOTPATH_ . '/templates/header.php';

require_once _ROOTPATH_ . '/templates/movie.php';

?>
<h2>Ajouter une critique</h2>
<div class="container col-10 col-md-8 col-lg-6 m-auto">
    <form action="" method="post">    <!--  -->
        <div class="mb-3">
            <label class="form-label" for="review">Critique :</label>
            <textarea class="form-control" name="review" id="review" rows="5"></textarea>

            <?php if (isset($errors["review"])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $errors["review"]?>
                </div>
            <?php } ?>

        </div>

        <div class="mb-3">
            <label class="form-label" for="note">note :</label>
            <input class="form-control" type="number" min="0" max="5" step="0.5" name="note" id="note">
        <p class="fw-light fst-italic">Note comprise entre 0 et 5 (avec un incrément de 0.5).</p>
        </div>

        <input type="submit" name="saveReview" class="btn btn-primary" value="Enregistrer">
        <p class="fw-light fst-italic">Votre critique sera relue puis publiée par un administrateur prochainement (si elle est validée).</p>
    </form>
</div>



<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>

