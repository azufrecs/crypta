// Inicialización de variables
let lista = document.getElementById("lista");
let elementos = []; // Array para almacenar los elementos de la lista
let indiceSeleccionado = -1; // Índice del elemento seleccionado

// Función para actualizar la lista de elementos
function actualizarElementos() {
    elementos = Array.from(lista.getElementsByTagName("li"));
    if (elementos.length > 0) {
        indiceSeleccionado = -1;
        reasignarControladoresClic();
    }
}

// Función para seleccionar un elemento de la lista
function seleccionarElemento(indice, ocultarLista = false) {
    if (elementos.length > 0) {
        if (indiceSeleccionado >= 0) {
            elementos[indiceSeleccionado].classList.remove("seleccionado");
        }

        indice = Math.max(0, Math.min(indice, elementos.length - 1));
        elementos[indice].classList.add("seleccionado");
        indiceSeleccionado = indice;

        document.getElementById("campo").value = elementos[indiceSeleccionado].textContent;

        if (ocultarLista) {
            lista.style.display = 'none';
        }
    }
}

// Función para reasignar los controladores de eventos de clic a los elementos de la lista
function reasignarControladoresClic() {
    elementos.forEach((elemento, indice) => {
        elemento.removeEventListener('click', seleccionarElemento);
        elemento.addEventListener('click', () => seleccionarElemento(indice, true));
    });
}

// Manejo de eventos de teclado para navegar por la lista
document.addEventListener("keydown", (e) => {
    // Solo maneja eventos si el input está enfocado
    if (document.activeElement.id !== "campo") return;

    // Permite el comportamiento predeterminado del tabulador
    if (e.key === "Tab") {
        lista.style.display = 'none'; // Oculta la lista
        return; // Permite que el navegador maneje el tabulador
    }

    if (e.key === "ArrowDown") {
        seleccionarElemento(indiceSeleccionado + 1);
    } else if (e.key === "ArrowUp") {
        seleccionarElemento(indiceSeleccionado - 1);
    } else if (e.key === "Enter") {
        e.preventDefault();
        if (indiceSeleccionado >= 0) {
            lista.style.display = 'none';
        }
    }
});

// Función para obtener códigos y actualizar la lista de sugerencias
function getCodigos() {
    let inputCP = document.getElementById("campo").value;
    let lista = document.getElementById("lista");

    if (inputCP.length > 0) {
        let url = "../../class/getPatologias.php";
        let formData = new FormData();
        formData.append("campo", inputCP);

        fetch(url, {
            method: "POST",
            body: formData,
            mode: "cors"
        }).then(response => response.json())
            .then(data => {
                lista.style.display = 'block';
                lista.innerHTML = data;
                actualizarElementos();
                let anchoInput = document.getElementById("campo").offsetWidth;
                lista.style.width = anchoInput + 'px';
                lista.style.position = 'absolute';
                lista.style.zIndex = '1000';
                lista.style.top = document.getElementById("campo").offsetHeight + 'px';
                lista.style.left = '0';
            })
            .catch(err => console.log(err));
    } else {
        lista.style.display = 'none';
    }
}

// Evento para obtener códigos al escribir en el campo de texto
document.getElementById("campo").addEventListener("input", getCodigos);

// Evento para seleccionar el texto en el campo de texto al hacer clic
document.getElementById('campo').addEventListener('click', function() {
    this.select();
});

// Función para obtener el código de identificación de la URL
function obtenerCodigoIdentificacion() {
    let urlParams = new URLSearchParams(window.location.search);
    let codigo = urlParams.get('code');
    return codigo;
}

// Asigna el código de identificación al campo oculto antes de enviar la solicitud
document.getElementById("codigoIdentificacion").value = obtenerCodigoIdentificacion();
