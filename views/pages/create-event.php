<div class="mui-container">
  <div class="mui-panel">
    <form action='#' method='POST'>
      <legend>Create a movie session</legend>
      <div class="mui-row">
        <div class="mui-col-xs-6">
          <div class="mui-textfield">
            <input name="date" type="date" value="<?php if(isset($_POST['date'])) echo $_POST['date']; ?>">
            <label>Date</label>
          </div>
        </div>
        <div class="mui-col-xs-6">
          <div class="mui-textfield">
            <input name="time" type="time" value="<?php if(isset($_POST['time'])) echo $_POST['time']; ?>">
            <label>Time</label>
          </div>
        </div>
      </div>
      <div class="mui-textfield mui-textfield--float-label">
        <input name="place" id="autocomplete" type="text" placeholder="" value="<?php if(isset($_POST['place'])) echo $_POST['place']; ?>">
        <label>Location</label>
      </div>
      <div class="mui-textfield mui-textfield--float-label">
        <textarea name="desc"><?php if(isset($_POST['desc'])) echo $_POST['desc']; ?></textarea>
        <label>Description</label>
      </div>
      <div class="mui-row">
        <div class="mui-col-xs-8">
          <div class="mui-textfield">
            <input type="text" placeholder="Movie name" class="movieName">
            <label>Add one or more movies</label>
          </div>
        </div>
        <div class="mui-col-xs-4">
          <div class="mui-checkbox mui--text-right">
            <label>
              <input type="checkbox" name="vote" value="true" <?php if(isset($_POST['vote']) && $_POST['vote'] == true) echo 'checked'?>>
              Propose a vote
            </label>
          </div>
        </div>
      </div>
      <table class="mui-table mui-table--bordered">
        <tbody>
          <?php if(isset($_POST['movies_id'])):
                  foreach($_POST['movies_id'] as $key => $_movie): 

                    $type = ($_POST['movies_type'][$key] == 'movie') ? 'movie' : 'tv';

                    if($type == 'movie'){
                      $movie = $cache->get_data($_movie, 'http://api.themoviedb.org/3/movie/' . $_movie . '?api_key=' . THEMOVIEDB_API_KEY);
                      $movie = json_decode($movie); 
                    }
                    else if($type == 'tv'){
                      $movie = $cache->get_data($_movie, 'http://api.themoviedb.org/3/tv/' . $_movie . '?api_key=' . THEMOVIEDB_API_KEY);
                      $movie = json_decode($movie); 
                     } ?>
                    
                    <tr data-id='<?= $_movie ?>'>
                      <td>
                        <img src="<?php echo $config['images']['base_url'] . $config['images']['poster_sizes'][1] . $movie->poster_path ?>">
                      </td>
                      <td>
                        <div class="mui--text-center">
                          <h1>
                            <?php if($type == 'movie')
                                  {
                                    echo $movie->title;
                                  }
                                  else if($type == 'tv')
                                  {
                                    echo $movie->name;
                                  } ?>
                          </h1>
                        </div>
                      </td>
                      <td>
                        <div class="mui--text-right remove">
                          <button type="button" class="mui-btn mui-btn--raised mui-btn--danger">
                            <i class="material-icons md-48 icons_logo">delete</i>
                          </button>
                        </div>
                    </tr>

          <?php   endforeach;
                endif; ?>
        </tbody>
      </table>
      <button type="submit" class="mui-btn mui-btn--raised">Submit</button>
    </form>

    <?php if(!empty($errors)): // ERRORS
            foreach($errors as $_error): ?>
              <div class="mui--text-danger"><?= $_error ?></div>
            <?php endforeach;
          endif;
        ?>
  </div>
</div>
