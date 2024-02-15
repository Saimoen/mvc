<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blagues2Merde</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<h1 class="text-center">Nos articles à lire </h1>
<div class="d-flex flex-row mb-3 w-50 mx-auto">
    <?php foreach ($articles as $article) : ?>
        <div class="container">
            <div class="card" style="width: 18rem;">
                <img src="<?= $article['image_lien'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><a href="/articles/lire/<?= $article['slug'] ?>"><?= $article['titre'] ?></a></h5>
                    <p class="card-text"><?= substr($article['contenu'], 0, 30) . "..." ?></p>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<a href="/">Retour au menu</a>