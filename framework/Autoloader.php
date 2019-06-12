<?php
/**
 * Created by PhpStorm.
 * User: a71
 * Date: 2019/3/28
 * Time: 11:11
 */

class  Autoloader
{
    public static $loader;

    private function __construct()
    {
        spl_autoload_register(array(
            $this,
            'import'
        ));
    }

    /**
     * Autoloader的入口函数
     * 用于创建AutoLoader的唯一实例化对象
     * @return Autoloader
     */
    public static function init()
    {
        if (self::$loader == NUll) {
            self::$loader = new self();
        }
        return self::$loader;
    }

    /**
     * 类的自动加载方法
     * 根据传入参数$className，自动引入相应类的源文件
     * @param $className
     */
    public function import($className)
    {
        $path = explode('\\',substr($className,strlen('test')));
        $filePath = ROOT_DIR . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR,$path) . '.php';
        if (is_file($filePath)) {
            require $filePath;
        }
    }
}