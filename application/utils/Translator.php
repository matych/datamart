<?php
namespace application\utils;

use config\Nastaveni;
use core\database\Database;

/**
 * Třída Translator
 *
 * třída zajišťuje návrat slova podle lokalizace
 *
 * @author LemonBone s.r.o.
 */
class Translator {
    protected static $translations = array();
    protected static $loaded;

    public static function trans($string, $lang) {
        if(true !== static::$loaded) {
            static::load();
        }

        if(!isset(static::$translations[$string])) {
            static::$translations[$string] = array();
        }

        return array_key_exists($lang, static::$translations[$string]) ? strlen(static::$translations[$string][$lang]) > 0 ? static::$translations[$string][$lang] : static::$translations[$string]['cs'] : $string;
    }

    protected static function load() {
        $result       = \dibi::select('*')->from('dictionary');
        $rows         = $result->fetchAll();
        $translations = array();
        $callback     = function ($row) use (&$translations) {
            if(!array_key_exists($row->code, $translations)) {
                $translations[$row->code] = array();
            }
            $translations[$row->code][$row->lang] = $row->text;
        };

        array_map($callback, $rows);

        static::$translations = $translations;
        static::$loaded       = true;
    }
}