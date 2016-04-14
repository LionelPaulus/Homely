<div class="mui-container">
  <div class="mui-panel">

    <?php
        if($query[0]->owner == $user)
        {
        ?>

          <form action="#" method="POST">
            <input type="hidden" name="type" value="remove">
            <button class="mui-btn mui-btn--danger">
              Supprimer cet évènement
            </button>
          </form>
          <br>

          <div class="mui-textfield">
            <input type="text" placeholder="Movie name" class="movieChoice">
            <label>Modify movie list</label>
            <br>
          </div>

          <form action="#" method="POST" class="update">
            <table class="mui-table mui-table--bordered">
              <tbody class="already">
              <?php
                foreach($query_movie as $_movie){
                  if($_movie->movie_type == 'movie'){
                    $movie  = $cache->get_data($_movie->movie_id, 'http://api.themoviedb.org/3/movie/' . $_movie->movie_id . '?api_key=' . THEMOVIEDB_API_KEY);
                    $movie  = json_decode($movie);
                    $title  = $movie->title;
                    $type   = 'movie';
                  }
                  else
                  {
                    $movie  = $cache->get_data($_movie->movie_id, 'http://api.themoviedb.org/3/tv/' . $_movie->movie_id . '?api_key=' . THEMOVIEDB_API_KEY);
                    $movie  = json_decode($movie);
                    $title  = $movie->name;
                    $type   = 'tv';
                  }
                  ?>

                  <tr data-id='<?=$_movie->movie_id?>'>
                    <td>
                      <img src="<?php echo $config['images']['base_url'] . $config['images']['backdrop_sizes'][2] . $movie->poster_path ?>">
                    </td>
                    <td>
                      <div class="mui--text-center">
                        <h1><?= $title ?></h1>
                      </div>
                    </td>
                    <td>
                      <div class="mui--text-right remove">
                        <button type="button" class="mui-btn mui-btn--raised mui-btn--danger">
                          <i class="material-icons md-48 icons_logo">delete</i>
                        </button>
                      </div>
                    </td>
                  </tr>

                  <input type="hidden" name="movies-id[]" value="<?= $movie->id ?>">
                  <input type="hidden" name="movies_type[]" value="<?= $type ?>" data-id="<?= $movie->id ?>">

               <?php } ?>
              </tbody>
            </table>
            <input type="hidden" name="type" value="update">
          </form>


        <?php
        }
        else
        {
        ?>
    <h2 class="mui--text-center">Are you in ?</h2>
    <div class="are-you-in">
      <form action="#" method="POST">
        <input type="hidden" name="type" value="participation">
        <button class="mui-btn mui-btn--primary" name="choice" value="true"><i class="material-icons md-48 icons_logo">done</i></button>
        <button class="mui-btn mui-btn--danger" name="choice" value="false"><i class="material-icons md-48 icons_logo">clear</i></button>
      </form>
    </div>



      <?php
        foreach($data as $_result){
          if($_result->id == $user)
          {
            if($_result->participation == 0)
            {
              ?>
              <div class="mui--text-center mui--text-danger">
                <b>You are not participating</b>
              </div>
              <?php
            }
            else
            {
              ?>
              <div class="mui--text-center" style="color:#87D37C">
                <b>You are participating</b>
              </div>
              <?php
            }
          }
        }
      ?>

      <?php } ?>

    <h1>Movie session</h1>
    <table class="mui-table mui-table--bordered event-infos">
      <tbody>
        <tr>
          <td><i class="material-icons md-48 icons_logo">home</i></td>
          <td>
            At <b><?= $query[0]->first_name ?></b>'s
          </td>
        </tr>
        <tr>
          <td><i class="material-icons md-48 icons_logo">location_on</i></td>
          <td>
            <?= $query[0]->place ?>
            <div class="mui--text-right">
              <a href="https://maps.google.com/maps?q=<?= $query[0]->place?>" target="_blank"class="mui-btn mui-btn--small">Open in Google Maps</a>
            </div>
          </td>
        </tr>
        <tr>
          <td><i class="material-icons md-48 icons_logo">today</i></td>
          <td>
              <?= date("F j", $query[0]->date)?>
                at
              <?= date("g:i a", $query[0]->date)?>
          </td>
        </tr>
        <tr>
          <td><i class="material-icons md-48 icons_logo">event_available</i></td>
          <td>
            <?php
              $count = 0;
              foreach($data as $_result)
              {
                if($_result->participation == 1)
                {
                  echo $_result->first_name . ' ' . $_result->last_name . '<br>';
                  $count++;
                }
              }
              if($count == 0)
              {
                echo 'Nobody yet';
              }
              ?>
          </td>
        </tr>
        <tr>
          <td><i class="material-icons md-48 icons_logo">event_busy</i></td>
          <td>
            <?php
              $count = 0;
              foreach($data as $_result)
              {
                if($_result->participation == 0)
                {
                  echo $_result->first_name . ' ' . $_result->last_name . '<br>';
                  $count++;
                }
              }
              if($count == 0)
              {
                echo 'Nobody yet';
              }
              ?>
          </td>
        </tr>
      </tbody>
    </table>
    <h2>Proposed movies</h2>

    <?php
      if($query[0]->vote == 0)
      {
        foreach($query_movie as $_movie)
        {
          $event_id = $_movie->event_id;
          if($_movie->movie_type == 'movie'){
          $movie = $cache->get_data($_movie->movie_id, 'http://api.themoviedb.org/3/movie/' . $_movie->movie_id . '?api_key=' . THEMOVIEDB_API_KEY);
          $movie = json_decode($movie);

          $title = $movie->title;
          }
          else
          {
            $movie = $cache->get_data($_movie->movie_id, 'http://api.themoviedb.org/3/tv/' . $_movie->movie_id . '?api_key=' . THEMOVIEDB_API_KEY);
            $movie = json_decode($movie);

            $title = $movie->name;
          }
            ?>
           <div class="mui-container movie">
             <img src="<?php echo $config['images']['base_url'] . $config['images']['backdrop_sizes'][3] . $movie->backdrop_path ?>" alt="Movie backdrop" onerror='imageChange(this)'>
             <div class="mui-panel">
               <div class="mui-row">
                 <div class="mui-col-xs-10">
                   <h1><?= $title ?></h1>
                 </div>
               </div>
             </div>
           </div>
            <?php
          }
        }
        else
        {
          foreach($query_movie as $_movie)
          {
            if($_movie->movie_type == 'movie'){
              $movie = $cache->get_data($_movie->movie_id, 'http://api.themoviedb.org/3/movie/' . $_movie->movie_id . '?api_key=' . THEMOVIEDB_API_KEY);
              $movie = json_decode($movie);

              $title = $movie->title;
            }
            else
            {
              $movie = $cache->get_data($_movie->movie_id, 'http://api.themoviedb.org/3/tv/' . $_movie->movie_id . '?api_key=' . THEMOVIEDB_API_KEY);
              $movie = json_decode($movie);

              $title = $movie->name;
            }
              ?>
            <div class="mui-container movie">
              <img src="<?php echo $config['images']['base_url'] . $config['images']['backdrop_sizes'][3] . $movie->backdrop_path ?>" alt="Movie backdrop " onerror='imageChange(this)'>
              <div class="mui-panel">
                <div class="mui-row">
                  <div class="mui-col-xs-10">
                    <h1><?= $title ?></h1>
                    <p><b>
                    <?php

                      $voteCount = 0;

                      foreach($query_vote as $_vote)
                      {
                        if($_vote->movie==$_movie->movie_id)
                        {
                          $voteCount++;
                        }
                      }

                      echo $voteCount . ' liked';
                    ?>
                    </b></p>
                  </div>
                  <div class="mui-col-xs-2">
                    <form action="#" method="POST">
                      <input type="hidden" name="type" value="vote">
                      <button name="whichMovie" value="<?= $_movie->movie_id ?>">
                        <i class="material-icons md-48 icons_logo">favorite_border</i>
                      </button>
                    </form>
                  </div>
                  </div>
                </div>
              </div>
            <?php
          }
        }
    ?>
    <div class="mui-textfield">
      <input id="url" type="text" value="<?= url_shortener(URL."event/".$id) ?>" disabled>
      <label>Event URL</label>
    </div>
  </div>
</div>
<div class="action-button">
  <div class="mui-btn mui-btn--fab mui-btn--danger" data-clipboard-target="#url" onclick="alert('Event URL copied !')"><i class="material-icons md-48 icons_logo">share</i></div>
</div>
