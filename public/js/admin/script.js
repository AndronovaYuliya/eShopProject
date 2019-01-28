$(document).ready(function () {

    $("#myModal").modal("show");

    $("#myBtn").click(function(){
        $("#myModal").modal("hide");
    });

    $("#myModal").on('hide.bs.modal', function(){
        alert('The modal is about to be hidden.');
    });


    $('#userDelete').on("click", function () {
        if (confirm("Delete?")) {
            $("input[name='adminUserDelete']:checked",$(this).parents("form")).removeAttr("clicked");
            $(this).attr("clicked", "true");
        };
    });//event handler
}); //document.ready