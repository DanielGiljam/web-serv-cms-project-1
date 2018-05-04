//Global variables need
let check_name = false;
let check_email = false;
let check_password = false;
let check_confirm_password = false;
let check_zip_code = false;
let check_about_you = false;
let check_annual_salary = false;
let check_d_preference = false;

//Checks the name input field in register form
function check_name_input(input){
    check_name = false;
    input.value = input.value.trim();
    if(input.value.length > 0){
        input.style.boxShadow = '0 0 5px green';
        check_name = true;
    } else {
        input.style.boxShadow = '0 0 5px red';
        check_name = false;
    }
    document.getElementById("reg-form-name-error").innerText = check_name;
    unlock_submit();
    return check_name;
}


//Checks e-mail input field in register form
function validate_email(input){
    check_email = false;
    const mailformat = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})$/;
    if(input.value.match(mailformat))
    {
        input.style.boxShadow = '0 0 5px green';
        check_email = true;
    }
    else
    {
        //alert("You have entered an invalid email address!");
        input.style.boxShadow = '0 0 5px red';
        check_email = false;

    }
    document.getElementById("reg-form-email-error").innerText = check_email;
    unlock_submit();
    return check_email;
}


//Checks password input field in register form
function check_password_input(input){
    check_password = false;

    if(input.value.length >= 4 && input.value.length < 18){
        check_password = true;
        input.style.boxShadow = '0 0 5px green';
    } else{
        check_password = false;
        input.style.boxShadow = '0 0 5px red';
    }
    if(check_password){
        document.getElementById('reg-form-cp-id').disabled = false;
        document.getElementById("reg-form-cp-id").focus();
    }
    document.getElementById("reg-form-password-error").innerText = check_password;
    unlock_submit();
    return check_password;
}

//Checks confirm password input field in register form
function confirm_password_input(input){
    check_confirm_password = false;
    const confirm_password = document.getElementById("reg-form-password-id").value;
    //document.getElementById("reg-form-cp-error").innerText = confirm_password;
    if(input.value === confirm_password){
        check_confirm_password = true;
        input.style.boxShadow = '0 0 5px green';
    } else {
        check_confirm_password = false;
        input.style.boxShadow = '0 0 5px red';
    }
    document.getElementById("reg-form-cp-error").innerText = check_confirm_password;
    unlock_submit();
    return check_confirm_password;
}


//Checks zip code input field in register form
function check_zip_code_input(input){
    check_zip_code = false;
    input.value = input.value.trim().replace(
        /[\,\.\;\:\-\_\'\*\¨\^\´\`\`\?\=\)\(\/\&\%\€\#\"\!\§\)]/gi, '');


    const regex = validate_zip_code_input(input.value);
    if(regex){
        input.style.boxShadow = '0 0 5px green';
        check_zip_code = true;
    } else {
        input.style.boxShadow = '0 0 5px red';
        check_zip_code = false;
    }
    document.getElementById("reg-form-zc-error").innerText = check_zip_code;
    unlock_submit();
    return check_zip_code;
}
function validate_zip_code_input(input){
    let result = false;
    const zip_code_check = /\b\d{5}\b/g;
    if(input.match(zip_code_check)){
        result = true;
    }
    return result;

}


//Checks about you input field in register form
function check_about_you_input(input){
    check_about_you = false;
    if(input.value == '' || input.value == null){
        check_about_you = false;
        input.style.boxShadow = '0 0 5px red';
    } else {
        check_about_you = true;
        input.style.boxShadow = '0 0 5px green';
    }
    document.getElementById("reg-form-ay-error").innerText = check_about_you;
    unlock_submit();
    return check_about_you;

}


//Checks annual salary input field in register form
function check_annual_salary_input(input){
    check_annual_salary = false;
    input.value = input.value.trim().replace(
        /[,.;:\-_'*¨^´`?=)(\/&%€#"!§]/gi, '');
    const regex = validate_annual_salary(input.value);
    if(regex){
        input.style.boxShadow = '0 0 5px green';
        check_annual_salary = true;
    } else {
        input.style.boxShadow = '0 0 5px red';
        check_annual_salary = false;
    }
    document.getElementById("reg-form-as-error").innerText = check_annual_salary;
    unlock_submit();
    return check_annual_salary;
}


function validate_annual_salary(input){
    let result = false;
    const annual_salary_check = /\d/g;
    if(input.match(annual_salary_check)){
        result = true;
    }
    return result;
}


//Checks dating preference input field in register form
function check_dating_preference(){
    check_d_preference = false;
    const male_checkbox = document.getElementById("dating-preference-male");
    const female_checkbox = document.getElementById("dating-preference-female");
    const other_checkbox = document.getElementById("dating-preference-other");
    if(male_checkbox.checked === true ||
        female_checkbox.checked === true ||
        other_checkbox.checked === true){
        check_d_preference = true;
        document.getElementById("reg-form-dp-error").innerText = check_d_preference;
        unlock_submit();
    }
}


function unlock_submit(){
    document.getElementById("register-form-submit").disabled =
        !(  check_name &&
            check_email &&
            check_password &&
            check_confirm_password &&
            check_zip_code &&
            check_about_you &&
            check_annual_salary &&
            check_d_preference  );
}
