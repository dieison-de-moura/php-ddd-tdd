<?php

namespace Core\Infrastructure\Orm;

use Illuminate\Database\Capsule\Manager as Capsule;

class Config
{
    public static function connection()
    {
        $capsule = new Capsule;

        // Configurações do banco de dados
        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => '0.0.0.0',
            'port' => 3306,
            'database' => 'php_ddd_tdd',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}
