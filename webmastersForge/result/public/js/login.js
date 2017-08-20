$(window).load(function () {
  
function errorShow (field, messErr){
    $("#"+field).css("background-color", "#FFEBEB"); 
    $("#"+field+"D").html(messErr);
}

function rightShow (field){
    $("#"+field).css("background-color", "#FFF"); 
    $("#"+field+"D").html('&nbsp;');
}

$("#submit").click(function (){
  
    $.ajax({
        url: "index.php?task=login", 
        type: "POST", 
        dataType: "html",
        data: $("#loginForm").serialize(),  
        success: function(response) { 
            
            if (response!='success'){
                errorShow('login', checkFields);
                errorShow('password', checkFields);
            }else{
                rightShow('login');
                rightShow('password');
                window.location.href = "/profile";
            }   
            
        }
    });
    
}) 


    
}) 

