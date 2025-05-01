//<!-- Agrega esto después de incluir jQuery -->
$(document).ready(function() {
    $(".btn-minus").on("click", function() {
        var input = $(this).parent().siblings("input");
        var currentValue = parseInt(input.val(), 10);

        if (!isNaN(currentValue) && currentValue > 1) {
            input.val(currentValue - 1);
            validateQuantity(input);
        }
    });

    $(".btn-plus").on("click", function() {
        var input = $(this).parent().siblings("input");
        var currentValue = parseInt(input.val(), 10);

        if (!isNaN(currentValue)) {
            input.val(currentValue + 1);
            validateQuantity(input);
        }
    });

    $("input[type='number']").on("input", function() {
        // Solo valida al escribir, no al borrar el contenido
        if ($(this).val().trim() !== "") {
            validateQuantity($(this));
        }
    });

    // Validar al perder el foco (cuando el usuario termina de escribir)
    $("input[type='number']").on("blur", function() {
        validateQuantity($(this));
    });

    function validateQuantity(input) {
        var value = parseInt(input.val(), 10);

        if (isNaN(value) || value < 1) {
            alert("La cantidad no puede ser 0 o un valor no válido. Por favor, ingrese un valor válido.");
            input.val("1");
        }
    }
});