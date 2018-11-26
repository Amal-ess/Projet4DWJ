  <?php
    $article = get_posts();

    if($article == false){
        header("Location:index.php?page=error");
    }

    if(isset($_POST['submit'])){
        $title = $_POST['title'];       
        $content = htmlspecialchars($_POST['content']);
        $auteur = $_POST['auteur'];
        $errors = [];

         if(empty($title) || empty($content) || empty($auteur)){
                $errors['empty'] = "Veuillez remplir tous les champs";
            }
            if(!empty($errors)){
                ?>
                <div class="card red">
                    <div class="card-content white-text">
                        <?php
                        foreach($errors as $error){
                            echo $error."<br/>";
                        }

            }else{
                edit($title,$content,$auteur,$_GET['id']);
                ?>


                    <script>
                        window.location.replace("index.php?page=post&id=<?= $_GET['id'] ?>");
                    </script>
                <?php
            }


        }

  ?> 

<h2 class="title-article">MODIFICATION DE L'ARTICLE</h2>

    <form method="post">
        <div class="row">
            <div class="input-field col s12">
                <input type="text" name="title" id="title" value="<?= $article->title ?>"/>
                <label for="title">Titre de l'article</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="auteur" id="auteur" value="<?= $article->auteur ?>"/>
                <label for="title">Auteur de l'article</label>
            </div>
            <div class="input-field col s12">
                <label for="content">Contenu</label> : <br/>
                <textarea id="content" name="content"><?= $article->content ?></textarea>
                <label for="content">Contenu de l'article</label>
            </div>
            <div class="col s6 right-align">
                <br/><br/>
            <button type="submit" class="btn" name="submit">Modifier l'article</button>
            </div>
        </div>
    </form>