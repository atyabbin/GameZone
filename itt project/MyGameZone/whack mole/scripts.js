var moleimg;
var moleindex=0;
var plantindex;
var plantimg;
var pipe2;
let f=0;
score=document.querySelector("#score");
setgame();


var inervalid=setInterval(setgame, 1000);





function setgame(){
    if(f==0){
if(moleimg!=null)
{
    pipe.removeChild(moleimg);
}
if(plantimg!=null)
pipe2.removeChild(plantimg);

moleindex=getrandom();
plantindex=getrandom();
if(moleindex==plantindex)
moleindex=getrandom();
    pipe=document.getElementById(moleindex);
    pipe2=document.getElementById(plantindex);
    moleimg=document.createElement("img");
moleimg.src="monty-mole.png";
moleimg.height=100;
moleimg.width=100;
moleimg.style.marginLeft="34px";
pipe.appendChild(moleimg);
plantimg=document.createElement("img");
plantimg.src="piranha-plant.png";
plantimg.height=100;
plantimg.width=100;
plantimg.style.marginLeft="34px";
pipe2.appendChild(plantimg);

plantimg.addEventListener('click',()=>{
f=1;
endgame();
})


moleimg.addEventListener('click',()=>{
    i=parseInt(score.innerText);
    i++;
    score.innerText=i;
    console.log(i);
    setgame();
})

    }

}


function endgame(){
clearInterval(inervalid);
document.querySelector("#myback").innerHTML=`<p id="end">GAME OVER :(</p>`;
f=1;
}
function getrandom(){
    var n=Math.random()*9;
    n=Math.floor(n);
    return n.toString();
}