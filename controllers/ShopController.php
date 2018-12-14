<?php
class ShopController {
    private $data;
    public function __construct()
    {
        $goods=new ShopGoodsModel();
        $this->data=$goods->getGoods();
    }

    public function getGoods() {
        return $this->$data;
    }


}
