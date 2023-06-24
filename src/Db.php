<?php

namespace FE;

use chillerlan\Database\Drivers\Native\MySQLiDriver;
use chillerlan\Database\Options;

class Db
{
    private static ?MySQLiDriver $instance;

    public static function init(string $host, string $database, string $user, string $password): void
    {
        $options = new Options([
            'database'  => $database,
            'username'  => $user,
            'password'  => $password,
            'host'      => $host,
        ]);

        self::$instance = new MySQLiDriver($options);

        self::$instance->connect();
        self::$instance->raw("SET SQL_MODE=''");
        self::$instance->raw("SET NAMES 'utf8'");
    }

    public static function getDb(): MySQLiDriver
    {
        if (!self::$instance) {
            throw new \LogicException("Db driver not init");
        }

        return self::$instance;
    }
}
