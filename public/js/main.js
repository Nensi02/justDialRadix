$(document).ready(function () {
    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show').removeClass('d-flex').css({'display' : 'none'});
            }
        }, 1);
    };
    spinner();
});
function alertMessage(message) {
    swal("Message", message, "success", {
        button: false,
        timer: 3000,
        dangerMode: true,
    });
}