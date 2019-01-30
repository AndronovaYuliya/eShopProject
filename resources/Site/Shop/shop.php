<!-- Start product-big-title-area -->
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Shop</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End product-big-title-area -->
<!-- Start single-product-area -->
<div class="single-product-area">
    <div class="container">
        <div class="row">
            <?php if (count($products) > 0): ?>
                <?php foreach ($products as $product): ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <img src="<?php echo $product['file_name'][0] ?>" alt="img">
                            </div>
                            <h3><a href="/show?<?php echo $product['alias'] ?>">
                                    <?php echo $product['title'] ?></a></h3>
                            <h2><a href="/brand?<?php echo $product['brand'] ?>">
                                    <?php echo $product['brand'] ?></a></h2>
                            <div class="product-carousel-price">
                                <ins>$<?php echo $product['price'] ?></ins>
                                <del><?php echo $product['price'] ?></del>
                            </div>
                            <div class="product-option-shop">
                                <button class="cart add-to-cart-button" data-id="<?php echo($product['id']) ?>"
                                        type="submit">
                                    Add to cart
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</div>
<!-- End single-product-area -->