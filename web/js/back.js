/*$(document).ready(function(){
     
    var titre = $('.titre');
    var detail = $('.detail');

    detail.slideUp();
        
    titre.on('click', function(event) {

        event.preventDefault();
            
	 
	if ($(this).attr('class') == 'panel-heading titre active'){
          
            $(this).find('h3 i').removeClass('glyphicon glyphicon-minus-sign').addClass('glyphicon glyphicon-plus-sign');


            // On replie celui qui suit directement le lien (.detail) sur lequel on a cliqué
            $(this).next('.detail').stop(true,true).slideToggle('slow');

            // On enlève la classe .active du lien
	    $(this).removeClass('active');
	        

	} else {
                
            // On ferme par effet de slide tous les li qui contiennent la classe .detail
            detail.slideUp('slow');

            //on change le plus en moins
            $(this).find('h3 i').removeClass('glyphicon glyphicon-plus-sign').addClass('glyphicon glyphicon-minus-sign');

            // On ouvre celui qui suit directement le lien (.detail) sur lequel on a cliqué
            $(this).next('.detail').stop(true,true).slideToggle('slow');

            // On enlève la classe .active de tous les liens
            detail.removeClass('active');

            // On rajoute la classe .active au lien sur lequel on a cliqué
            $(this).addClass('active');

	}
    });
  
});*/