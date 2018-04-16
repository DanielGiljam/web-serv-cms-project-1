<?php require_once ('../private/initialize.php') ?>


<?php
    $page_title = 'Dejting Sajt Register';
    $style_var = url_for('/styles/reg_styles.css');
    $bg_var = url_for('/res/img/Header-BG.jpg');
?>

<?php include(SHARED_PATH . '/header.php'); ?>



    <form id="reg_form" action="">

        Name:<br>
        <input type="text"
               name="name"
               value=""><br>

        E-mail:<br>
        <input type="email"
               name="email"
               value=""><br>

        Password:<br>
        <input type="password"
               name="password"
               value=""><br>

        Confirm Password:<br>
        <input  type="password"
                name="password_confirm"
                value=""><br>

        Zip Code:<br>
        <input type="number"
               name="zipcode"
               value=""><br><br>

        About yourself:<br>
        <textarea name="about_yourself" rows="4" cols="50"></textarea><br><br>

        Annual Salary:<br>
        <input type="number"
               name="salary" value=""><br><br>

        Dating Preference:<br>
        <input type="radio"
               name="preference"
               value="preference_male">Male
        <input type="radio"
               name="preference"
               value="preference_female">Female
        <input type="radio"
               name="preference"
               value="preference_both">Both
        <input type="radio"
               name="preference"
               value="preference_other">Other
        <input type="radio"
               name="preference"
               value="preference_all">All<br><br>

        <input type="submit" value="Click to Register"><br><br>
    </form>





<?php include(SHARED_PATH . '/footer.php'); ?>