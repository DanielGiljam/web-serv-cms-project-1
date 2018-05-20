<?php

# VAULT
#
# This object provides functionality for accessing the database and managing that connection.
# Inspiration taken from wickstjo's db class - see https://github.com/wickstjo/backend/blob/master/core/classes/db.php

class Vault {

    private static $connection = null;
    private $handler = null;

    private function __CONSTRUCT()
    {
        $host = 'localhost';
        $name = 'web_serv_cms_project_1';
        $username = 'wscp1-admin';
        $password = '';
        $this->handler = new PDO('mysql:host=' . $host . '; dbname=' . $name, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
        $this->handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // will be removed when site is released

    }
    
    public static function getConnection()
    {
        if (!isset(self::$connection)) {
            self::$connection = new Vault();
        }
        return self::$connection;
    }

    public static function closeConnection()
    {
        // TODO: make this function
    }

    public function create($insert_into, $columns, $values)
    {
        $command = "INSERT INTO `" . $insert_into[0] . "` (";
        foreach ($columns as $c) {
            $command .= "`" . $c . "`";
            if ($c !== $columns[count($columns) - 1]) $command .= ",";
        }
        $command .= ") VALUES (";
        foreach ($values as $v) {
            switch ($v) {
                case 'UNIQUE_ID':
                    $command .= "UUID()";
                    break;
                case 'EXPIRATION_TIMESTAMP':
                    $command .= "addtime(now(),'02:00:00')";
                    break;
                case 'CURRENT_TIMESTAMP':
                    $command .= "now()";
                    break;
                default:
                    $command .= "'" . $v . "'";
                    break;
            }
            if ($v !== $values[count($values) - 1]) $command .= ",";
            else $command .= ")";
        }
        // echo 'create -query: "' . $command . '"<br>';
        return $this->handler->prepare($command);
    }

    public function read($select, $from, $where)
    {
        $command = "SELECT ";
        foreach ($select as $s) {
            $command .= "`" . $s . "`";
            if ($s !== $select[count($select) - 1]) $command .= ",";
        }
        $command .= " FROM `" . $from[0] . "`";
        $command .= " WHERE " . $where[0];
        // echo 'read -query: "' . $command . '"<br>';
        return $this->handler->prepare($command);
    }

    public function update($table_name, $column_names, $column_values, $condition)
    {
        $command = "UPDATE `" . $table_name[0] . "` SET ";
        $i = 0;
        foreach ($column_names as $cn) {
            switch ($column_values[$i]) {
                case 'UNIQUE_ID':
                    $cv = "UUID()";
                    break;
                case 'EXPIRATION_TIMESTAMP':
                    $cv = "addtime(now(),'02:00:00')";
                    break;
                case 'CURRENT_TIMESTAMP':
                    $cv = "now()";
                    break;
                default:
                    $cv = "'" . $column_values[$i] . "'";
                    break;
            }
            $command .= "`" . $cn . "` = " . $cv;
            if ($cn !== $column_names[count($column_names) - 1]) $command .= ", ";
            $i++;
        }
        $command .= " WHERE " . $condition[0];
        // echo 'update -query: "' . $command . '"<br>';
        return $this->handler->prepare($command);
    }

    public function delete()
    {
        // TODO: make this function
    }
}

include 'vault-transactions.php';