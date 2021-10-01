$(document).ready(function(){
    $("#loginBtn").click(function(e){
        e.preventDefault();
        //Declare Variables
        var user_name = $("#user_name").val();
        var pass_word = $("#pass_word").val();

        $.ajax({
            url:"../php/auth.php",
            method:"POST",
            data:{user_name:user_name,pass_word:pass_word},
            success:function(response){
                console.log("log" + response.status);
                if(response.status=="success"){
                    
                    window.location= "../home.php";
                }else{
                    if(user_name.length ==0){
                        Toastify({
                            text: "Enter your Username",
                            // backgroundColor: "linear-gradient(to right, #ff0000)",
                            backgroundColor: "linear-gradient(to right, #ff0000, #BB3208)",
                            className: "info",
                          }).showToast();
                    }
                    if(pass_word.length ==0){
                        Toastify({
                            text: "Enter your Password",
                            // backgroundColor: "linear-gradient(to right, #ff0000)",
                            backgroundColor: "linear-gradient(to right, #ff0000, #BB3208)",
                            className: "info",
                          }).showToast();
                    }
                    if(user_name.length>0 &&pass_word.length>0){
                        Toastify({
                            text: "Username or Password May be Wrong",
                            // backgroundColor: "linear-gradient(to right, #ff0000)",
                            backgroundColor: "linear-gradient(to right, #ff0000, #BB3208)",
                            className: "info",
                          }).showToast();
                    }
                  
                }
            }
        })
    })
})