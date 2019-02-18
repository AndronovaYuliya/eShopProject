<?php

namespace App\Models;

use Core\Session;

/**
 * Class CartModel
 * @package AppModel\Models
 */
class CartModel
{
    /**
     * @param $product
     * @param int $qty
     * @return array
     * @throws \Exception
     */
    public static function addToCart($product, $qty = 1): array
    {
        $ID = $product['id'];
        if (Session::getData('cart', $ID)) {
            $qty = $qty > $product['id'] ? $product['id'] : $qty;
        }

        self::saveChanges($product, $qty);

        return self::printCart();
    }

    /**
     * @param $product
     * @param int $qty
     * @return array
     * @throws \Exception
     */
    public static function changeCount($product, $qty = 1): array
    {
        $ID = $product[0]['id'];

        if (Session::getData('cart', $ID)) {
            $qty = $qty > $product[0]['id'] ? $product[0]['id'] : $qty;
        }

        self::saveChanges($product, $qty);

        return self::printCart();
    }

    /**
     * @param $product
     * @param $currentQty
     * @throws \Exception
     */
    public static function saveChanges($product, $qty)
    {
        $ID = $product['id'];

        if (!Session::getData('cart', $ID)) {
            Session::addData('cart', $ID, 'qty', $qty);
            Session::addData('cart', $ID, 'title', $product['title']);
            Session::addData('cart', $ID, 'price', $product['price']);
            Session::addData('cart', $ID, 'alias', $product['alias']);
            Session::addData('cart', $ID, 'brand', $product['brand']);
            Session::addData('cart', $ID, 'countToSell', $product['count']);
            Session::addData('cart', $ID, 'sum', $product['price'] * $qty);
        } else {
            Session::addData('cart', $ID, 'qty', $qty);
            Session::addData('cart', $ID, 'sum', $product['price'] * $qty);
        }

        $total = 0;
        $qtyTotal = 0;
        foreach (Session::get('cart') as $key => $value) {
            $total += Session::getData('cart', $key)['sum'];
            $qtyTotal += Session::getData('cart', $key)['qty'];
        }
        Session::addData('cart', 0, 'total', $total);
        Session::addData('cart', 0, 'qtyTotal', $qtyTotal);
    }

    /**
     * @return array
     * @throws \Exception
     */
    public static function printCart()
    {
        $table = [];
        $total = 0;
        $qtyTotal = 0;

        foreach (Session::get('cart') as $key => $value) {
            $total += Session::getData('cart', $key)['sum'];
            $qtyTotal += Session::getData('cart', $key)['qty'];
        }

        foreach (Session::get('cart') as $key => $item) {
            if ($key) {
                $table[] = <<<HTML
                    <tr>
                        <td><a href="/show?{$item['alias']}">{$item['title']}</a></td>
                        <td><a href="/brand?{$item['brand']}">{$item['brand']}</a></td>
                        <td>{$item['qty']}</td>
                        <td>{$item['price']} $</td>
                        <td>{$item['sum']} $</td>
                        <td class="product-quantity">
                            <div class="quantity buttons_added">
                                <input type="number" size="4" class="input-text qty text remove-item" title="Qty"
                                    value="{$item['qty']}" min="1" max="{$item['countToSell']}" step="1"
                                     name="qty" data-id="{$key}">
                            </div>
                        </td>
                        <td class="product-remove">
                            <a title="Remove this item" class="remove-product" href="#" data-id="{$key}">×</a>
                        </td>
                    </tr>
HTML;
            }
        }
        $table[] = <<<HTML
                <tr>
                    <td>Cart Subtotal</td>
                    <td colspan="5" class="text-right cart-qty">{$qtyTotal}</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td>Order Total</td>
                    <td colspan="5" class="text-right cart-sum">{$total} $</td>
                    <td colspan="2"></td>
                </tr>
HTML;
        return $table;
    }
}
