import './bootstrap';
import "bootstrap-icons/font/bootstrap-icons.css";
import './darkmode';
// Luego puedes usar los íconos en tu código HTML o CSS


$(document).ready(function() {
    $(".toggle-incidencias").on("click", function() {
        debugger;
        var target = $(this).data("target");
        var incidenciasDiv = $(this).closest(".row").next(target);
        var mostrarImage = $(this).find(".mostrar-image");
        var ocultarImage = $(this).find(".ocultar-image");
        mostrarImage.toggle();
        ocultarImage.toggle();
        if (incidenciasDiv.css("display") === "none") {
            incidenciasDiv.css("display", "block");
        } else {
            incidenciasDiv.css("display", "none");
        }
    });
});





