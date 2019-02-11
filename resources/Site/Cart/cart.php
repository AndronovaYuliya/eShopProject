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

                        <div class="row">
                            <div class="col-sm">
                                <p class="error-auth"></p>
                            </div>
                        </div>

                    <form method="post">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Brand</th>
                                <th>Count</th>
                                <th>Price</th>
                                <th>Sum</th>
                                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                            </tr>
                            </thead>
                            <tbody class="table-cart">
                            <?php foreach ($table as $part): ?>
                                <?php print($part) ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </form>
                    <div class="container text-right">
                        <button type="button" class="btn btn-outline-dark clear-cart">Clear cart</button>
                        <button type="button" class="btn btn-primary order-cart">To order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal done-order" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Thank you for your order!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>