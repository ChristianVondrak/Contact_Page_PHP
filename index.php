<?php 
$errores='';
$enviado='';

if (isset($_POST['submit'])) {
    $nombre= $_POST['nombre'];
    $correo= $_POST['email'];
    $mensaje= $_POST['mensaje'];

    if (!empty($nombre)) {
        $nombre = trim($nombre);
        $nombre = filter_var($nombre, FILTER_UNSAFE_RAW);
    }else{
        $errores .= 'Por favor ingresa un nombre <br />';
    }

    if(!empty($correo)){
        $correo= filter_var($correo,FILTER_SANITIZE_EMAIL);
        if  (!filter_var($correo,FILTER_VALIDATE_EMAIL)){
            $errores .= 'Por favor ingresa un correo valido <br />';
        }
    }else{
        $errores .='Por favor ingresa un correo <br />';
    }
    if(!empty($mensaje)){
        $mensaje = htmlspecialchars($mensaje);
        $mensaje = trim($mensaje);
        $mensaje = stripslashes($mensaje);
    }else{
        $errores .='Por favor ingresa el mensaje <br />';
    }

    if(!$errores){
        $enviar_a = 'christian@gmail.com';
        $asunto = 'Correo enviado desde christianvondrak.com';
        $mensaje_p = "De: $nombre \n";
        $mensaje_p .= "Correo: $correo \n\n";
        $mensaje_p .= "Mensaje: $mensaje ";
        //mail($enviar_a, $asunto, $mensaje_p);
        $enviado = 'true';
    }

}
require 'index.view.php';
?>