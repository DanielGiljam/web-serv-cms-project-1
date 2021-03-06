<?php

# PAGE CONTENT
#
# Procedurally generates the main contents of the page,
# determining what to generate based on the app state information
# provided by the AppStateCentral -object.

?>

<main>

<?php

switch ($page_specific_properties[0]) {

    case 'person':

        include 'pages/person.php';
        break;

    case 'register':

        include 'pages/register/register.php';
        break;

    case 'forgot-password':

        include 'pages/forgot-password.php';
        break;

    default:

        include 'pages/feed.php';
        break;
}

?>

</main>