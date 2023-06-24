<?php

define('APP_DIR', __DIR__);

require_once APP_DIR . '/vendor/autoload.php';

if (!file_exists(APP_DIR . '/conf/config.php')) {
    $conf = include APP_DIR . '/conf/defaulr.config.php';
} else {
    $conf = include APP_DIR . '/conf/config.php';
}

\FE\Db::init($conf['db']['host'], $conf['db']['db'], $conf['db']['user'], $conf['db']['pwd']);

\FE\Smarty::init();
