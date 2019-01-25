
<!-- Start slider-area -->
<div class="slider-area">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/page/slider1.jpg" alt="First slide">
                <div class="carousel-caption">
                    <div class="jumbotron">
                        <h1 class="display-3">Hello, world!</h1>
                        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra
                            attention to featured content or information.</p>
                        <hr class="my-4">
                        <p>It uses utility classes for typography and spacing to space content out within the larger
                            container.</p>
                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/img/page/slider2.jpg" alt="First slide">
                <div class="carousel-caption">
                    <div class="jumbotron">
                        <h1 class="display-3">Hello, world!</h1>
                        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra
                            attention to featured content or information.</p>
                        <hr class="my-4">
                        <p>It uses utility classes for typography and spacing to space content out within the larger
                            container.</p>
                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/img/page/slider3.jpg" alt="First slide">
                <div class="carousel-caption">
                    <div class="jumbotron">
                        <h1 class="display-3">Hello, world!</h1>
                        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra
                            attention to featured content or information.</p>
                        <hr class="my-4">
                        <p>It uses utility classes for typography and spacing to space content out within the larger
                            container.</p>
                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div><!-- End slider-area-->
<!-- Start promo-area -->
<div class="promo-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="single-promo">
                    <p>30 Days return</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo">
                    <p>Free shipping</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo">
                    <p>New products</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo">
                    <p>Secure payments</p>
                </div>
            </div>
        </div>
    </div>
</div><!-- End promo-area -->
<!-- Start maincontent-area -->
<div class="maincontent-area">
    <div class="container">
        <h2 class="text-center">Latest Products</h2>
        <div class="row justify-content-center align-items-center">
            <div class="card-deck">

                <?php if (count($products > 0)): ?>
                    <?php for ($i = 0; $i < 6; $i++): ?>
                        <div class="product-wrap">
                            <div class="product-image">
                                <img src="<?php echo $products[$i]['file_name'][0] ?>">
                                <div class="shadow"></div>
                            </div>
                            <div class="product-list">
                                <h2><a href="/shop?<?php echo $products[$i]['alias'] ?>">
                                        <?php echo $products[$i]['title'] ?></a>
                                </h2>
                                <h3>
                                    <a href="/brand?<?php echo $products[$i]['brand'] ?>">
                                        <?php echo $products[$i]['brand'] ?></a>
                                </h3>
                                <div class="price"><?php echo $products[$i]['price']; ?> $</div>
                            </div>
                        </div>
                    <?php endfor; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div><!-- End maincontent-area -->
