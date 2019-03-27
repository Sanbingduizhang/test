<?php

/**
 * 数据库基本查询操作
 * Created by PhpStorm.
 * User: fxl
 * Date: 2018/11/16
 * Time: 16:31
 */
class mysql
{
    protected $table;

    public function __construct($newTable)
    {
        $this->table = $newTable;
    }

    /**
     * mysql 的配置
     * @return mysqli
     */
    private function config()
    {
        //获取相应配置
        include __DIR__ . '/config.php';
        $config = new config();
        $dbconfig = $config->dbmysql();
        //数据库连接
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['dbuser'], $dbconfig['dbpwd'], $dbconfig['dbname'], $dbconfig['port']);
        if (!$conn) {
            die('Could not connect:' . mysqli_error($conn));
        }
        //设置查询方式
        mysqli_query($conn, 'set names utf8');
        return $conn;
    }

    /**
     * 获取所有数据
     * @return array|null
     */
    public function fetchAll()
    {
        //开启查询
        $conn = $this->config();
        $queryRes = mysqli_query($conn, "select * from $this->table");
        $ResArr = mysqli_fetch_all($queryRes, MYSQLI_ASSOC);
        // 释放内存
        mysqli_free_result($queryRes);
        //关闭连接
        mysqli_close($conn);
        return $ResArr;
    }

    /**
     * 获取一条数据
     * @return array|null
     */
    public function find($id)
    {
        //开启查询
        $conn = $this->config();
        $queryRes = mysqli_query($conn, "select * from $this->table limit 1");
        $ResArr = mysqli_fetch_assoc($queryRes);
        // 释放内存
        mysqli_free_result($queryRes);
        //关闭连接
        mysqli_close($conn);
        return $ResArr;
    }

    /**
     * @param array $order 排序规则
     * @param int $limit 每页显示条数
     * @param int $offset 偏移量(哪一页)
     * @return array
     */
    public function fetchPage($order = array(), $limit = 10, $offset = 1)
    {
        $sql = "select * from $this->table where 1=1 ";
        //如果有排序
        if (!empty($order)) {
            if (!is_array($order)) {
                die('please input array!');
            }
            $sql .= ' order by ';
            foreach ($order as $k => $v) {
                $sql .= empty($v) ? $k . ' DESC,' : $k . ' ' . $v . ',';
            }
        }
        //每一页显示的数据
        $sql .= ' limit ' . $limit . ' offset ' . ($offset - 1);

        //开启查询
        $conn = $this->config();
        //查询总数
        $sqlcount = "select COUNT(*) as count from $this->table";
        $queryResCount = mysqli_query($conn, $sqlcount);
        $ResArrCount = mysqli_fetch_assoc($queryResCount);

        //查询数据
        $queryRes = mysqli_query($conn, $sql);
        $ResArr = mysqli_fetch_all($queryRes, MYSQLI_ASSOC);
        // 释放内存
        mysqli_free_result($queryResCount);
        mysqli_free_result($queryRes);
        //关闭连接
        mysqli_close($conn);
        //返回数据
        return array(
            'data' => $ResArr,
            'pagnation' => array(
                'page' => $limit,
                'currentPage' => $offset,
                'totalPage' => ceil($ResArrCount['count'] / $limit)
            )
        );
    }

    public function fetch()
    {

    }
}
