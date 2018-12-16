<!--require dirname(__FILE__,3).'/components/Autoloader.php';
//$goods=ProductModel::getGoods();
//var_dump($goods);-->


<!doctype html>
<html lang="en">
<head>
    <?php require dirname(__FILE__,2) . '/includes/head.php';?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">        <!-- Custom CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>

<?php include dirname(__FILE__,2) . '/includes/header-area.php';?>
<?php //echo $header_area;?>

<?php include dirname(__FILE__,2) . '/includes/modal-fade.php';?>
<?php //echo $modal_fade;?>

<?php include dirname(__FILE__,2) . '/includes/site-branding-area.php';?>
<?php //echo $site_branding_area;?>

<?php include dirname(__FILE__,2) . '/includes/mainmenu-area.php';?>
<?php // $mainmenu_area;?>

<?php include dirname(__FILE__,2) . '/includes/slider-area.php';?>
<?php //echo $slider_area?>

<?php include dirname(__FILE__,2) . '/includes/promo-area.php';?>
<?php //echo $promo_area;?>

<?php include dirname(__FILE__,2) . '/includes/maincontent-area.php';?>
<?php //echo $maincontent_area;?>

<?php include dirname(__FILE__,2). '/includes/footer-top-area.php';?>
<?php //echo $footer_top_area;?>

<?php include dirname(__FILE__,2) . '/includes/script.php';?>
</body>
</html>
