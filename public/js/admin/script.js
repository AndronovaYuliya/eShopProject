$(document).ready(function () {

    $("#myModal").modal("show");

    $("#myBtn").click(function () {
        $("#myModal").modal("hide");
    });

    $("#myModal").on('hide.bs.modal', function () {
        alert('The modal is about to be hidden.');
    });

}); //document.ready