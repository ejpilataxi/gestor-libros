<?php
// Definición de la clase Libro
class Libro {
    // 🔹 Propiedades privadas de la clase
    private $id;        // Identificador único del libro
    private $titulo;    // Título del libro
    private $autor;     // Nombre del autor
    private $precio;    // Precio del libro
    private $cantidad;  // Cantidad de ejemplares disponibles

    // Constructor de la clase
    public function __construct($id, $titulo, $autor, $precio, $cantidad) {
        // Inicializa las propiedades con los valores recibidos
        $this->id = $id;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
    }

    // Métodos GETTERS (para obtener los valores de las propiedades)
    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    // Métodos SETTERS (para modificar los valores de las propiedades)
    public function setTitulo($titulo) {
        $this->titulo = $titulo; // Asigna un nuevo título al libro
    }

    public function setAutor($autor) {
        $this->autor = $autor; // Asigna un nuevo autor al libro
    }

    public function setPrecio($precio) {
        $this->precio = $precio; // Asigna un nuevo precio al libro
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad; // Asigna una nueva cantidad de ejemplares
    }
}
?>
