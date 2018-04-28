<?php

# HOME PAGE / MAIN PAGE / LANDING PAGE / CENTRAL PAGE OF THE 'WEB-SERV-CMS-PROJECT-1' SITE
#
# This page serves the appropriate UI to the user of the web-serv-cms-project-1 web application
# based on the context / the current state of the web application.

include 'miscellaneous/url-cleanup.php';

include 'app-state-central/app-state-central.php';
$app_state_central = new AppStateCentral;

include 'page-sections/header/header.php';

include 'page-sections/content/page-content.php';

include 'page-sections/footer/footer.php';