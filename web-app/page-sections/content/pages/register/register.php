<?php

# REGISTER PAGE
#
# Generates the register page.

if (isset($app_state_central->getPageSpecificProperties()['reg-sub-finish-code'])) {
    include 'register-outcomes/register-code-' . $app_state_central->getPageSpecificProperties()['reg-sub-finish-code'] . '.php';
} else {
    include 'register-form.php';
}
