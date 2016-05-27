<?php
/**
 * User: LemonBone s.r.o.
 * Date: 24. 8. 2015
 * Time: 12:40
 */

namespace config;

class Settings {
    /**
     * debug mod
     */
    const DEBUG = 1;

    /**
     * ovladač databáze
     */
    const DB_DRIVER = 'mysql';
    /**
     * hostitel
     */
    const DB_HOST = 'localhost';
    /**
     * uživatelské jméno
     */
    const DB_USER = 'root';
    /**
     * heslo
     */
    const DB_PASS = '';
    /**
     * název databáze
     */
    const DB_DATABASE = 'datamart';

    /**
     * @return array
     */
    public static function databaseOption() {
        return array(
            'driver' => self::DB_DRIVER,
            'host' => self::DB_HOST,
            'username' => self::DB_USER,
            'password' => self::DB_PASS,
            'database' => self::DB_DATABASE
        );
    }

    const URL_DELKA_URL = 1;
    const REQUEST_URI   = '';
}
