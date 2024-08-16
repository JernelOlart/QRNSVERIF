<?php
$servername = "bdhngvflnghppeghb8yj-mysql.services.clever-cloud.com";
$username = "u5dd1fcl0ummatti"; 
$password = "uXwqHlDB0eN15iD8gXDo";  
$dbname = "bdhngvflnghppeghb8yj"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $qrCode = $_POST['qrCode'];  // Obtener el código QR desde la solicitud POST
    $sql = "SELECT * FROM CODEDOCS WHERE code = '$qrCode'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Código QR encontrado
        echo json_encode(["exists" => true]);
    } else {
        // Código QR no encontrado
        echo json_encode(["exists" => false]);
    }
}

$conn->close();
?>
