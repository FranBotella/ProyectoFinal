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

const hide2 = document.getElementById("ojo2");
if(hide2!=null){
    hide2.addEventListener('click', function(){
        mostrar=document.getElementById("password2");
               if(mostrar.type == "password"){
                   mostrar.type = "text";
               }else{
                   mostrar.type = "password";
               }
           
       });
}

const changeColor=document.getElementById("donaciones");
if(changeColor!=null){
    
    const numero=500;
    for (let i = 0; i < changeColor.childNodes.length; i++) {
        changeColor.childNodes[i].addEventListener('mouseout',function(){
        
            changeColor.childNodes[i].style.backgroundColor="white";
        
         
        });
        changeColor.childNodes[i].addEventListener('mouseover',function(){
            changeColor.childNodes[i].style.backgroundColor="#3D92F6";
        });
     


      }
}



const btnContinuar=document.getElementById("BTN-BTNContinuar");
if(btnContinuar!=null){
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



    

paypal.Buttons({
  // Order is created on the server and the order id is returned
  createOrder() {
    return fetch("/my-server/create-paypal-order", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      // use the "body" param to optionally pass additional order information
      // like product skus and quantities
      body: JSON.stringify({
        cart: [
          {
            sku: "YOUR_PRODUCT_STOCK_KEEPING_UNIT",
            quantity: "YOUR_PRODUCT_QUANTITY",
          },
        ],
      }),
    })
    .then((response) => response.json())
    .then((order) => order.id);
  },
  // Finalize the transaction on the server after payer approval
  onApprove(data) {
    return fetch("/my-server/capture-paypal-order", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        orderID: data.orderID
      })
    })
    .then((response) => response.json())
    .then((orderData) => {
      // Successful capture! For dev/demo purposes:
      console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
      const transaction = orderData.purchase_units[0].payments.captures[0];
      alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
      // When ready to go live, remove the alert and show a success message within this page. For example:
      // const element = document.getElementById('paypal-button-container');
      // element.innerHTML = '<h3>Thank you for your payment!</h3>';
      // Or go to another URL:  window.location.href = 'thank_you.html';
    });
  }
}).render('#paypal-button-container');

}