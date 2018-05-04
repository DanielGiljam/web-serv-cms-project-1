<?php

// TODO: comment this file

?>
<form id="register-form" action="<?php echo getContextRoot() . 'register/submit'; ?>" method="post">

    <label>Name:</label>
    <input type="text"
           name="name"
           value=""
           onfocus=""
           onblur="check_name_input(this)" >
    <span id="reg-form-name-error"></span>

    <label>Email:</label>
    <input type="email"
           name="email"
           value=""
           onfocus=""
           onblur="validate_email(this)">
    <span id="reg-form-email-error"></span>

    <label>Password:</label>
    <input type="password"
           name="password"
           id="reg-form-password-id"
           value=""
           onblur="check_password_input(this)">
    <span id="reg-form-password-error"></span>

    <label>Confirm Password:</label>
    <input  type="password"
            name="confirm_password"
            value=""
            id="reg-form-cp-id"
            onblur="confirm_password_input(this)" disabled>
    <span id="reg-form-cp-error"></span>

    <label>ZIP Code:</label>
    <input type="text"
           name="zip_code"
           value=""
           onfocus=""
           onblur="check_zip_code_input(this)">
    <span id="reg-form-zc-error"></span>

    <label id="register-form-about-you">About yourself:</label>
    <textarea name="about_you"
              rows="4"
              cols="50"
              onblur="check_about_you_input(this)"></textarea>
    <span id="reg-form-ay-error"></span>

    <label>Annual Salary:</label>
    <input type="text"
           name="annual_salary"
           value=""
           onfocus=""
           onblur="check_annual_salary_input(this)">
    <span id="reg-form-as-error"></span>

    <label>Dating Preference:</label>
    <span id="register-form-dating-preference">
           <input type="checkbox"
                  name="dating_preference_male"
                  value="dating_preference_male"
                  id="dating-preference-male"
                  onclick="check_dating_preference()">Male

        <input type="checkbox"
               name="dating_preference_female"
               value="dating_preference_female"
               id="dating-preference-female"
               onclick="check_dating_preference()">Female

        <input type="checkbox"
               name="dating_preference_other"
               value="dating_preference_other"
               id="dating-preference-other"
               onclick="check_dating_preference()">Other</span>
    <span id="reg-form-dp-error"></span>

    <input id="register-form-submit" type="submit" name="register-form-submit" value="Register" disabled>

</form>

