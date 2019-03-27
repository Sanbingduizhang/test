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
    public function dbpdo()
    {
        $dbConfig = [
            'host' => '39.96.53.113',
            'db_name' => 'test',
            'db_user' => 'liawen',
            'db_password' => 'xiaohaizi1!',
        ];

        return [
            'dsn' => "mysql:host={$dbConfig['host']};dbname={$dbConfig['db_name']}",
            'user' => $dbConfig['db_user'],
            'password' => $dbConfig['db_password'],
        ];
    }
    /**
     * db 相关配置
     * @return array
     */
    public function dbmysql()
    {
        return array(
            'host' => '39.96.53.113',
            'dbname' => 'test',
            'dbuser' => 'liawen',
            'dbpwd' => 'xiaohaizi1!',
            'port' => '3306',
        );
    }
}