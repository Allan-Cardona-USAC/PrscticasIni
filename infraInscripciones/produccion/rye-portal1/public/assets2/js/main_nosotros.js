// CODIGO PARA MODAL DE LA HISTORIA
    let modal1 = document.getElementById('tabla_1');
    let flex1 = document.getElementById('t1');
    let abrir1 = document.getElementById('tabla1');
    let abrir1_1 = document.getElementById('tabla1_1');
    let abrir1_2 = document.getElementById('tabla1_2');
    let abrir1_3 = document.getElementById('tabla1_3');
    let cerrar1 = document.getElementById('close1');

    abrir1.addEventListener('click', function(){
        modal1.style.display = 'block';
    });
    abrir1_1.addEventListener('click', function(){
        modal1.style.display = 'block';
    });
    abrir1_2.addEventListener('click', function(){
        modal1.style.display = 'block';
    });
    abrir1_3.addEventListener('click', function(){
        modal1.style.display = 'block';
    });

    cerrar1.addEventListener('click', function(){
        modal1.style.display = 'none';
    });

    window.addEventListener('click', function(e){
        console.log(e.target);
        if(e.target == flex1){
            modal1.style.display = 'none';
        }
    });

// CODIGO PARA MODAL DE MISION
let modal2 = document.getElementById('tabla_2');
let flex2 = document.getElementById('t2');
let abrir2 = document.getElementById('tabla2');
let abrir2_1 = document.getElementById('tabla2_1');
let abrir2_2 = document.getElementById('tabla2_2');
let abrir2_3 = document.getElementById('tabla2_3');
let cerrar2 = document.getElementById('close2');

abrir2.addEventListener('click', function(){
    modal2.style.display = 'block';
});
abrir2_1.addEventListener('click', function(){
    modal2.style.display = 'block';
});
abrir2_2.addEventListener('click', function(){
    modal2.style.display = 'block';
});
abrir2_3.addEventListener('click', function(){
    modal2.style.display = 'block';
});

cerrar2.addEventListener('click', function(){
    modal2.style.display = 'none';
});

window.addEventListener('click', function(e){
    console.log(e.target);
    if(e.target == flex2){
        modal2.style.display = 'none';
    }
});

// // CODIGO PARA MODAL DE VISION
let modal3 = document.getElementById('tabla_3');
let flex3 = document.getElementById('t3');
let abrir3 = document.getElementById('tabla3');
let abrir3_1 = document.getElementById('tabla3_1');
let abrir3_2 = document.getElementById('tabla3_2');
let abrir3_3 = document.getElementById('tabla3_3');
let cerrar3 = document.getElementById('close3');

abrir3.addEventListener('click', function(){
    modal3.style.display = 'block';
});
abrir3_1.addEventListener('click', function(){
    modal3.style.display = 'block';
});
abrir3_2.addEventListener('click', function(){
    modal3.style.display = 'block';
});
abrir3_3.addEventListener('click', function(){
    modal3.style.display = 'block';
});

cerrar3.addEventListener('click', function(){
    modal3.style.display = 'none';
});

window.addEventListener('click', function(e){
    console.log(e.target);
    if(e.target == flex3){
        modal3.style.display = 'none';
    }
});

// CODIGO PARA MODAL PARA LA INSCRIPCION DE PREGRADO
let modal4 = document.getElementById('tabla_4');
let flex4 = document.getElementById('t4');
let abrir4 = document.getElementById('tabla4');
let cerrar4 = document.getElementById('close4');

abrir4.addEventListener('click', function () {
    modal4.style.display = 'block';
});

cerrar4.addEventListener('click', function () {
    modal4.style.display = 'none';
});

window.addEventListener('click', function (e) {
    console.log(e.target);
    if (e.target == flex4) {
        modal4.style.display = 'none';
    }
});

// CODIGO PARA MODAL PARA LA INSCRIPCION DE POSTGRADO
let modal5 = document.getElementById('tabla_5');
let flex5 = document.getElementById('t5');
let abrir5 = document.getElementById('tabla5');
let cerrar5 = document.getElementById('close5');

abrir5.addEventListener('click', function () {
    modal5.style.display = 'block';
});

cerrar5.addEventListener('click', function () {
    modal5.style.display = 'none';
});

window.addEventListener('click', function (e) {
    console.log(e.target);
    if (e.target == flex5) {
        modal5.style.display = 'none';
    }
});

// CODIGO PARA MODAL PARA LA PRE - INSCRIPCION DE POSTGRADO
let modal6 = document.getElementById('tabla_6');
let flex6 = document.getElementById('t6');
let abrir6 = document.getElementById('tabla6');
let cerrar6 = document.getElementById('close6');

abrir6.addEventListener('click', function(){
    modal6.style.display = 'block';
});

cerrar6.addEventListener('click', function(){
    modal6.style.display = 'none';
});

window.addEventListener('click', function(e){
    console.log(e.target);
    if(e.target == flex6){
        modal6.style.display = 'none';
    }
});

//CODIGO PARA CONTADORES
