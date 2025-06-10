// Confirmación para eliminar productos
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.btnDelete');
    
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Evita que se ejecute inmediatamente el enlace
            
            const confirmDelete = confirm('¿Estás seguro de que deseas eliminar este producto?');
            
            if (confirmDelete) {
                // Si el usuario confirma, redirige a la URL de eliminación
                window.location.href = this.href;
            }
            // Si cancela, no hace nada
        });
    });
});
