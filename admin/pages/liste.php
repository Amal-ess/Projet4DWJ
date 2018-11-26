<h2 class="title-article">ÉDITER OU SUPPRIMER UN ARTICLE</h2>

<?php

$posts = get_posts();
foreach($posts as $post){
    ?>
    <div class="row">
        <div class="col s12">
            <h4><?= $post->title ?></h4>

            <div class="row">
                <div class="col s12 m6 l8">
                    <?= htmlspecialchars_decode(substr(nl2br($post->content),0,1200))?>...
                </div>
                <div class="col s12 m6 l4">
                    <br/><br/>
                    <a class="btn light-blue waves-effect waves-light" href="index.php?page=post&id=<?= $post->id ?>">Modifier</a><br/><br/>
                     <a class="btn light-blue waves-effect waves-light delete_post" href="#" id="<?= $post->id ?>">Supprimer</a>
                </div>
            </div>
        </div>
    </div>

    <?php
}


