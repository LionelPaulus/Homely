// Sliding menu
var ua =  navigator.userAgent,
          event = (ua.match(/iPhone|Android/ig)) ? "touchstart" : "click";
$("body").on(event, function(evt){
  if(!$(evt.target).hasClass("menuBtn")){
    $(".sidebar").css("left","-295px");
    $(".sidebar").css("opacity","0");
    mui.overlay('off');
  }else{
    $(".sidebar").css("left","0px");
    $(".sidebar").css("opacity","1");
    mui.overlay('on');
  }
 });

function imageChange(image) {
    image.onerror = "";
    image.src = "http://homely-app.com/src/images/no_thumb.png";
    return true;
}

var baseUrl   = 'http://api.themoviedb.org/3/',
        mode  = 'search/multi?query=',
        input,
        movieName,
        key   = '&api_key=52b219f9c6d4de9c68f38eb1bcb73a8f';

// Auto complete ---
    $('.movieChoice').autocomplete({
      source : function(requete, reponse){

        var input = $('.movieChoice').val(),
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
                      poster_path : json.poster_path,
                      media_type : json.media_type
                    }
                  }
                  else if(json.media_type == 'tv')
                  {
                    return {
                      title : json.name,
                      id : json.id,
                      poster_path : json.poster_path,
                      media_type : json.media_type
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
                .appendTo('.already');
          $('form').append("<input type='hidden' name='movies_id[]' value='" + ui.item.id + "'>")
          $('form').append("<input type='hidden' name='movies_type[]' value='" + ui.item.media_type + "' data-id='" + ui.item.id +"' >");
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
    $("input[data-id='" + id + "']").remove();
  });

