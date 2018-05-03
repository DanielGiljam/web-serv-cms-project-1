<?php

# REGISTER PAGE
#
# Generates the register page.

if (isset($app_state_central->getPageSpecificProperties()['registration-submitted']) && $app_state_central->getPageSpecificProperties()['registration-submitted']) {
    include 'register-submit.php';
} else {
    include 'register-form.php';
}
