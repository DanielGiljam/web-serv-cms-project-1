<?php if(!isset($page_title)){
    $page_title = 'something something';
}; ?>

<!doctype html>

<html lang="en">
<head>
    <title><?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo 'styles.css'; ?>" />
</head>

<body>

<header>
    <h1>Some Random Dating Site</h1>
</header>

