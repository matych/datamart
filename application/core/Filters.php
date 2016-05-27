<?php
H2o::addFilter('uppercase');
H2o::addFilter('trans');
H2o::addFilter('cmsDate');
H2o::addFilter('cmsDateInput');

function uppercase($string) {
    return mb_strtoupper($string);
}

function trans($string) {
    return \application\utils\Translator::trans($string, $_SESSION['lang']);
}

function cmsDate($date) {
    return \application\utils\Common::formatDatum($date);
}

function cmsDateInput($date) {
    return \application\utils\Common::formatDatumInput($date);
}