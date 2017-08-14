$(document).ready(function () {

    $('#enter').click(function(){
        
        var data = {
            t: 'auth',
            login: $('#login').val(),
            password: $('#password').val(),
            remember: $('#remember').prop('checked'),
        };

        $.ajax({
            url: "index.php",
            type: "GET",
            data: data,
            success: function (result){
                if (result==1) {
                    window.location.href = ""
                ;} else{
                    $('#failAuth').css('display','block');
                ;};
            },
            async: true,
        });
    });

}); 