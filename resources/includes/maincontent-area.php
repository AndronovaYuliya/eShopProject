<!-- Start maincontent-area -->
<div class="maincontent-area">
    <div class="container">
        <h2 class="text-center">Latest Products</h2>
        <div class="row justify-content-center align-items-center">
            <div class="card-deck">

                <?php for($i=0; $i<6; $i++):?>
                    <div class="product-wrap">
                        <div class="product-image">
                            <img src="<?php echo $data['products'][$i]['file_name'][0]?>">
                            <div class="shadow"></div>
                        </div>
                        <div class="product-list">
                            <h3><a href="/product/product?id=<?php echo  $data['products'][$i]['id']?>">
                                    <?php echo $data['products'][$i]['title']?></a></h3>
                            <div class="price"><?php echo $data['products'][$i]['price'];?> $</div>
                        </div>
                    </div>
                <?php endfor;?>

            </div>
        </div>
    </div>
</div><!-- End maincontent-area -->
