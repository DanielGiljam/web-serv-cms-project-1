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

<p>More information about the person:
    <ul>
        <li>Email: <?php echo $page_specific_properties['person']->get('email')->value() ?></li>
        <li>ZIP code: <?php echo $page_specific_properties['person']->get('zip_code')->value() ?></li>
        <li>About you: <?php echo $page_specific_properties['person']->get('about_you')->value() ?></li>
        <li>Annual salary: <?php echo $page_specific_properties['person']->get('annual_salary')->value() ?></li>
        <li>Dating preference: <?php echo $page_specific_properties['person']->get('dating_preference')->value() ?></li>
    </ul>
</p>

<?php

}