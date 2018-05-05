<?php

# LOG IN BUTTON
#
# This header element is shown when the site is navigated by an anonymous user (client id 0)
# and consists of a log in -button that toggles the visibility of a login form and a sign up -button that takes the user to the register page.

?>

<div id="header-buttons">
    <button onclick=toggleLogInForm()>Log in</button>
    <a href="<?php echo getContextRoot() . 'register' ?>">Sign up</a>
</div>

</div>

<form id="log-in-form" action="<?php echo getContextRoot() . 'login' ?>" method="post">
    <label>Email: <input type="email" name="email"></label>
    <label>Password: <input type="password" name="password"></label>
    <input type="submit" value="Go!">
    <a href="<?php echo getContextRoot() . 'forgot-password' ?>">Forgot password</a>
</form>
