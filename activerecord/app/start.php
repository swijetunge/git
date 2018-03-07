<?php

session_start();

require_once __DIR__ .'/../vendor/autoload.php';

ActiveRecord\Config::initialize(function ($config)
{
    $config->set_connections([
       'development' => 'mysql://root:@127.0.0.1/test'
    ]);
});