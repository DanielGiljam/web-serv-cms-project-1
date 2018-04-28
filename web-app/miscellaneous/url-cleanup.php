<?php

# URL CLEANUP -SCRIPT
#
# Procedural script that redirects client to a clean version of the URL that the client accessed the page from.
# This is to further promote nice URLs and suppress the presence of raw URLs throughout the user experience.

$requested_url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// TODO: the entire url-cleanup.php -file...