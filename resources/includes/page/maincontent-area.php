<!-- Start maincontent-area -->
<div class="maincontent-area">
    <div class="container">
        <h2 class="text-center">Latest Products</h2>
        <div class="row justify-content-center align-items-center">
            <div class="card-deck">

                <?php if (isset($data['products'])):?>
                    <?php for($i=0; $i<6; $i++):?>
                        <div class="product-wrap">
                            <div class="product-image">
                                <img src="<?php echo $data['products'][$i]['file_name'][0]?>">
                                <div class="shadow"></div>
                            </div>
                            <div class="product-list">
                                <h2><a href="/product/show?<?php echo  $data['products'][$i]['url']?>">
                                        <?php echo $data['products'][$i]['title']?></a>
                                </h2>
                                <h3>
                                    <a href="/product/brand?<?php echo  $data['products'][$i]['brand']?>">
                                        <?php echo $data['products'][$i]['brand']?></a>
                                </h3>
                                <div class="price"><?php echo $data['products'][$i]['price'];?> $</div>
                            </div>
                        </div>
                    <?php endfor;?>
                <?php endif;?>

            </div>
        </div>
    </div>
</div><!-- End maincontent-area -->
