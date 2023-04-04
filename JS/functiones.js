const hide = document.getElementById("ojo");
if(hide!=null){
    hide.addEventListener('click', function(){
        mostrar=document.getElementById("password");
               if(mostrar.type == "password"){
                   mostrar.type = "text";
               }else{
                   mostrar.type = "password";
               }
           
       });
}

const changeColor=document.getElementById("donaciones");
if(changeColor!=null){
    for (let i = 0; i < changeColor.childNodes.length; i++) {
        changeColor.childNodes[i].addEventListener('mouseout',function(){
            changeColor.childNodes[i].style.backgroundColor="blue";
        });
        changeColor.childNodes[i].addEventListener('mouseover',function(){
            changeColor.childNodes[i].style.backgroundColor="pink";
        });
      }
}



    
  
