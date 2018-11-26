<h2 class="title-article">POSTER UN ARTICLE</h2>

<?php

    if(isset($_POST['post'])){
        $title = htmlspecialchars(trim($_POST['title']));
        $content = htmlspecialchars(trim($_POST['content']));
        $auteur = htmlspecialchars(trim($_POST['auteur']));

        $errors = [];

        if(empty($title) || empty($content) || empty($auteur) ){
            $errors['empty'] = "Veuillez remplir tous les champs";
        }else{
            
            post($title,$content,$auteur);

               $id = $bdd->lastInsertId();
               header("Location:index.php?page=post&id=".$id);
            }
        }


?>

              <form method="post" enctype="multipart/form-data">
                <div class ="row"> 
                	<input type="hidden" id="id" name="id"/>
                    <label for="title"> Titre de l'article</label><br/>
                    <input type="text" name="title" id="title"><br/>
                    <label for="auteur"> Auteur</label><br/>
                    <input type="text" name="auteur" id="auteur"><br/>
                    <label for="content">Contenu</label> : <br/>
                    <textarea name="content" id="content"></textarea><br />
                    <button class="btn" type="submit" name="post">Publier</button>
                </div>
            </form>
