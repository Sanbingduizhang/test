<?php
include 'config.php';
class mysql_pdo {
    protected $pdo;
    public function __construct()
    {
        try {

            $config = new config();
            $db = $config->dbpdo();
            $pdo = new PDO($db['dsn'], $db['user'], $db['password']);
            $this->pdo = $pdo;

        } catch (PDOException $e) {

            var_dump(json_encode([
                'status' => false,
                'code' => 500,
                'smsg' => 'error: ' . $e->getMessage(),
            ]));
            exit();

        }

    }
    public function fetchAll()
    {
        $pdo_pre = $this->pdo->prepare('select * from test');
        $pdo_pre->execute();
        return $pdo_pre->fetchAll(PDO::FETCH_ASSOC);
    }
}