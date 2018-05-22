<?php

# PERSON PAGE
#
# Procedurally generates a person page, determining how to generate it
# based on the app state information provided by the AppStateCentral -object.

if (isset($page_specific_properties['no_such_user']) && $page_specific_properties['no_such_user']) {

?>

<p class="container-padding">Your requested user does not exist on this site.</p>

<?php

} else if ($app_state_central->getClientId() === '0') {

?>

<p class="container-padding">Please log in or register to view content.</p>

<?php

} else {

?>

<div id="person-page-container" class="<?php
switch ($page_specific_properties['person']->get('gender')->value()) {
    case 'Male':
        echo 'male-ppc';
        break;
    case 'Female':
        echo 'female-ppc';
        break;
    default:
        echo 'other-ppc';
        break;
}
?>">

<?php if ($page_specific_properties['your_page']) echo '<button onclick="edit_profile(\'' . getContextRoot() . '\')">Edit profile</button>' ?>

<ul>
    <li>Gender: <?php echo $page_specific_properties['person']->get('gender')->value() ?></li>
    <li>Name: <?php echo $page_specific_properties['person']->get('name')->value() ?></li>
    <li>Email: <?php echo $page_specific_properties['person']->get('email')->value() ?></li>
    <li id="zip-code">ZIP code: <?php echo $page_specific_properties['person']->get('zip_code')->value() ?></li>
    <li>About you: <?php echo $page_specific_properties['person']->get('about_you')->value() ?></li>
    <li id="annual-salary-hidden" style="display: none"><?php echo $page_specific_properties['person']->get('annual_salary')->value() ?></li>
    <li id="annual-salary">Annual salary: <button onclick="get_currency(<?php echo $page_specific_properties['person']->get('preferences')->value()['currency_preference'] ?>)">Show salary</button></li>
    <li>Dating preference: <?php echo $page_specific_properties['person']->get('dating_preference')->value() ?></li>
</ul>

<p>Map (<a id="poi-button" onclick="poi_map()">suggest date locations</a>):</p>

<div id="map" style="width: 360px; height: 360px;"></div>

</div>

<?php

}