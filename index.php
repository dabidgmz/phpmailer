


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Cargar el autoloader de Composer
require 'vendor/autoload.php';

// Verificar que se han recibido los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //$email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Crear una instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->SMTPDebug = 0; // Cambiar a 2 para ver detalles de depuración
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'Example@gmail.com'; 
        $mail->Password   = '**** **** **** ****'; 
        $mail->SMTPSecure =PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Destinatarios
        $mail->setFrom('Example@gmail.com', 'Usuario del Buzón de Quejas');
        $mail->addAddress('Example@gmail.com', 'User'); 

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = nl2br($message); // Convertir nuevas líneas a <br>
        $mail->Body    = "
            <html>
            <head>
                <title>$subject</title>
            </head>
            <body>
                <h3>$subject</h3>
                <p>$message</p>
            </body>
            </html>
        ";
        $mail->CharSet = 'UTF-8';

        // Enviar el correo
        $mail->send();
        echo 'El mensaje ha sido enviado';
    } catch (Exception $e) {
        echo "El mensaje no pudo ser enviado. Error de Mailer: {$mail->ErrorInfo}";
    }
} else {
    echo "Por favor, complete el formulario primero.";
}
?>
