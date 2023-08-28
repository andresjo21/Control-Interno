
<?php
        $servername = "localhost"; // Cambia esto si el servidor de la base de datos no está en el mismo lugar
        $username = "root"; // Cambia esto al nombre de usuario de la base de datos
        $password = "root"; // Cambia esto a tu contraseña de la base de datos
        $dbname = "sgbd"; // Cambia esto al nombre de tu base de datos

        // Crea la conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }
    ?>