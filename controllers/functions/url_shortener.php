<?
function url_shortener($longUrl){
  $raw = json_encode(array('longUrl' => $longUrl));

  $opts = array('http' =>
      array(
          'method'  => 'POST',
          'header'  => 'Content-type: application/json',
          'content' => $raw
      )
  );

  $context  = stream_context_create($opts);
  $result = json_decode(file_get_contents('https://www.googleapis.com/urlshortener/v1/url?key='.GOOGLE_API_KEY, false, $context));
  return $result->id;
}