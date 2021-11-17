<?php

date_default_timezone_set('Europe/Lisbon');

require 'class.phpmailer.php';
require 'class.smtp.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP(); //or $mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;

$mail->Timeout=60;

$mail->Helo = "localhost"; //Muy importante para que llegue a hotmail y otros

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "";

//Password to use for SMTP authentication
$mail->Password = "";

//Set who the message is to be sent from
$mail->setFrom('', 'Jaime Valencia');

//Set an alternative reply-to address
$mail->addReplyTo('', 'Jaime Valencia');



$Dest = $_POST['dest'];
//Correo del destinatario
$mail->addAddress($Dest);



//Set the subject line
$asunto = 'Hoja de vida, desarrollador PHP';
$mail->Subject = "=?ISO-8859-1?B?".base64_encode($asunto)."=?=";





$archivo = 'HOJA DE VIDA.pdf';
$mail->AddAttachment($archivo,$archivo);


//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->Body = '<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
    <body>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,200&display=swap");
      </style>
    <div id="cuerpo" style=" font-family: Montserrat, sans-serif;
    background-color: #f6faff;
    font-size: 19px;
    color: #f6faff;
    max-width: 800px;
    margin: 0 auto;
    padding: 3%;">
    <div id="wrapper" style="background-color: #303840;">
      <header style="width: 98%;">
        <div id="logo" style="max-width: 35px;
        margin: 3% 0 3% 3%;
        float: left;">
          <img
          style="max-width: 100%; width: 35px;"
            src="https://i.ibb.co/9Hr4Tmq/logito-napa.png"
            alt=""
          />
        </div>
        <div>
          <ul id="social" style="float: right;
          margin: 3% 2% 4% 3%;
          list-style-type: none;">
          <li style="display: inline; max-width: 35px;">
            <a href="https://github.com/napsdev" target="_blank" 
            style="max-width: 35px;"
              ><img
              style="max-width: 100%;  max-width: 35px; background-color: #ffff;  border-radius: 4px;"
                src="https://i.ibb.co/3pLRfBC/25231.png"
                alt=""
            /></a>
          </li>
          <li style="display: inline; max-width: 35px;">
            <a href="https://wa.me/573245773286" target="_blank" 
            style="max-width: 35px;"
              ><img
              style="max-width: 100%;  max-width: 35px; background-color: #ffff;  border-radius: 4px;"
                src="https://i.ibb.co/PwJXscn/whatsapp-6273368-960-720.png"
                alt=""
            /></a>
          </li>
          </ul>
        </div>
      </header>
      <div id="banner" style="max-width: 100%; width: 800px;
      height: 70px;">
      </div>
      <div class="one-col">


        
        <h1 style="margin: 3%;">Postulación oferta de empleo</h1>
        <p style="margin: 3%;">
        </p>

        <p style="margin: 3%;">
          Desarrollador PHP desde el 2018 con conocimiento en los motores de bases de datos  MySQL, PostgreSQL y SQL Server,  utilizando frameworks como Laravel para PHP y el SDK Flutter, con su respectivo lenguaje Dart para desarrollo móvil multiplataforma, conocimiento avanzado sobre HTML, CSS y JS (Frontend), experiencia laboral como independiente trabajando para empresas pequeñas y medianas, creando e implementando sistemas de inventario, venta, facturación, correos personalizados y otros, desarrollando en Python scripts sencillos y en Java aplicaciones complejas, consolidando bases sólidas de programación, estudiando inglés y lenguajes de programación, como PHP 8, JS y SQL, experiencia como diseñador gráfico en el rediseño de manuales, con conocimientos prácticos de herramientas del campo como Illustrator, Photoshop y Premiere, trabajando gestión de formatos, tamaños y peso para el desarrollo de sistemas óptimos, actualizando constantemente mis conocimientos por medio de plataformas de divulgación y de educación como Platzi.
        </p>

        <div class="one-col" style="
        text-align: center;
        margin-bottom: 25px;">
        <a target="_blank" href="https://www.linkedin.com/in/jaime-esteban-valencia-yepes-5919761b9/" class="btn" style="
        
        background-color: #303840;
        color: #f6faff;
        text-decoration: none;
        text-align: center;
        font-weight: 800;
        padding: 8px 12px;
        border-radius: 8px;
        letter-spacing: 2px;
  
        background: linear-gradient(88.16deg, #3861FB 4.4%, #5878F2 104.81%);
        box-shadow: 0px 15px 30px rgba(56, 97, 251, 0.26);
        border-radius: 8px;">Linkedin</a>
        </div>




        <hr style="height: 1px;
        background-color: #f6faff;
        clear: both;
        width: 96%;
        margin: auto;"/>

        <footer>
          <p id="contact" style="margin: 3%; text-align: center;
          padding-bottom: 3%;
          line-height: 16px;
          font-size: 16px;
          color: #f6faff;">
            PHP Full Stack Web Developer.
          </p>
        </footer>
      </div>
    </div>
    </div>
</body>
</html>';


$mail->CharSet = 'UTF-8';


$mail->IsHTML(true);
if (!$mail->send()) {
    echo "Error al enviar: " . $mail->ErrorInfo;
} else {
    echo "Enviado!";
}




?>