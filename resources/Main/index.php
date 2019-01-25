<!-- Start Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/user/login">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" required class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" required class="form-control" id="exampleInputPassword1"
                               placeholder="Password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Modal-->
<!-- Start Modal -->
<div class="modal fade" id="letterModal" tabindex="-1" role="dialog" aria-labelledby="letterModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="letterModalLabel">Subscribe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/sender/letter">
                    <div class="form-group">
                        <label for="letterInputName">Name</label>
                        <input type="text" required class="form-control" id="letterInputName"
                               aria-describedby="nameHelp" name="name" placeholder="James Bond">
                    </div>
                    <div class="form-group">
                        <label for="letterInputEmail">email</label>
                        <input type="email" required class="form-control" id="letterInputEmail" name="email"
                               placeholder="james@bond.com">
                    </div>
                    <button type="submit" name="subscribe" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Modal-->
<!-- Start Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/user/signup" name="signupUser">
                    <div class="form-group">
                        <label for="SignupInputName">Name</label>
                        <input type="text" class="form-control" id="signupInputName" aria-describedby="nameHelp"
                               name="name" placeholder="James Bond">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputPhone">Phone</label>
                        <input type="text" class="form-control" required id="signupInputPhone"
                               aria-describedby="nameHelp" name="lastName" placeholder="123-456-789">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputLogin">Login</label>
                        <input type="text" class="form-control" required id="signupInputLogin"
                               aria-describedby="nameHelp" name="Login" placeholder="Agent007">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputEmail">email</label>
                        <input type="email" class="form-control" required id="signupInputEmail" name="email"
                               placeholder="james@bond.com">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputCity">city</label>
                        <input type="text" class="form-control" id="signupInputCity" aria-describedby="nameHelp"
                               name="City" placeholder="London">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputAdress">adress</label>
                        <input type="text" class="form-control" id="signupInputAdress" aria-describedby="nameHelp"
                               name="Adress" placeholder="Vauxhall Cross - 85">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputBorn">born</label>
                        <input type="date" class="form-control" id="signupInputBorn" aria-describedby="nameHelp"
                               name="Born">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputPassword">password</label>
                        <input type="password" required class="form-control" id="signupInputPassword"
                               aria-describedby="nameHelp" name="Password">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputConfirmPassword">confirm password</label>
                        <input type="password" required class="form-control" id="signupInputConfirmPassword"
                               aria-describedby="nameHelp" name="ConfirmPassword">
                    </div>
                    <button type="submit" name="subscribe" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Modal-->
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
                                <h2><a href="/product/show?<?php echo $products[$i]['url'] ?>">
                                        <?php echo $products[$i]['title'] ?></a>
                                </h2>
                                <h3>
                                    <a href="/product/brand?<?php echo $products[$i]['brand'] ?>">
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
