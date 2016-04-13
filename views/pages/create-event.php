<div class="mui-container">
  <div class="mui-panel">
    <form>
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
        <input name="location" id="autocomplete" type="text" placeholder="">
        <label>Location</label>
      </div>
      <div class="mui-textfield mui-textfield--float-label">
        <textarea name="description"></textarea>
        <label>Description</label>
      </div>
      <div class="mui-row">
        <div class="mui-col-xs-8">
          <div class="mui-textfield">
            <input type="text" placeholder="Movie name">
            <label>Add one or more movies</label>
          </div>
        </div>
        <div class="mui-col-xs-4">
          <div class="mui-checkbox mui--text-right">
            <label>
              <input type="checkbox" name="vote">
              Propose a vote
            </label>
          </div>
        </div>
      </div>
      <button type="submit" class="mui-btn mui-btn--raised">Submit</button>
    </form>
  </div>
</div>
