//Global variables need
let check_name = false;
let check_email = false;
let check_password = false;
let check_zip_code = false;
let check_about_you = false;
let check_annual_salary = false;
let check_dating_preference = false;


function check_name_input(element) {
    if (element.value !== "") {
        process_name(element);
    } else {
        element.style.border = "1px solid gray";
        document.getElementById("reg-form-name-error-1.1").innerHTML = "";
        document.getElementById("reg-form-name-error-1.2").innerHTML = "";
        document.getElementById("reg-form-name-error-2").innerHTML = "";
        check_name = false;
        unlock_submit();
    }
}

// handles validation and capitalization of name + alerts to user
function process_name(element) {

    let symbolSearch = validate_name(element.value.trim());
    let symbolSearchBool;

    if (symbolSearch[0] === false && symbolSearch[1] === false) {
        document.getElementById("reg-form-name-error-1.1").innerHTML = "The name may not contain numbers, special characters or patterns of more than three same trailing characters.";
        symbolSearchBool = false;
    } else if (symbolSearch[0] === false) {
        document.getElementById("reg-form-name-error-1.1").innerHTML = "The name may not contain numbers or special characters.";
        symbolSearchBool = false;
    } else if (symbolSearch[1] === false) {
        document.getElementById("reg-form-name-error-1.1").innerHTML = "The name may not contain patterns of more than three same trailing characters.";
        symbolSearchBool = false;
    }
    if ((symbolSearch[0] === false || symbolSearch[1] === false) && symbolSearch[2] === false) {
        document.getElementById("reg-form-name-error-1.2").innerHTML = "The name can also not contain suspicious patterns.";
        symbolSearchBool = false;
    } else if (symbolSearch[2] === false) {
        document.getElementById("reg-form-name-error-1.2").innerHTML = "The name may not contain suspicious patterns.";
        symbolSearchBool = false;
    }
    if (symbolSearch[0] === true && symbolSearch[1] === true && symbolSearch[2] === true) {
        document.getElementById("reg-form-name-error-1.1").innerHTML = "";
        document.getElementById("reg-form-name-error-1.2").innerHTML = "";
        symbolSearchBool = true;
    }

    let twoNamesSearch = split_name(element.value.trim());
    let twoNamesSearchBool;

    if (twoNamesSearch !== null) {

        document.getElementById("reg-form-name-error-2").innerHTML = "";

        element.value = capitalize_name(twoNamesSearch[1]) + " " + capitalize_name(twoNamesSearch[2]);

        twoNamesSearchBool = true;

    } else {
        
        document.getElementById("reg-form-name-error-2").innerHTML = "The name must consist of a first name and a last name.";

        element.value = capitalize_name(element.value.trim());

        twoNamesSearchBool = false;

    }

    if (symbolSearchBool === true && twoNamesSearchBool === true) {
        element.style.border = "1px solid gray";
        check_name = true;
        unlock_submit();
    } else {
        element.style.border = "2px solid red";
        check_name = false;
        unlock_submit();
    }

}

// checks for invalid symbols
function validate_name(string) {
    let regex1 = /[^a-zàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿŒœŠšŸƒ' \-]/gi;
    let regex2 = /([a-zàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿŒœŠšŸƒ])\1{2}/gi;
    let regex3 = /(['\-])\1/g;
    let regex4 = /^(-.*)|(.*-)$/;
    let regex = /^(\S+)(?:\s+(\S+))*$/;
    let match = regex.exec(string);
    let countDashesFirstName = match[1].length - match[1].replace(new RegExp("\-","g"), "").length;
    let countApostrophesFirstName = match[1].length - match[1].replace(new RegExp("\'","g"), "").length;
    let dashBeginFirstName = regex4.test(match[1]);
    let countDashesLastName = 0;
    let countApostrophesLastName = 0;
    let dashBeginLastName = false;
    if (match[2] !== undefined) {
        countDashesLastName = match[2].length - match[2].replace(new RegExp("\-","g"), "").length;
        countApostrophesLastName = match[2].length - match[2].replace(new RegExp("\'","g"), "").length;
        dashBeginLastName = regex4.test(match[2]);
    }
    let test1 = regex1.test(string);
    let test2 = regex2.test(string);
    let test3 = regex3.test(string);
    return  [!test1,
        !test2 &&
        !test2,
        !test3 &&
        !dashBeginFirstName &&
        !dashBeginLastName &&
        countDashesFirstName < 2 &&
        countApostrophesFirstName < 2 &&
        countDashesLastName < 4 &&
        countApostrophesLastName < 4];
}

// checks if value consists of two names, true = name consists of two names, false = name consists of fewer than two names
function split_name(string) {
    let regex = /^(\S+)(?:\s+(\S+))+$/;
    return regex.exec(string);
}

// replaces the first letter in string with uppercase equivalent
function capitalize_name(string) {
    let regex = /-'?(\S)/gi;
    let matches;
    while ((matches = regex.exec(string)) !== null) {
        let rli = regex.lastIndex;
        string = string.slice(0, rli-1) + matches[1].toUpperCase() + string.slice(rli);
    }
    return string.slice(0, 1).toUpperCase() + string.slice(1);
}


//Checks e-mail input field in register form
function check_email_input(input){
    check_email = false;
    input.value = input.value.trim();
    const email_val = input.value.match(/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})$/);
    if(email_val){
        input.style.borderColor = 'gray';
        document.getElementById("reg-form-email-error").innerText = "";
        check_email = true;
    } else {
        if (input.value === "") {
            input.style.borderColor = 'gray';
            document.getElementById("reg-form-email-error").innerText = "";
        } else {
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
        input.style.borderColor = 'gray';
        document.getElementById("reg-form-zc-error").innerText = "";
        check_zip_code = true;
    } else {
        if (input.value === "") {
            input.style.borderColor = 'gray';
            document.getElementById("reg-form-zc-error").innerText = "";
        } else {
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
    const annual_salary_val = input.value.match(/^[0-9]+$/);
    if(annual_salary_val){
        input.style.borderColor = 'gray';
        document.getElementById("reg-form-as-error").innerText = "";
        check_annual_salary = true;
    } else {
        if (input.value === "") {
            input.style.borderColor = 'gray';
            document.getElementById("reg-form-as-error").innerText = "";
        } else {
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
    const male_checkbox = document.getElementById("reg-form-dating-preference-male");
    const female_checkbox = document.getElementById("reg-form-dating-preference-female");
    const other_checkbox = document.getElementById("reg-form-dating-preference-other");
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
            choosePassword.style.border = "2px solid red";
        }
        if (repeatPassword.value !== "") {
            repeatPassword.style.border = "2px solid red";
        }
    } else {
        choosePassword.style.border = "1px solid gray";
        repeatPassword.style.border = "1px solid gray";
    }
}


function unlock_submit(){
    document.getElementById("reg-form-submit").disabled =
        !(  check_name &&
            check_email &&
            check_password &&
            check_zip_code &&
            check_about_you &&
            check_annual_salary &&
            check_dating_preference  );
}
