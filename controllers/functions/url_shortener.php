<?
function url_shortener($longUrl){
  $postdata = http_build_query(
      array(
          'longUrl' => $longUrl
      )
  );

  $opts = array('http' =>
      array(
          'method'  => 'POST',
          'header'  => 'Content-type: application/x-www-form-urlencoded',
          'content' => $postdata
      )
  );

  $context  = stream_context_create($opts);
  return(file_get_contents('https://www.googleapis.com/urlshortener/v1/url?key='.GOOGLE_API_KEY, false, $context));
}