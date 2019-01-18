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
                            <img src="<?php echo $data['products'][$i]['file_name'][0]?>" class="recent-thumb" alt="img">
                            <h3><a href="/product/show?<?php echo  $data['products'][$i]['url']?>">
                                    <?php echo $data['products'][$i]['title']?></a></h3>
                            <h2><a href="/product/brand?<?php echo  $data['products'][$i]['brand']?>">
                                    <?php echo $data['products'][$i]['brand']?></a></h2>
                            <div class="product-sidebar-price">
                                <ins><?php echo $data['products'][$i]['price'].' $';?></ins>
                                <del><?php echo $data['products'][$i]['price'].' $';?></del>
                            </div>
                        </div>
                    <?php endfor;?>

                </div>
            </div>
            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <a href="/">Home</a>
                        <a href="/product/category?<?php echo $category['url']?>"><?php echo($data['product'][0]['category'])?></a>
                        <a href="/product/brand?<?php echo  $data['product'][0]['brand']?>"><?php echo($data['product'][0]['brand'])?></a>
                        <a href="#"><?php echo($data['product'][0]['title'])?></a>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product-images">
                                <div class="product-main-img">
                                    <img src="<?php echo $data['product'][0]['file_name'][0]?>" alt="img">
                                </div>

                                <div class="product-gallery">
                                    <?php foreach ($data['product'][0]['file_name'] as $img):?>
                                        <img src=<?php echo $img?> alt="img">
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="product-inner">
                                <h2 class="product-name"><?php echo $data['product'][0]['title']?></h2>
                                <div class="product-inner-price">
                                    <ins><?php echo $data['product'][0]['price']. ' $';?></ins> <del>
                                        <?php echo $data['product'][0]['price']. ' $';?></del>
                                </div>
                                <form action="" class="cart">
                                    <div class="quantity">
                                        <input type="number" size="4" class="input-text qty text" title="Qty" value="
                                        <?php if(($data['product'][0]['count'])==0) echo 0; else echo 1;?>" name="quantity" min="1"
                                               max="<?php echo($data['product'][0]['count'])?>" step="1">
                                    </div>
                                    <button <?php if(($data['product'][0]['count'])==0) echo 'disabled'?> class="add_to_cart_button" type="submit">Add to cart</button>
                                </form>

                                <div class="product-inner-category">
                                    <p>Category: <a href="/product/category?<?php echo  $data['products'][0]['url_category']?>">
                                            <?php echo($data['product'][0]['category'])?></a>
                                        Brand: <a href="/product/brand?<?php echo  $data['products'][0]['brand']?>">
                                            <?php echo($data['product'][0]['brand'])?></a>
                                        Tags:
                                        <?php foreach($data['product'][0]['key_words'] as $key_words):?>
                                            <a href="/product/key?<?php echo $key_words?>"><?php echo $key_words?></a>
                                        <?php endforeach;?>

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End single-product-area-big-title-area -->