<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
</head>
<body>
<table style="border: 1px solid #ddd; border-collapse: collapse; width: 100%;">
    <thead>
    <tr style="background: #f9f9f9;">
        <th style="padding: 8px; border: 1px solid #ddd;">Title</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Count</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Price</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Sum</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($cart as $key => $value): ?>
        <?php if ($key != 0): ?>
            <tr>
                <td><?php echo $value['title'] ?></td>
                <td><?php echo $value['qty'] ?></td>
                <td><?php echo $value['price'] ?></td>
                <td><?php echo $value['sum'] ?></td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
    <tr>
        <td>Cart Subtotal</td>
        <td colspan="5" class="text-right cart-qty"><?php echo $cart[0]['qtyTotal'] ?></td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td>Order Total</td>
        <td colspan="5" class="text-right cart-sum"><?php echo $cart[0]['total'] ?> $</td>
        <td colspan="2"></td>
    </tr>
    </tbody>
</table>
</body>
</html>
