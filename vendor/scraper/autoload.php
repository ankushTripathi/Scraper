<?php


spl_autoload_register(function($name){

    $name = substr($name,strpos($name,"\\",1));
    $class_path = str_replace('\\',DIRECTORY_SEPARATOR,$name).'.php';
    require_once __DIR__.$class_path;
});