<?php

# BOUNCER
#
# This file is like the bouncer of this site if this site was a bar/nightclub.
# It provides functionality for checking if the client is logged in or not (who the client is)
# and for logging out the client.

function checkClientId()
{
    // TODO: bouncer.php's checkClientId() -function
    // 1. See if session is active (if active, retrieve client id – if not, proceed to step 2.)
    // 2. See if login -cookie is valid (if valid, start session – if not, return client id as 0)

    return '0';
}

function logoutClient()
{
    // TODO: bouncer.php's logoutClient() -function
    // 1. Destroy any present (valid) login -cookies
    // 2. End session
}