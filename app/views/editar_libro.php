<?php 
// Iniciar la sesión para manejar mensajes de error o éxito
session_start();

// Incluir el controlador de libros
require_once '../controllers/LibroController.php';

// Crear una instancia del controlador
$libroController = new LibroController();

// Obtener todos los libros registrados
$libros = $libroController->obtenerLibros();

// Verificar si se ha pasado un ID válido en la URL
if (!isset($_GET['id'])) {
    die("Error: ID de libro no especificado."); // ❌ Muestra un error si no hay ID
}

$idLibro = $_GET['id']; // 🔹 Obtener el ID del libro desde la URL
$libroEncontrado = null;

// Buscar el libro en la lista de libros usando su ID
foreach ($libros as $libro) {
    if ($libro->getId() === $idLibro) { // ✅ Comparación correcta usando getId()
        $libroEncontrado = $libro;
        break;
    }
}

// Si el libro no se encuentra, mostrar mensaje de error
if (!$libroEncontrado) {
    die("Error: Libro no encontrado.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
    <link rel="stylesheet" href="../../public/styles.css"> <!-- Estilos CSS -->
</head>
<body>
    <!-- Menú de navegación -->
    <header>
        <nav>
            <ul>
                <li><a href="../../public/index.php">Inicio</a></li>
                <li><a href="registrar_libro.php">Registrar Libro</a></li>
                <li><a href="listado_libros.php">Listado de Libros</a></li>
                <li><a href="../app/views/procesar_contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <div class="container">
            <h1>✏️ Editar Libro</h1>
            <div class="form-container">
                <!-- Formulario de edición -->
                <form action="../controllers/procesar_editar.php" method="POST">
                    <!-- Campo oculto para enviar el ID del libro -->
                    <input type="hidden" name="id" value="<?= htmlspecialchars($libroEncontrado->getId()) ?>">

                    <!-- Campo para editar el título -->
                    <label for="titulo">Título del Libro:</label>
                    <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($libroEncontrado->getTitulo()) ?>" required>

                    <!-- Campo para editar el autor -->
                    <label for="autor">Nombre del Autor:</label>
                    <input type="text" id="autor" name="autor" value="<?= htmlspecialchars($libroEncontrado->getAutor()) ?>" required>

                    <!-- Campo para editar el precio -->
                    <label for="precio">Precio del Libro:</label>
                    <input type="number" id="precio" name="precio" step="0.01" value="<?= $libroEncontrado->getPrecio() ?>" required>

                    <!-- Campo para editar la cantidad -->
                    <label for="cantidad">Cantidad de Ejemplares:</label>
                    <input type="number" id="cantidad" name="cantidad" value="<?= $libroEncontrado->getCantidad() ?>" required>

                    <!-- Botón para enviar los cambios -->
                    <button type="submit" name="editar">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </main>

    <!-- Pie de página -->
    <footer>
        <p>© 2025 Gestor de Libros - Todos los derechos reservados.</p>
    </footer>
</body>
</html>
