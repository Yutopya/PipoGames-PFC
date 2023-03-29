let juegos ={
    OUTERWILDS: {
        nombre: "Outer Wilds",
        plataforma: "PC",
        video: "Video/Outer Wilds - Official Reveal Trailer.mp4#t=25",
    },
    RISKOFRAIN2: {
        nombre:"Risk of Rain 2",
        plataforma: "PC",
        video: "Video/Risk of Rain 2_ Launch Trailer.mp4#t=20",
    },
    ASTRONEER:{
        nombre:"Astroneer",
        plataforma: "PC",
        video: "Video/ASTRONEER - Release Trailer.mp4#t=22",
    },
    GTAV:{
        nombre:"Grand Theft Auto V",
        plataforma: "PC",
        video: "Video/Grand Theft Auto V Trailer.mp4#t=20",
    },
    CASTLECRASHERS:{
        nombre:"Castle crashers",
        plataforma: "PC",
        video: "Video/Castle Crashers Remastered Announcement Trailer.mp4#t=21",
    },
    CYBERPUNK2077:{
        nombre:"Cyberpunk2077",
        plataforma: "PC",
        video: "Video/Cyberpunk 2077 - Tráiler E3 2018.mp4#t=23",
    },
    AHATINTIME:{
        nombre:"A hat in time",
        plataforma: "PC",
        video: "Video/A Hat in Time - Announcement Trailer _ PS4.mp4#t=10",
    }
};

inicio();

function inicio(){
    let main = document.getElementsByTagName('main')[0];
    let iniVideo
    for(items in juegos){
        
        let div = document.createElement('div');
        div.setAttribute('class', 'card');

        let divFondo = document.createElement('div');
        divFondo.setAttribute('id',items);

        let divVideo = document.createElement('div');
        divVideo.setAttribute('class','fondoV');

        let video = document.createElement('video');
        video.setAttribute('muted','muted');
        video.setAttribute('onmouseover','this.play()');
        video.setAttribute('onmouseout','this.pause()');

        let contenedor = document.createElement('div');
        contenedor.setAttribute('class','container');
        let h4 = document.createElement('h4');
        let b = document.createElement('b');

        let source = document.createElement('source');
        for (datos in juegos[items]){
            if(datos=='video'){
                source.setAttribute('src',juegos[items][datos]);
                iniVideo=juegos[items][datos]+'';
                video.setAttribute('onmouseout','this.currentTime='+iniVideo.substring(iniVideo.length, iniVideo.length-2));
            }else if(datos=='iniVideo')  {
                
            }else if (datos=='nombre'){
                b.textContent=juegos[items][datos];
            }
        }

        video.appendChild(source);
        divVideo.appendChild(video);
        divFondo.appendChild(divVideo);
        div.appendChild(divFondo);

        h4.appendChild(b);
        contenedor.appendChild(h4)
        div.appendChild(contenedor);

        main.appendChild(div);
    }
}
