$(document).ready(function(){

    $('.modal-trigger').leanModal();

    $(".see_comment").click(function(){
        var id = $(this).attr("id");
        $.post('ajax/see_comment.php',{id:id},function(){
            location.reload();
        });
    });

    $(".delete_comment").click(function(){
        var id = $(this).attr("id");
        $.post('ajax/delete_comment.php',{id:id},function(){
                location.reload();
        });
    });

});



