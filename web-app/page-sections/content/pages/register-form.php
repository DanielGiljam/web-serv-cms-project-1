<?php

// TODO: comment this file

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
           name="password"
           value=""></label>

    <label>Confirm Password:
    <input  type="password"
            name="confirm_password"
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
           name="dating_preference_male"
           value="dating_preference_male">Male
    <input type="checkbox"
           name="dating_preference_female"
           value="dating_preference_female">Female
    <input type="checkbox"
           name="dating_preference_other"
           value="dating_preference_other">Other

    <input type="submit" value="Register"></label>

</form>