<?php

# VAULT TRANSACTION SETUPS
#
# These functions are used by the functions in the "vault transactions" -file
# to set up global variables containing prepared PDOStatements, in case
# those variables haven't already been set up.

function setUpGetPerson ($id)
{
    global $person_executable;
    $person_executable = Vault::getConnection()->read(['id', 'name', 'name_url_encoded', 'email', 'zip_code', 'about_you', 'annual_salary', 'dating_preference'], ['users_main'], "`id` = ?");
    $person_executable->execute([$id]);
    return $person_executable->fetch();
}

function setUpGetIdWithNameUrlEncoded ($name_url_encoded)
{
    global $id_executable;
    $id_executable = Vault::getConnection()->read(['id'], ['users_main'], "`name_url_encoded` = ?");
    $id_executable->execute([$name_url_encoded]);
    return $id_executable->fetch();
}

function setUpGetNameWithId ($id)
{
    global $name_with_id_executable;
    $name_with_id_executable = Vault::getConnection()->read(['name'], ['users_main'], "`id` = ?");
    $name_with_id_executable->execute([$id]);
    return $name_with_id_executable->fetch();
}

function setUpGetNameWithNameUrlEncoded ($name_url_encoded)
{
    global $name_with_name_url_encoded_executable;
    $name_with_name_url_encoded_executable = Vault::getConnection()->read(['name'], ['users_main'], "`name_url_encoded` = ?");
    $name_with_name_url_encoded_executable->execute([$name_url_encoded]);
    return $name_with_name_url_encoded_executable->fetch();
}

function setUpGetNameUrlEncodedWithId ($id)
{
    global $name_url_encoded_executable;
    $name_url_encoded_executable = Vault::getConnection()->read(['name_url_encoded'], ['users_main'], "`id`= ?");
    $name_url_encoded_executable->execute([$id]);
    return $name_url_encoded_executable->fetch();
}