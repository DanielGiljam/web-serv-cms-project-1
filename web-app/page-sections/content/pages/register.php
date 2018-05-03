<?php

# REGISTER PAGE
#
# Generates the register page.

if (isset($app_state_central->getPageSpecificProperties()['reg-sub-finish-code'])) {
    if ($app_state_central->getPageSpecificProperties()['reg-sub-finish-code'] === 0) include 'register-successful.php';
    else include 'register-failed.php';
} else {
    include 'register-form.php';
}
