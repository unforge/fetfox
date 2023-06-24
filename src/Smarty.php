<?php

namespace FE;

class Smarty
{
    private static \Smarty $instance;

    public static function init()
    {
        self::$instance = new \Smarty();
        self::$instance->setTemplateDir(APP_DIR . "/smarty/templates");
        self::$instance->setCompileDir(APP_DIR . "/smarty/templates_c");
    }

    public static function getRender()
    {
        return self::$instance;
    }
}
