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

        if (!Session::getData('cart', $ID)) {
            Session::addData('cart', $ID, 'qty', $qty);
            Session::addData('cart', $ID, 'title', $title);
            Session::addData('cart', $ID, 'price', $price);
            Session::addData('cart', $ID, 'alias', $alias);
            Session::addData('cart', $ID, 'brand', $brand);
            Session::addData('cart', $ID, 'sum', $price * $qty);
        } else {
            $currentQty = Session::getData('cart', $ID)['qty'] + $qty;
            Session::addData('cart', $ID, 'qty', $currentQty);
            $currentSum = Session::getData('cart', $ID)['sum'] + $qty * $price;
            Session::addData('cart', $ID, 'sum', $currentSum);
        }

        $total = 0;
        $qtyTotal = 0;
        foreach (Session::get('cart') as $key => $value) {
            $total += Session::getData('cart', $key)['sum'];
            $qtyTotal += Session::getData('cart', $key)['qty'];
        }
        Session::addData('cart', 0, 'total', $total);
        Session::addData('cart', 0, 'qtyTotal', $qtyTotal);


        $table = [];
        foreach (Session::get('cart') as $key => $item) {
            if ($key) {
                $table[] = <<<HTML
                    <tr>
                        <td><a href="/show?{$item['alias']}">{$item['title']}</a></td>
                        <td><a href="/brand?{$item['brand']}">{$item['brand']}</a></td>
                        <td>{$item['qty']}</td>
                        <td>{$item['price']} $</td>
                        <td>{$item['sum']} $</td>
                    </tr>
HTML;
            }
        }
        $table[] = <<<HTML
                <tr>
                    <td>Count</td>
                    <td colspan="4" class="text-right cart-qty">{$qtyTotal}</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td colspan="4" class="text-right cart-sum">{$total} $</td>
                </tr>
HTML;
        return $table;
    }
}