function toggle_log_in_form() {
    const logInForm = document.getElementById("log-in-form");
    if (logInForm.style.display === "none") {
        logInForm.style.display = "block";
    } else {
        logInForm.style.display = "none";
    }
}


