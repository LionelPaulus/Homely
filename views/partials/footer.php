  <footer>
    <div class="mui-row">
      <div class="mui-col-xs-11">
        <p>
          This product uses the TMDb API but is not endorsed or certified by TMDb.
        </p>
      </div>
      <div class="mui-col-xs-1">
        <img src="src/images/powered.png" alt="Powered by Themoviedb">
      </div>
    </div>
  </footer>
  <? if(USE_JQUERY){ ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <? } if($page == "create-event"){ ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWr3LNmFyHsaRslYyIq7RcByVbpkeaRT8&signed_in=true&libraries=places&callback=initAutocomplete" async defer></script>
    <script src="<?= URL ?>src/js/app/create-event.js"></script>
  <? } ?>
  <script src="//cdn.muicss.com/mui-0.5.0/js/mui.min.js"></script>
  <script src="<?= URL ?>src/js/app/script.js"></script>
</body>

</html>