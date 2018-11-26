<?php 

$article= get_posts();

if($article == false){
	header ("Location:index.php?page=error");
} else {
?>

	<h3 class="title-article"><?= $article->title ?></h3>
	<h6 class="sign">Par <span><?= $article->auteur ?></span> le <?= date("d/m/Y à H:i", strtotime($article->date_post)) ?> </h6>
	<hr>

	<p><?= htmlspecialchars_decode($article->content); ?> </p>


<?php
}
?>
<hr>

<?php 

    if(isset($_POST['submit'])){
        $pseudo = htmlspecialchars(trim($_POST['pseudo']));
        $comment = htmlspecialchars(trim($_POST['comment']));
        $errors =[];

        if(empty($pseudo) OR empty($comment)){
            $errors['empty'] = "N'oubliez pas de remplir tous les champs!";
        }
    }

    if(!empty($errors)){
        ?>
            <div class="card red">
                <div class="cart-content white-text">
                    <?php 
                        foreach($errors as $error){
                            echo $error."<br/>";
                        }

                    ?>
                </div>
            </div>

        <?php
    }else if (!empty($_POST['pseudo'])){
        $pseudo = $_POST['pseudo'];
        $comment = $_POST['comment'];
        comments($pseudo,$comment);
    }

    ?>
<h4 class="title-article">COMMENTAIRE</h4>

        <div class="ajout_de_commentaire">   
            <form method="post">
                <div class ="row"> 
                    <input type="hidden" id="post_id" name="post_id"/>
                    <label for="pseudo">Pseudo</label> : 
                    <input type="text" name="pseudo" id="pseudo"><br/>
                    <label for="comment">Commentaire</label> : <br/>
                    <textarea name="comment" id="comment" class="materialize-textarea"></textarea><br />
                    <button type="submit" name="submit" class="btn waves-effect pink darken-2">ENVOYER</button>
                </div>
            </form>
        </div>
        <!--<a href="#" class="btn-floating btn-small waves-effect waves-light red delete_comment"><i
                                class="material-icons">pan_tool</i></a>-->
        

            <?php
                $responses = get_comments();
                if($responses != false){
                    foreach($responses as $response){
                             ?>
                            <blockquote>
                             <table>
                                <tr>
                                    <td><strong><?= $response->pseudo ?> (<?= date("d/m/Y", strtotime($response->date_com)) ?>)</strong>
                                <p><?= nl2br($response->comment); ?></p>
                                    </td>
                                    <td>
                                        <a href="#" id="<?= $response->id ?>" class="btn-floating btn-small waves-effect waves-light red signalement-actived"><i
                                class="material-icons signalement-actived">pan_tool</i></a>
                                    </td>
                                </tr>
                            </table>
                            </blockquote>

                        <?php
                    }
                }else echo "Aucun commentaire n'a été publié... Soyez le premier!";
            ?>








