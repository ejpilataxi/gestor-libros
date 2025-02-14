<?php
// Iniciar la sesión para manejar mensajes de éxito o error
session_start();

// Incluir el controlador de libros para acceder a sus funciones
require_once 'LibroController.php';

// Verificar si se ha proporcionado un ID en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Obtener el ID del libro a eliminar
    $libroController = new LibroController(); // Instanciar el controlador

    // Intentar eliminar el libro con el ID proporcionado
    $mensaje = $libroController->eliminarLibro($id);

    // Almacenar el mensaje de éxito o error en la sesión
    $_SESSION['mensaje'] = $mensaje;

    // Redirigir al listado de libros después de la eliminación
    header("Location: ../views/listado_libros.php");
    exit(); // Termina la ejecución del script
} else {
    // Si no se especifica un ID, almacenar un mensaje de error
    $_SESSION['error'] = "❌ No se especificó un ID para eliminar.";
    
    // Redirigir al listado de libros con el mensaje de error
    header("Location: ../views/listado_libros.php");
    exit();
}
?>
