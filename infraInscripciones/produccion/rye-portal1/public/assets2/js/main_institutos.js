// CODIGO PARA MODAL DE LA TABLA 1
let modal1 = document.getElementById('tabla_1');
let flex1 = document.getElementById('t1');
let abrir1 = document.getElementById('tabla1');
let abrir1_1 = document.getElementById('tabla1_1');
let abrir1_2 = document.getElementById('tabla1_2');
let abrir1_3 = document.getElementById('tabla1_3');
let abrir1_4 = document.getElementById('tabla1_4');
let abrir1_5 = document.getElementById('tabla1_5');
let cerrar1 = document.getElementById('close1');

abrir1.addEventListener('click', function () {
    modal1.style.display = 'block';
});
abrir1_1.addEventListener('click', function () {
    modal1.style.display = 'block';
});
abrir1_2.addEventListener('click', function () {
    modal1.style.display = 'block';
});
abrir1_3.addEventListener('click', function () {
    modal1.style.display = 'block';
});
abrir1_4.addEventListener('click', function () {
    modal1.style.display = 'block';
});
abrir1_5.addEventListener('click', function () {
    modal1.style.display = 'block';
});

cerrar1.addEventListener('click', function () {
    modal1.style.display = 'none';
});

window.addEventListener('click', function (e) {
    console.log(e.target);
    if (e.target == flex1) {
        modal1.style.display = 'none';
    }
});


// CODIGO PARA MODAL DE LA TABLA 2
let modal2 = document.getElementById('tabla_2');
let flex2 = document.getElementById('t2');
let abrir2 = document.getElementById('tabla2');
let abrir2_1 = document.getElementById('tabla2_1');
let abrir2_2 = document.getElementById('tabla2_2');
let abrir2_3 = document.getElementById('tabla2_3');
let abrir2_4 = document.getElementById('tabla2_4');
let abrir2_5 = document.getElementById('tabla2_5');
let cerrar2 = document.getElementById('close2');

abrir2.addEventListener('click', function () {
    modal2.style.display = 'block';
});
abrir2_1.addEventListener('click', function () {
    modal2.style.display = 'block';
});
abrir2_2.addEventListener('click', function () {
    modal2.style.display = 'block';
});
abrir2_3.addEventListener('click', function () {
    modal2.style.display = 'block';
});
abrir2_4.addEventListener('click', function () {
    modal2.style.display = 'block';
});
abrir2_5.addEventListener('click', function () {
    modal2.style.display = 'block';
});

cerrar2.addEventListener('click', function () {
    modal2.style.display = 'none';
});

window.addEventListener('click', function (e) {
    console.log(e.target);
    if (e.target == flex2) {
        modal2.style.display = 'none';
    }
});

// CODIGO PARA MODAL DE LA TABLA 3
let modal3 = document.getElementById('tabla_3');
let flex3 = document.getElementById('t3');
let abrir3 = document.getElementById('tabla3');
let abrir3_1 = document.getElementById('tabla3_1');
let abrir3_2 = document.getElementById('tabla3_2');
let abrir3_3 = document.getElementById('tabla3_3');
let abrir3_4 = document.getElementById('tabla3_4');
let abrir3_5 = document.getElementById('tabla3_5');
let cerrar3 = document.getElementById('close3');

abrir3.addEventListener('click', function () {
    modal3.style.display = 'block';
});
abrir3_1.addEventListener('click', function () {
    modal3.style.display = 'block';
});
abrir3_2.addEventListener('click', function () {
    modal3.style.display = 'block';
});
abrir3_3.addEventListener('click', function () {
    modal3.style.display = 'block';
});
abrir3_4.addEventListener('click', function () {
    modal3.style.display = 'block';
});
abrir3_5.addEventListener('click', function () {
    modal3.style.display = 'block';
});

cerrar3.addEventListener('click', function () {
    modal3.style.display = 'none';
});

window.addEventListener('click', function (e) {
    console.log(e.target);
    if (e.target == flex3) {
        modal3.style.display = 'none';
    }
});
