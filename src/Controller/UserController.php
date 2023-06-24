<?php

namespace FE\Controller;

use FE\Services\UserService;
use FE\Smarty;

class UserController
{
    private const PER_PAGE = 50;

    public static function run()
    {
        $p = intval($_GET['p'] ?? 0);

        Smarty::getRender()->assign('list', UserService::getUserList($p * self::PER_PAGE, ($p + 1) * self::PER_PAGE));
        Smarty::getRender()->assign('current_page', $p);
        Smarty::getRender()->assign('per_page', self::PER_PAGE);
        Smarty::getRender()->assign('total', UserService::getUsersCount());

        Smarty::getRender()->display('main.tpl');
    }
}
