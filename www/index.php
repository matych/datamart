<?php
session_start();
date_default_timezone_set('Europe/Prague');
mb_internal_encoding("UTF-8");
setlocale(LC_ALL, 'cs_CZ.UTF-8');
error_reporting(1);
set_error_handler("error_handler", E_ERROR);

require_once '../autoload.php';
require_once '../lib/h2o/h2o.php';
require_once '../lib/dibi/dibi.php';
require_once '../application/core/Filters.php';

$_SESSION['server'] = sprintf('http://%s%s%s/',
    $_SERVER["SERVER_NAME"],
    $_SERVER["SERVER_PORT"] == 80 ? '' : sprintf(':%s', $_SERVER["SERVER_PORT"]),
    \config\Settings::REQUEST_URI
);
$_SESSION['path']   = dirname(__FILE__);
preg_match('~^([^?]+)~', $_SERVER['REQUEST_URI'], $url);
$urls = explode('/', $url[1]);
if(empty($urls[count($urls) - 1])) {
    unset($urls[count($urls) - 1]);
}
\application\core\Database::connect(\config\Settings::databaseOption());

switch($urls[\config\Settings::URL_DELKA_URL]) {
    default:
        $localUrls = array_slice($urls, (\config\Settings::URL_DELKA_URL + 1), (sizeof($urls) - 1));
        \application\core\LanguageFactory::getInstance()->checkLanguage($urls[\config\Settings::URL_DELKA_URL]);
        $page = new \application\core\RouteFactory($localUrls);
        $page->getPage();
        break;
}

//$aa = new \application\control\pages\admin\Login();


\application\core\Database::disconnect();