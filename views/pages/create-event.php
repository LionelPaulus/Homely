<div class="mui-container">
  <div class="mui-panel">
    <form action='#' method='POST'>
      <legend>Create a cinema session</legend>
      <div class="mui-row">
        <div class="mui-col-xs-6">
          <div class="mui-textfield">
            <input name="date" type="date">
            <label>Date</label>
          </div>
        </div>
        <div class="mui-col-xs-6">
          <div class="mui-textfield">
            <input name="time" type="time">
            <label>Time</label>
          </div>
        </div>
      </div>
      <div class="mui-textfield mui-textfield--float-label">
        <input name="place" id="autocomplete" type="text" placeholder="">
        <label>Location</label>
      </div>
      <div class="mui-textfield mui-textfield--float-label">
        <textarea name="desc"></textarea>
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
              <input type="checkbox" name="vote" value="true">
              Propose a vote
            </label>
          </div>
        </div>
      </div>
      <table class="mui-table mui-table--bordered">
        <thead>
          <tr>
            <th>Poster</th>
            <th><div class="mui--text-center">Title</div></th>
            <th><div class="mui--text-right">Delete</div></th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
      <button type="submit" class="mui-btn mui-btn--raised">Submit</button>
    </form>
  </div>
</div>
