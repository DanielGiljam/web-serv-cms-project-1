<?php

# LOG IN BUTTON
#
# This header element is shown when the site is navigated by an anonymous user (client id 0)
# and consists of a log in -button that toggles the visibility of a login form and a sign up -button that takes the user to the register page.

?>

<div id="header-buttons">
    <button onclick="toggleLogInForm()">Log in</button>
    <a href="<?php echo getContextRoot() . 'register' ?>">Sign up</a>
</div>

</div>

<form id="log-in-form" style="<?php if (isset($app_state_central->getPageSpecificProperties()['wrong_email_or_password'])) echo 'display: block'; else echo 'display: none'; ?>" action="<?php echo getContextRoot() . 'login' ?>" method="post">
    <label for="log-in-form-email">Email: </label><input id="log-in-form-email" type="email" name="email" value="<?php if (isset($app_state_central->getPageSpecificProperties()['wrong_email_or_password'])) echo $app_state_central->getPageSpecificProperties()['wrong_email_or_password'] ?>">
    <label for="log-in-form-password">Password: </label><input id="log-in-form-password" type="password" name="password">
    <input id="log-in-form-submit" type="submit" value="Go!"><br>
    <?php if (isset($app_state_central->getPageSpecificProperties()['wrong_email_or_password'])) echo '<span id="wrong-email-or-password">' . $app_state_central->getPageSpecificProperties()['weop_text'] . '</span><br>' ?>
    <a href="<?php echo getContextRoot() . 'forgot-password' ?>">Forgot password</a>
</form>
