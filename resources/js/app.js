import './bootstrap';


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



const toggleModeButton = document.getElementById('toggle-mode-button');
const bodyElement = document.body;
const lightModeImage = document.getElementById('light-mode-image');
const darkModeImage = document.getElementById('dark-mode-image');

toggleModeButton.addEventListener('click', () => {
  bodyElement.classList.toggle('night-mode');
  bodyElement.classList.toggle('day-mode');
  lightModeImage.style.display = lightModeImage.style.display === 'none' ? 'block' : 'none';
  darkModeImage.style.display = darkModeImage.style.display === 'none' ? 'block' : 'none';
});





