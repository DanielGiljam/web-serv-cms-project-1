<?php

# VAULT TRANSACTIONS
#
# This is a list of functions which make up all the various types of
# database reads/writes that are performed throughout this application.

include 'vault-transaction-setups.php';

$person_executable = null;

function getPerson($id)
{
    if (!isset($person_executable)) {
        return setUpGetPerson($id);
    } else {
        $person_executable->execute([$id]);
        return $person_executable->fetch();
    }

}

$id_executable = null;

function getIdWithNameUrlEncoded($name_url_encoded)
{
    if (!isset($id_executable)) {
        return setUpGetIdWithNameUrlEncoded($name_url_encoded);
    } else {
        $id_executable->execute([$name_url_encoded]);
        return $id_executable->fetch();
    }
}

$name_url_encoded_executable = null;

function getNameUrlEncodedWithId($id)
{
    if (!isset($name_url_encoded_executable)) {
        return setUpGetNameUrlEncodedWithId($id);
    } else {
        $name_url_encoded_executable->execute([$id]);
        return $name_url_encoded_executable->fetch();
    }
}

$password_hash_executable = null;

function getPasswordHashWithEmail($email)
{
    if (!isset($password_hash_executable)) {
        return setUpGetNameUrlEncodedWithId($email);
    } else {
        $password_hash_executable->execute([$email]);
        return $password_hash_executable->fetch();
    }
}

$name_with_id_executable = null;

function getNameWithId($id)
{
    if (!isset($name_with_id_executable)) {
        return setUpGetNameWithId($id);
    } else {
        $name_with_id_executable->execute([$id]);
        return $name_with_id_executable->fetch();
    }
}

$name_with_name_url_encoded_executable = null;

function getNameWithNameUrlEncoded($name_url_encoded)
{
    if (!isset($name_with_name_url_encoded_executable)) {
        return setUpGetNameWithNameUrlEncoded($name_url_encoded);
    } else {
        $name_with_name_url_encoded_executable->execute([$name_url_encoded]);
        return $name_with_name_url_encoded_executable->fetch();
    }
}