<?php
require dirname(__FILE__,3).'/components/Autoload.php';
$goods=ShopGoods::getGoods();
echo "<pre>";
var_dump($goods);
echo "</pre>";
?>


<!doctype html>
<html lang="en">
<head>
    <?php require dirname(__FILE__).'/includes/head.php';?>
    <?php require dirname(__FILE__).'/includes/stylesheet.php';?>
</head>
<body>
<?php require dirname(__FILE__).'/includes/header-area.php';?>
<?php require dirname(__FILE__).'/includes/modal-fade.php';?>
<?php require dirname(__FILE__).'/includes/site-branding-area.php';?>
<?php require dirname(__FILE__).'/includes/mainmenu-area.php';?>
<?php require dirname(__FILE__).'/includes/slider-area.php';?>
<?php require dirname(__FILE__).'/includes/promo-area.php';?>
<?php require dirname(__FILE__).'/includes/maincontent-area.php';?>
<?php require dirname(__FILE__).'/includes/footer-top-area.php';?>
<?php require dirname(__FILE__).'/includes/script.php';?>
</body>
</html>


