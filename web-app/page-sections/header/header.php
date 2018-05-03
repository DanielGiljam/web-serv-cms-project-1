<?php

# HEADER
#
# Procedurally generates the header of the page / the top of the HTML document that the page consists of.

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <title><?php echo $app_state_central->getPageTitle() ?></title>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <link rel="stylesheet" type="text/css" href="<?php echo getContextRoot() ?>css/print.css" media="print" />
        <link rel="stylesheet" type="text/css" href="<?php echo getContextRoot() ?>css/style.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo getContextRoot() . $app_state_central->getThemeHref() ?>" />

        <?php echo $app_state_central->getScriptTags() ?>



    </head>

    <body>

        <div id="main-container">

            <header>

                <div id="header-grid-container">

                    <div id="page-titles">
                        <h1><?php echo $app_state_central->getPageTitleDomain() ?></h1>
                        <h2><?php echo $app_state_central->getPageTitleLocation() ?></h2>
                    </div>

                    <?php if ($app_state_central->getClientId() !== '0') include 'header-elements/your-page-button.php'; else include 'header-elements/login-button.php' ?>



            </header>