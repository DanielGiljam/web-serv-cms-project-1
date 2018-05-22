<?php

include '../../functions.php';

initialize();

include '../../app-state-central/appstatecentral.class.php';
$app_state_central = new AppStateCentral;
$page_specific_properties = $app_state_central->getPageSpecificProperties();
