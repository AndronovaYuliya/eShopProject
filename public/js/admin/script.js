$(document).ready(function () {

    $("#myModal").modal("show");

    $("#myBtn").click(function () {
        $("#myModal").modal("hide");
    });

    $("button.faker").on('click', function (e) {
        e.preventDefault();
        var method = $(this).attr('name');

        jQuery.ajax({
            url: 'faker',
            data: {method: method},
            type: 'POST',
            success: function () {
                alert("Data updated");
                location.reload();

            },
            errors: function () {
                alert("Incorrect Data");
            }
        })
    })
}); //document.ready