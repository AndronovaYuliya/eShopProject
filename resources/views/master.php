<?php
require dirname(__FILE__,3).'/components/Autoload.php';
$goods=ShopGoods::getGoods();
//var_dump($goods);
?>


<!doctype html>
<html lang="en">
    <head>
        <?php require dirname(__FILE__).'/includes/head.php';?>
        <?php require dirname(__FILE__).'/includes/stylesheet.php';?>
    </head>
    <body>

        <?php //include dirname(__FILE__).'/includes/header-area.php';?>
        <?php echo $header_area;?>

        <?php //include dirname(__FILE__).'/includes/modal-fade.php';?>
        <?php echo $modal_fade;?>

        <?php //include dirname(__FILE__).'/includes/site-branding-area.php';?>
        <?php echo $site_branding_area;?>

        <?php //include dirname(__FILE__).'/includes/mainmenu-area.php';?>
        <?php echo $mainmenu_area;?>

        <?php //include dirname(__FILE__).'/includes/slider-area.php';?>
        <?php echo $slider_area?>

        <?php //include dirname(__FILE__).'/includes/promo-area.php';?>
        <?php echo $promo_area;?>

        <?php //include dirname(__FILE__).'/includes/maincontent-area.php';?>
        <?php echo $maincontent_area;?>

        <?php //include dirname(__FILE__).'/includes/footer-top-area.php';?>
        <?php echo $footer_top_area;?>

        <?php include dirname(__FILE__).'/includes/script.php';?>
    </body>
</html>
