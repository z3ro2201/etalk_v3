<?php

session_start();

spl_autoload_register(function($className) {
    include __DIR__ . '/../classes/' . $className . '.php';
});

?>