<?php

# FUNCTIONS
#
# This file contains some miscellaneous functions.

// This one's return value may change until the site is settled on its final platform
function getContextRoot()
{
    return '/web-serv-cms-project-1/';
}

function initialize() 
{
    ob_start('ob_gzhandler');
    session_start();
}

function release() 
{
    Vault::closeConnection();
    ob_end_flush();
    die();
}

function urlCleanup() 
{
    include 'miscellaneous/url-cleanup.php';
}

function nameUrlEncoder($name)
{
    $name_url_encoded = strtolower($name);
    $name_url_encoded = preg_replace('/ /i', '-', $name_url_encoded);
    $name_url_encoded = preg_replace('/\'/i', '', $name_url_encoded);
    $name_url_encoded = preg_replace('/[àáâãäåæ]/i', 'a', $name_url_encoded);
    $name_url_encoded = preg_replace('/[ç]/i', 'c', $name_url_encoded);
    $name_url_encoded = preg_replace('/[èéêëŒ]/i', 'e', $name_url_encoded);
    $name_url_encoded = preg_replace('/[ìíîï]/i', 'i', $name_url_encoded);
    $name_url_encoded = preg_replace('/[ðñòóôõöøœ]/i', 'o', $name_url_encoded);
    $name_url_encoded = preg_replace('/[ùúûü]/i', 'u', $name_url_encoded);
    $name_url_encoded = preg_replace('/[ýÿŸ]/i', 'y', $name_url_encoded);
    $name_url_encoded = preg_replace('/[þ]/i', 'p', $name_url_encoded);
    $name_url_encoded = preg_replace('/[Šš]/i', 's', $name_url_encoded);
    $name_url_encoded = preg_replace('/[ƒ]/i', 'f', $name_url_encoded);
    return $name_url_encoded;
}

// See "all-in-one-seo-pack.example.html" in the miscellaneous folder for help on this one
function allInOneSEOPack(   $site_name, 
                            $title,
                            $url,
                            $description,
                            $long_description, 
                            $image, 
                            $published_time, 
                            $modified_time, 
                            $type, 
                            $twitter_card) 
{
    echo   '<!-- All in One SEO Pack 2.4.3 by Michael Torbert of Semper Fi Web Design[163,209] -->
            <meta name="description"  content="'.$description.'" />
            
            <meta property="og:title" content="'.$title.'" />
            <meta property="og:type" content="'.$type.'" />
            <meta property="og:url" content="'.$url.'" />
            <meta property="og:image" content="'.$image.'" />
            <meta property="og:site_name" content="'.$site_name.'" />
            <meta property="og:description" content="'.$long_description.'" />
            <meta property="article:published_time" content="'.$published_time.'" />
            <meta property="article:modified_time" content="'.$modified_time.'" />
            <meta name="twitter:card" content="'.$twitter_card.'" />
            <meta name="twitter:title" content="'.$title.'" />
            <meta name="twitter:description" content="'.$long_description.'" />
            <meta name="twitter:image" content="'.$image.'" />
            <meta itemprop="image" content="'.$image.'" />
            <!-- /all in one seo pack -->';
}