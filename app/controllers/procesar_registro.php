<?php
// Iniciar sesión para manejar mensajes de error o éxito
session_start();

// Habilitar el buffer de salida para evitar errores de encabezado
ob_start();

// Incluir el controlador para gestionar los libros
require_once 'LibroController.php';

// Verificar si el formulario fue enviado mediante POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Crear una instancia del controlador
    $libroController = new LibroController();

    // Obtener los datos enviados desde el formulario
    $titulo = $_POST['titulo'] ?? ''; // Si no está definido, asigna una cadena vacía
    $autor = $_POST['autor'] ?? '';
    $precio = $_POST['precio'] ?? 0;
    $cantidad = $_POST['cantidad'] ?? 0;

    // Validar los datos antes de proceder
    if (empty($titulo) || empty($autor) || !is_numeric($precio) || !is_numeric($cantidad) || $precio <= 0 || $cantidad <= 0) {
        // Si hay un error en los datos, guardar mensaje en sesión
        $_SESSION['error'] = "⚠️ Todos los campos son obligatorios y deben ser valores válidos.";
        
        // Limpiar cualquier salida previa antes de redirigir
        ob_end_clean();
        
        // Redirigir de nuevo al formulario de registro
        header('Location: ../views/registrar_libro.php');
        exit();
    }

    // Intentar registrar el libro
    $mensaje = $libroController->registrarLibro($titulo, $autor, $precio, $cantidad);

    // Si hay error al registrar, redirigir con mensaje
    if (strpos($mensaje, "Error") !== false) {
        $_SESSION['error'] = $mensaje;
        
        // Limpiar cualquier salida previa
        ob_end_clean();
        
        // Redirigir de nuevo al formulario de registro
        header('Location: ../views/registrar_libro.php');
        exit();
    }

    // Si todo está bien, almacenar mensaje de éxito en sesión
    $_SESSION['mensaje'] = "✅ Libro registrado exitosamente.";
    
    // Borrar cualquier salida previa para evitar errores de encabezado
    ob_end_clean();

    // Redirigir automáticamente al listado de libros sin mostrar mensajes intermedios
    header("Location: ../views/listado_libros.php");
    exit();
}
?>

