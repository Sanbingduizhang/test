<?php


class index {

    public function aa()
    {

        try {
            include 'mysql_pdo.php';
            $pdo = new mysql_pdo();
            $res = $pdo->fetchAll();
            return $res;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            exit();
        }

    }

}


$index = new index();
$res = $index->aa();
var_dump($res);