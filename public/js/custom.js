$(document).ready(function(){

	//$( "#sortableIngredients" ).sortable();

	$("#sortableIngredients").sortable({ 
            handle : '.handle', 
            update : function () { 
                var order = $('#sortableIngredients').sortable('serialize'); 
                //$("#info").load("process-sortable.php?"+order); 

                alert(order);
            } 
        }); 
});