<!-- 

<div class="mui-container">
  <a href="#" class="movie-card" alt="Movie">
    <img src="https://image.tmdb.org/t/p/w300/vsjBeMPZtyB7yNsYY56XYxifaQZ.jpg" alt="Movie backdrop">
    <div class="mui-panel">
      <div class="mui-row">
        <div class="mui-col-xs-2">
          <i class="material-icons md-48 icons_logo">event</i>
        </div>
        <div class="mui-col-xs-10">
          <h1>Batman Versus Superman</h1>
          <p>Demain à <b>12h</b> avec <b>Julie, Léa et Mathilde</b></p>
        </div>
      </div>
    </div>
  </a>
</div>

<div class="mui-container">
  <a href="#" class="movie-card" alt="Movie">
    <img src="https://image.tmdb.org/t/p/w300/vsjBeMPZtyB7yNsYY56XYxifaQZ.jpg" alt="Movie backdrop">
    <div class="mui-panel">
      <div class="mui-row">
        <div class="mui-col-xs-2">
          <i class="material-icons md-48 icons_logo">event_available</i>
        </div>
        <div class="mui-col-xs-10">
          <h1>Batman Versus Superman</h1>
          <p>Demain à <b>12h</b> avec <b>Julie, Léa et Mathilde</b></p>
        </div>
      </div>
    </div>
  </a>
</div>

<div class="mui-container">
  <a href="#" class="movie-card" alt="Movie">
    <img src="https://image.tmdb.org/t/p/w300/vsjBeMPZtyB7yNsYY56XYxifaQZ.jpg" alt="Movie backdrop">
    <div class="mui-panel">
      <div class="mui-row">
        <div class="mui-col-xs-2">
          <i class="material-icons md-48 icons_logo">event_busy</i>
        </div>
        <div class="mui-col-xs-10">
          <h1>Batman Versus Superman</h1>
          <p>Demain à <b>12h</b> avec <b>Julie, Léa et Mathilde</b></p>
        </div>
      </div>
    </div>
  </a>
</div>

<div class="mui-container">
  <a href="#" class="movie-card" alt="Movie">
    <img src="https://image.tmdb.org/t/p/w300/vsjBeMPZtyB7yNsYY56XYxifaQZ.jpg" alt="Movie backdrop">
    <div class="mui-panel">
      <div class="mui-row">
        <div class="mui-col-xs-2">
          <i class="material-icons md-48 icons_logo">perm_identity</i>
        </div>
        <div class="mui-col-xs-10">
          <h1>Batman Versus Superman</h1>
          <p>Demain à <b>12h</b> avec <b>Julie, Léa et Mathilde</b></p>
        </div>
      </div>
    </div>
  </a>
</div> -->


<?php foreach($query as $_result): 

      $movie = $cache->get_data($_result->actual_movie, 'http://api.themoviedb.org/3/movie/' . $_result->actual_movie . '?api_key=' . THEMOVIEDB_API_KEY);

      $movie = json_decode($movie);
    ?>

      <div class="mui-container">
        <a href="#" class="movie-card" alt="Movie">
          <img src="<?php echo $config['images']['base_url'] . $config['images']['backdrop_sizes'][2] . $movie->backdrop_path ?>" alt="Movie backdrop">
          <div class="mui-panel">
            <div class="mui-row">
              <div class="mui-col-xs-2">
                <i class="material-icons md-48 icons_logo">
                  <?php 
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
                <h1><?= $movie->title ?></h1>
                <p>
                  <?php 
                    echo date('d M', $_result->day);
                  ?>
                  à <b><?= $_result->time ?></b> avec <b>Sulivan</b>
                 </p>
              </div>
            </div>
          </div>
        </a>
      </div>
<?php endforeach; ?>


<div class="action-button">
  <a href="<?= URL ?>create-event" class="mui-btn mui-btn--fab mui-btn--danger">+</a>
</div>