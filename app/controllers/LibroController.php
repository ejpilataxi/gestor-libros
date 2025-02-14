<?php
// Habilitar la visualización de errores para facilitar la depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir los archivos necesarios
require_once '../models/Libro.php';            // Modelo de la entidad "Libro"
require_once '../repositories/LibroRepository.php'; // Manejador de la persistencia de datos (archivo JSON)
require_once '../services/LibroService.php';   // Servicio para validaciones y lógica de negocio

// Definición de la clase controlador "LibroController"
class LibroController {
    private $repo;    // Instancia del repositorio de libros
    private $service; // Instancia del servicio de validaciones

    // Constructor: Inicializa las dependencias (repositorio y servicio)
    public function __construct() {
        $this->repo = new LibroRepository(); // Inicializa el repositorio
        $this->service = new LibroService(); // Inicializa el servicio de validación
    }

    /**
     * Método para registrar un nuevo libro
     * @param string $titulo
     * @param string $autor
     * @param float $precio
     * @param int $cantidad
     * @return string Mensaje de éxito o error
     */
    public function registrarLibro($titulo, $autor, $precio, $cantidad) {
        // Validar los datos ingresados
        $error = $this->service->validarLibro($titulo, $autor, $precio, $cantidad);
        if ($error) return $error; // Si hay error, retorna el mensaje de error

        // Obtener la lista actual de libros
        $libros = $this->repo->obtenerLibros();

        // Crear un nuevo libro con un ID único
        $nuevoLibro = new Libro(uniqid(), $titulo, $autor, $precio, $cantidad);
        $libros[] = $nuevoLibro; // Agregar el nuevo libro al array existente

        // Guardar los libros actualizados en el archivo JSON
        $this->repo->guardarLibros($libros);

        return "Libro registrado exitosamente"; // Retorna mensaje de éxito
    }

    /**
     * Método para obtener todos los libros almacenados
     * @return array Lista de libros
     */
    public function obtenerLibros() {
        return $this->repo->obtenerLibros(); // Devuelve la lista de libros almacenados
    }

    /**
     * Método para editar un libro existente
     * @param string $id
     * @param string $titulo
     * @param string $autor
     * @param float $precio
     * @param int $cantidad
     * @return string Mensaje de éxito o error
     */
    public function editarLibro($id, $titulo, $autor, $precio, $cantidad) {
        // Validar los datos ingresados antes de modificar
        $error = $this->service->validarLibro($titulo, $autor, $precio, $cantidad);
        if ($error) return $error; // Si hay error, retorna el mensaje de error

        // Obtener la lista de libros almacenados
        $libros = $this->repo->obtenerLibros();

        // Buscar el libro por ID y modificar sus valores
        foreach ($libros as $libro) {
            if ($libro->getId() === $id) { // Compara con el ID proporcionado
                $libro->setTitulo($titulo);
                $libro->setAutor($autor);
                $libro->setPrecio($precio);
                $libro->setCantidad($cantidad);
            }
        }

        // Guardar los cambios en el archivo JSON
        $this->repo->guardarLibros($libros);

        // Mensaje de éxito y redirección a la vista de listado
        session_start();
        $_SESSION['mensaje'] = "✅ Libro actualizado correctamente.";
        header('Location: ../views/listado_libros.php');
        exit(); // Detiene la ejecución para evitar problemas de redirección
    }

    /**
     * Método para eliminar un libro por su ID
     * @param string $id
     * @return string Mensaje de éxito
     */
    public function eliminarLibro($id) {
        // Obtener todos los libros almacenados
        $libros = $this->repo->obtenerLibros();
        
        // Filtrar el array para eliminar el libro con el ID correspondiente
        $libros = array_filter($libros, fn($libro) => $libro->getId() !== $id);
    
        // Guardar los libros actualizados en el archivo JSON
        $this->repo->guardarLibros(array_values($libros));
    
        return "Libro eliminado correctamente."; // Retorna mensaje de éxito
    }
}
?>
