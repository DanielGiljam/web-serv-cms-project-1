<?php

    function find_all_db_objects(){
        global $db;

        $sql = "SELECT * FROM users_main ";
        $sql .= "ORDER BY id ASC";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);

        return $result;
    }

    function find_db_objects_by_name($namn) {
        global $db;

        $sql = "SELECT * FROM users_main ";
        $sql .= "WHERE namn='" . $namn . "';";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        //echo $sql;
        $subject = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $subject; // returns an assoc. array
    }


