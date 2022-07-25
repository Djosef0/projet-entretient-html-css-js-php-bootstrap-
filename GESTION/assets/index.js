function verif(){
var x=document.getElementById("tel");
var y=document.querySelector(".alert-warning alert-dismissible fade show");
if (x.length!=8){
y.style.visibility="block";
}
else{
    y.style.display="none"; 
}

}
