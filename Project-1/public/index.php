<?php require_once ('../private/initialize.php') ?>

<?php
    //Sets the specific variables of this page
    $page_title = 'Dejting Sajt Index';
    $bg_var = url_for('/res/img/Header-BG.jpg');
    ?>

<?php include(SHARED_PATH . '/header.php'); ?>


    <a href="<?php echo url_for('/register.php');?>">register player!</a>
    <br><br>



<?php include(SHARED_PATH . '/footer.php'); ?>