<?php
// Iniciar la sesión para manejar mensajes de error o éxito
session_start();

// Incluir el controlador de libros
require_once 'LibroController.php';

// Verificar si la solicitud es de tipo POST y si se ha enviado el botón "editar"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar'])) {
    // Crear instancia del controlador de libros
    $libroController = new LibroController();
    
    // Capturar los datos del formulario con validaciones básicas
    $id = $_POST['id'] ?? ''; // ID del libro
    $titulo = $_POST['titulo'] ?? ''; // Título del libro
    $autor = $_POST['autor'] ?? ''; // Autor del libro
    $precio = $_POST['precio'] ?? 0; // Precio del libro
    $cantidad = $_POST['cantidad'] ?? 0; // Cantidad de ejemplares

    // Verificar que los valores sean correctos antes de actualizar
    if (empty($id) || empty($titulo) || empty($autor) || !is_numeric($precio) || !is_numeric($cantidad) || $precio <= 0 || $cantidad <= 0) {
        // Si hay un error en los datos, almacenar mensaje en la sesión y redirigir al formulario de edición
        $_SESSION['error'] = "⚠️ Todos los campos son obligatorios y deben ser valores válidos.";
        header('Location: ../views/editar_libro.php?id=' . $id);
        exit(); // Detiene la ejecución del script
    }

    // Intentar actualizar el libro con los nuevos valores
    $mensaje = $libroController->editarLibro($id, $titulo, $autor, $precio, $cantidad);

    // Si la actualización falla, mostrar mensaje de error y redirigir al formulario de edición
    if (strpos($mensaje, "Error") !== false) {
        $_SESSION['error'] = $mensaje;
        header('Location: ../views/editar_libro.php?id=' . $id);
        exit();
    }

    // Si la edición es exitosa, mostrar mensaje de éxito y redirigir al listado de libros
    $_SESSION['mensaje'] = "✅ Libro actualizado correctamente.";
    header('Location: ../views/listado_libros.php');
    exit(); // Detiene la ejecución del script
}
?>

