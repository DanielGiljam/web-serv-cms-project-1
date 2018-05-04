<?php

// TODO: comment this file

?>

<form id="register-form" action="<?php echo getContextRoot() . 'register/submit'; ?>" method="post">

    <label>Name:</label>
    <input type="text"
           name="name"
           value="">
    <span id="reg-form-name-error">Error message!</span>

    <label>Email:</label>
    <input type="email"
           name="email"
           value="">
    <span id="reg-form-email-error">Error message!</span>

    <label>Password:</label>
    <input type="password"
           name="password"
           value="">
    <span id="reg-form-password-error">Error message!</span>

    <label>Confirm Password:</label>
    <input  type="password"
            name="confirm_password"
            value="">
    <span id="reg-form-cp-error">Error message!</span>

    <label>ZIP Code:</label>
    <input type="text"
           name="zip_code"
           value="">
    <span id="reg-form-zc-error">Error message!</span>

    <label id="register-form-about-you">About yourself:</label>
    <textarea name="about_you"
              rows="4"
              cols="50"></textarea>
    <span id="reg-form-ay-error">Error message!</span>

    <label>Annual Salary:</label>
    <input type="text"
           name="annual_salary"
           value="">
    <span id="reg-form-as-error">Error message!</span>

    <label>Dating Preference:</label>
    <span id="register-form-dating-preference"><input type="checkbox"
           name="dating_preference_male"
           value="dating_preference_male">Male
           <input type="checkbox"
           name="dating_preference_female"
           value="dating_preference_female">Female
           <input type="checkbox"
           name="dating_preference_other"
           value="dating_preference_other">Other</span>
    <span id="reg-form-dp-error">Error message!</span>

    <input id="register-form-submit" type="submit" name="register-form-submit" value="Register">

</form>