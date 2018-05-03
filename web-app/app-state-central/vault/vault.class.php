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

    public function create($insert_into, $columns, $values, $id_gen_flag)
    {
        $command = "INSERT INTO `" . $insert_into . "` (";
        foreach ($columns as $c) {
            $command .= "`" . $c . "`";
            if ($c !== $columns[count($columns) - 1]) $command .= ",";
        }
        $command .= ") VALUES (";
        $i = 0;
        foreach ($values as $v) {
            if ($id_gen_flag && $i === 0) $command .= $v;
            else $command .= "`" . $v . "`";
            if ($v !== $values[count($values) - 1]) $command .= ",";
            else $command .= ")";
            $i++;
        }
        return $this->handler->prepare($command);
    }

    public function read($select, $from, $where)
    {
        $command = "SELECT ";
        foreach ($select as $s) {
            $command .= "`" . $s . "`";
            if ($s !== $select[count($select) - 1]) $command .= ",";
        }
        $command .= " FROM ";
        foreach ($from as $f) {
            $command .= "`" . $f . "`";
            if ($f !== $from[count($from) - 1]) $command .= ",";
        }
        $command .= " WHERE " . $where;
        return $this->handler->prepare($command);
    }

    public function update()
    {
        // TODO: make this function
    }

    public function delete()
    {
        // TODO: make this function
    }
}

include 'vault-transactions.php';