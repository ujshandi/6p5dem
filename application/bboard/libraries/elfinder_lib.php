<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elfinder/elFinderConnector.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elfinder/elFinder.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elfinder/elFinderVolumeDriver.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elfinder/elFinderVolumeLocalFileSystem.class.php';

//echo "library ok";exit;

class Elfinder_lib 
{
  public function __construct($opts) 
  {
    $connector = new elFinderConnector(new elFinder($opts));
	//var_dump($connector);exit;
	//echo "conector ok";exit;
    $connector->run();
 
	
	
  }
}