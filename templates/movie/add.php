<?php
require_once _ROOTPATH_ . '/templates/header.php';


?>

<h1>Ajouter un film</h1>
<div class="container col-10 col-md-8 col-lg-6 m-auto">
    <form action="" method="post" enctype="multipart/form-data">    <!--  -->
        <div class="mb-3">
            <label class="form-label" for="title">Titre :</label>
            <input class="form-control" type="text" name="title" id="title">

            <?php if (isset($errors["title"])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $errors["title"]?>
                </div>
            <?php } ?>

        </div>

        <div class="mb-3">
            <label class="form-label" for="synopsis">Synopsis :</label>
            <textarea class="form-control" name="synopsis" id="synopsis" rows="5"></textarea>

        </div>
        <div class="mb-3">
            <label for="image_name" class="form-label">Image :</label>
            <input type="file" name="image_name" class="form-control" id="image_name">
            <p class="fw-light fst-italic">Format jpg, jpeg, png ou webp de 4 MB au maximum.</p>

        </div>

        <div class="mb-3">
            <label class="form-label" for="release_date">Année de sortie :</label>
            <input class="form-control" type="number" min="1900" max="3000" name="release_date" id="release_date">
        </div>

        <div class="mb-3">
            <label class="form-label" for="duration">Durée :</label>
            <input class="form-control" type="time" step="60" name="duration" id="duration">
        </div>

        <div class="mb-3">
            <label class="form-label" for="director">Réalisateur(s) :</label>
            <select name="director[]" id="director" class="form-select" multiple="multiple" size="6">
            <?php foreach ($directors as $director) { ?>
                    <option value="<?= $director->getDirectorId() ?>"><?= $director->getFirstName()." ".$director->getLastName() ?></option>
                <?php } ?>
            </select>
            <p class="fw-light fst-italic">Maintenir CTRL pour faire une selection multiple.</p>
        </div>

        <div class="mb-3">
            <label class="form-label" for="category">Genre(s) :</label>
            <select name="category[]" id="category" class="form-select" multiple="multiple" size="8">
                <?php foreach ($categories as $category) { ?>
                    <option value="<?= $category->getCategoryId() ?>"><?= $category->getName() ?></option>
                <?php } ?>
            </select>
            <p class="fw-light fst-italic">Maintenir CTRL pour faire une selection multiple.</p>
        </div>

        <input type="submit" name="saveMovie" class="btn btn-primary" value="Enregistrer">
    </form>
</div>

<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>

