<!-- Start single-product-area -->
<div class="single-product-area">
    <div class="container">
        <div class="row">
            <?php if(!is_null($data)):?>
                <?php foreach ($data as $value):?>
                    <?php if($value['visible']):?>
                        <div class="col-md-3 col-sm-6">
                            <div class="single-shop-product">
                                <div class="product-upper">
                                    <img src="<?php echo $value['img']?>" alt="img">
                                </div>
                                <h2><a href="#"><?php echo $value['title']?></a></h2>
                                <div class="product-carousel-price">
                                    <ins>$<?php echo $value['new_price']?></ins> <del><?php echo $value['currency'].$value['old_price']?></del>
                                </div>
                                <div class="product-option-shop">
                                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
</div>
<!-- End single-product-area -->