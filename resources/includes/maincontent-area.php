<!-- Start maincontent-area -->
<div class="maincontent-area">
    <div class="container">
        <h2 class="text-center">Latest Products</h2>
        <div class="row justify-content-center align-items-center">
            <div class="card-deck">
                <?php for($i=0; $i<6;$i++):?>
                    <div class="product-wrap">
                        <div class="product-image">
                            <img src=".<?php echo $data[$i]['img']?>">
                            <div class="shadow"></div>
                        </div>
                        <div class="product-list">
                            <h3><a href="/product/product?id=<?php echo $data[$i]['id']?>"><?php echo $data[$i]['title']?></a></h3>
                            <div class="price"><?php echo $data[$i]['currency'].' '. $data[$i]['new_price'];?></div>
                        </div>
                    </div>
                <?php endfor;?>
            </div>
        </div>
    </div>
</div><!-- End maincontent-area -->
