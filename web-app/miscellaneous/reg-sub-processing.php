<?php

# REGISTRATION SUBMISSION PROCESSING
#
# Contains functions for processing a registration submission.

function validatePost()
{
    $validate_name = isset($_POST['name']);
    $validate_email = isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $validate_password = isset($_POST['password']) && isset($_POST['confirm_password']) && $_POST['password'] === $_POST['confirm_password'];
    $validate_zip_code = isset($_POST['zip_code']) && preg_match('/^[0-9]{5}$/i', $_POST['zip_code']);
    $validate_about_you = isset($_POST['about_you']);
    $validate_annual_salary = isset($_POST['annual_salary']) && preg_match('/^[0-9]+$/i', $_POST['zip_code']);
    $validate_dating_preference = isset($_POST['dating_preference_male']) || isset($_POST['dating_preference_female']) || isset($_POST['dating_preference_other']);
    return  $validate_name &&
            $validate_email &&
            $validate_password &&
            $validate_zip_code &&
            $validate_about_you &&
            $validate_annual_salary &&
            $validate_dating_preference;
}

function extractPostAndCreatePerson()
{
    $name = $_POST['name'];
    $password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $zip_code = $_POST['zip_code'];
    $about_you = $_POST['about_you'];
    $annual_salary = $_POST['annual_salary'];
    if (isset($_POST['dating_preference_male'])) $dp_0 = 4;
    else $dp_0 = 0;
    if (isset($_POST['dating_preference_female'])) $dp_1 = 3;
    else $dp_1 = 0;
    if (isset($_POST['dating_preference_other'])) $dp_2 = 2;
    else $dp_2 = 0;
    $dating_preference = $dp_0 + $dp_1 + $dp_2;
    Person::createPerson(
        $name,
        $password_hash,
        $email,
        $zip_code,
        $about_you,
        $annual_salary,
        $dating_preference);
}