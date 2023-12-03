// Espera a que el DOM esté completamente cargado antes de ejecutar el código
document.addEventListener("DOMContentLoaded", function() {
    // Obtiene el botón del menú y el menú desplegable del documento
    var menuButton = document.getElementById("menu-button");
    var menuDropdown = document.getElementById("menu-dropdown");

    // Agrega un evento de clic al botón del menú
    menuButton.addEventListener("click", function() {
        // Alternar la clase 'show' en el menú desplegable para mostrar u ocultar el menú
        menuDropdown.classList.toggle("show");
    });

    // Agrega un evento de clic a la ventana para cerrar el menú si se hace clic fuera de él
    window.addEventListener("click", function(event) {
        // Verifica si el elemento clicado no coincide con el botón del menú
        if (!event.target.matches("#menu-button")) {
            // Obtiene todos los elementos con la clase 'dropdown-content'
            var menus = document.getElementsByClassName("dropdown-content");
            // Itera sobre los elementos con la clase 'dropdown-content'
            for (var i = 0; i < menus.length; i++) {
                var menu = menus[i];
                // Si el menú tiene la clase 'show', se elimina para ocultarlo
                if (menu.classList.contains("show")) {
                    menu.classList.remove("show");
                }
            }
        }
    });
});
