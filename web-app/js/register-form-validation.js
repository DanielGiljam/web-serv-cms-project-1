//Global variables need
let check_name = false;
let check_email = false;
let check_password = false;
let check_zip_code = false;
let check_about_you = false;
let check_annual_salary = false;
let check_dating_preference = false;

//Checks the name input field in register form
function check_name_input(input){
    check_name = false;
    input.value = input.value.trim();
    check_name = input.value !== "";
    unlock_submit();
}


//Checks e-mail input field in register form
function check_email_input(input){
    check_email = false;
    input.value = input.value.trim();
    const mailformat = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})$/;
    if(input.value.match(mailformat)){
        input.style.borderStyle = 'inset';
        input.style.borderColor = 'initial';
        document.getElementById("reg-form-email-error").innerText = "";
        check_email = true;
    } else {
        if (input.value === "") {
            input.style.borderStyle = 'inset';
            input.style.borderColor = 'initial';
            document.getElementById("reg-form-email-error").innerText = "";
        } else {
            input.style.borderStyle = 'solid';
            input.style.borderColor = 'red';
            document.getElementById("reg-form-email-error").innerText = "You must enter a valid email.";
        }
        check_email = false;
    }
    unlock_submit();
}


//Checks zip code input field in register form
function check_zip_code_input(input){
    check_zip_code = false;
    input.value = input.value.trim();
    const zip_code_val = input.value.match(/^[0-9]{5}$/);
    if(zip_code_val){
        input.style.borderStyle = 'inset';
        input.style.borderColor = 'initial';
        document.getElementById("reg-form-zc-error").innerText = "";
        check_zip_code = true;
    } else {
        if (input.value === "") {
            input.style.borderStyle = 'inset';
            input.style.borderColor = 'initial';
            document.getElementById("reg-form-zc-error").innerText = "";
        } else {
            input.style.borderStyle = 'solid';
            input.style.borderColor = 'red';
            document.getElementById("reg-form-zc-error").innerText = "You must enter a valid (5-digit) ZIP code.";
        }
        check_zip_code = false;
    }
    unlock_submit();
}


//Checks about you input field in register form
function check_about_you_input(input){
    check_about_you = false;
    input.value = input.value.trim();
    check_about_you = input.value !== "";
    unlock_submit();
}


//Checks annual salary input field in register form
function check_annual_salary_input(input){
    check_annual_salary = false;
    input.value = input.value.trim();
    const annual_salary_val = input.value.match(/[0-9]+/);
    if(annual_salary_val){
        input.style.borderStyle = 'inset';
        input.style.borderColor = 'initial';
        document.getElementById("reg-form-as-error").innerText = "";
        check_annual_salary = true;
    } else {
        if (input.value === "") {
            input.style.borderStyle = 'inset';
            input.style.borderColor = 'initial';
            document.getElementById("reg-form-as-error").innerText = "";
        } else {
            input.style.borderStyle = 'solid';
            input.style.borderColor = 'red';
            document.getElementById("reg-form-as-error").innerText = "You must enter your annual salary as e.g. 40000 or 25000.";
        }
        check_annual_salary = false;
    }
    unlock_submit();
}


//Checks dating preference input field in register form
function check_dating_preference_input(){
    check_dating_preference = false;
    const male_checkbox = document.getElementById("dating-preference-male");
    const female_checkbox = document.getElementById("dating-preference-female");
    const other_checkbox = document.getElementById("dating-preference-other");
    check_dating_preference = male_checkbox.checked || female_checkbox.checked || other_checkbox.checked;
    if (check_dating_preference) document.getElementById("reg-form-dp-error").innerText = "";
    else document.getElementById("reg-form-dp-error").innerText = "There's no point in registering if you ain't looking to date anyone ;)";
    unlock_submit();
}


function check_password_input() {
    let choosePassword = document.getElementById("reg-form-password");
    let repeatPassword = document.getElementById("reg-form-confirm-password");
    let output1 = document.getElementById("reg-form-password-error");
    let output2 = document.getElementById("reg-form-confirm-password-error");
    if (choosePassword.value.length < 8 && choosePassword.value !== "") {
        set_red_password_borders(true);
        output1.innerHTML = "Password needs to be longer than 8 characters.";
        output2.innerHTML = "";
        check_password = false;
    } else if (repeatPassword.value !== "" && choosePassword.value === "") {
        set_red_password_borders(true);
        output1.innerHTML = "";
        output2.innerHTML = "You've only confirmed your password, not entered it a first time at all.";
        check_password = false;
    } else if (choosePassword.value !== repeatPassword.value && !(repeatPassword.value.length < choosePassword.value.length)) {
        set_red_password_borders(true);
        output1.innerHTML = "The passwords don't match.";
        output2.innerHTML = "";
        check_password = false;
    } else if (choosePassword.value === repeatPassword.value) {
        set_red_password_borders(false);
        output1.innerHTML = "";
        output2.innerHTML = "";
        check_password = true;
    } else {
        set_red_password_borders(false);
        output1.innerHTML = "";
        output2.innerHTML = "";
        check_password = false;
    }
    unlock_submit();
}


function set_red_password_borders(boolean) {
    let choosePassword = document.getElementById("reg-form-password");
    let repeatPassword = document.getElementById("reg-form-confirm-password");
    if (boolean) {
        if (choosePassword.value !== "") {
            choosePassword.style.borderStyle = "solid";
            choosePassword.style.borderColor = "red";
        }
        if (repeatPassword.value !== "") {
            repeatPassword.style.borderStyle = "solid";
            repeatPassword.style.borderColor = "red";
        }
    } else {
        choosePassword.style.borderStyle = "inset";
        choosePassword.style.borderColor = "initial";
        repeatPassword.style.borderStyle = "inset";
        repeatPassword.style.borderColor = "initial";
    }
}


function unlock_submit(){
    document.getElementById("register-form-submit").disabled =
        !(  check_name &&
            check_email &&
            check_password &&
            check_zip_code &&
            check_about_you &&
            check_annual_salary &&
            check_dating_preference  );
}
