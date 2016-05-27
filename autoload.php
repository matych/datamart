<?php

function PSR0Autoload($className) {
    if(!class_exists($className)) {
        $className = ltrim($className, '\\');
        $fileName  = dirname(__FILE__) . '\\';

        if($lastNsPos = strripos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName .= DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
        if(file_exists($fileName)) {
            include $fileName;
        }
    }
}

spl_autoload_register('PSR0Autoload', true, false);