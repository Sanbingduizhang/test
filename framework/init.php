<?php
/**
 * Created by PhpStorm.
 * User: a71
 * Date: 2019/3/28
 * Time: 10:57
 */
namespace test\framework;

//引入配置文件
require CONFIG_DIR . 'config.php';

//引入自动加载类
require 'Autoloader.php';

//初始化自动加载
\Autoloader::init();
Session::start();
//启用seesion
$core = new Core();
$core->run();
//启动核心处理程序