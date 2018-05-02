<?php

# VAULT
#
# This file provides functionality for accessing the database and managing that connection.
# Inspiration taken from wickstjo's db class - see https://github.com/wickstjo/backend/blob/master/core/classes/db.php

class Vault {

    private static $connection = null;
    private $pdo = null;

    private function __CONSTRUCT()
    {
        $host = 'localhost';
        $name = 'web_serv_cms_project_1';
        $username = 'wscp1-admin';
        $password = '';
        $this->pdo = new PDO('mysql:host=' . $host . '; dbname=' . $name, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));

    }
    
    public static function getConnection()
    {
        if (!isset(self::$connection)) {
            self::$connection = new Vault();
        }
        return self::$connection->pdo;
    }

    public static function closeConnection()
    {
        // TODO: make this function
    }
}

include 'vault-transactions.php';