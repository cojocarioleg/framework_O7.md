<?php

use wfm\App;
use wfm\Router;

if (PHP_MAJOR_VERSION < 8) {
	die('este necesar ca versiunea voastra PHP sa fie 8.0 sau mai mare');
} 

require_once dirname(__DIR__). '/config/init.php';
require_once HELPERS. '/function.php';
require_once CONFIG. '/routes.php';

new App();


//throw new Exception('Exeption Error');
