const hide = document.getElementById("ojo");
hide.addEventListener('click', function(){
 mostrar=document.getElementById("password");
        if(mostrar.type == "password"){
            mostrar.type = "text";
        }else{
            mostrar.type = "password";
        }
    
});