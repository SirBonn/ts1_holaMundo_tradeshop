
# Tradeshop



Esta es una aplicación web desarrollada utilizando PHP, MySQL, HTML, CSS y JavaScript. El objetivo del proyecto es representar un sistema informatico a traves de una aplicacion web.

Tecnologías Utilizadas
- PHP: Lenguaje de programación del lado del servidor para la lógica de negocio y la generación dinámica de contenido.
- MySQL: Sistema de gestión de bases de datos relacional para el almacenamiento y la gestión de datos.
- HTML: Lenguaje de marcado para la estructura de las páginas web.
- CSS: Lenguaje de hojas de estilo para el diseño y la presentación visual de la aplicación.
- JavaScript: Lenguaje de programación del lado del cliente para la interactividad y la manipulación dinámica de la interfaz de usuario.

Primer practica para el curso de Teoria en sistemas 1

Universidad de San Carlos de cuatemala -USAC-

Centro Universitario De Occidente -CUNOC-
## Deployment

```bash
  git clone https://github.com/SirBonn/ts1_holaMundo_tradeshop.git
    cd nombre-del-repositorio
```
- Configura XAMPP:

Asegúrate de tener XAMPP instalado y en funcionamiento en tu máquina.
Copia la carpeta del proyecto en la carpeta htdocs de tu instalación de XAMPP. Por ejemplo: C:\xampp\htdocs\nombre-del-repositorio.
Configura la base de datos:

- Abre phpMyAdmin desde el panel de control de XAMPP (http://localhost/phpmyadmin).
- Crea una nueva base de datos llamada [nombre_base_datos].
- Importa el archivo SQL que se encuentra en db/backup.sql para crear las tablas necesarias.
- Configura el archivo de conexión a la base de datos:

Abre el archivo config/database.php.

Actualiza las credenciales de la base de datos con los detalles de tu configuración local:

```bash
<?php
    $host = 'localhost';
    $dbname = 'tradeshop_db';
    $username = 'root'; // o tu nombre de usuario de MySQL
    $password = ''; // o tu contraseña de MySQL

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
?>
```
Inicia el servidor Apache:

Abre el panel de control de XAMPP y asegúrate de que el servidor Apache esté en ejecución.
Accede a la aplicación:

Abre tu navegador y navega a http://localhost/tradeshop-ts1/ para acceder a la aplicación web.


## Documentation

[Manual tecnico](https://github.com/SirBonn/ts1_holaMundo_tradeshop/blob/main/Documentation/pracc_HolaMundo_ManualTecnico.pdf)

[Manual de usuario](https://github.com/SirBonn/ts1_holaMundo_tradeshop/blob/main/Documentation/pracc_HolaMundo_ManualUsuario.pdf)

[Marco teorico](https://github.com/SirBonn/ts1_holaMundo_tradeshop/blob/main/Documentation/pracc_HolaMundo_MarcoTeorico.pdf)
