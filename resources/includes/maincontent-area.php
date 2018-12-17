<!-- Start maincontent-area -->
<div class="maincontent-area">
    <div class="container">
        <h2 class="text-center">Latest Products</h2>
        <div class="row justify-content-center align-items-center">
            <div class="card-deck">
                <?php if(isset($data)):?>
                    <?php for($i=0; $i<6;$i++):?>
                        <a href="/shop">
                            <div class="product-wrap">
                                <div class="product-image">
                                    <img src=<?php echo dirname(__FILE__,3).'/public'.$data[$i]['img']?>>
                                    <div class="shadow"></div>

                                </div>
                                <div class="product-list">
                                    <h3><?php echo $data[$i]['title']?></h3>
                                    <div class="price"><?php echo $data[$i]['currency'].' '. $data[$i]['new_price'];?></div>
                                </div>
                            </div>
                        </a>
                    <?php endfor;?>
                <?php endif;?>

            </div>
        </div>
    </div>
</div><!-- End maincontent-area -->
