<?php
/**
 * Created by PhpStorm.
 * User: Zdenek
 * Date: 24. 5. 2016
 * Time: 8:17
 */

namespace application\utils;


class Common {

    public static function formatDatum($datum) {
        $d = new \DateTime($datum);
        return sprintf('%s. %s %s',
            $d->format('j'),
            self::vratNazevMesice($d->format('n')),
            $d->format('Y'));
    }

    public static function formatDatumInput($datum) {
        $d = new \DateTime($datum);
        return $d->format('d. m. Y');
    }

    public static function vratNazevMesice($mesic) {
        static $nazvy = array(1 => 'leden', 'únor', 'březen', 'duben', 'květen', 'červen', 'červenec', 'srpen', 'září', 'říjen', 'listopad', 'prosinec');
        return $nazvy[$mesic];
    }
}