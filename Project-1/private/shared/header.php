<?php if(!isset($page_title)){$page_title = 'Dejting Sajt 2018';}; ?>
<?php if(!isset($style_var)){$style_var = url_for('/styles/reg_styles.css');}; ?>
<?php if(!isset($bg_var)){url_for('/res/img/Header-BG.jpg');}; ?>

<!doctype html>

<html lang="en">
<head>
    <title>MBI - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href= "<?php echo $style_var ?>" />
</head>

<header>
    <!--<img src="<?php echo url_for('/res/img/pic1.jpg')?>)">-->
    <img src="<?php echo $bg_var;?>">
    <h1>Dejting Sajt</h1>
</header>

<body>



<nav>
    <ul>
        <li><a href="<?php echo url_for('/index.php');?>">take me home</a></li>
    </ul>
</nav>