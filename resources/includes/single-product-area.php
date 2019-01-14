<!-- Start single-product-area -->
<div class="single-product-area">
    <div class="container">
        <div class="row">

            <?php foreach ($data['products'] as $product):?>
                <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="<?php echo $product['file_name'][0]?>" alt="img">
                        </div>
                        <h2><a href="/product/product?id=<?php echo $product['id']?>">
                                <?php echo $product['title']?></a></h2>
                        <div class="product-carousel-price">
                            <ins>$<?php echo $product['price']?></ins> <del><?php echo $product['price']?></del>
                        </div>
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">Add to cart</a>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>

        </div>
    </div>
</div>
<!-- End single-product-area -->