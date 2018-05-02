<?php

// TODO: comment this file

function setUpGetPerson () {
    global $person_executable;
    $person_executable = Vault::getConnection()->prepare("SELECT 'id','name','name_url_encoded','email','zip_code','about_you','annual_salary','dating_preference' FROM 'users_main' WHERE 'id'=':id'");
}

function setUpGetIdWithNameUrlEncoded () {
    global $id_executable;
    $id_executable = Vault::getConnection()->prepare("SELECT 'id' FROM 'users_main' WHERE 'name_url_encoded'=':name_url_encoded'");
}