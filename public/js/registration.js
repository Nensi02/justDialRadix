$(document).ready(function () {
    $('.togglePasswordRegi').click(function (e) { 
        e.preventDefault();
        var type = ($('#regiPass').attr('type') == 'text') ? 'password' : 'text';
        $('#regiPass').attr('type', type);
    });
    $('.togglePasswordConf').click(function (e) { 
        e.preventDefault();
        var type = ($('#password_confirmation').attr('type') == 'text') ? 'password' : 'text';
        $('#password_confirmation').attr('type', type);
    });
});