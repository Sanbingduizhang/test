<?php
include 'mysql_pdo.php';
$pdo = new mysql_pdo();
$res = $pdo->fetchAll();
echo '<pre>';
var_dump($res);