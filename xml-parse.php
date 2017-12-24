<?php
require('./functlib.php');
require('../__CONNECT/webster-connect.php');
require('./modules/XMLImport.php');
require('./modules/Job.php');
  $url        = 'http://websterandwebster.catsone.com/xml/?v=2';
  $data       = simplexml_load_file($url);
  $XML_Import = new XMLImport($connection, $data);

  $XML_Import->parse();
?>