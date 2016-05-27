<?php
/**
 * User: Zdenek
 * Date: 26. 8. 2015
 * Time: 12:55
 */

namespace application\core;

use config\Settings;

/**
 * Class Database
 * @package core\database
 */
abstract class Database {

    /**
     * @param null $config
     */
    public static function connect($config = null) {
        if($config === null) {
            Database::connectDefault();
        } else {
            Database::connectConfig($config);
        }
    }

    /**
     * @param $config
     */
    private static function connectConfig($config) {
        try {
            \dibi::connect($config);
        } catch(DibiException $e) {
            echo '<h3>Nepodařilo se připojit k databázovému serveru!</h3><p>' . get_class($e) . ': ' . $e->getMessage();
            die();
        }
    }

    /**
     *
     */
    private static function connectDefault() {
        try {
            \dibi::connect(array(
                'driver' => Settings::DB_DRIVER,
                'host' => Settings::DB_HOST,
                'username' => Settings::DB_USER,
                'password' => Settings::DB_PASS,
                'database' => Settings::DB_DATABASE
            ));
        } catch(DibiException $e) {
            echo '<h3>Nepodařilo se připojit k databázovému serveru!</h3><p>' . get_class($e) . ': ' . $e->getMessage();
            die();
        }
    }

    /**
     *
     */
    public static function disconnect() {
        \dibi::disconnect();
    }
}