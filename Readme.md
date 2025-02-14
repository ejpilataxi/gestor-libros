📚 Gestor de Libros - PHP y WampServer

Este es un sistema de gestión de libros desarrollado en PHP, con almacenamiento local en JSON en lugar de una base de datos. Permite registrar, listar, editar y eliminar libros de manera sencilla.

🛠️ Requisitos PreviosAntes de ejecutar este proyecto, asegúrate de tener instalado:
✅ WampServer (https://www.wampserver.com/)
✅ PHP (incluido en WampServer)
✅ Editor de código (VS Code, Sublime Text, PHPStorm, etc.)

👥 Instalación y Configuración en WampServer
1️⃣ Descargar e instalar WampServer
    * Visita el sitio oficial de WampServer
    * Descarga la versión compatible con tu sistema operativo (64 bits o 32 bits).
    * Instala WampServer siguiendo las instrucciones en pantalla.

2️⃣ Configurar el proyecto
Copia la carpeta GESTOR_LIBROS-PHP en el directorio raíz de WampServer:
C:\wamp64\www\
Asegúrate de que la estructura de archivos sea la siguiente:
C:\wamp64\www\GESTOR_LIBROS-PHP\
├── app/
│   ├── controllers/
│   │   ├── LibroController.php
│   │   ├── procesar_editar.php
│   │   ├── procesar_eliminar.php
│   │   └── procesar_registro.php
│   ├── models/
│   │   ├── Autor.php
│   │   └── Libro.php
│   ├── repositories/
│   │   └── LibroRepository.php
│   ├── services/
│   │   └── LibroService.php
│   ├── views/
│   │   ├── editar_libro.php
│   │   ├── listado_libros.php
│   │   ├── procesar_contacto.php
│   │   └── registrar_libro.php
├── data/
│   └── libros.json
├── public/
│   ├── images/
│   ├── .htaccess
│   ├── index.php
│   └── styles.css

3️⃣ Iniciar WampServer y ejecutar el proyecto
    * Inicia WampServer y asegúrate de que el icono en la barra de tareas esté en verde.
    * Abre tu navegador y accede al proyecto:
    http://localhost/GESTOR_LIBROS-PHP/public/index.php
    
📂 Estructura del Proyecto
app/
* controllers/ → Controladores que manejan la lógica del sistema.
* models/ → Modelos que representan las entidades (Libro, Autor).
* repositories/ → Gestión de datos en archivos JSON.
* services/ → Validaciones y reglas de negocio.
* views/ → Vistas HTML/PHP de la interfaz.
data/
* libros.json → Almacena los registros de los libros.
public/
* index.php → Página principal.
* styles.css → Estilos del sitio.
* .htaccess → Configuración de Apache para seguridad y accesibilidad.

🚀 Funcionalidades
✔ Registrar un libro 📚
✔ Listar todos los libros 📊
✔ Editar información de un libro ✏️
✔ Eliminar un libro 🗑️
✔ Interfaz amigable y sencilla 🎨

🎯 Uso del SistemaRegistrar un libro
1. Ir a Registrar Libro en el menú.
Completar el formulario y hacer clic en Guardar.
2. Listar libros
Ir a Listado de Libros.
Se mostrarán todos los libros registrados.
3. Editar un libro
En Listado de Libros, hacer clic en Editar.
Modificar la información y guardar los cambios.
4. Eliminar un libro
En Listado de Libros, hacer clic en Eliminar.
Confirmar la acción y el libro será eliminado.

🔧 Mantenimiento y PersonalizaciónSi deseas personalizar el proyecto, puedes modificar los siguientes archivos:
LibroController.php → Agregar nueva lógica de negocio.
LibroRepository.php → Cambiar el método de almacenamiento.
styles.css → Ajustar los estilos y apariencia.
views/ → Modificar las vistas para mejorar la interfaz.

📝 Licencia
Este proyecto es de código abierto y puedes utilizarlo para fines educativos o personales. ⚡🚀
📌 Desarrollado por: 
[Willian Herrera]
💎 Contacto: [waherrera3@espe.edu.ec]

[Diana Chalco]
💎 Contacto: [dcchalco@espe.edu.ec]

[Elsa Pilataxi]
💎 Contacto: [ejpilataxi@espe.edu.ec]

🗓 Año: 2025