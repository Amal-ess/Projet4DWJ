$(document).ready(function(){


    $(".delete_post").click(function(){
   		 var id = $(this).attr("id");
    	 $.post('ajax/delete_post.php',{id:id});
         location.reload();
    });

});


