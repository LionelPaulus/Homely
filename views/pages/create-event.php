<div class="mui-container">
  <div class="mui-panel">
    <form>
      <legend>Create a movie session</legend>
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
      <table class="mui-table mui-table--bordered">
        <thead>
          <tr>
            <th>Poster</th>
            <th><div class="mui--text-center">Title</div></th>
            <th><div class="mui--text-right">Delete</div></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><img src="https://image.tmdb.org/t/p/w185/d5AfeWE8Ozk5QSbjB7rF3GN2d76.jpg"></td>
            <td><div class="mui--text-center"><h1>Inception</h1></div></td>
            <td><div class="mui--text-right"><button class="mui-btn mui-btn--raised mui-btn--danger"><i class="material-icons md-48 icons_logo">delete</i></button></div></td>
          </tr>
          <tr>
            <td><img src="https://image.tmdb.org/t/p/w185/7GDj0mi7vtRfYXJkGJzQV7MOrin.jpg"></td>
            <td><div class="mui--text-center"><h1>Le Bon, la Brute et le Truand</h1></div></td>
            <td><div class="mui--text-right"><button class="mui-btn mui-btn--raised mui-btn--danger"><i class="material-icons md-48 icons_logo">delete</i></button></div></td>
          </tr>
        </tbody>
      </table>
      <button type="submit" class="mui-btn mui-btn--raised">Submit</button>
    </form>
  </div>
</div>
