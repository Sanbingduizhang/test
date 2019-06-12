<?php
/**
 * Created by PhpStorm.
 * User: a71
 * Date: 2019/3/28
 * Time: 11:32
 */
namespace test\framework;

class Core
{
    public function run()
    {
        $this->setReporting();
        $this->route();
    }

    /**
     * 设置错误报告等级
     */
    public function setReporting()
    {
        if (DEBUG_MODE === true) {
            error_reporting(E_ALL);
            ini_set('display_errors','On');
        } else {
            error_reporting(E_ALL);
            ini_set('display_errors','Off');
            ini_set('log_errors','On');
            ini_set('error_log',LOGS_DIR . 'error_log');
        }
    }

    /**
     * 路由规则
     */
    public function route()
    {
        if (!isset($_REQUEST['act'])) {


        }

    }
}