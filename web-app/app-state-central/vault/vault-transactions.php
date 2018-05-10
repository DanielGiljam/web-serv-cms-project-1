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

function createPerson($person_data)
{
    $create_person_executable = Vault::getConnection()->create(['users_main'], ['id', 'name', 'name_url_encoded', 'password_hash', 'email', 'zip_code', 'about_you', 'annual_salary', 'dating_preference'], $person_data);
    $create_person_executable->execute();
}

$id_with_name_url_encoded_executable = null;

function getIdWithNameUrlEncoded($name_url_encoded)
{
    if (!isset($id_with_name_url_encoded_executable)) {
        return setUpGetIdWithNameUrlEncoded($name_url_encoded);
    } else {
        $id_with_name_url_encoded_executable->execute([$name_url_encoded]);
        return $id_with_name_url_encoded_executable->fetch();
    }
}

$id_with_email_executable = null;

function getIdWithEmail($email)
{
    if (!isset($id_with_email_executable)) {
        return setUpGetIdWithEmail($email);
    } else {
        $id_with_email_executable->execute([$email]);
        return $id_with_email_executable->fetch();
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

$verify_name_url_encoded_executable = null;

function verifyNameUrlEncoded($name_url_encoded)
{
    if (!isset($verify_name_url_encoded_executable)) {
        return setUpVerifyNameUrlEncoded($name_url_encoded);
    } else {
        $verify_name_url_encoded_executable->execute([$name_url_encoded]);
        return $verify_name_url_encoded_executable->fetch();
    }
}

function verifyEmail($email)
{
    $verify_email_executable = Vault::getConnection()->read(['email'], ['users_main'], ["`email` = ?"]);
    $verify_email_executable->execute([$email]);
    return $verify_email_executable->fetch();
}

function logFRA($remote_addr, $event)
{
    $log_fra_executable = Vault::getConnection()->create(['anomalities_log'], ['remote_addr', 'event'], [$remote_addr, $event]);
    $log_fra_executable->execute();
}

function createSession($id)
{
    $create_session_executable = Vault::getConnection()->create(['sessions_log'], ['session_id', 'user_id', 'remote_addr', 'session_expiration'], ['UNIQUE_ID', $id, $_SERVER['REMOTE_ADDR'], 'EXPIRATION_TIMESTAMP']);
    $create_session_executable->execute();
    $read_session_id_executable = Vault::getConnection()->read(['session_id'], ['sessions_log'], ["`user_id` = ? && `session_end` = null"]);
    $read_session_id_executable->execute([$id]);
    return $read_session_id_executable->fetch();
}

$authenticate_session_executable = null;

function authenticateSession($session_id)
{
    if (!isset($authenticate_session_executable)) {
        return setUpAuthenticateSession($session_id);
    } else {
        $authenticate_session_executable->execute([$session_id]);
        return $authenticate_session_executable->fetch();
    }
}

function sealSession ($session_id)
{
    // TODO: make this function!
}