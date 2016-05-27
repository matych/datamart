<?php
/**
 * Created by PhpStorm.
 * User: Zdenek
 * Date: 21. 5. 2016
 * Time: 19:48
 */

namespace application\control\pages;

class PagesMap {

    private static $map;

    private static function initMap() {

        self::$map = array(
            new Administration(),
            new Login(),
            //menu
        );
    }

    public static function readPage($urls) {
        self::initMap();

        if($_SESSION['user']['logged']) {
            for($i = 0; $i < count(self::$map); $i++) {
                if(count(self::$map[$i]->getUrl()) === count($urls)) {
                    $get = true;
                    for($j = 0; $j < count(self::$map[$i]->getUrl()); $j++) {
                        $url = self::$map[$i]->getUrl();
                        if($urls[$j] !== $url[$j]) {
                            $get = false;
                        }
                    }
                    if($get) {
                        return self::$map[$i];
                    }
                }
            }
            return self::$map[0];
        } else {
            return self::$map[1];
        }
    }

}