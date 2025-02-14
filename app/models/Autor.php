<?php
// Definición de la clase Autor
class Autor {
    // Propiedad pública para almacenar el nombre del autor
    public $nombre;

    // Constructor de la clase
    public function __construct($nombre) {
        // Sanitiza y almacena el nombre del autor
        // htmlspecialchars() -> Evita inyección de código HTML y XSS
        // trim() -> Elimina espacios en blanco al inicio y al final
        $this->nombre = htmlspecialchars(trim($nombre));
    }
}
?>
