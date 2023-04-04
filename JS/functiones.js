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

const btnContinuar=document.getElementById("BTN-BTNContinuar");
const btnCerrar=document.getElementById("btn-cerrar-modal");
const modal=document.getElementById("modal");
btnContinuar.addEventListener("click",()=>{
    modal.showModal();
 
})

const precioD=document.querySelectorAll("#donar");
const precioE=0;
precioD.forEach(e => {
    e.addEventListener('click', () => {
        document.getElementById("CDonada").innerHTML="25";
        console.log(e.innerText);
      console.log(document.getElementById("CDonada"));
        precioE=e.innerText;
       
    })
})

const Causa=document.getElementById("titleD");

Causa.addEventListener('click',()=>{
    console.log(Causa.value);
    console.log(Causa);
})


btnCerrar.addEventListener("click",()=>{
    modal.closest();
})



    
  
