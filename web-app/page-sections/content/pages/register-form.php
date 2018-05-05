<?php

// TODO: comment this file

?>
<form id="register-form" action="<?php echo getContextRoot() . 'register/submit'; ?>" method="post">

    <label>Name:</label>
    <input type="text"
           name="name"
           value=""
           onblur="check_name_input(this)" >
    <span id="reg-form-name-error"></span>

    <label>Email:</label>
    <input type="text"
           name="email"
           value=""
           onblur="check_email_input(this)">
    <span id="reg-form-email-error"></span>

    <label>Password:</label>
    <input id="reg-form-password"
           type="password"
           name="password"
           value=""
           onblur="check_password_input()">
    <span id="reg-form-password-error"></span>

    <label>Confirm Password:</label>
    <input id="reg-form-confirm-password"
           type="password"
           name="confirm_password"
           value=""
           onblur="check_password_input()">
    <span id="reg-form-confirm-password-error"></span>

    <label>ZIP Code:</label>
    <input type="text"
           name="zip_code"
           value=""
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
           onblur="check_annual_salary_input(this)">
    <span id="reg-form-as-error"></span>

    <label>Dating Preference:</label>
    <div id="register-form-dating-preference">
        <input id="dating-preference-male"
               type="checkbox"
               name="dating_preference_male"
               value="dating_preference_male"
               onclick="check_dating_preference_input()">Male

        <input id="dating-preference-female"
               type="checkbox"
               name="dating_preference_female"
               value="dating_preference_female"
               onclick="check_dating_preference_input()">Female

        <input id="dating-preference-other"
               type="checkbox"
               name="dating_preference_other"
               value="dating_preference_other"
               onclick="check_dating_preference_input()">Other</div>
    <span id="reg-form-dp-error"></span>

    <input id="register-form-submit" type="submit" name="register-form-submit" value="Register" disabled>

</form>

