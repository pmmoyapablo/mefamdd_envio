<?php
require_once ('../../object/class/interfaz/i_Start.php');

$post = null;
$get = null;

if (isset($_POST['txt_buscar']))
{$post = $_POST['txt_buscar'];}

if (isset($_GET['id']))
{$get[0] = $_GET['id'];}

if (isset($_GET['descripcion']))
{$get[1] = $_GET['descripcion'];}

$objetoVie = new I_Start("Inicio",$post,$get);

?>