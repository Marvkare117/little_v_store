<!DOCTYPE html>

<html lang="es">
    <?php
$servername = "localhost"; // Cambia si es necesario
$username = "root"; // Cambia por tu usuario de MySQL
$password = ""; // Cambia por tu contraseña de MySQL
$dbname = "littlevstore";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['name'];
    $correo = $_POST['email'];
    $mensaje = $_POST['message'];

    $sql = "INSERT INTO formulario_contacto (nombre, correo, mensaje) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre, $correo, $mensaje);

    if ($stmt->execute()) {
        echo "Mensaje enviado con éxito.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/little-v-store.css">
    <title>Little V Store</title>
</head>
<body>
    <header>
        <h1>Little V Store</h1>
        <nav>
            <ul>
                <li><a href="./little-gift-store.html">Little Gift Store</a></li>
                <li><a href="./little-wood-store.html">Little Wood Store</a></li>
                <li><a href="./little-pet-store.html">Little Pet Store</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="section-intro">
            <h2>Bienvenido a Little V Store</h2>
            <div class="section-intro-content">
                <p>Explora nuestros departamentos y realiza tus pedidos a través de WhatsApp.</p>
                <a href="https://wa.link" class="whatsapp-button">Contáctanos por WhatsApp</a>
            </div>
            
        </section>
        <section class="departamentos">
            <h3>Departamentos</h3>
            <div class="departamentos-container">
                <div class="departamento">
                    <a href="./little-gift-store.html">
                        <img src="img/v/5334b7de4777ff106e7b303726dbbfbd.jpg" alt="Little Gift Store">
                        <h4>Little Gift Store</h4>
                    </a>
                </div>
                <div class="departamento">
                    <a href="./little-wood-store.html">
                        <img src="img/v/90e371d186113c7c20e7c4942934945a.jpg" alt="Little Wood Store">
                        <h4>Little Wood Store</h4>
                    </a>
                </div>
                <div class="departamento">
                    <a href="./little-pet-store.html">
                        <img src="img/v/fbde131beca61f7a7721331a23a5bd78.jpg" alt="Little Pet Store">
                        <h4>Little Pet Store</h4>
                    </a>
                </div>
            </div>
        </section>
    </main>
 <footer>
          <div class="social-media">
            <h3>Email</h3>
            <p>Contacto: info@littlevstore.com</p>
            <h3>Síguenos en Redes Sociales</h3>
            <a href="https://facebook.com" target="_blank">Facebook</a> |
            <a href="https://instagram.com" target="_blank">Instagram</a> |
            <a href="https://WhatsApp.com" target="_blank">Twitter</a>
        </div>
        
        <form id="contactForm" method="POST" action="">
            <h3>Formulario de Contacto</h3>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
            <label for="message">Mensaje:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
            <button type="submit">Enviar</button>
        </form>
    </footer>
</body>
</html>