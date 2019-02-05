<!-- Start product-big-title-area -->
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Shopping Cart</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End product-big-title-area -->
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Search Products</h2>
                    <form action="/search" method="post">
                        <input type="text" name="search" placeholder="Search products...">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Products</h2>

                    <?php if (count($products) > 0): ?>
                        <?php for ($i = 0; $i < 6; $i++): ?>
                            <div class="thubmnail-recent">
                                <img src=<?php echo $products[$i]['file_name'][0] ?> class="recent-thumb"
                                     alt="img">
                                <h2><a href="/shop?<?php echo $products[$i]['alias'] ?>">
                                        <?php echo $products[$i]['title'] ?></a></h2>
                                <h3><a href="/brand?<?php echo $products[$i]['brand'] ?>">
                                        <?php echo $products[$i]['title'] ?></a></h3>
                                <div class="product-sidebar-price">
                                    <ins><?php echo $products[$i]['price'] ?></ins>
                                    <del>
                                        <?php echo $products[$i]['price'] ?></del>
                                </div>
                            </div>
                        <?php endfor; ?>
                    <?php endif; ?>

                </div>
            </div>
            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="woocommerce">
                        <form method="post" action="#">
                            <table cellspacing="0" class="shop_table cart">
                                <thead>
                                <tr>
                                    <th class="product-remove">&nbsp;</th>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="cart_item">
                                    <td class="product-remove">
                                        <a title="Remove this item" class="remove" href="#">×</a>
                                    </td>
                                    <td class="product-thumbnail">
                                        <a href="single-product.html"><img width="145" height="145" alt="poster_1_up"
                                                                           class="shop_thumbnail"
                                                                           src="img/product-thumb-2.jpg"></a>
                                    </td>
                                    <td class="product-name">
                                        <a href="single-product.html">Ship Your Idea</a>
                                    </td>
                                    <td class="product-price">
                                        <span class="amount">£15.00</span>
                                    </td>
                                    <td class="product-quantity">
                                        <div class="quantity buttons_added">
                                            <input type="button" class="minus" value="-">
                                            <input type="number" size="4" class="input-text qty text" title="Qty"
                                                   value="1" min="0" step="1">
                                            <input type="button" class="plus" value="+">
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="amount">£15.00</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                        <div class="cart-collaterals">
                            <div class="cart_totals ">
                                <h2>Cart Totals</h2>
                                <div class="cart">

                                </div>
                                <table cellspacing="0">
                                    <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Cart Subtotal</th>
                                        <td><span class="amount">£15.00</span></td>
                                    </tr>
                                    <tr class="shipping">
                                        <th>Shipping and Handling</th>
                                        <td>Free Shipping</td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Order Total</th>
                                        <td><strong><span class="amount">£15.00</span></strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>