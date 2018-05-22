<?php

# LOG OUT BUTTON
#
# This header element is shown when the site is navigated by a registered user (client id other than 0)
# and consists of a my page -button and a log out -button.

?>

<div id="header-buttons">

<?php

    if (!(isset($page_specific_properties['your_page']) && $page_specific_properties['your_page'])) {
        echo '<a href="' . getContextRoot() . 'person">My page</a>' . PHP_EOL;
    }

    if ($page_specific_properties[0] !== 'feed') {
        echo '<a href="' . getContextRoot() . 'feed">Feed</a>' . PHP_EOL;
    }

?>
<a class="button" href="<?php echo getContextRoot() . 'logout' ?>">Log out</a>

</div>

</div>
