<?php

# REGISTRATION FORM
#
# The form with which you sign up to the site with.

?>
<form id="reg-form" action="<?php echo getContextRoot() . 'register/submit'; ?>" method="post">

    <label for="reg-form-name">Name:</label>
    <input id="reg-form-name"
           type="text"
           name="name"
           value=""
           onblur="check_name_input(this)" >
    <span id="reg-form-name-error-1.1"></span>
    <span id="reg-form-name-error-1.2"></span>
    <span id="reg-form-name-error-2"></span>

    <label for="reg-form-email">Email:</label>
    <input id="reg-form-email"
           type="text"
           name="email"
           value=""
           onblur="check_email_input(this)">
    <span id="reg-form-email-error"></span>

    <label for="reg-form-password">Password:</label>
    <input id="reg-form-password"
           type="password"
           name="password"
           value=""
           onblur="check_password_input()">
    <span id="reg-form-password-error"></span>

    <label for="reg-form-confirm-password">Confirm Password:</label>
    <input id="reg-form-confirm-password"
           type="password"
           name="confirm_password"
           value=""
           onblur="check_password_input()">
    <span id="reg-form-confirm-password-error"></span>

    <label for="reg-form-zip-code">ZIP Code:</label>
    <input id="reg-form-zip-code"
           type="text"
           name="zip_code"
           value=""
           onblur="check_zip_code_input(this)">
    <span id="reg-form-zc-error"></span>

    <label for="reg-form-about-you">About you:</label>
    <textarea id="reg-form-about-you"
              name="about_you"
              rows="4"
              cols="50"
              onblur="check_about_you_input(this)"></textarea>
    <span id="reg-form-ay-error"></span>

    <span id="reg-form-annual-salary-hidden" style="display: none"></span>
    <label for="reg-form-annual-salary">Annual Salary:</label>
    <input id="reg-form-annual-salary"
           type="text"
           name="annual_salary"
           value=""
           onblur="check_annual_salary_input(this)">
    <span id="reg-form-as-error"></span>

    <select id="reg-form-currency-preference" title="reg-form-currency-preference" onchange="currency_convert()">
        <option value="USD">USD
        <option value="USDEUR">EUR
        <option value="USDGBP">GBP
        <option value="USDSEK">SEK
        <option value="USDNOK">NOK
    </select>

    <label for="reg-form-dating-preference">Dating Preference:</label>
    <div id="reg-form-dating-preference">
        <input id="reg-form-dating-preference-male"
               type="checkbox"
               name="dating_preference_male"
               value="dating_preference_male"
               onclick="check_dating_preference_input()">Male

        <input id="reg-form-dating-preference-female"
               type="checkbox"
               name="dating_preference_female"
               value="dating_preference_female"
               onclick="check_dating_preference_input()">Female

        <input id="reg-form-dating-preference-other"
               type="checkbox"
               name="dating_preference_other"
               value="dating_preference_other"
               onclick="check_dating_preference_input()">Other</div>
    <span id="reg-form-dp-error"></span>

    <input id="reg-form-submit" type="submit" name="reg_form_submit" value="Register" disabled>

</form>

