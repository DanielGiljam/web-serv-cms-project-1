<?php

# REGISTER PAGE
#
# Generates the register page.

if (isset($app_state_central->getPageSpecificProperties()['reg_sub_finish_code'])) {
    include 'register-outcomes/register-code-' . $app_state_central->getPageSpecificProperties()['reg_sub_finish_code'] . '.php';
} else {
    include 'register-form.php';
}
