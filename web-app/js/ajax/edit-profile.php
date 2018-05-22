<?php

# EDIT PROFILE
#
# Loads in a filled in version of the register form that allows an existing user to edit their user information.

include 'utilities/ajax_initialize.php';

?>

<form id="reg-form" action="<?php // echo getContextRoot() . 'person/' . $page_specific_properties['']->get('name_url_encoded')->value() . '/submit'; ?>" method="post">

    <label for="reg-form-name">Name:</label>
    <input id="reg-form-name"
           type="text"
           name="name"
           value="<?php // echo $page_specific_properties['person']->get('name')->value() ?>"
           onblur="check_name_input(this)" >
    <span id="reg-form-name-error-1.1"></span>
    <span id="reg-form-name-error-1.2"></span>
    <span id="reg-form-name-error-2"></span>

    <label for="reg-form-gender">Gender:</label>
    <div id="reg-form-gender">
        <input id="reg-form-gender-male"
               title="reg-form-gender-male"
               type="radio" name="gender" value="male" <?php // if ($page_specific_properties['person']->get('gender')->value() === 'Male') echo 'checked' ?>checked> Male
        <input id="reg-form-gender-female"
               title="reg-form-gender-female"
               type="radio" name="gender" value="female" <?php // if ($page_specific_properties['person']->get('gender')->value() === 'Female') echo 'checked' ?>> Female
        <input id="reg-form-gender-other"
               title="reg-form-gender-other"
               type="radio" name="gender" value="other" <?php // if ($page_specific_properties['person']->get('gender')->value() === 'Other') echo 'checked' ?>> Other
    </div>

    <label for="reg-form-email">Email:</label>
    <input id="reg-form-email"
           type="text"
           name="email"
           value="<?php // echo $page_specific_properties['person']->get('email')->value() ?>"
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
           value="<?php // echo $page_specific_properties['person']->get('zip_code')->value() ?>"
           onblur="check_zip_code_input(this)">
    <span id="reg-form-zc-error"></span>

    <label for="reg-form-about-you">About you:</label>
    <textarea id="reg-form-about-you"
              name="about_you"
              rows="4"
              cols="50"
              onblur="check_about_you_input(this)"><?php // echo $page_specific_properties['person']->get('about_you')->value() ?></textarea>
    <span id="reg-form-ay-error"></span>

    <input id="reg-form-annual-salary-hidden"
           style="display: none"
           title="reg-form-annual-salary-hidden"
           type="text"
           name="annual_salary_hidden"
           value="<?php // echo $page_specific_properties['person']->get('annual_salary')->value() ?>">
    <label for="reg-form-annual-salary">Annual Salary:</label>
    <div id="reg-form-annual-salary">
        <input id="reg-form-annual-salary-input"
               title="reg-form-annual-salary-input"
               type="text"
               name="annual_salary"
               value=""
               onblur="check_annual_salary_input(this)">
        <select id="reg-form-currency-preference" title="reg-form-currency-preference" name="currency_preference" onchange="currency_convert()">
            <option id="reg-form-currency-preference-USD"
                    name="currency_preference_USD"
                    value="USD">USD</option>
            <option id="reg-form-currency-preference-EUR"
                    name="currency_preference_USDEUR"
                    value="USDEUR">EUR</option>
            <option id="reg-form-currency-preference-GBP"
                    name="currency_preference_USDGBP"
                    value="USDGBP">GBP</option>
            <option id="reg-form-currency-preference-SEK"
                    name="currency_preference_USDSEK"
                    value="USDSEK">SEK</option>
            <option id="reg-form-currency-preference-NOK"
                    name="currency_preference_USDNOK"
                    value="USDNOK">NOK</option>
        </select>
        <script>
            document.getElementById("reg-form-currency-preference").value = "<?php

            /*switch ($page_specific_properties['person']->get('preferences')->value()['currency_preference']) {
                case 1:
                    echo 'USDEUR';
                    break;
                case 2:
                    echo 'USDGBP';
                    break;
                case 3:
                    echo 'USDSEK';
                    break;
                case 4:
                    echo 'USDNOK';
                    break;
                default:
                    echo 'USD';
                    break;
            }*/

            ?>";
            currency_convert();
        </script>
    </div>
    <span id="reg-form-as-error"></span>

    <label for="reg-form-dating-preference">Dating Preference:</label>
    <div id="reg-form-dating-preference">
        <input id="reg-form-dating-preference-male"
               title="reg-form-dating-preference-male"
               type="checkbox"
               name="dating_preference_male"
               value="dating_preference_male"
               onclick="check_dating_preference_input()" <?php

        /*if (strpos($page_specific_properties['person']->get('dating_preference')->value(), 'Male') !== -1) {
            echo 'checked';
        }*/

        ?>>Male

        <input id="reg-form-dating-preference-female"
               title="reg-form-dating-preference-female"
               type="checkbox"
               name="dating_preference_female"
               value="dating_preference_female"
               onclick="check_dating_preference_input()" <?php

        /*if (stripos($page_specific_properties['person']->get('dating_preference')->value(), 'female') !== -1) {
            echo 'checked';
        }*/

        ?>>Female

        <input id="reg-form-dating-preference-other"
               title="reg-form-dating-preference-other"
               type="checkbox"
               name="dating_preference_other"
               value="dating_preference_other"
               onclick="check_dating_preference_input()" <?php

        /*if (stripos($page_specific_properties['person']->get('dating_preference')->value(), 'other') !== -1) {
            echo 'checked';
        }*/

        ?>>Other</div>
    <span id="reg-form-dp-error"></span>

    <input id="reg-form-submit" type="submit" name="reg_form_submit" value="Save changes" disabled>

</form>
