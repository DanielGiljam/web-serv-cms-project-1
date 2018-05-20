<?php

# PERSON PAGE
#
# Procedurally generates a person page, determining how to generate it
# based on the app state information provided by the AppStateCentral -object.

if (isset($page_specific_properties['no_such_user']) && $page_specific_properties['no_such_user']) {

?>

<p>Your requested user does not exist on this site.</p>

<?php

} else {

?>

<p>This is <?php echo $page_specific_properties['person']->get('name')->value() ?>'s page.</p>

<p>More information about the person:</p>
<ul>
    <li>Email: <?php echo $page_specific_properties['person']->get('email')->value() ?></li>
    <li id="zip_code">ZIP code: <?php echo $page_specific_properties['person']->get('zip_code')->value() ?></li>
    <li>About you: <?php echo $page_specific_properties['person']->get('about_you')->value() ?></li>
    <li id="annual_salary_hidden" style="display: none"><?php echo $page_specific_properties['person']->get('annual_salary')->value() ?></li>
    <li id="annual_salary">Annual salary: <?php echo $page_specific_properties['person']->get('annual_salary')->value() ?>
        <select id="currency_selector" onchange="currency_convert()">
            <option value="USD">USD
            <option value="USDEUR">EUR
            <option value="USDGBP">GBP
            <option value="USDSEK">SEK
            <option value="USDNOK">NOK
        </select>
    </li>
    <li id>Dating preference: <?php echo dpIntToString($page_specific_properties['person']->get('dating_preference')->value()) ?></li>
</ul>

<button id="poi_button" onclick="poi_map()">Suggest date locations</button>
<div id="map" style="width: 360px; height: 360px;" onload="initMap()"></div>

<?php

}