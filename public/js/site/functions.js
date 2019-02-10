$(document).ready(function () {
    getQtyTotal();
    getTotal();
});

/*Cart*/
function getQtyTotal() {
    jQuery.ajax({
        url: '/cart/getQtyTotal',
        type: 'POST',
        success: function (res) {
            $('span.product-count').text(res);
        },
        errors: function () {
            alert("ERROR");
        }
    });
}

function getTotal() {
    jQuery.ajax({
        url: '/cart/getTotal',
        type: 'POST',
        success: function (res) {
            $('span.cart-amunt').text(res);
        },
        errors: function () {
            alert("ERROR");
        }
    });
}

function showCart(cart) {
    $("tbody.table-cart").html(jQuery.parseJSON(cart));
};

function showModalCart(cart) {
    $("#CartModal").modal('show');
};

$('body').on('click', '.add-to-cart-button,input.remove-item', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id'),
        qty = $('input.remove-item').val();
    jQuery.ajax({
        url: '/cart/add',
        data: {
            id: id
            , qty: qty
        },
        type: 'POST',
        success: function (res) {
            showCart(res);
            if (e.currentTarget.classList.contains("add-to-cart-button")) {
                showModalCart(res);
            }
        },
        errors: function () {
            alert("ERROR");
        }
    });


    getQtyTotal();
    getTotal();
});

$('body').on('click', '#getCart', function (e) {
    getCart();
});

$('body').on('click', 'button.clear-cart', function (e) {
    e.preventDefault();
    jQuery.ajax({
        url: 'cart/clear'
        , type: 'POST'
        , success: function (res) {
            showCart(res);
        }
    });
    getQtyTotal();
    getTotal();
})

$('body').on('click', '.remove-product', function (e) {
    e.preventDefault();
    id = $(this).attr('data-id');
    jQuery.ajax({
        url: 'cart/removeProduct'
        , data: {
            id: id
        }
        , type: "POST"
        , success: function (res) {
            showCart(res);
        }
    });
    getQtyTotal();
    getTotal();
})
/*/Cart*/

/*subscribe*/
$('body').on('click', 'button.client-subscribe', function (e) {
    e.preventDefault();
    var email = $('input#letterInputEmail').val();
    var login = $('input#letterInputName').val();
    var template = $(this).attr('name');
    jQuery.ajax({
        url: '/sender/letter',
        data: {
            email: email
            , login: login
            , template: template
        },
        type: 'POST',
        success: function (data) {
            $("#dangerSignup").text(data);
            $("#dangerSignup").modal(show);
            $("#letterModal").modal('toggle');
        }
    });
});

/*Signup*/
$('body').on('click', 'button.signupClient', function (e) {
    e.preventDefault();

    var userName = $("input#signupInputName").val();
    var userPhone = $("input#signupInputPhone").val();
    var userLogin = $("input#signupInputLogin").val();
    var userEmail = $("input#signupInputEmail").val();
    var userCity = $("input#signupInputCity").val();
    var userAdress = $("input#signupInputAdress").val();
    var userBorn = $("input#signupInputBorn").val();
    var userPassword = $("input#signupInputPassword").val();
    var userConfirmPassword = $("input#signupInputConfirmPassword").val();

    jQuery.ajax({
        url: '/signup',
        data: {
            userName: userName
            , userPhone: userPhone
            , userLogin: userLogin
            , userEmail: userEmail
            , userCity: userCity
            , userAdress: userAdress
            , userBorn: userBorn
            , userPassword: userPassword
            , userConfirmPassword: userConfirmPassword
        },
        type: 'POST',
        success: function (data) {
            $("#dangerSignup").text(data);
            $("#dangerSignup").modal('show');
            $("#signupModal").modal('toggle');
        },
        errors: function () {
            location.reload();
        }
    });
});

/*Order*/
$('body').on('click', 'button.order-cart', function (e) {
    e.preventDefault();
    jQuery.ajax({
        url: 'checkout'
        , type: 'POST'
        , success: function (res) {
            if (jQuery.parseJSON(res) != true) {
                $('p.error-auth').text(res);
                $("#loginModal").modal('show');
            } else {
                saveOrder();
            }
        }
    })
})

function saveOrder() {
    jQuery.ajax({
        url: 'saveOrder'
        , type: 'POST'
        , success: function (res) {

        }
    })
}

/*/Order*/
