<?php

# REGISTRATION FAILED
#
# If registration failed, this page content is shown.

?>

<div class="container-padding">

    <p>Registration failed.</p>

    <p>Possible reasons:
        <ul>
            <li>internet connection</li>
            <li>serverside hardware error</li>
            <li>serverside software error</li>
            <li>client trying to cheat their way past email verification or password confirmation or required fields</li>
            <li>client accessing site from a broken web browser installation</li>
        </ul>
    </p>

    <p><a href="<?php echo getContextRoot() ?>">Go to feed</a></p>

</div>