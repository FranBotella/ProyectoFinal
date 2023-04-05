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
    console.log(document.getElementById("CCausa").innerHTML);
    if( document.getElementById("CDonada").innerHTML!="" || document.getElementById("precioDI").value !="" ){
        if(document.getElementById("CCausa").innerHTML!=""){
                modal.showModal();
        }
        else{
            
        }
    }
    else{

    }

})

const precioD=document.querySelectorAll("#donar");

precioD.forEach(e => {
    e.addEventListener('click', () => {
        document.getElementById("CDonada").innerHTML=e.innerText.substring(0,2);
        console.log(e.innerText);
      console.log(document.getElementById("CDonada"));

       
    })
})


const precioDIO2=document.getElementById("precioDI");
precioDIO2.addEventListener('keyup',()=>{
    const precioDIO=document.getElementById("precioDI").value;
console.log(precioDIO);
    document.getElementById("CDonada").innerHTML=precioDIO; 
})



const Causa=document.getElementById("titleD");

Causa.addEventListener('click',()=>{
    console.log(Causa.value);
    console.log(Causa);
    document.getElementById("CCausa").innerHTML=Causa.value;
})


btnCerrar.addEventListener("click",()=>{
    modal.closest();
})



    
  
