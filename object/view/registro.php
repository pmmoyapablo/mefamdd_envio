<?php

require_once ('../../object/class/interfaz/i_Registro.php');

$post = array();
//Verifico los post data
    
if (isset($_POST['nombre']))
{$post[0] = $_POST['nombre'];}
else 
{$post[0] = null;}

if (isset($_POST['apellido']))
{$post[1] = $_POST['apellido'];}
else
{$post[1] = null;}

if (isset($_POST['inici']))
{$post[2] = $_POST['inici'];}
else
{$post[2] = null;}

if (isset($_POST['cedula']))
{$post[3] = $_POST['cedula'];}
else
{$post[3] = null;}

if (isset($_POST['codigoArea']))
{$post[4] = $_POST['codigoArea'];}
else
{$post[4] = null;}

if (isset($_POST['telefono']))
{$post[5] = $_POST['telefono'];}
else
{$post[5] = null;}

if (isset($_POST['celular']))
{$post[6] = $_POST['celular'];}
else
{$post[6] = null;}

if (isset($_POST['mail']))
{$post[7] = $_POST['mail'];}
else
{$post[7] = null;}

if (isset($_POST['login']))
{$post[8] = $_POST['login'];}
else
{$post[8] = null;}

if (isset($_POST['password']))
{$post[9] = $_POST['password'];}
else
{$post[9] = null;}

if (isset($_POST['confirmar_password']))
{$post[10] = $_POST['confirmar_password'];}
else
{$post[10] = null;}

if (isset($_POST['preguntaSeguridad']))
{$post[11] = $_POST['preguntaSeguridad'];}
else
{$post[11] = null;}

if (isset($_POST['respuesta']))
{$post[12] = $_POST['respuesta'];}
else
{$post[12] = null;}

if (isset($_POST['razonsocial']))
{$post[13] = $_POST['razonsocial'];}
else
{$post[13] = null;}

if (isset($_POST['seudonimo']))
{$post[14] = $_POST['seudonimo'];}
else
{$post[14] = null;}

if (isset($_POST['palabra']))
{$post[15] = $_POST['palabra'];}
else
{$post[15] = null;}

if (isset($_POST['pais']))
{$post[16] = $_POST['pais'];}
else
{$post[16] = null;}

if (isset($_POST['estado']))
{$post[17] = $_POST['estado'];}
else
{$post[17] = null;}

if (isset($_POST['ciudad']))
{$post[18] = $_POST['ciudad'];}
else
{$post[18] = null;}

if (isset($_POST['direccion']))
{$post[19] = $_POST['direccion'];}
else
{$post[19] = null;}

$objetoVie = new I_Registro("Registro de Usuario",$post);

?>
