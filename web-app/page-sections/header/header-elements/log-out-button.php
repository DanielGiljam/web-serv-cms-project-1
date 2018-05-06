<?php

# LOG OUT BUTTON
#
# This header element is shown when the site is navigated by a registered user (client id other than 0)
# and consists of a my page -button and a log out -button.

?>

<div id="header-buttons">
    <a href="<?php echo getContextRoot() . 'person' ?>">My page</a>
    <a href="<?php echo getContextRoot() . 'logout' ?>">Log out</a>
</div>

</div>
