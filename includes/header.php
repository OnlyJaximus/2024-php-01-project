<?php include('config/function.php'); ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">




    <title><?php if (isset($pageTitle)) {
                echo $pageTitle;
            } else {
                echo webSetting('title') ?? 'Device Services';
            } ?></title>

    <meta name="description" content="<?php echo webSetting('meta_description') ?? 'Meta Desc'; ?>">
    <meta name="keyword" content="<?php echo webSetting('meta_keyword') ?? 'Meta Keyword'; ?>">
</head>

<body>



    <?php include('navbar.php'); ?>