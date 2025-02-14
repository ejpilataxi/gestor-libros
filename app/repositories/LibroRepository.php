<?php
// Incluir el modelo "Libro" para trabajar con objetos de tipo Libro
require_once '../models/Libro.php';

// Definición de la clase "LibroRepository"
// Esta clase maneja la persistencia de los libros en un archivo JSON
class LibroRepository {
    private $file; // 🔹 Ruta del archivo donde se almacenarán los libros

    // Constructor
    public function __construct() {
        // 🔹 Define la ubicación del archivo JSON que almacena los libros
        $this->file = __DIR__ . '/../../data/libros.json';
    }

    /**
     * Método para obtener todos los libros almacenados
     * @return array Lista de objetos "Libro"
     */
    public function obtenerLibros() {
        // Si el archivo no existe, lo crea con un array vacío
        if (!file_exists($this->file)) {
            file_put_contents($this->file, json_encode([], JSON_PRETTY_PRINT));
            return [];
        }

        // Cargar el contenido del archivo JSON y decodificarlo a un array PHP
        $libros = json_decode(file_get_contents($this->file), true) ?? [];

        // Si los datos no son un array válido, retorna una lista vacía
        if (!is_array($libros)) {
            return [];
        }

        // Convertir cada elemento del array en un objeto "Libro" antes de devolverlo
        return array_map(function ($libro) {
            return new Libro(
                $libro['id'], 
                $libro['titulo'], 
                $libro['autor'], 
                $libro['precio'], 
                $libro['cantidad']
            );
        }, $libros);
    }

    /**
     * Método para guardar la lista de libros en el archivo JSON
     * @param array $libros Lista de objetos "Libro"
     */
    public function guardarLibros($libros) {
        // Asegurar que siempre trabajamos con un array
        if (!is_array($libros)) {
            $libros = [];
        }

        // Si no hay libros, escribir un array vacío en el archivo JSON
        if (empty($libros)) {
            file_put_contents($this->file, json_encode([], JSON_PRETTY_PRINT));
            return;
        }

        // Convertir la lista de objetos "Libro" en un array asociativo para guardarlo en JSON
        $librosArray = array_map(function ($libro) {
            return [
                'id' => $libro->getId(), // ✅ Obtener el ID usando el getter
                'titulo' => $libro->getTitulo(), // ✅ Obtener el título
                'autor' => $libro->getAutor(), // ✅ Obtener el autor
                'precio' => $libro->getPrecio(), // ✅ Obtener el precio
                'cantidad' => $libro->getCantidad() // ✅ Obtener la cantidad
            ];
        }, $libros);

        // Guardar el array convertido en formato JSON en el archivo
        file_put_contents($this->file, json_encode($librosArray, JSON_PRETTY_PRINT));
    }
}
?>
