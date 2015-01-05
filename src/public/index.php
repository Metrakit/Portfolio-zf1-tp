<?php

// Define path to root directory
define('ROOT_PATH')
    || define('ROOT_PATH', realpath(dirname(dirname(__DIR__))));
    
// Define path to root directory
define('SRC_PATH')
    || define('SRC_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'src');

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Check if composer is initialised
if (!file_exists(ROOT_PATH . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php')) {
    die('Veuillez lancer la commande "composer install" pour initialiser cette application');
}

/** Zend_Application */
require_once(ROOT_PATH . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()
            ->run();