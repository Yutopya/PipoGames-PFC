let usuarios =[
    {
        nombreusu:'pipo',
        email:'pipotastico@gmail.com'
    },
    {
        nombreusu:'pipa',
        email:'pipata@gmail.com'
    },
    {
        nombreusu:'pipa',
        email:'pipatastico@gmail.com'
    },
    {
        nombreusu:'pipa',
        email:'pipatastico@gmail.com'
    },
    {
        nombreusu:'pipa',
        email:'pipatastico@gmail.com'
    },
    {
        nombreusu:'pipa',
        email:'pipatastico@gmail.com'
    },
    {
        nombreusu:'pipa',
        email:'pipatastico@gmail.com'
    },
    {
        nombreusu:'pipa',
        email:'pipatastico@gmail.com'
    },
    {
        nombreusu:'pipa',
        email:'pipatastico@gmail.com'
    },
    {
        nombreusu:'pipa',
        email:'pipatastico@gmail.com'
    },
    {
        nombreusu:'pipa',
        email:'pipatastico@gmail.com'
    },
    {
        nombreusu:'pipa',
        email:'pipatastico@gmail.com'
    },
    {
        nombreusu:'pipa',
        email:'pipatastico@gmail.com'
    }
]

function generarUsuarios(){
    let lista = document.getElementsByTagName('ul')[0];
    let color = true;
    for(items in usuarios){
        let li = document.createElement('li');
        li.setAttribute('class', 'card');
        for(datos in usuarios[items]){
            let p = document.createElement('p');
            let div=document.createElement('div');
            div.classList.add("cubo");
            p.textContent=usuarios[items][datos];
            console.log(usuarios[items][datos]);
            div.appendChild(p)
            li.appendChild(div);
        }
        if(color){
            li.classList.add('blanco');
            color=false;
        }else{
            color=true;
        }
        let botonsito= document.createElement('input');
        botonsito.setAttribute('type','checkbox');
        li.appendChild(botonsito);
        lista.appendChild(li);
    }
    
    
}
generarUsuarios();