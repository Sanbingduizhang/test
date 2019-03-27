<?php

//给目录定义一些常量
define('ROOT_DIR',__DIR__ . '/..');                 //项目根目录
define('APP_DIR',ROOT_DIR . '/app');                //app程序所在目录
define('CONFIG_DIR',ROOT_DIR . '/config');          //配置文件目录
define('FRAMEWORK_DIR',ROOT_DIR . '/framework');    //核心文件目录
define('LOGS_DIR',ROOT_DIR . '/logs');              //日志文件目录
define('PUBLIC_DIR',__DIR__ . '/');                 //public文件目录

//设置整站的时区
define('TIMEZONE','Asia/Shanghai');
ini_set('data.timezone',TIMEZONE);

var_dump(PUBLIC_DIR);exit();