<?php

# PERSON PAGE
#
# Procedurally generates a person page, determining how to generate it
# based on the app state information provided by the AppStateCentral -object.

if (isset($page_specific_properties['no_such_user']) && $page_specific_properties['no_such_user']) {

?>

<p>Your requested user does not exist on this site.</p>

<?php

} else if ($app_state_central->getClientId() === '0') {

?>

<p>Please log in or register to view content.</p>

<?php

} else {

?>

<p>This is <?php echo $page_specific_properties['person']->get('name')->value() ?>'s page.</p>

<p>More information about the person:</p>
<ul>
    <li>Email: <?php echo $page_specific_properties['person']->get('email')->value() ?></li>
    <li id="zip-code">ZIP code: <?php echo $page_specific_properties['person']->get('zip_code')->value() ?></li>
    <li>About you: <?php echo $page_specific_properties['person']->get('about_you')->value() ?></li>
    <li id="annual-salary-hidden" style="display: none"><?php echo $page_specific_properties['person']->get('annual_salary')->value() ?></li>
    <li id="annual-salary">Annual salary: <button onclick="get_currency('<?php echo $page_specific_properties['person']->get('preferences')['currency_preference'] ?>')">Show salary</button></li>
    <li id>Dating preference: <?php echo $page_specific_properties['person']->get('dating_preference')->value() ?></li>
</ul>

<button id="poi-button" onclick="poi_map()">Suggest date locations</button>
<div id="map" style="width: 360px; height: 360px;"></div>

<?php

}