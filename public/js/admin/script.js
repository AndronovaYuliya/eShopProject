$(document).ready(function () {
    $('#userDelete').on("click", function () {
        if (confirm("Delete?")) {
            $("input[name='adminUserDelete']:checked",$(this).parents("form")).removeAttr("clicked");
            $(this).attr("clicked", "true");
        };
    });//event handler
}); //document.ready