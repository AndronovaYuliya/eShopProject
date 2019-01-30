/*Cart*/
$('body').on('click', '.add-to-cart-button', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id'),
        qty = $('.quantity input').val() ? $('.quantity input').val() : 1;
    jQuery.ajax({
        url: '/cart/add',
        data: {id: id, qty: qty},
        type: 'POST',
        success: function (res) {
            showCart(res);
        },
        errors: function () {
            alert("ERROR");
        }
    });
});

function showCart(cart) {
    alert(cart);
};

$('body').on('click', '#getCart', function (e) {
    getCart();
});
/*/Cart*/
