<h2 class="title-article">Tableau de bord</h2>
<div class="row">

    <?php

        $tables = [
            "Publications"      =>  "posts",
            "Commentaires"      =>  "comments",
        ];

        $colors = [
            "posts"     =>  "pink darken-3",
            "comments"  =>  " pink darken-4",
        ];

    ?>


    <?php

        foreach($tables as $table_name => $table){
            ?>
                <div class="col l6 m6 s12">
                    <div class="card">
                        <div class="card-content <?= getColor($table,$colors) ?> white-text">
                            <span class="card-title"><?= $table_name ?></span>
                            <?php $nbrInTable = inTable($table); ?>
                            <h4><?= $nbrInTable[0] ?></h4>
                        </div>
                    </div>
                </div>
            <?php
        }

    ?>
</div>

<h4 class="title-article">Commentaires signalés</h4>
    <?php
    $comments = get_comments(); 
    ?>
<table>
    <thead>
        <tr>
            <th>Article</th>
            <th>Commentaire</th>
            <th>Actions</th>
        </tr>
    </thead> 
    <tbody>
        <?php
            foreach ($comments as $comment) {
                ?>
                <tr>
                    <td><?= $comment->title ?></td>
                    <td><?= substr($comment->comment, 0, 40); ?>...</td>
                    <td><a href="#" id="<?= $comment->id ?>"
                           class="btn-floating btn-small waves-effect waves-light green see_comment"><i
                                class="material-icons">done</i></a>
                        <a href="#" id="<?= $comment->id ?>"
                           class="btn-floating btn-small waves-effect waves-light red delete_comment"><i
                                class="material-icons">delete</i></a>
                        <a href="#comment_<?= $comment->id ?>"
                           class="btn-floating btn-small waves-effect waves-light blue modal-trigger"><i
                                class="material-icons">more_vert</i></a>
                        <div class="modal" id="comment_<?= $comment->id ?>">
                            <div class="modal-content">
                                <h4><?= $comment->title ?></h4>
               
               <!-- MODAL TRIGGER QUI APPARAIT-->                 
                            
                                <h6 class="title-article"><?= $comment->pseudo  ."</h6> Le ". date("d/m/Y à H:i", strtotime($comment->date_com)) ?>
                                
                                <hr/>
                                <p><?= nl2br($comment->comment) ?></p


                            </div>
                            <div class="modal-footer">
                                <a href="#" id="<?= $comment->id ?>"
                                   class="modal-action modal-close waves-effect waves-red btn-flat delete_comment"><i
                                        class="material-icons">delete</i></a>                          
                            </div>


                        </div>                        
                    </td>
                </tr>
            <?php 
        }
        ?>
    </tbody>














