let formularios = document.forms;
let formulario = formularios[0];
let mailok = false, userok = false, contok = false, confok = false;
function validaremail(){
    let mail = formulario['elements'][0]['value'];
    let mensaje = document.getElementById('mensajeMail');

    let expresion = /^\w+@[a-zA-z]+[.][a-zA-z]+$/;

    if(expresion.test(mail)){
        // el contenido es correcto
        console.log('Bien');
        mensaje.textContent = 'El email es correcto';
        mensaje.classList.remove('invalido');
        mensaje.classList.add('valido');
        mailok=true;
    }else if(mail==''){
        // no hay contenido
        console.log('nada')
        mensaje.textContent='';
        mensaje.classList.remove('valido');
        mensaje.classList.remove('invalido');
    }else if(!expresion.test(mail)){
        // el contenido no es correcto
        console.log('Mal');
        mensaje.textContent = 'El email no es correcto';
        mensaje.classList.remove('valido');
        mensaje.classList.add('invalido');
    }
}

function validarusuario(){
    let user = formulario['elements'][1]['value'];
    let mensaje = document.getElementById('mensajeUser');
    //Modificar, no funciona
    let expresion = /(?=.*\S)/;

    if(expresion.test(user)){
        // el contenido es correcto
        console.log('Bien');
        mensaje.textContent = 'El usuario es correcto';
        mensaje.classList.remove('invalido');
        mensaje.classList.add('valido');
        userok=true;
    }else if(user==''){
        // no hay contenido
        console.log('nada')
        mensaje.textContent='';
        mensaje.classList.remove('valido');
        mensaje.classList.remove('invalido');
    }else if(!expresion.test(user)){
        // el contenido no es correcto
        console.log('Mal');
        mensaje.textContent = 'El usuario no es correcto';
        mensaje.classList.remove('valido');
        mensaje.classList.add('invalido');
    }
}

function validarcontrasena(){
    let cont = formulario['elements'][2]['value'];
    let mensaje = document.getElementById('mensajeCont');
    let espacio = document.getElementById('espacioCont');

    let expresion = /(?=.*\d{2}).{7,}/;

    if(expresion.test(cont)){
        // el contenido es correcto
        console.log('Bien');
        mensaje.textContent = 'La contraseña es correcta';
        mensaje.classList.remove('invalido');
        mensaje.classList.add('valido');
        contok=true;
    }else if(cont==''){
        // no hay contenido
        console.log('nada')
        mensaje.textContent='';
        mensaje.classList.remove('valido');
        mensaje.classList.remove('invalido');
    }else if(!expresion.test(cont)){
        // el contenido no es correcto
        console.log('Mal');
        mensaje.textContent = 'La contraseña no es correcta';
        mensaje.classList.remove('valido');
        mensaje.classList.add('invalido');
    }
}

function validarconf(){
    let cont = formulario['elements'][2]['value'];
    let conf = formulario['elements'][3]['value'];
    let mensaje = document.getElementById('mensajeConf');

    if(conf==''){
        // no hay contenido
        console.log('nada')
        mensaje.textContent='';
        mensaje.classList.remove('valido');
        mensaje.classList.remove('invalido');
    }else if(cont===conf){
        // el contenido es correcto
        console.log('Bien');
        mensaje.textContent = 'Las contraseñas coinciden';
        mensaje.classList.remove('invalido');
        mensaje.classList.add('valido');
        confok=true;
    }else if(conf!=cont){
        // el contenido no es correcto
        console.log('Mal');
        mensaje.textContent = 'Las contraseñas no coinciden';
        mensaje.classList.remove('valido');
        mensaje.classList.add('invalido');
    }
}
document.addEventListener('load', boton());
function boton(){
    let botonreg = document.getElementById('botonRegistro');
    console.log(mailok);
    console.log(userok);
    console.log(contok);
    console.log(confok);
    if(mailok && userok && contok && confok){
        console.log('boton okay');
        botonreg.disabled = false;
    }else{
        botonreg.disabled = true;
    }
    
}