<?php

route::add('get', '/', function(){
    require_once($_SERVER['DOCUMENT_ROOT'] . '/application/view/index.php');
});

route::add('get', '/action', function(){
    phpinfo();
});

route::add('get', '/survey', function(){
    require_once($_SERVER['DOCUMENT_ROOT'] . '/application/view/survey.php');
});

route::add('post', '/loginProc', function(){
    require_once($_SERVER['DOCUMENT_ROOT'] . '/application/classes/users.php');
});

route::run();
?>