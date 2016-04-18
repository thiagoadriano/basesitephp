<?php
    require_once 'controller/metaController.php';
    $Metas = new MetasController();
?>

<head>
	<meta charset="UTF-8">
	<title><?php echo $Metas->setTitle(); ?></title>
    <meta name="description" content="<?php echo $Metas->setDescription(); ?>">

    <base href="<?php $page->getURL(); ?>">
    <link rel="canonical" href="<?php $page->getURL(); ?>">

    <meta name="google-site-verification" content="">
    <meta name="msvalidate.01" content=""/>

    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="content-language" content="pt-br">
    <meta http-equiv="imagetoolbar" content="no">
    <meta http-equiv="cache-control" content="no-cache">

    <link rel="stylesheet" href="<?php $page->getURL(); ?>assets/css/normalize.css">

    <link rel="shortcut icon" type="image/x-icon" href="favicon.png">

</head>

