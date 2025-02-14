<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8"> <!-- Permite el uso de caracteres especiales como tildes y ñ -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Diseño responsivo -->
    <title>Registrar Libro</title> <!-- Título de la pestaña del navegador -->
    <link rel="stylesheet" href="../../public/styles.css"> <!-- ✅ Enlace a los estilos CSS -->
</head>
<body>

    <!-- Menú de navegación -->
    <header>
        <nav>
            <ul>
                <li><a href="/gestor_libros-php/public/index.php">Inicio</a></li> <!-- Redirige a la página de inicio -->
                <li><a href="/gestor_libros-php/app/views/registrar_libro.php">Registrar Libro</a></li> <!-- Página actual -->
                <li><a href="/gestor_libros-php/app/views/listado_libros.php">Listado de Libros</a></li> <!-- Redirige al listado -->
                <li><a href="/gestor_libros-php/app/views/procesar_contacto.php">Contacto</a></li> <!-- Redirige a la sección de contacto -->
            </ul>
        </nav>
    </header>
    
    <main>
        <div class="container">
            <h1>📖 Registrar un Nuevo Libro</h1> <!-- Título principal -->

            <!-- Mostrar mensaje de error si existe -->
            <?php 
            session_start(); // Iniciar la sesión para manejar mensajes de error o éxito
            if (!empty($_SESSION['error'])): ?> 
                <p class="error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p> <!-- Muestra y limpia el mensaje de error -->
            <?php endif; ?>

            <!-- Formulario para registrar un nuevo libro -->
            <div class="form-container">
                <form action="../controllers/procesar_registro.php" method="POST" class="formulario"> 
                    <!-- Campo para ingresar el título del libro -->
                    <label for="titulo">Título del Libro:</label>
                    <input type="text" id="titulo" name="titulo" required>

                    <!-- Campo para ingresar el nombre del autor -->
                    <label for="autor">Nombre del Autor:</label>
                    <input type="text" id="autor" name="autor" required>

                    <!-- Campo para ingresar el precio -->
                    <label for="precio">Precio del Libro:</label>
                    <input type="number" id="precio" name="precio" step="0.01" required>

                    <!-- Campo para ingresar la cantidad de ejemplares -->
                    <label for="cantidad">Cantidad de Ejemplares:</label>
                    <input type="number" id="cantidad" name="cantidad" required>

                    <!-- Botón para registrar el libro -->
                    <button type="submit">Registrar Libro</button>
                </form>
            </div>
        </div>
    </main>

    <!-- Pie de página -->
    <footer>
        <p>© 2025 Gestor de Libros - Todos los derechos reservados.</p> <!-- 🔹 Información del copyright -->
    </footer>

</body>
</html>

