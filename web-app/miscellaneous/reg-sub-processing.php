<?php

# REGISTRATION SUBMISSION PROCESSING
#
# Contains functions for processing a registration submission.

function validatePost()
{
    $validate_name = isset($_POST['name']) && !preg_match('/[^a-zàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿŒœŠšŸƒ \'-]/i', $_POST['name']);
    $validate_email = isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $validate_password = isset($_POST['password']) && isset($_POST['confirm_password']) && $_POST['password'] === $_POST['confirm_password'];
    $validate_zip_code = isset($_POST['zip_code']) && preg_match('/^[0-9]{5}$/', $_POST['zip_code']);
    $validate_about_you = isset($_POST['about_you']);
    $validate_annual_salary = isset($_POST['annual_salary_hidden']) && preg_match('/^[0-9]+$/', $_POST['annual_salary_hidden']);
    $validate_currency_preference = isset($_POST['currency_preference']);
    $validate_dating_preference = isset($_POST['dating_preference_male']) || isset($_POST['dating_preference_female']) || isset($_POST['dating_preference_other']);
    return  $validate_name &&
            $validate_email &&
            $validate_password &&
            $validate_zip_code &&
            $validate_about_you &&
            $validate_annual_salary &&
            $validate_currency_preference &&
            $validate_dating_preference;
}

function emailIsFree()
{
    if (isset(verifyEmail($_POST['email'])['email'])) return false;
    else return true;
}

function extractPostAndCreatePerson()
{
    $name = $_POST['name'];
    $password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $zip_code = $_POST['zip_code'];
    $about_you = $_POST['about_you'];
    $annual_salary = $_POST['annual_salary'];
    switch ($_POST['currency_preference']) {
        case 'currency_preference_USDEUR':
            $cp = 1;
            break;
        case 'currency_preference_USDGBP':
            $cp = 2;
            break;
        case 'currency_preference_USDSEK':
            $cp = 3;
            break;
        case 'currency_preference_USDNOK':
            $cp = 4;
            break;
        default:
            $cp = 0;
            break;
    }
    if (isset($_POST['dating_preference_male'])) $dp_0 = 4;
    else $dp_0 = 0;
    if (isset($_POST['dating_preference_female'])) $dp_1 = 3;
    else $dp_1 = 0;
    if (isset($_POST['dating_preference_other'])) $dp_2 = 2;
    else $dp_2 = 0;
    $dating_preference = $dp_0 + $dp_1 + $dp_2;
    $preferences = [];
    $preferences['currency_preference'] = $cp;
    Person::createPerson(
        $name,
        $password_hash,
        $email,
        $zip_code,
        $about_you,
        $annual_salary,
        $dating_preference,
        $preferences);
}

function logFailedRegistrationAttempt()
{
    $password_1 = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $password_2 = password_hash($_POST['confirm_password'], PASSWORD_BCRYPT);
    if (isset($_POST['dating_preference_male'])) $dp_0 = 4;
    else $dp_0 = 0;
    if (isset($_POST['dating_preference_female'])) $dp_1 = 3;
    else $dp_1 = 0;
    if (isset($_POST['dating_preference_other'])) $dp_2 = 2;
    else $dp_2 = 0;
    $dating_preference = $dp_0 + $dp_1 + $dp_2;
    $event = '{ "failedregistrationattempt": { "name":"' . $_POST['name'] . '", "password1":"' . $password_1 . '", "password2":"' . $password_2 . '", "email":"' . $_POST['email'] . '", "zipcode":"' . $_POST['zip_code'] . '", "aboutyou":"' . $_POST['about_you'] . '", "annualsalary":"' . $_POST['annual_salary'] . '", "datingpreference":"' . $dating_preference . '" } }';
    logAnomalityEvent($_SERVER['REMOTE_ADDR'], $event);
}