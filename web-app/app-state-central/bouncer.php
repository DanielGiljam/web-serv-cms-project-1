<?php

# BOUNCER
#
# This file is the bouncer of this site if this site was a bar/nightclub.
# It provides functionality for checking if the client is logged in or not (who the client is)
# and for logging out the client.

function checkClientId()
{
    // TODO: bouncer.php's checkClientId() -function
    // 1. See if session is active (if active, retrieve client id – if not, proceed to step 2.)
    // 2. See if login -cookie is valid (if valid, start session – if not, return client id as 0)

    return '0';
}

function loginClient()
{
    if (isset($_POST) && isset($_POST['email']) && isset($_POST['password'])) {
        $password_hash = Person::getPasswordHash($_POST['email']);
        if (password_verify($_POST['password'], $password_hash)) {
            // TODO: bouncer.php's loginClient() -function
            $_SESSION['id'] = true;
            // 1. Start session based off POSTed data

        }
        else{
            $_SESSION['id'] = false;
        }
        // 2. Create login -cookie for client
    }
}

function logoutClient()
{
    // TODO: bouncer.php's logoutClient() -function
    // 1. Destroy any present (valid) login -cookies
    // 2. End session
}