$(window).load(function () {

// авто-сабмит формы при смене языка
    $("#lang").change(function (){
        $("form:first").trigger( "submit" );
    })

})