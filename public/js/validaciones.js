document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("formularioEvento");

    form.addEventListener("submit", function (e) {
        let isValid = true;

        // Limpiar mensajes anteriores
        const erroresAnteriores = document.querySelectorAll(".text-danger");
        erroresAnteriores.forEach((error) => error.remove());

        // Validar Nombre
        const nombre = document.getElementById("Nombre");
        if (!nombre.value.trim() || nombre.value.length < 3) {
            mostrarError(nombre, "El nombre debe tener al menos 3 caracteres.");
            isValid = false;
        }

        // Validar Dirección
        const direccion = document.getElementById("Direccion");
        if (!direccion.value.trim()) {
            mostrarError(direccion, "La dirección es obligatoria.");
            isValid = false;
        }

        // Validar Fecha Inicio
        const fechaInicio = document.getElementById("Fecha_inicio");
        if (!fechaInicio.value) {
            mostrarError(fechaInicio, "La fecha de inicio es obligatoria.");
            isValid = false;
        }

        // Validar Fecha Final
        const fechaFinal = document.getElementById("Fecha_final");
        if (!fechaFinal.value) {
            mostrarError(fechaFinal, "La fecha final es obligatoria.");
            isValid = false;
        } else if (
            fechaInicio.value &&
            fechaFinal.value &&
            fechaFinal.value <= fechaInicio.value
        ) {
            mostrarError(
                fechaFinal,
                "La fecha final debe ser mayor a la fecha de inicio."
            );
            isValid = false;
        }

        // Validar Tipo de evento
        const tipoEvento = document.getElementById("tipoDeevento");
        if (!tipoEvento.value) {
            mostrarError(tipoEvento, "Debe seleccionar un tipo de evento.");
            isValid = false;
        }

        // Validar Encargado
        const encargado = document.getElementById("Encargado");
        if (!encargado.value) {
            mostrarError(encargado, "Debe seleccionar un encargado.");
            isValid = false;
        }

        // Validar Institución
        const institucion = document.getElementById("institucion");
        if (!institucion.value) {
            mostrarError(institucion, "Debe seleccionar una institución.");
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault();
        }
    });

    function mostrarError(campo, mensaje) {
        const divError = document.createElement("div");
        divError.className = "text-danger";
        divError.style.fontSize = "0.875em";
        divError.textContent = mensaje;
        campo.closest(".mb-3").appendChild(divError);
    }
});
