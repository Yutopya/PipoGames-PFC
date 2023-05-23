let buscar=document.getElementById('buscador');
buscar.setAttribute('onkeyup',"search()");
let input="";
let busqueda;
let juegos= document.getElementsByClassName('njuego');
let cards=document.getElementsByClassName('card');

//Función buscador 
function search(){
    busqueda = buscar['value'];
    if (busqueda == "") {
        for (let i=0; i<juegos.length;i++) {
            if(cards[i].hasAttribute('style')){
                cards[i].removeAttribute('style');
            }
        }
    }else{
        for(let j=0; j<juegos.length;j++){
            input=juegos[j].textContent+"";
            input=input.toLowerCase();
            if(input.includes(busqueda)){
                if(cards[j].hasAttribute('style')){
                    cards[j].removeAttribute('style');
                }
            }else{
                cards[j].setAttribute('style', 'display: none');
            }
        }
    }
}

let btnFiltro = document.getElementsByClassName('filtroPlat');
let platjuego = document.getElementsByClassName('plataforma');
let limpiar = document.getElementById('limpiar');
let botones = document.getElementsByTagName('button');

//Función filtro por plataforma
function filtroPlataforma(plataforma){
    for(let k=0; k<platjuego.length;k++){   
        input=platjuego[k].value+"";
        input=input.toLowerCase();
        if(plataforma=='clean'){
            if(cards[k].hasAttribute('style')){
                cards[k].removeAttribute('style');
                botones[k].removeAttribute('style');
            }
            botones[k].removeAttribute('style');
            limpiar.setAttribute('style', 'display: none');
        }else{
            for(let l=0; l<botones.length;l++){
                if(botones[l].textContent==plataforma){
                    botones[l].setAttribute('style','background-color: rgb(167, 138, 102);border-radius: 10px;');
                }else if(botones[l].hasAttribute('style')){
                    botones[l].removeAttribute('style');
                }
            }
            if(input.includes(plataforma.toLowerCase()+"")){
                if(cards[k].hasAttribute('style')){
                    cards[k].removeAttribute('style');
                }
            }else{
                cards[k].setAttribute('style', 'display: none');
                limpiar.setAttribute('style', 'display: block');
            }
        }
    }
}
