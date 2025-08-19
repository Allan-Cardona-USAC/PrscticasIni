// INICIAR POST DE LAS PUBLICACIONES RECIENTES
// CODIGO PARA MODAL DE LA TABLA 1
let modal1 = document.getElementById('tabla_1');
let flex1 = document.getElementById('t1');
let abrir1_2 = document.getElementById('tabla1_2');
let abrir1_3 = document.getElementById('tabla1_3');
let cerrar1 = document.getElementById('close1');

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

// CODIGO PARA MODAL DE LA TABLA 2
let modal2 = document.getElementById('tabla_2');
let flex2 = document.getElementById('t2');
let abrir2_2 = document.getElementById('tabla2_2');
let abrir2_3 = document.getElementById('tabla2_3');
let cerrar2 = document.getElementById('close2');


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

// // CODIGO PARA MODAL DE LA TABLA 3
let modal3 = document.getElementById('tabla_3');
let flex3 = document.getElementById('t3');
let abrir3_2 = document.getElementById('tabla3_2');
let abrir3_3 = document.getElementById('tabla3_3');
let cerrar3 = document.getElementById('close3');

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

// INICIAR LOS POST DE LA SEGUNDA PAGINA DE TRAMITES

// CODIGO PARA MODAL DE LA TABLA 1
let modal11 = document.getElementById('tabla_11');
let flex11 = document.getElementById('t11');
let abrir11 = document.getElementById('tabla11');
let abrir11_1 = document.getElementById('tabla11_1');
let cerrar11 = document.getElementById('close11');

abrir11.addEventListener('click', function(){
    modal11.style.display = 'block';
});
abrir11_1.addEventListener('click', function(){
    modal11.style.display = 'block';
});

cerrar11.addEventListener('click', function(){
    modal11.style.display = 'none';
});

window.addEventListener('click', function(e){
    console.log(e.target);
    if(e.target == flex11){
        modal11.style.display = 'none';
    }
});

// CODIGO PARA MODAL DE LA TABLA 2
let modal12 = document.getElementById('tabla_12');
let flex12 = document.getElementById('t12');
let abrir12 = document.getElementById('tabla12');
let abrir12_1 = document.getElementById('tabla12_1');
let cerrar12 = document.getElementById('close12');

abrir12.addEventListener('click', function(){
modal12.style.display = 'block';
});
abrir12_1.addEventListener('click', function(){
modal12.style.display = 'block';
});

cerrar12.addEventListener('click', function(){
modal12.style.display = 'none';
});

window.addEventListener('click', function(e){
console.log(e.target);
if(e.target == flex12){
    modal12.style.display = 'none';
}
});


// CODIGO PARA MODAL DE LA TABLA 5
let modal5 = document.getElementById('tabla_5');
let flex5 = document.getElementById('t5');
let abrir5 = document.getElementById('tabla15');
let abrir5_1 = document.getElementById('tabla15_1');
let cerrar5 = document.getElementById('close5');

abrir5.addEventListener('click', function(){
modal5.style.display = 'block';
});
abrir5_1.addEventListener('click', function(){
modal5.style.display = 'block';
});
cerrar5.addEventListener('click', function(){
modal5.style.display = 'none';
});

window.addEventListener('click', function(e){
console.log(e.target);
if(e.target == flex5){
    modal5.style.display = 'none';
}
});

// CODIGO PARA MODAL DE LA TABLA 6
let modal6 = document.getElementById('tabla_6');
let flex6 = document.getElementById('t6');
let abrir6 = document.getElementById('tabla16');
let abrir6_1 = document.getElementById('tabla16_1');
let cerrar6 = document.getElementById('close6');

abrir6.addEventListener('click', function(){
modal6.style.display = 'block';
});
abrir6_1.addEventListener('click', function(){
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

// CODIGO PARA MODAL DE LA TABLA 7
let modal7 = document.getElementById('tabla_7');
let flex7 = document.getElementById('t7');
let abrir7 = document.getElementById('tabla17');
let abrir7_1 = document.getElementById('tabla17_1');
let cerrar7 = document.getElementById('close7');

abrir7.addEventListener('click', function(){
modal7.style.display = 'block';
});
abrir7_1.addEventListener('click', function(){
modal7.style.display = 'block';
});

cerrar7.addEventListener('click', function(){
modal7.style.display = 'none';
});

window.addEventListener('click', function(e){
console.log(e.target);
if(e.target == flex7){
    modal7.style.display = 'none';
}
});

// CODIGO PARA MODAL DE LA TABLA 8
let modal8 = document.getElementById('tabla_8');
let flex8 = document.getElementById('t8');
let abrir8 = document.getElementById('tabla18');
let abrir8_1 = document.getElementById('tabla18_1');
let cerrar8 = document.getElementById('close8');

abrir8.addEventListener('click', function(){
modal8.style.display = 'block';
});
abrir8_1.addEventListener('click', function(){
modal8.style.display = 'block';
});

cerrar8.addEventListener('click', function(){
modal8.style.display = 'none';
});

window.addEventListener('click', function(e){
console.log(e.target);
if(e.target == flex8){
    modal8.style.display = 'none';
}
});

// CODIGO PARA MODAL DE LA TABLA 9
let modal9 = document.getElementById('tabla_9');
let flex9 = document.getElementById('t9');
let abrir9 = document.getElementById('tabla19');
let abrir9_1 = document.getElementById('tabla19_1');
let cerrar9 = document.getElementById('close9');

abrir9.addEventListener('click', function(){
modal9.style.display = 'block';
});
abrir9_1.addEventListener('click', function(){
modal9.style.display = 'block';
});

cerrar9.addEventListener('click', function(){
modal9.style.display = 'none';
});

window.addEventListener('click', function(e){
console.log(e.target);
if(e.target == flex9){
    modal9.style.display = 'none';
}
});
