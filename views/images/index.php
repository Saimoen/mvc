    <?php foreach ($images as $image) : ?>
        <div class="container">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><img src="<?= $image['lien'] ?>" alt="<?= $image['alt'] ?>"></h5>
                    <!-- Ajoutez une balise p pour afficher la description -->
                    <p class="card-text"><?= $image['description'] ?></p>
                </div>
            </div>
        </div>
    <?php endforeach ?>

    <a href="/">Retour au menu</a>
    