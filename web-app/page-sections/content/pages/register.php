<?php

# REGISTER PAGE
#
# Generates the register page.

?>


<form id="register-form" action="<?php echo getContextRoot() . 'register/submit'; ?>" method="post">

    <label>Name:
    <input type="text"
           name="name"
           value=""></label>

    <label>E-mail:
    <input type="email"
           name="email"
           value=""></label>

    <label>Password:
    <input type="password"
           name="password_hash"
           value=""></label>

    <label>Confirm Password:
    <input  type="password"
            name="confirm_password_hash"
            value=""></label>

    <label>Zip Code:
    <input type="number"
           name="zip_code"
           value=""></label>

    <label>About yourself:
    <textarea name="about_you"
              rows="4"
              cols="50"></textarea></label>

    <label>Annual Salary:
    <input type="number"
           name="annual_salary"
           value=""></label>

    <label>Dating Preference:
    <input type="checkbox"
           name="dating_preference"
           value="preference-male">Male
    <input type="checkbox"
           name="dating_preference"
           value="preference-female">Female
    <input type="checkbox"
           name="dating_preference"
           value="preference-other">Other

    <input type="submit" value="Register"></label>

</form>
