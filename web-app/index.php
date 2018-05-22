<?php

# HOME PAGE / MAIN PAGE / LANDING PAGE / CENTRAL PAGE OF THE 'WEB-SERV-CMS-PROJECT-1' SITE
#
# This page serves the appropriate UI to the user of the web-serv-cms-project-1 web application
# based on the context / the current state of the web application.

// including some miscellaneous functions...
include 'functions.php';

// initialize page loading...
initialize();

// instantiate AppStateCentral...
include 'app-state-central/appstatecentral.class.php';
$app_state_central = new AppStateCentral;
$page_specific_properties = $app_state_central->getPageSpecificProperties();

// include the page's header...
include 'page-sections/header/header.php';

// include main content of the page...
include 'page-sections/content/page-content.php';

// include the page's footer...
include 'page-sections/footer/footer.php';

// finish page loading...
release();
