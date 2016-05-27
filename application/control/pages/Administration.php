<?php
/**
 * Created by PhpStorm.
 * User: Zdenek
 * Date: 22. 5. 2016
 * Time: 18:22
 */

namespace application\control\pages;

use application\core\Page;

class Administration extends Page {

    protected $url      = array('admin');
    protected $template = '../application/view/adminPage.tpl';
    protected $title    = 'tit_administration';

    protected function setData() {
    }

    private function redirect($response) {
    }
}