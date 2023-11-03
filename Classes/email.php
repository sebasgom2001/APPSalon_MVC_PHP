<?php
namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nombre;
    public $token;
    public function __construct($email,$nombre,$token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){
        //crear el objeto de email
        
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];;
        $mail->Username = $_ENV['EMAIL_USER'];;
        $mail->Password = $_ENV['EMAIL_PASS'];;

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'Appsalon.com');
        $mail->Subject = 'Confirma tu cuenta';
        //set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";
        $contenido .= "<p><strong> Hola" .  $this->email . "</strong> Has creado tu cuenta en APP Salon, 
        solo debes confirmarla presionando el siguiebte enlace</p>";
        $contenido .= "<p> Presiona aqui : <a href='" .  $_ENV['APP_URL']  . "/confirmar-cuenta?token=". $this->token ."'>Confirmar Cuenta</a> </p>";
        $contenido .= "<p> Si tu no solicitastes esta cuenta ignora el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        //enviar emial
        $mail->send();

    }

    public function enviarInstrucciones(){
         //crear el objeto de email
        
         $mail = new PHPMailer();
         $mail->isSMTP();
         $mail->Host = 'smtp.mailtrap.io';
         $mail->SMTPAuth = true;
         $mail->Port = 2525;
         $mail->Username = '27d1d3b60459ac';
         $mail->Password = '919af291f37fb9';
 
         $mail->setFrom('cuentas@appsalon.com');
         $mail->addAddress('cuentas@appsalon.com', 'Appsalon.com');
         $mail->Subject = 'Restablece tu password';
         //set HTML
         $mail->isHTML(TRUE);
         $mail->CharSet = 'UTF-8';
 
         $contenido = "<html>";
         $contenido .= "<p><strong> Hola" .  $this->nombre . "</strong> Has solicitado restablecer tu contraseña , has click en el enlance para hacerlo</p>";
         $contenido .= "<p> Presiona aqui : <a href='" .  $_ENV['APP_URL']  . "/recuperar?token=". $this->token ."'>Restablecer contraseña</a> </p>";
         $contenido .= "<p> Si tu no solicitastes esta cuenta ignora el mensaje</p>";
         $contenido .= "</html>";
 
         $mail->Body = $contenido;
 
         //enviar emial
         $mail->send();
    }

}