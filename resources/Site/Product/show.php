<!-- Start product-big-title-area -->
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Product</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End product-big-title-area -->
<!-- Start single-product-area-big-title-area -->
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Search Products</h2>
                    <form action="/search" method="post">
                        <input type="text" placeholder="Search products...">
                        <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
                    </form>
                </div>
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Products</h2>
                    <?php if (count($products) > 6): ?>
                        <?php for ($i = 0; $i < 6; $i++): ?>
                            <div class="thubmnail-recent">
                                <img src="<?php if(isset($products[$i]['file_name'][0]))echo $products[$i]['file_name'][0] ?>" class="recent-thumb grow"
                                     alt="img">
                                <h3><a href="/show?<?php echo $products[$i]['alias'] ?>">
                                        <?php echo $products[$i]['title'] ?></a></h3>
                                <h2><a href="/brand?<?php echo $data['products'][$i]['brand'] ?>">
                                        <?php echo $data['products'][$i]['brand'] ?></a></h2>
                                <div class="product-sidebar-price">
                                    <ins><?php echo $products[$i]['price'] . ' $'; ?></ins>
                                    <del><?php echo $products[$i]['old_price'] . ' $'; ?></del>
                                </div>
                            </div>
                        <?php endfor; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-8">
                <?php if (isset($product)): ?>
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="/">Home</a>
                            <a href="/category?<?php echo $product['category_alias'] ?>"><?php echo($product['category']) ?></a>
                            <a href="/brand?<?php echo $product['brand'] ?>"><?php echo($product['brand']) ?></a>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="product-images">
                                        <div class="product-main-img">
                                            <img src="<?php if(isset($product['file_name']))echo $product['file_name'][0] ?>" alt="img">
                                        </div>
                                        <div class="product-gallery">
                                            <?php foreach ($product['file_name'] as $img): ?>
                                                <img class="grow" src=<?php echo $img ?> alt="img">
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="product-inner">
                                        <h2 class="product-name">
                                            <?php echo $product['title'] ?></h2>
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text remove-item" title="Qty"
                                                   value="<?php if ($product['count'] > 0) {
                                                       echo 1;
                                                   } else {
                                                       echo 0;
                                                   } ?>" name="qty" min="1" id="currency"
                                                   max="<?php echo($product['count']) ?>" step="1"
                                                   data-id="<?php echo $product['id']?>">
                                        </div>
                                        <button class="cart btn btn-outline-success my-2 my-sm-0 add-to-cart-button"
                                                data-id="<?php echo($product['id']) ?>"
                                                href="#"
                                            <?php if ($product['count'] == 0) {
                                                echo 'disabled';
                                            } ?>><?php if ($product['count'] == 0) {
                                                echo "Out of stock";
                                            }else{
                                                echo 'Add to cart';
                                            }?>
                                        </button>
                                        <button href="#" class="cart btn btn-outline-success my-2 my-sm-0 recount-cart" disabled>Recount</button>

                                        <div class="product-inner-price">
                                            <ins>
                                                <span><?php echo $product['price'] . ' $'; ?></span>
                                            </ins>
                                            <del>
                                                <?php echo $product['old_price'] . ' $'; ?>
                                            </del>
                                        </div>
                                        <p class="product-inner-category">
                                        <p>Category: <a
                                                    href="/category?<?php echo $product['category_alias'] ?>">
                                                <?php echo($product['category']) ?></a>
                                            Brand: <a
                                                    href="/brand?<?php echo $product['brand'] ?>">
                                                <?php echo($product['brand']) ?></a>
                                            Tags:
                                            <?php if(isset($product['key_words'] )):?>

                                                <?php foreach ($product['key_words'] as $key_words): ?>
                                                <a href="/key?<?php echo $key_words ?>"><?php echo $key_words ?></a>
                                            <?php endforeach; ?><?php endif;?>
                                        <p class="text-justify">
                                            <?php echo $product['description'] ?>
                                        </p>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div><!-- End single-product-area-big-title-area -->
