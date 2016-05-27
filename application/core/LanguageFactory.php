<?php

namespace application\core;

/**
 * Třída LanguageFactory
 *
 * třída zajišťuje routování mezi jazyky
 *
 * @author LemonBone s.r.o.
 */
class LanguageFactory {

    private static $instance = false;
    private        $langs;
    private        $lang;
    private        $name;

    public static function getInstance() {
        if(self::$instance === false) {
            self::$instance = new LanguageFactory();
        }
        return self::$instance;
    }

    public function checkLanguage($lang) {
        $this->lang = $lang;
        $this->readLangs();
        if(!$this->isLangSet()) {
            $this->redirect();
        }
    }

    private function isLangSet() {
        $nastaveno = false;
        if(isset($this->lang) || strlen($this->lang)) {
            for($i = 0; $i < count($this->langs); $i++) {
                if($this->langs[$i]['code'] === $this->lang) {
                    $nastaveno        = true;
                    $this->name       = $this->langs[$i]['name'];
                    $_SESSION['lang'] = $this->langs[$i]['code'];
                }
            }
        }
        return $nastaveno;
    }

    private function redirect() {
        header('Location: ' . $_SESSION['server'] . 'cz/');
    }

    public function setLang($lang) {
        $this->lang = $lang;
    }

    public function getLang() {
        return $this->lang;
    }

    public function getLangs() {
        return $this->langs;
    }

    public function getName() {
        return $this->name;
    }

    public function getNameCode($kod) {
        for($i = 0; $i < count($this->langs); $i++) {
            if($this->langs[$i]['code'] === $kod) {
                return $this->langs[$i]['name'];
            }
        }
    }

    public static function readLang($lang) {
        $result = \dibi::select('*')->from('dictionary')->where('code = %s', $lang);
        $rows   = $result->fetch();
        return $rows['name'];
    }

    private function readLangs() {
        $result      = \dibi::select('*')->from('lang');
        $rows        = $result->fetchAll();
        $this->langs = $rows;
    }
}
