<?php

# VAULT TRANSACTIONS
#
# This is a list of functions which make up all the various types of
# database reads/writes that are performed throughout this application.

include 'vault-transaction-setups.php';

function getPerson($id)
{
    while (!isset($person_executable)) setUpGetPerson();
    $person_executable->execute([':id' => $id]);
    return $person_executable->fetchAll();
}

function getIdWithNameUrlEncoded($name_url_encoded)
{
    while (!isset($id_executable)) setUpGetIdWithNameUrlEncoded();
    $id_executable->execute([':name_url_encoded' => $name_url_encoded]);
    return $id_executable->fetchAll();
}

function getNameWithId($id)
{
    $db_request = "SELECT 'name' FROM 'users_main' WHERE 'id'=?";
    global $name_with_id_executable;
    if (!isset($name_with_id_executable)) $name_with_id_executable = Vault::getConnection()->prepare($db_request);
    $name_with_id_executable->execute(array($id));
    return $name_with_id_executable->fetchAll();
}

function getNameWithNameUrlEncoded($name_url_encoded)
{
    $db_request = "SELECT 'name' FROM 'users_main' WHERE 'name_url_encoded'=?";
    global $name_with_name_url_encoded_executable;
    if (!isset($name_with_name_url_encoded_executable)) $name_with_name_url_encoded_executable = Vault::getConnection()->prepare($db_request);
    $name_with_name_url_encoded_executable->execute(array($name_url_encoded));
    return $name_with_name_url_encoded_executable->fetchAll();
}

function getNameUrlEncodedWithId($id)
{
    $db_request = "SELECT 'name_url_encoded' FROM 'users_main' WHERE 'id'=?";
    global $name_url_encoded_executable;
    if (!isset($name_url_encoded_executable)) $name_url_encoded_executable = Vault::getConnection()->prepare($db_request);
    $name_url_encoded_executable->execute(array($id));
    return $name_url_encoded_executable->fetchAll();
}