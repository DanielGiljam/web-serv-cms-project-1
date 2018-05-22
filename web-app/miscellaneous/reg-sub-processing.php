<?php

# REGISTRATION SUBMISSION PROCESSING
#
# Contains functions for processing a registration submission.

function validatePost()
{
    $validate_name = isset($_POST['name']) && !preg_match('/[^a-zàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿŒœŠšŸƒ \'-]/i', $_POST['name']);
    $validate_gender = isset($_POST['gender']);
    $validate_email = isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $validate_password = isset($_POST['password']) && isset($_POST['confirm_password']) && $_POST['password'] === $_POST['confirm_password'];
    $validate_zip_code = isset($_POST['zip_code']) && preg_match('/^[0-9]{5}$/', $_POST['zip_code']);
    $validate_about_you = isset($_POST['about_you']);
    $validate_annual_salary = isset($_POST['annual_salary_hidden']) && preg_match('/^[0-9]+$/', $_POST['annual_salary_hidden']);
    $validate_currency_preference = isset($_POST['currency_preference']);
    $validate_dating_preference = isset($_POST['dating_preference_male']) || isset($_POST['dating_preference_female']) || isset($_POST['dating_preference_other']);
    return  $validate_name &&
            $validate_gender &&
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
    switch ($_POST['gender']) {
        case 'male':
            $gender = 0;
            break;
        case 'female':
            $gender = 1;
            break;
        default:
            $gender = 2;
            break;
    }
    $password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $zip_code = $_POST['zip_code'];
    $about_you = $_POST['about_you'];
    $annual_salary = $_POST['annual_salary'];
    switch ($_POST['currency_preference']) {
        case 'USDEUR':
            $cp = 1;
            break;
        case 'USDGBP':
            $cp = 2;
            break;
        case 'USDSEK':
            $cp = 3;
            break;
        case 'USDNOK':
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
        $gender,
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
    $gender = (isset($_POST['gender'])) ? $_POST['gender'] : '';
    $name = (isset($_POST['name'])) ? $_POST['name'] : '';
    $password_1 = (isset($_POST['password'])) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : '';
    $password_2 = (isset($_POST['confirm_password'])) ? password_hash($_POST['confirm_password'], PASSWORD_BCRYPT) : '';
    $email = (isset($_POST['email'])) ? $_POST['email'] : '';
    $zip_code = (isset($_POST['zip_code'])) ? $_POST['zip_code'] : '';
    $about_you = (isset($_POST['about_you'])) ? $_POST['about_you'] : '';
    $annual_salary = (isset($_POST['annual_salary'])) ? $_POST['annual_salary'] : '';
    $currency_preference = (isset($_POST['currency_preference'])) ? $_POST['currency_preference'] : '';
    if (isset($_POST['dating_preference_male'])) $dp_0 = 4;
    else $dp_0 = 0;
    if (isset($_POST['dating_preference_female'])) $dp_1 = 3;
    else $dp_1 = 0;
    if (isset($_POST['dating_preference_other'])) $dp_2 = 2;
    else $dp_2 = 0;
    if (!(isset($_POST['dating_preference_male']) && isset($_POST['dating_preference_female']) && isset($_POST['dating_preference_other']))) $dating_preference = '';
    else $dating_preference = $dp_0 + $dp_1 + $dp_2;
    $event = '{ "failedregistrationattempt": { "gender":"' . $gender . '", "name":"' . $name . '", "password1":"' . $password_1 . '", "password2":"' . $password_2 . '", "email":"' . $email . '", "zipcode":"' . $zip_code . '", "aboutyou":"' . $about_you . '", "annualsalary":"' . $annual_salary . '", "currencypreference":"' . $currency_preference . '", "datingpreference":"' . $dating_preference . '" } }';
    logAnomalityEvent($_SERVER['REMOTE_ADDR'], $event);
}