<? if(empty($query)){ ?>
  <div class="empty-background">
    <h1 class="mui--text-center">You have no movie session, create one !</h1>
    <img src="src/images/empty.png">
  </div>
<? } else {
    foreach($query as $_result): // FOREACH RESULT GET JSON FROM TMDB AND DISPLAY INFORMATIONS
      if($_result->movie_type == 'movie'){
        $movie = $cache->get_data($_result->actual_movie, 'http://api.themoviedb.org/3/movie/' . $_result->actual_movie . '?api_key=' . THEMOVIEDB_API_KEY);
        $movie = json_decode($movie);
        $title = $movie->title;
      }
      else
      {
        $movie = $cache->get_data($_result->actual_movie, 'http://api.themoviedb.org/3/tv/' . $_result->actual_movie . '?api_key=' . THEMOVIEDB_API_KEY);
        $movie = json_decode($movie);
        $title = $movie->name;
      }
?>
      <div class="mui-container">
        <a href="<?php echo 'event/' . $_result->id ?>" class="movie-card" alt="Movie">
          <img src="<?php echo $config['images']['base_url'] . $config['images']['backdrop_sizes'][2] . $movie->backdrop_path ?>" alt="Movie backdrop" onerror='imageChange(this)'>
          <div class="mui-panel">
            <div class="mui-row">
              <div class="mui-col-xs-2">
                <i class="material-icons md-48 icons_logo">
                  <?php  // CHECK SESSION ID PERMISSION'S ON EVERY EVENTS
                    if($_result->owner == $_SESSION['user']['id'])
                    {
                      echo 'perm_identity';
                    }
                    else if($_result->participation == 1)
                    {
                      echo 'event_available';
                    }
                    else
                    {
                      echo 'event_busy';
                    }
                  ?>
                </i>
              </div>
              <div class="mui-col-xs-10">
                <h1><?= $title ?></h1>
                <p>
                  <?php 
                      echo date('d M', $_result->date);

                      $guest = array(); // GET GUESTS 

                      foreach($data as $_data){ // FOREACH EVENT CHECK IF GUEST IS IN THIS EVENT
                        if($_data->room_id == $_result->room_id)
                        {
                          if($_data->id != $_SESSION['user']['id'])
                            array_push($guest, $_data->first_name); // IF YES PUSH IN AN ARRAY THEN DISPLAY
                        }
                      }

                      if(count($guest) == 1){
                        echo 'with <b>' . $guest[0] . '</b>';
                      }
                      else if(count($guest) == 2)
                      {
                        echo 'with <b>' . $guest[0] . ' & ' . $guest[1] . '</b>';
                      }
                      else if(count($guest) >= 3)
                      {
                        echo 'with <b>' . $guest[0] . ', ' . $guest[1] . ' & ' . $guest[2] . '</b>';
                      }
                    ?>
                    <b>at <?= date('g:i a', $_result->date) ?></b>
                 </p>
              </div>
            </div>
          </div>
        </a>
      </div>
<?php
    endforeach;
  }
?>
<div class="action-button">
  <a href="<?= URL ?>create-event" class="mui-btn mui-btn--fab mui-btn--danger">+</a>
</div>