var autocomplete;
function initAutocomplete() {
  // Create the autocomplete object, restricting the search to geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
      {types: ['geocode']});
}

$(document).ready(function() {



    var baseUrl 	= 'http://api.themoviedb.org/3/',
        mode 		= 'search/multi?query=',
        input,
        movieName,
        key 		= '&api_key=52b219f9c6d4de9c68f38eb1bcb73a8f';


    // Auto complete ---
    $('.movieName').autocomplete({
    	source : function(requete, reponse){

    		var input = $('.movieName').val(),
            movieName = encodeURI(input);

    		$.ajax({ // Ajax request
            	type: 'GET',
            	url: baseUrl + mode + input + key,
            	async: false,
            	jsonpCallback: 'test',
            	contentType: 'application/json',
            	dataType: 'jsonp',

	            success: function(json) {
	            	reponse($.map(json.results, function(json){
	            		if(json.media_type == 'movie')
	            		{
		            		return {
		            			title : json.title,
		            			id : json.id,
		            			poster_path : json.poster_path
		            		}
		            	}
		            	else if(json.media_type == 'tv')
		            	{
		            		return {
		            			title : json.name,
		            			id : json.id,
		            			poster_path : json.poster_path
		            		}
		            	}
	            	}));
	            },
	            error: function(e) {
	                console.log(e.message);
	            }

        	})
    	},
    	messages: {
        	noResults: '',
        	results: function() {}
    	},	
    	select: function (event, ui) { // Change Jquery UI autocomplete event after select

    		if(!($("tr[data-id='" + ui.item.id + "']").length))
    		{
		    	$('<div class=\'selected-movie\'>' + ui.item.title + '</div>').attr('data-id', ui.item.id).appendTo('.selected');
		    	$('<tr></tr>').attr('data-id', ui.item.id)
		    				.append("<td><img src='http://image.tmdb.org/t/p/w154" + ui.item.poster_path + "'></td><td><div class='mui--text-center'><h1>" + ui.item.title + "</h1></div></td><td><div class='mui--text-right remove'><button type='button' class='mui-btn mui-btn--raised mui-btn--danger'><i class='material-icons md-48 icons_logo'>delete</i></button></div></td>")
		    				.appendTo('tbody');
		    	$('form').append("<input type='hidden' name='movies[]' value='" + ui.item.id + "'>")
		    }
	    				

  		},
    	minLength:2,
    	delay:500
    }).autocomplete('instance')._renderItem = function( ul, item ) { // Change Jquery UI autocomplete's method
		return $('<li></li>').attr('data-id', item.id)
							.text(item.title)
							.appendTo(ul);
	}


	$('table').on('click', 'button', function(e) { // Remove a movie from the list
		e.preventDefault();
		
		id = ($(this).parent().parent().parent().data('id'));
		$(this).parent().parent().parent().remove();

		$("input[value='" + id + "']").remove();
	});


});
