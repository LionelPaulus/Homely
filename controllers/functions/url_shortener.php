<?
require 'vendor/autoload.php';
$cache = new iProDev\Util\EasyCache();

function url_shortener($longUrl){
  global $cache;

  $result = $cache->get($longUrl);
  if(!$result) {
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
    $result = $result->id;

    $cache->set($longUrl, $result);
  }
  return $result;
}