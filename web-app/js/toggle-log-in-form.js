function toggle_log_in_form() {
    const logInButton = document.getElementById("log-in-button");
    const logInForm = document.getElementById("log-in-form");
    if (logInForm.style.display === "none") {
        logInForm.style.display = "block";
    } else {
        logInForm.style.display = "none";
    }
}


