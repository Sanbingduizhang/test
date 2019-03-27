<?php
var_dump(11111);exit();
include 'mysql_pdo.php';
$pdo = new mysql_pdo();
$res = $pdo->fetchAll();
echo '<pre>';
var_dump($res);