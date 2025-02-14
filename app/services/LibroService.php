<?php
// Definición de la clase "LibroService"
// Esta clase se encarga de la validación de los datos de los libros
class LibroService {
    
    /**
     * Método para validar los datos de un libro antes de guardarlo
     * @param string $titulo
     * @param string $autor
     * @param float $precio
     * @param int $cantidad
     * @return string|null Retorna un mensaje de error si hay datos inválidos, o `null` si todo es válido
     */
    public function validarLibro($titulo, $autor, $precio, $cantidad) {
        // Verifica que los campos no estén vacíos y que precio/cantidad sean números válidos
        if (empty($titulo) || empty($autor) || !is_numeric($precio) || !is_numeric($cantidad) || $precio < 0 || $cantidad < 0) {
            return "Error: Datos inválidos"; // Retorna un mensaje de error si algún dato no es válido
        }

        return null; // Retorna `null` si los datos son correctos
    }
}
?>
