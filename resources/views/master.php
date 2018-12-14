<?php
require dirname(__FILE__,3).'/components/Autoloader.php';
$goods=ShopGoodsModel::getGoods();
//var_dump($goods);
?>


<!doctype html>
<html lang="en">
<head>
    <?php require dirname(__FILE__).'/includes/head.php';?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">        <!-- Custom CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <!--        --><?php //require dirname(__FILE__).'/includes/stylesheet.php';?>
</head>
<body>

<?php include dirname(__FILE__).'/includes/header-area.php';?>
<?php //echo $header_area;?>

<?php include dirname(__FILE__).'/includes/modal-fade.php';?>
<?php //echo $modal_fade;?>

<?php include dirname(__FILE__).'/includes/site-branding-area.php';?>
<?php //echo $site_branding_area;?>

<?php include dirname(__FILE__).'/includes/mainmenu-area.php';?>
<?php // $mainmenu_area;?>

<?php include dirname(__FILE__).'/includes/slider-area.php';?>
<?php //echo $slider_area?>

<?php include dirname(__FILE__).'/includes/promo-area.php';?>
<?php //echo $promo_area;?>

<?php include dirname(__FILE__).'/includes/maincontent-area.php';?>
<?php //echo $maincontent_area;?>

<?php //include dirname(__FILE__).'/includes/footer-top-area.php';?>
<?php echo $footer_top_area;?>

<?php include dirname(__FILE__).'/includes/script.php';?>
</body>
</html>
