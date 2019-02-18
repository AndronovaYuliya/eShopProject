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
                        <?php if (isset($session['errors'])): ?>
                            <div class="row">
                                <div class="col-sm">
                                    <p><?php echo $session['errors'] ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($client)): ?>
                            <div class="row">
                                <div class="col-sm">
                                    <p>Name</p>
                                </div>
                                <div class="col-sm">
                                    <p><?php echo $client['name'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <p>login</p>
                                </div>
                                <div class="col-sm">
                                    <p><?php echo $client['login'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <p>email</p>
                                </div>
                                <div class="col-sm">
                                    <p><?php echo $client['email'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <p>phone</p>
                                </div>
                                <div class="col-sm">
                                    <p><?php echo $client['phone'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <p>city</p>
                                </div>
                                <div class="col-sm">
                                    <p><?php echo $client['city'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <p>address</p>
                                </div>
                                <div class="col-sm">
                                    <p><?php echo $client['address'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <p>born</p>
                                </div>
                                <div class="col-sm">
                                    <p><?php echo $client['born'] ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Sum</th>
                                <th scope="col">ttn</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($orders)): ?>
                                <?php foreach ($orders as $key => $order): ?>
                                    <tr class="cart-order" data-id="<?php echo $order['id'] ?>">
                                        <th scope="row"><?php echo ++$key ?></th>
                                        <td><?php echo $order['date'] ?></td>
                                        <td><?php echo $order['sum'] ?></td>
                                        <td><?php echo $order['ttn'] ?></td>
                                        <td><?php if (!$order['status']) {
                                                echo "wait";
                                            } else {
                                                echo "done";
                                            } ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal cart-detail" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Brand</th>
                            <th>Count</th>
                            <th>Sum</th>
                        </tr>
                        </thead>
                        <tbody class="table-cart-detail">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>