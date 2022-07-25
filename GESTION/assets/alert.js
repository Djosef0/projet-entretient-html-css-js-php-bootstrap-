
function msg()
{
    var a=document.querySelector(".msg");
    var b=document.querySelector(".bou");
     var n=document.querySelector(".non");
     var liste=document.querySelector(".Attention");


    a.style.visibility="visible" ;
    b.style.visibility="hidden";
    n.style.visibility="visible";
    liste.style.visibility="visible";

    

 
  
}
function non(){
    var a=document.querySelector(".msg");
    var b=document.querySelector(".bou");
    var n=document.querySelector(".non");
    var liste=document.querySelector(".Attention");
    a.style.visibility="hidden" ;
    b.style.visibility="visible";
    n.style.visibility="hidden";
    liste.style.visibility="hidden";
    
}
// function parametre(){
//     var  x=document.getElementsByClassName(".boutmenu");
//     var a=document.querySelector(".menu");

// if(a.style.width=="250px"){
//     a.style.width="0" ;
// x.src="../icons/56763.png";
// }
// else{
//     a.style.width="250px";
//     x.src="../icons/cancel.png";
// }
// }