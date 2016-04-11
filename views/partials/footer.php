  <footer>
    Footer
  </footer>
  <? if(USE_JQUERY){ ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <? } if(USE_BOOTSTRAP){ ?>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <? } if(USE_SCROLLREVEAL){ ?>
    <script src="https://cdn.jsdelivr.net/scrollreveal.js/3.1.4/scrollreveal.min.js"></script>
  <? } if(USE_EMBEBJS){ ?>
    <script src="https://cdn.jsdelivr.net/embed.js/3.6.2/embed.min.js"></script>
  <? } ?>
  <script src="<?= URL ?>src/js/app/script.js"></script>
</body>

</html>