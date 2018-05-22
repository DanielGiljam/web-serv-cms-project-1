<?php

# BOUNCER
#
# This file is the bouncer of this site if this site was a bar/nightclub.
# It provides functionality for checking if the client is logged in or not (who the client is)
# and for logging out the client.

function checkClientId()
{
    if (isset($_SESSION['id'])) {
        $session_authenticated = authenticateSession($_SESSION['id']);
        return $session_authenticated;
    } else {
        return '0';
    }
    // TODO: bouncer.php's checkClientId() -function
    // 1. See if session is active (if active, retrieve client id – if not, proceed to step 2.)
    // 2. See if login -cookie is valid (if valid, start session – if not, return client id as 0)
}

function authenticateSession($session_id)
{
    $current_timestamp = new DateTime('now', new DateTimeZone('Europe/Helsinki'));
    $ses_auth_details = verifySession($_SESSION['id']);
    if (isset($ses_auth_details['user_id']) && isset($ses_auth_details['session_expiration'])) {
        if ($current_timestamp->getTimestamp() < strtotime($ses_auth_details['session_expiration'])) {
            return $ses_auth_details['user_id'];
        } else {
            sealSession($session_id);
            return '0';
        }
    } else {
        return '0';
    }
}

function loginClient()
{
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $password_hash = Person::getPasswordHash(new Email($_POST['email']));
        $id = Person::getId(new Email($_POST['email']));
        if ($password_hash !== false && password_verify($_POST['password'], $password_hash)) {
            $_SESSION['id'] = createSession($id)['session_id'];
            return true;
        } else {
            logFailedLogInAttempt();
            return false;
        }
        // TODO: bouncer.php's loginClient() -function
        // 1. Start session based off POSTed data
        // 2. Create login -cookie for client
    }
}

function logoutClient()
{
    sealSession($_SESSION['id']);
    // TODO: bouncer.php's logoutClient() -function
    // 1. Destroy any present (valid) login -cookies
    // 2. End session
}