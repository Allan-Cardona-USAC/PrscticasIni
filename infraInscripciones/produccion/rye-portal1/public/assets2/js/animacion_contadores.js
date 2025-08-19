addEventListener("DOMContentLoaded", () => {
    const contadores = document.querySelectorAll(".contador_cantidad");
    const velocidad = 1100;

    const animarContadores = () => {
        for (const contador of contadores) {
            const actualizar_contador = () => {
                let cantidad_maxima = +contador.dataset.cantidadTotal,
                    valor_actual = +contador.innerText,
                    incremento = cantidad_maxima / velocidad;

                if (valor_actual < cantidad_maxima) {
                    contador.innerText = Math.ceil(valor_actual + incremento);
                    
                    if(cantidad_maxima < 200){
                        //si son poquitos que vaya lento
                        setTimeout(actualizar_contador, 100);
                    }else if(cantidad_maxima > 1500){
                        //si son poquitos que vaya lento
                        setTimeout(actualizar_contador, 5);
                    }else{
                        setTimeout(actualizar_contador, incremento);
                    }
                    
                } else {
                    contador.innerText = cantidad_maxima;
                }
            };
            actualizar_contador();
        }
    };
    animarContadores();
});
