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
        </tbody>
      </table>
      <button type="submit" class="mui-btn mui-btn--raised">Submit</button>
    </form>

    <?php if(!empty($errors)):
            foreach($errors as $_error): ?>
              <div class="mui--text-danger"><?= $_error ?></div>
            <?php endforeach;
          endif; 
        ?>
</div>
