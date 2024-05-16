<?php 

namespace Classes;
use PHPMailer\PHPMailer\PHPMailer;

class Email {
    public $nombre;
    public $correo;
    public $token;
    public function __construct($nombre, $correo, $token){
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->token = $token;
    }

    public function enviarConfirmacion(){
        // Crear el objeto de email codigo sacado de MAILTRAP
        $mail = new PHPMailer();
        $mail->isSMTP(); // protocolo de envios de email
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'eb2a34a0d281f8';
        $mail->Password = 'cd0f219af8dc87';

        $mail->setFrom('asistencias_fcc@buap.com');
        $mail->addAddress('asistencias_fcc@buap.com', 'FCCAsistencias.com');
        $mail->Subject = 'Confirma tu cuenta';

        // Set html 
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';
        $contenido = "<html>";
        $contenido .= "<p><strong>Hola" . $this->nombre . "</strong> Has creado tu cuenta como administrador para el sistema de asistencias de FCC, confirma precionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona en el siguiente enlace: <a href='http://localhost:3000/confirma-cuenta?token=". $this->token . "'>Confirmar cuenta</a> </p>";
        $contenido .= "<p>Si tu no solicitaste tu cuenta ignora mensaje</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        //ENVIAR EMAIL
        $mail->send();
    }

    public function enviarInstrucciones(){
        // Crear el objeto de email codigo sacado de MAILTRAP
        $mail = new PHPMailer();
        $mail->isSMTP(); // protocolo de envios de email
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'eb2a34a0d281f8';
        $mail->Password = 'cd0f219af8dc87';

        $mail->setFrom('asistencias_fcc@buap.com');
        $mail->addAddress('asistencias_fcc@buap.com', 'FCCAsistencias.com');
        $mail->Subject = 'Reestablece password';

        // Set html 
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';
        $contenido = "<html>";
        $contenido .= "<p><strong>Hola" . $this->nombre . "</strong> Has solicitado restablecer tu password, presiona el siguiente enlace para reestablecer</p>";
        $contenido .= "<p>Presiona en el siguiente enlace: <a href='http://localhost:3000/reestablece?token=". $this->token . "'>Reestablece Password</a> </p>";
        $contenido .= "<p>Si tu no solicitaste este cambio ignora mensaje</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        //ENVIAR EMAIL
        $mail->send();
    }
}