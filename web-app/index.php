<?php

# MAIN PAGE / LANDING PAGE / CENTRAL PAGE OF THE 'WEB-SERV-CMS-PROJECT-1' SITE
#
# This page serves the appropriate UI to the user of the web-serv-cms-project-1 web application
# based on the context / the current state of the web application.

include 'app-state-central.php';
$app_state_central = new AppStateCentral;

include 'header.php';

include 'page-content.php';

include 'footer.php';