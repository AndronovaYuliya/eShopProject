<!-- Start product-big-title-area -->
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Contact</h2>
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
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <h2>Consultations and order by phone</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <a href="tel:+380440123456">+38 (044) 01-23-456</a>
                                <a href="tel:+380440123456">Call!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>