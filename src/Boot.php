<?php
// Check for unit tests setup
if (!defined('ROOT')) {
    define('ROOT', dirname(dirname(__FILE__)));
}

require_once (ROOT . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php');
require_once ('AutoLoader.php');

class Boot {

    public function setUp()
    {
        AutoLoader::registerDirectory(ROOT . DIRECTORY_SEPARATOR . 'src');
    }

    /**
     * Simple error reporting configuration
     */
    public function setErrorReporting() {
        global $config;

        if (isset($config['env']) && $config['env'] === 'DEVELOPMENT') {
            // Development settings
            error_reporting(E_ALL);
            ini_set('display_errors','On');
        } else {
            // Production settings
            error_reporting(E_ALL);
            ini_set('display_errors','Off');
        }


    }

    /**
     * Invoke controller based on URL structure
     */
    function invokeController() {

        $url = "";
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
        }

        /** @var ControllerInterface $controller */
        $controller = Router::getController($url);

        if ((int)method_exists($controller, $controller->getAction() . 'Action')) {
            call_user_func_array(array($controller,$controller->getAction() . 'Action'), array());
        } else {
            /* Error Generation Code Here */
        }
    }

}

$bootstrap = new Boot();
$bootstrap->setErrorReporting();
$bootstrap->setUp();
$bootstrap->invokeController();