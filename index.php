<html>
    <head>
    <title>Clock dAY</title>
        <style>
            ::-webkit-scrollbar-track {
                background-color: #ecf0f1;
            }
            ::-webkit-scrollbar {
                width: 1px;
                height: 2px;
                background: #F4F4F4;
            }
            ::-webkit-scrollbar-thumb {
                background:#00b300;
            }

            body{
                    background:#111;
                    font-family:  Consolas, 'Courier New', monospace;
                    
                }
        </style>
    </head>
    <body onLoad="start()" id='relogio'>        
        Iniciando. . .
        <button onClick="newTab()">Abrir em nova janela</button>
        
    </body>

    <script type="text/javascript">
        function newTab(){
            var myWindow = window.open("http://localhost/test/clock/", "_blank", "toolbar=no,scrollbars=yes,resizable=yes");
        }
        function start(){
            setInterval(function(){

       
            var data = new Date();
            var diaSemana=data.getDay('w');
            var relogio_diaSemana="";
            var horaAtual=data.getHours();
            var relogio_horas="";
            var minutosAtuais=data.getMinutes();
            var relogio_horaMinutos="";
            var segundosAtuais=data.getSeconds()
            var rel_mam="";

            //configuracoes
            var digitoPassado='=';//digito passado
            var digito ='#';//Digito
            var ponteiro ='>'; //Ponteiro de marcação 
            var separador='';//separador

            var digitoPassado_mam='';//digito passado
            var digito_mam ='.';//Digito
            var markFive = ':'//Marcador de 5 em 5 minutos
            var ponteiro_mam ='>'; //Ponteiro de marcação 
            var separador_mam='';//separador


            var quarta='#';//Quarta-feira
            var dezHoras='#';//10 Horas
            var almoco='A';//13 Horas(Almoco)
            var cafe='#';//16 Horas(Cafe)

            var corPassada='#333';//cor passada
            var corAtual='#999';//cor Atual
            var corPonteiro='#0f0';//cor Cursor            
           

            //Dias da Semana
            for (i=1; i <= 5; i++){
                if(i<=diaSemana){
                    cor=corPassada;
                }else{
                    cor=corAtual;
                }                
                if(i==3){
                    relogio_diaSemana+='<span style="color:'+cor+'">'+quarta+separador+'</span>';
                }else{
                    if(i<=diaSemana){     
                        relogio_diaSemana+='<span style="color:'+cor+'">'+digitoPassado+separador+'</span>'; 
                    }else{ 
                        relogio_diaSemana+='<span style="color:'+cor+'">'+digito+separador+'</span>'; 
                    }
                }
                if(diaSemana==i){
                    relogio_diaSemana+='<span style="color:'+corPonteiro+'">'+ponteiro+'</span>'; 
                }
            }

            //Limite de Horario
            if(diaSemana==5){
                limit=16;//17;
            }else{
                limit=18;
            }

            if(horaAtual>=limit){
                ponteiro="|["
            };

            //Horas
            for(i=8; i<= limit; i++){
               
                
                if(i<=horaAtual){
                    cor=corPassada;
                }else{
                    cor=corAtual;
                }
                if(i==10){
                    relogio_horas+='<span style="color:'+cor+'">'+dezHoras+separador+'</span>';
                }else if(i==13){
                    relogio_horas+='<span style="color:'+cor+'">'+almoco+separador+'</span>';
                }else if(i==16){
                    relogio_horas+='<span style="color:'+cor+'">'+cafe+separador+'</span>';
                }else{
                    if(i<=horaAtual){
                        relogio_horas+='<span style="color:'+cor+'">'+digitoPassado+separador+'</span>';
                    }else{
                        relogio_horas+='<span style="color:'+cor+'">'+digito+separador+'</span>';
                    }        
                }
                if(horaAtual==i){
                    relogio_horas+='<span style="color:'+corPonteiro+'">'+ponteiro+'</span>';
                }
            }

            //Horas e Minutos
            for(i=8; i<= limit; i++){            

                if(i<=horaAtual){
                    
                    cor=corPassada;
                }else{
                    cor=corAtual;
                }
                if(i==10){
                    relogio_horaMinutos+='<span style="color:'+cor+'">'+dezHoras+separador+'</span>';
                }else if(i==13){
                    relogio_horaMinutos+='<span style="color:'+cor+'">'+almoco+separador+'</span>';
                }else if(i==16){
                    relogio_horaMinutos+='<span style="color:'+cor+'">'+cafe+separador+'</span>';
                }else{
                    if(i<=horaAtual){
                        relogio_horaMinutos+='<span style="color:'+cor+'">'+digitoPassado+separador+'</span>';
                    }else{
                        relogio_horaMinutos+='<span style="color:'+cor+'">'+digito+separador+'</span>';
                    }  
                }
                if(horaAtual==i){ 
                    if(i!=limit){ 
                        if(minutosAtuais<30){
                            relogio_horaMinutos+='<span style="color:'+corPonteiro+'">'+ponteiro+'</span><span style="color:'+corAtual+'">'+digito+separador+'</span>';
                        }else{
                            relogio_horaMinutos+='<span style="color:'+corPassada+'">'+digitoPassado+'</span><span style="color:'+corPonteiro+'">'+ponteiro+'</span>';
                        }
                    }else{
                        relogio_horaMinutos+='<span style="color:'+corPassada+'">'+digitoPassado+separador+'</span><span style="color:'+corPonteiro+'">'+ponteiro+'</span>';
                    }        
                }else{
                    if(i!=limit){ 
                        if(i<=horaAtual){
                            relogio_horaMinutos+='<span style="color:'+cor+'">'+digitoPassado+separador+'</span>';
                        }else{
                            relogio_horaMinutos+='<span style="color:'+cor+'">'+digito+separador+'</span>';
                        }  
                    }
                }
            }

            //Minuto a Minuto
            //for das horas
            for(h=8; h<= limit; h++){
                if(h>=limit){
                    ponteiro_mam="|";
                    if(h<horaAtual){
                        dig='<span style="color:'+corPassada+'">'+digitoPassado_mam+separador_mam+'</span>';
                    }else if(h==horaAtual){
                        dig='<span style="color:'+corPassada+'">'+digitoPassado_mam+'<span style="color:'+corPonteiro+'">'+ponteiro_mam+'</span>'+separador_mam+'</span>'
                    }else{
                       dig='<span style="color:'+corAtual+'">'+h+'|'+separador_mam+'</span>';
                    }
                    rel_mam+=dig;
                }else{                        
                    for(m=0;m<=59;m++){
                        hora=(h*60)+m;
                        horaReal=(horaAtual*60)+minutosAtuais;
                        hp='';
                        if(m==0 || m==60){
                            digito=h+':';
                            hp=digitoPassado;
                        }else if(m % 5==0){
                            digito=m;
                        }else{
                            digito=digito_mam;
                        }
                        if(hora<horaReal){
                            dig='<span style="color:'+corPassada+'">'+hp+digitoPassado_mam+separador_mam+'</span>';
                        }else if(hora==horaReal){
                            dig='<span style="color:'+corPassada+'">'+digitoPassado_mam+'<span style="color:'+corPonteiro+'">'+ponteiro_mam+'</span>'+separador_mam+'</span>'
                        }else{
                            dig='<span style="color:'+corAtual+'">'+digito+separador_mam+'</span>';
                        }  
                        rel_mam+=dig;
                    }
                    
                }
                
            }

            m = segundosAtuais % 2;

            if(m==0){
                var trace='<i style="font-size:.5rem;color:#111"> >_ </i>';
            }else{
                var trace='<i style="font-size:.5rem;color:#00BCD4"> >_ </i>';
            }


            if(segundosAtuais==0){
                if(minutosAtuais==0){
                    var sa='<span style="font-size:.5rem;color:'+corPonteiro+'">'+ponteiro+ponteiro+ponteiro+'</span>';
                }else if(minutosAtuais==30){
                    var sa='<span style="font-size:.5rem;color:'+corPonteiro+'">'+ponteiro+ponteiro+'</span>';
                }else{
                    var sa='<span style="font-size:.5rem;color:'+corPonteiro+'">'+ponteiro+'</span>';
                }        
            }else{
                var sa=trace+'<small style="color:'+corPassada+';font-size:.5rem">'+(60-segundosAtuais)+'</small>';
            }
          
            relogio=relogio_diaSemana+'<br/>'+relogio_horas+'<br/>'+relogio_horaMinutos+'<br/>'+rel_mam+'<br/>'+sa;
            document.getElementById('relogio').innerHTML=relogio
            
            
       
            console.log("diaSemana: "+diaSemana);
            console.log("horaAtual: "+horaAtual);
            console.log("minutosAtuais: "+minutosAtuais);
            console.log("Segundos: "+segundosAtuais);

            console.log(" # # # # #  CONFIGURAÇÕES  # # # # # ");
            console.log("digitoPassado: "+digitoPassado);
            console.log("digito: "+digito);
            console.log("ponteiro: "+ponteiro); 
            console.log("separador: "+separador);

            console.log("Horario Limite: "+limit);


            console.log("quarta: "+quarta);
            console.log("dezHoras: "+dezHoras);
            console.log("almoco: "+almoco);
            console.log("cafe: "+cafe);

            console.log("corPassada: "+corPassada);
            console.log("corAtual: "+corAtual);
            console.log("corPonteiro: "+corPonteiro);

            },900)
        }

        

    </script> 
</html>