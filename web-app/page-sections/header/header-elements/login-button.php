<?php

// TODO: comment this file

?>

<div id="header-buttons">
    <button onclick=toggleLoginForm()>Log in</button>
</div>

<form id="login-form" action="<?php echo getContextRoot() . 'login' ?>" method="post">
    <label>Email: <input type="email" name="email"></label>
    <label>Password: <input type="password" name="password"></label>
    <input type="submit" value="Go!">
    <a href="<?php echo getContextRoot() . 'forgot-password' ?>">Forgot password</a>
</form>
