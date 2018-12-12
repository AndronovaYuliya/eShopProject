<?php ob_start()?>

<!-- Start site-branding-area -->
<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="index.html">e<span>Shop</span></a></h1>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="shopping-item">
                    <a href="cart.html">Cart - <span class="cart-amunt">$000</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                </div>
            </div>
        </div>
    </div>
</div><!-- End site-branding-area -->

<?php global $site_branding_area; $site_branding_area=ob_get_flush();?>