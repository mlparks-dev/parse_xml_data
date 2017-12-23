<?php
require('./functlib.php');
$html = '';
$url = 'http://websterandwebster.catsone.com/xml/?v=2';


  $xml = simplexml_load_file($url);
  
  prewrap($xml);


// echo($html);
?>