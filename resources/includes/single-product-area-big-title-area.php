<!-- Start single-product-area-big-title-area -->
<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Search Products</h2>
                    <form action="">
                        <input type="text" placeholder="Search products...">
                        <input type="submit" value="Search">
                    </form>
                </div>
                <div class="single-sidebar">
                    <h2 class="sidebar-title">Products</h2>
                    <?php for($i=0; $i<6;$i++):?>
                        <div class="thubmnail-recent">
                            <img src="../../public<?php echo $data[$i]['img']?>" class="recent-thumb" alt="img">
                            <h2><a href=""><?php echo $data[$i]['title']?></a></h2>
                            <div class="product-sidebar-price">
                                <ins><?php echo $data[$i]['currency'].' '. $data[$i]['new_price'];?></ins>
                                <del><?php echo $data[$i]['currency'].' '. $data[$i]['old_price'];?></del>
                            </div>
                        </div>
                    <?php endfor;?>
                </div>

                <div class="single-sidebar">
                    <h2 class="sidebar-title">Recent Posts</h2>
                    <ul>
                        <?php for($i=0; $i<6;$i++):?>
                            <li><a href=""><?php echo $data[$i]['title']?></a></li>
                        <?php endfor;?>
                    </ul>
                </div>

            </div>

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <a href="">Home</a>
                        <a href="">Category Name</a>
                        <a href="">Sony Smart TV - 2015</a>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product-images">
                                <div class="product-main-img">
                                    <img src="../../public<?php echo $singleProduct[0]['img']?>" alt="img">
                                </div>

                                <div class="product-gallery">
                                    <img src="../../public<?php echo $singleProduct[0]['img']?>" alt="img">
                                    <img src="../../public<?php echo $singleProduct[0]['img']?>" alt="img">
                                    <img src="../../public<?php echo $singleProduct[0]['img']?>" alt="img">
                                    <img src="../../public<?php echo $singleProduct[0]['img']?>" alt="img">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="product-inner">
                                    <h2 class="product-name"><?php echo $singleProduct[0]['title']?></h2>
                                    <div class="product-inner-price">
                                        <ins><?php echo $singleProduct[0]['currency'].' '. $singleProduct[0]['new_price'];?></ins> <del><?php echo $singleProduct[0]['currency'].' '. $singleProduct[0]['new_price'];?></del>
                                    </div>
                                <form action="" class="cart">
                                    <div class="quantity">
                                        <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                    </div>
                                    <button class="add_to_cart_button" type="submit">Add to cart</button>
                                </form>

                                <div class="product-inner-category">
                                    <p>Category: <a href="">Summer</a>. Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End single-product-area-big-title-area -->