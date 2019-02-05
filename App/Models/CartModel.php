<?php

namespace App\Models;

use Core\Session;

/**
 * Class CartModel
 * @package App\Models
 */
class CartModel
{
    /**
     * @param $product
     * @param int $qty
     * @return array
     * @throws \Exception
     */
    public function addToCart($product, $qty = 1): array
    {
        $ID = $product[0]['id'];
        $title = $product[0]['title'];
        $price = $product[0]['price'];
        $alias = $product[0]['alias'];
        $brand = $product[0]['brand'];

        if (!Session::get('cart', $ID)) {
            Session::set('cart',
                [$ID => [
                    'qty' => $qty
                    , 'title' => $title
                    , 'price' => $price
                    , 'alias' => $alias
                    , 'brand' => $brand
                ]]);
            Session::addData($ID, 'sum', $price * $qty);
        } else {
            $currentQty = Session::get('cart', $ID)['qty'] + $qty;
            Session::addData($ID, 'qty', $currentQty);
            $currentSum = Session::get('cart', $ID)['sum'] + $qty * $price;
            Session::addData($ID, 'sum', $currentSum);
        }
        $total = 0;
        $qtyTotal = 0;
        /*foreach (Session::get('cart') as $key => $value) {
            $total += Session::get('cart', $key)['sum'];
            $qtyTotal += Session::get('cart', $key)['qty'];
        }*/
        Session::addData('cart', 'total', $total);
        Session::addData('cart', 'qtyTotal', $qtyTotal);
        $table = [];
        foreach (Session::get('cart') as $key => $item) {
            if (is_numeric($key)) {
                $table[] = <<<HTML
                    <tr>
                        <td><a href="/show?{$item['alias']}">{$item['title']}</a></td>
                        <td><a href="/brand?{$item['brand']}">{$item['brand']}</a></td>
                        <td>{$item['qty']}</td>
                        <td>{$item['price']} $</td>
                        <td>{$item['sum']} $</td>
                        <td><span data-id="{$key}" class="glyphicon glyphicon-remove text-danger del-item" 
                            aria-hidden="true"></span></td>
                    </tr>
HTML;
            }
        }
        $table[] = <<<HTML
                <tr>
                    <td>Count</td>
                    <td colspan="4" class="text-right cart-qty">{$total}</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td colspan="4" class="text-right cart-sum">{$qtyTotal} $</td>
                </tr>
HTML;
        return $table;
    }
}