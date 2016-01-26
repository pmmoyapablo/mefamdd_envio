<?php

require_once ('../../object/class/interfaz/i_Status.php');

$post = array();
$get = null;

if (isset($_POST['txt_buscar']))
{$post[0] = $_POST['txt_buscar'];}
else
{ $post[0] = null;}

if(isset($_POST['ciudad']))
{$post[1] = $_POST['ciudad'];}
else
{ $post[1] = null;}

if (isset($_GET['code']))
{$get = $_GET['code'];}

$objetoVie = new I_Status("Status de Pedido",$post,$get);
?>
