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

<p>This is <?php echo $page_specific_properties['person']->get('name')?>'s page.</p>

<?php

}