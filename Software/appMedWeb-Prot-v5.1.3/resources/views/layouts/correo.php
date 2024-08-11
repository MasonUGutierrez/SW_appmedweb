<?php 

extract($_POST);

$envio_a='msn.guti5395@gmail.com';
$asunto='Consulta';
$mensaje_enviar="De: $name \n";
$mensaje_enviar.="Correo: $email \n";
$mensaje_enviar.='Mensaje: '.$message;

mail($envio_a,$asunto,$mensaje_enviar);

require_once('layouts/welcome');

?>