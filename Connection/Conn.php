<?php

namespace CNESIntegration\Connection;

use PDO;

class Conn
{
    private static $pdo;

    public static function getInstance()
    {
        $drive = env('CNES_DW_DB_DRIVE');
        $host = env('CNES_DW_DB_HOST');
        $port = env('CNES_DW_DB_PORT');
        $db = env('CNES_DW_DB_NAME');
        $user = env('CNES_DW_DB_USERNAME');
        $pass = env('CNES_DW_DB_PASSWORD');

        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO($drive . ":host=" . $host . "; port=" . $port . "; dbname=" . $db . ";", $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            } catch (\PDOException $e) {
                print "Erro: " . $e->getMessage();
            }
        }
        return self::$pdo;
    }
}
