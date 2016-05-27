<?php
/**
 * Created by PhpStorm.
 * User: Zdenek
 * Date: 21. 5. 2016
 * Time: 19:48
 */

namespace application\core;

use application\utils\MinifyHTML;

abstract class Page {

    protected $url;
    protected $template;
    protected $data;
    protected $title;

    public function __construct($data = array()) {
        $this->data = $data;
    }

    public function getUrl() {
        return $this->url;
    }

    private function setTemplateData() {
        $this->data['server']   = $_SESSION['server'];
        $this->data['lang']     = $_SESSION['lang'];
        $this->data['pageUrl']  = $this->url;
        $this->data['title']    = sprintf('%s | %s', $this->title, 'ELEKTROTRANS A.S.');
        $this->data['selfUrl']  = $this->buildSelfUrl();
        $this->data['isLogged'] = $_SESSION['user']['logged'];
    }

    protected function setData() { }

    public function getTemplate() {
        $this->setTemplateData();
        $this->setData();
        $template = new \H2o($this->template);
        echo MinifyHTML::minify($template->render($this->data));
    }

    private function buildSelfUrl() {
        $url = sprintf('%s%s/', $_SESSION['server'], $_SESSION['lang']);
        foreach($this->url as $u) {
            $url .= sprintf('%s/', $u);
        }
        return $url;
    }

    public function get_class() {
        return get_called_class();
    }
}