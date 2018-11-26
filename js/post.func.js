
$(document).ready(function(){

	$(".signalement-actived").click(function(){
	        var id = $(this).attr("id");
	        $.post('ajax/signalement-actived.php',{id:id},function(){
	            $("#commentaire_"+id).hide();
	        });
	    });

});