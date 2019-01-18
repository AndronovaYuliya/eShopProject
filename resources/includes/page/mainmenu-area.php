<!-- Start mainmenu-area-->
<div class="mainmenu-area">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="/product/index">Shop page</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <?php foreach ($data['categories'] as $category):?>
                            <a class="dropdown-item" href="/product/category?<?php echo $category['url']?>"><?php echo $category['title'];?></a>
                        <?php endforeach;?>

                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Brand
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($data['products'] as $products):?>
                            <a class="dropdown-item" href="/product/brand?<?php echo $products['brand']?>"><?php echo $products['brand'];?></a>
                        <?php endforeach;?>

                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cart/">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
</div><!-- End mainmenu-area -->
