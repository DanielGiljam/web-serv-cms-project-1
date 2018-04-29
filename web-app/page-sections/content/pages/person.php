<?php

# PERSON PAGE
#
# Procedurally generates a person page, determining how to generate it
# based on the app state information provided by the AppStateCentral -object.

if (isset($page_specific_properties['no_such_user']) && $page_specific_properties['no_such_user']) {

?>

<p><?php echo $page_specific_properties['name'] ?> is not a registered user on this site.</p>

<?php

} else {

?>

<p>This is <?php echo $page_specific_properties['name'] ?>'s page.</p>

<?php

}