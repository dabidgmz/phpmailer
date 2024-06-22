# 📧 Instalación de Composer y PHPMailer con Autenticación de Gmail SMTP

## Primer Paso: Instalar Composer

### 🪟 Para Windows:
1. 🚀 Primer Paso: Instalar Composer
   Ve al sitio web oficial de Composer y descarga el instalador desde [Composer-Setup.exe](https://getcomposer.org/Composer-Setup.exe).

   ![Descargar Composer](https://getcomposer.org/img/logo-composer-transparent5.png)

2. **Ejecutar el instalador:**
   Ejecuta el archivo descargado (`Composer-Setup.exe`) y sigue las instrucciones del asistente de instalación. Asegúrate de seleccionar la opción para agregar Composer a tu PATH.

   ![Instalación de Composer en Windows](https://getcomposer.org/doc/00-intro/images/composer-windows-installer.png)

3. **Verificar la instalación:**
   Abre una nueva ventana de la terminal de Windows (CMD o PowerShell) y ejecuta:

   ```sh
   composer --version
   ```

### 🐧 Para Linux y macOS:
1. **Descargar el instalador:**
   Abre una terminal y descarga el instalador de Composer:

   ```sh
   php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
   ```

2. **Verificar la instalación:**
   ```sh
   composer --version
   ```

## 📦 Segundo Paso: Instalar PHPMailer

### Instalación de la librería PHPMailer

1. **Instalar PHPMailer usando Composer:**
   Abre una terminal (CMD, PowerShell o terminal de Linux/macOS) y ejecuta:

   ```sh
   composer require phpmailer/phpmailer
   ```

   ![Composer Require PHPMailer](https://phpdelusions.net/images/phpmailer-install.png)

## 💻 Tercer Paso: Instanciar PHPMailer

### Código de Ejemplo en PHP

```php
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ajusta la ruta si es necesario

$mail = new PHPMailer(true);

try {
    // Configuraciones del servidor SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'tu_email@gmail.com';
    $mail->Password   = 'tu_contraseña';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Destinatarios
    $mail->setFrom('tu_email@gmail.com', 'Tu Nombre');
    $mail->addAddress('destinatario@example.com', 'Destinatario');     // Agrega un destinatario

    // Contenido del correo
    $mail->isHTML(true);                                  // Establecer el formato de correo electrónico en HTML
    $mail->Subject = 'Aquí está el asunto';
    $mail->Body    = 'Este es el <b>cuerpo</b> del mensaje en HTML';
    $mail->AltBody = 'Este es el cuerpo del mensaje en texto plano para clientes de correo que no soportan HTML';

    $mail->send();
    echo 'El mensaje ha sido enviado';
} catch (Exception $e) {
    echo "El mensaje no pudo ser enviado. Error de Mailer: {$mail->ErrorInfo}";
}
?>
```

## 🔐 Cuarto Paso: Configurar la Autenticación de Gmail en Dos Pasos

### Generar la Contraseña de Aplicación en Gmail

1. **Habilitar la verificación en dos pasos:**
   Sigue las instrucciones de este video para habilitar la verificación en dos pasos y generar una contraseña de aplicación: [Video Tutorial](https://youtu.be/9tD8lA9foxw?si=-isjHx-Oj-aI81UT).

   ![Verificación en dos pasos de Gmail](https://www.wpoven.com/blog/wp-content/uploads/2022/04/2-Step-Verification.png)

2. **Generar la contraseña de aplicación:**
   Utiliza la contraseña de aplicación generada en tu código PHP en lugar de tu contraseña de Gmail.
