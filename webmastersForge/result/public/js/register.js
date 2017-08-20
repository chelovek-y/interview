$(window).load(function () {

function error (field, messErr, show){
    err = 1;
    errAll[field]=messErr;
    if (show) {errorShow (field, messErr);} ;
}



function right (field, show){
    err = 0;
    delete errAll[field];
    if (show) {rightShow (field);} 
}

function errorShow (field, messErr){
    $("#"+field).css("background-color", "#FFEBEB"); 
    $("#"+field+"D").html(messErr);
}

function rightShow (field){
    $("#"+field).css("background-color", "#FFF"); 
    $("#"+field+"D").html('&nbsp;');
}

function checkField (field, show){

    var check = chf[field]['check'];
    var checkErr = chf[field]['checkErr'];
    var requiredErr = chf[field]['requiredErr'];
    var required = chf[field]['required'];
    var fieldVal=$("#"+field).val();
 
    if (required && !fieldVal) {
        error (field, requiredErr, show);
    } else {
        right (field, show);
    }

    if (!err && check && fieldVal) {
        var checkTrue = fieldVal.search(new RegExp("^"+check+"$", "i"));
        if (checkTrue==-1) {
          error (field, checkErr, show);
        }else{
          right (field, show);
        }
    } 
    
    if (!err && (field=="password"||field=="password2")) {
        comparePass (show);
    } 

}

function comparePass (show){

    var compareErr = chf['password']['compareErr'];
    var password=$("#password").val();
    var password2=$("#password2").val();
    
    if (password && password2 && password!=password2) {
        error("password", compareErr, show);
        error("password2", compareErr, show);
    }else{
        right("password", show);
        right("password2", show);
    } 

}


  

function checkChangeField (field){
    $("#"+field).change(function (){
        checkField (field, 1);
    }) 
}


function sendAjaxForm() {
   
    checkAjax=1;
    $.ajax({
        url:  "index.php?task=register", 
        type:     "POST", 
        dataType: "html",
        async: false,
        data: $("#register").serialize(),  
        success: function(response) { 
            //console.log(response);
            response = jQuery.parseJSON(response);
            
            if (response!='success'){
              
                for (var field in response)
                {
                	mess = response[field];
                  error (field, chf[field][mess])
                ;}
                ajaxError = 1;
                
            }  ;
          
        }
    });
}

  // подгрузка картинки

$(function(){
    var btnUpload=$('#loadImage');
    var status=$('#imageD');
    new AjaxUpload(btnUpload, {
        action: 'index.php?task=loadImage',
        name: 'loadImage',
        onSubmit: function(file, ext){
            if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 

                status.text('supported: JPG, PNG, GIF');
                return false;
            }
            //status.text('Загрузка...');
        },
        onComplete: function(file, response){
console.log(response);
            status.html('&nbsp;');

            if(response==="success"){
                file = 'uploads/'+file;
                $('#image').attr('src',file);
            } else{
                status.text('error ' + file);
            }
        }
    });
});



// фронтэнд - проверка каждого поля при изменении

var chf = JSON.parse(checkFields.replace(/\[slash\]/gi,'\\'))


var err = 0;
var ajaxError = 0;
var checkAjax = 0;
var errAll = {};
var fields = ['login','email','password','password2'];
var field;

for (var i in fields)
{
    field=fields[i];
    checkChangeField (field);
;}


$("#submit").click(function (){

    // фронтэнд - проверка всех полей перед отправкой
    for (var i in fields)
    {
        field=fields[i];
        checkField (field);
    }

    if ($.isEmptyObject(errAll)) {
    // аякс - проверка всех полей и отправка формы
        sendAjaxForm();
    }


    //после всех типов проверок - вывод сообщений и закрашивание полей
    var messErr;
    for (var i in fields)
    {
        field=fields[i];
        messErr = errAll[field]
        if (messErr) {
            errorShow (field, messErr);
        }else{
            rightShow (field);
        }
    ;}

    if ($.isEmptyObject(errAll)) {
        window.location.href = "/profile";
    }


})

  
})