<?php
/**
 * Created by PhpStorm.
 * User: Zdenek
 * Date: 21. 5. 2016
 * Time: 19:48
 */

namespace application\control\pages;

use application\core\Page;

class Login extends Page {

    protected $url      = array('admin', 'login');
    protected $template = '../application/view/login.tpl';
    protected $title    = 'tit_login';

    protected function setData() {
        if(isset($_POST) && !empty($_POST)) {
            $user = \application\model\Login::loginUser($_POST);
            if(count($user) === 0) {
                $this->redirect('faild');
            } else {
                $_SESSION['user']['logged'] = true;
                $_SESSION['user']['mail']   = $user[0]['mail'];
                $_SESSION['user']['name']   = $user[0]['name'];
                $this->redirect('ok');
            }
        }
    }

    private function redirect($response) {
        switch($response) {
            case 'faild':
                header(sprintf('Location: %s%s/%s/%s/', $_SESSION['server'], $_SESSION['lang'], $this->url[0], $this->url[1]));
                break;
            case 'ok':
                header(sprintf('Location: %s%s/%s/', $_SESSION['server'], $_SESSION['lang'], $this->url[0]));
                break;
        }
    }

}