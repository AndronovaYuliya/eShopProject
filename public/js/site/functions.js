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

/*subscribe*/
$('button.client-subscribe').on('click', function (e) {
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
            $("#dangerSignup").show();
            $("#letterModal").modal('toggle');
        }
    });
});

/*Signup*/
$('button.signupClient').on('click', function (e) {
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
            $("#dangerSignup").show();
            $("#signupModal").modal('toggle');
        },
        errors: function () {
            location.reload();
        }
    });
});
