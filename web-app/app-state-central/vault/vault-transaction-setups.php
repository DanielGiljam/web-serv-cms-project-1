<?php

# VAULT TRANSACTION SETUPS
#
# These functions are used by the functions in the "vault transactions" -file
# to set up global variables containing prepared PDOStatements, in case
# those variables haven't already been set up.

function setUpGetPerson ($id)
{
    $person_executable = Vault::getConnection()->read(['id', 'name', 'name_url_encoded', 'email', 'zip_code', 'about_you', 'annual_salary', 'dating_preference'], ['users_main'], ["`id` = ?"]);
    $person_executable->execute([$id]);
    return $person_executable->fetch();
}

function setUpGetIdWithNameUrlEncoded ($name_url_encoded)
{
    $id_with_name_url_encoded_executable = Vault::getConnection()->read(['id'], ['users_main'], ["`name_url_encoded` = ?"]);
    $id_with_name_url_encoded_executable->execute([$name_url_encoded]);
    return $id_with_name_url_encoded_executable->fetch();
}

function setUpGetIdWithEmail ($email)
{
    $id_with_email_executable = Vault::getConnection()->read(['id'], ['users_main'], ["`email` = ?"]);
    $id_with_email_executable->execute([$email]);
    return $id_with_email_executable->fetch();
}

function setUpGetNameUrlEncodedWithId ($id)
{
    $name_url_encoded_executable = Vault::getConnection()->read(['name_url_encoded'], ['users_main'], ["`id` = ?"]);
    $name_url_encoded_executable->execute([$id]);
    return $name_url_encoded_executable->fetch();
}

function setUpGetPasswordHashWithEmail ($email)
{
    $password_hash_executable = Vault::getConnection()->read(['password_hash'], ['users_main'], ["`email` = ?"]);
    $password_hash_executable->execute([$email]);
    return $password_hash_executable->fetch();
}

function setUpGetNameWithId ($id)
{
    $name_with_id_executable = Vault::getConnection()->read(['name'], ['users_main'], ["`id` = ?"]);
    $name_with_id_executable->execute([$id]);
    return $name_with_id_executable->fetch();
}

function setUpGetNameWithNameUrlEncoded ($name_url_encoded)
{
    $name_with_name_url_encoded_executable = Vault::getConnection()->read(['name'], ['users_main'], ["`name_url_encoded` = ?"]);
    $name_with_name_url_encoded_executable->execute([$name_url_encoded]);
    return $name_with_name_url_encoded_executable->fetch();
}

function setUpVerifyNameUrlEncoded ($name_url_encoded)
{
    $verify_name_url_encoded_executable = Vault::getConnection()->read(['name_url_encoded'], ['users_main'], ["`name_url_encoded` = ?"]);
    $verify_name_url_encoded_executable->execute([$name_url_encoded]);
    return $verify_name_url_encoded_executable->fetch();
}

function setUpVerifySession ($session_id)
{
    $authenticate_session_executable = Vault::getConnection()->read(['user_id', 'session_expiration'], ['sessions_log'], ["`session_id` = ? && `session_end` is null"]);
    $authenticate_session_executable->execute([$session_id]);
    return $authenticate_session_executable->fetch();
}

function setUpSealSession ($session_id)
{
    $seal_session_executable = Vault::getConnection()->update(['sessions_log'], ['session_end'], ['CURRENT_TIMESTAMP'], ["`session_id` = ?"]);
    $seal_session_executable->execute([$session_id]);
}