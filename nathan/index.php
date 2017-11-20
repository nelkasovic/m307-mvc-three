<?php
/* 
 * Project: Nathan MVC
 * File: index.php
 * Purpose: landing page which handles all requests
 * Author: Nathan Davison
 */
define ('BASEPATH', realpath(dirname(__FILE__)));
include(BASEPATH.DIRECTORY_SEPARATOR.'classes' .DIRECTORY_SEPARATOR.'autoload.php');

//create the loader object
$loader = new Loader();

//creates the requested controller object based on the 'controller' URL value
$controller = $loader->createController();

//execute the requested controller's requested method based on the 'action' URL value. Controller methods output a View.
$controller->executeAction(); 

?>