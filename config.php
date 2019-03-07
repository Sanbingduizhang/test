<?php

/**
 * Created by PhpStorm.
 * User: Mloong
 * Date: 2019/3/7
 * Time: 22:14
 */
class config
{
    /**
     * 返回db相关配置
     * @return array
     */
    public function db()
    {
        $dbConfig = [
            'host' => '127.0.0.1',
            'db_name' => 'my_test',
            'db_user' => 'root',
            'db_password' => 'root',
        ];

        return [
            'dsn' => "mysql:host={$dbConfig['host']};dbname={$dbConfig['db_name']}",
            'user' => $dbConfig['db_user'],
            'password' => $dbConfig['db_password'],
        ];
    }
}