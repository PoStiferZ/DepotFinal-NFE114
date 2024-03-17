<?php

class DBCnx
{
    private static $instancePDO;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        try {
            if (self::$instancePDO == null) {
                self::$instancePDO = new PDO("mysql:host=localhost;dbname=lapala", "lapala_user", "1234");
            }
            return self::$instancePDO;
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
            return null;
        }
    }
}
