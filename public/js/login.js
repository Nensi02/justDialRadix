$(document).ready(function () {
    $('.togglePassword').click(function (e) { 
        e.preventDefault();
        var type = ($('#loginPass').attr('type') == 'text') ? 'password' : 'text';
        $('#loginPass').attr('type', type);
    });
});