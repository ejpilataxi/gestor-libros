<?php
// Iniciar la sesión para manejar mensajes de éxito o error
session_start();

// Incluir el controlador de libros para obtener los datos
require_once '../controllers/LibroController.php';

// Crear una instancia del controlador de libros
$libroController = new LibroController();

// Obtener la lista de libros almacenados
$libros = $libroController->obtenerLibros();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Libros</title>
    <link rel="stylesheet" href="../../public/styles.css"> <!-- Estilos CSS -->
</head>
<body>
    <!-- Menú de navegación -->
    <header>
        <nav>
            <ul>
                <li><a href="/gestor_libros-php/public/index.php">Inicio</a></li>
                <li><a href="/gestor_libros-php/app/views/registrar_libro.php">Registrar Libro</a></li>
                <li><a href="/gestor_libros-php/app/views/listado_libros.php">Listado de Libros</a></li>
                <li><a href="/gestor_libros-php/app/views/procesar_contacto.php">Contacto</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <div class="container">
            <h1>📚 Listado de Libros</h1>

            <!-- Mostrar mensaje de éxito si existe -->
            <?php if (!empty($_SESSION['mensaje'])): ?>
                <p class="success"><?= $_SESSION['mensaje']; unset($_SESSION['mensaje']); ?></p>
            <?php endif; ?>

            <!-- Verificar si hay libros en el sistema -->
            <?php if (empty($libros)): ?>
                <p>No hay libros registrados.</p>
            <?php else: ?>
                <!-- Tabla para mostrar los libros -->
                <table>
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($libros as $libro): ?> <!-- Iterar sobre la lista de libros -->
                            <tr>
                                <!-- Mostrar datos del libro usando métodos GETTER -->
                                <td><?= htmlspecialchars($libro->getTitulo()) ?></td>
                                <td><?= htmlspecialchars($libro->getAutor()) ?></td>
                                <td>$<?= number_format($libro->getPrecio(), 2) ?></td>
                                <td><?= intval($libro->getCantidad()) ?></td>
                                <td>
                                    <!-- Botón para editar un libro -->
                                    <a href="editar_libro.php?id=<?= $libro->getId() ?>" class="btn-edit">✏️ Editar</a>
                                    
                                    <!-- Botón para eliminar un libro (con confirmación) -->
                                    <a href="../controllers/procesar_eliminar.php?id=<?= $libro->getId() ?>" class="btn-delete" onclick="return confirm('¿Estás seguro de eliminar este libro?');">🗑️ Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?> <!-- 🔹 Fin del bucle foreach -->
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </main>

    <!-- Pie de página -->
    <footer>
        <p>© 2025 Gestor de Libros - Todos los derechos reservados.</p>
    </footer>
</body>
</html>
