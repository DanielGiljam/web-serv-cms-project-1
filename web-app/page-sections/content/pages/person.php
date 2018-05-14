<?php

# PERSON PAGE
#
# Procedurally generates a person page, determining how to generate it
# based on the app state information provided by the AppStateCentral -object.

//todo: make session handling and redirect if not logged in...

if (isset($page_specific_properties['no_such_user']) && $page_specific_properties['no_such_user']) {

?>
<p>Your requested user does not exist on this site.</p>

<?php

} else {

?>

<p>This is <?php echo $page_specific_properties['person']->get('name')->value() ?>'s page.</p>

<p>More information about the person:
    <ul>
        <li>Email: <?php echo $page_specific_properties['person']->get('email')->value() ?></li>
        <li>ZIP code: <?php echo $page_specific_properties['person']->get('zip_code')->value() ?></li>
        <li>About you: <?php echo $page_specific_properties['person']->get('about_you')->value() ?></li>
        <li id="annual_salary">Annual salary: <?php echo $page_specific_properties['person']->get('annual_salary')->value() ?></li>
        <select id="currency_selector" onchange="currency_convert()">
            <option value="USD">USD
            <option value="USDEUR">EUR
            <option value="USDGBP">GBP
            <option value="USDSEK">SEK
            <option value="USDNOK">NOK
        </select>
        <li>Dating preference: <?php echo $page_specific_properties['person']->get('dating_preference')->value() ?></li>
    </ul>
</p>

    <div id="salary_base" style="display: none"><?php echo $page_specific_properties['person']->get('annual_salary')->value() ?></div>
    <div id="zip_code_geocoding"style="display:none"><?php echo $page_specific_properties['person']->get('zip_code')->value() ?></div>
    <button id="poi" onclick="poi_map()">Take your date here:</button>
    <div id="map" style="width: 360px; height: 360px;" onload="initMap()"></div>



<?php

}