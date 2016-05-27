<?php
/**
 * Created by PhpStorm.
 * User: Zdenek
 * Date: 21. 5. 2016
 * Time: 19:45
 */

namespace application\core;

use application\control\pages\PagesMap;

class RouteFactory {

    private $urls;

    public function __construct($urls) {
        $this->urls = $urls;
    }

    public function getPage() {
        switch($this->urls[0]) {
            case 'logout':
                $this->logout();
                break;
            default:
                $page = PagesMap::readPage($this->urls);
                $page->getTemplate();
                break;
        }
    }

    private function logout() {
        $server = $_SESSION['server'];
        $lang   = $_SESSION['lang'];
        session_destroy();
        header('Location:' . sprintf('%s%s/admin/', $server, $lang));
    }
}