<?php

require_once ('../../object/class/interfaz/i_NewOrder.php');

$post = array();
//Verifico los post data
if (isset($_REQUEST['inici']))
{$post[0] = $_REQUEST['inici'];}
else
{$post[0] = null;}

if (isset($_REQUEST['cedula']))
{$post[1] = $_REQUEST['cedula'];}
else
{$post[1] = null;}
    
if (isset($_REQUEST['nombre']))
{$post[2] = $_REQUEST['nombre'];}
else 
{$post[2] = null;}


if (isset($_REQUEST['codigoArea']))
{$post[3] = $_REQUEST['codigoArea'];}
else
{$post[3] = null;}

if (isset($_REQUEST['telefono']))
{$post[4] = $_REQUEST['telefono'];}
else
{$post[4] = null;}


if (isset($_REQUEST['mail']))
{$post[5] = $_REQUEST['mail'];}
else
{$post[5] = null;}

if (isset($_REQUEST['razonsocial']))
{$post[6] = $_REQUEST['razonsocial'];}
else
{$post[6] = null;}

if (isset($_REQUEST['seudonimo']))
{$post[7] = $_REQUEST['seudonimo'];}
else
{$post[7] = null;}

if (isset($_REQUEST['pais']))
{$post[8] = $_REQUEST['pais'];}
else
{$post[8] = null;}

if (isset($_REQUEST['estado']))
{$post[9] = $_REQUEST['estado'];}
else
{$post[9] = null;}

if (isset($_REQUEST['ciudad']))
{$post[10] = $_REQUEST['ciudad'];}
else
{$post[10] = null;}

if (isset($_REQUEST['direccion']))
{$post[11] = $_REQUEST['direccion'];}
else
{$post[11] = null;}

if (isset($_REQUEST['banco']))
{$post[12] = $_REQUEST['banco'];}
else
{$post[12] = null;}

if (isset($_REQUEST['referencia']))
{$post[13] = $_REQUEST['referencia'];}
else
{$post[13] = null;}

if (isset($_REQUEST['monto']))
{$post[14] = $_REQUEST['monto'];}
else
{$post[14] = null;}

if (isset($_REQUEST['fecha']))
{$post[15] = $_REQUEST['fecha'];}
else
{$post[15] = null;}

if (isset($_REQUEST['cantidad']))
{$post[16] = $_REQUEST['cantidad'];}
else
{$post[16] = null;}

if (isset($_REQUEST['tipo_producto']))
{$post[17] = $_REQUEST['tipo_producto'];}
else
{$post[17] = null;}

if (isset($_REQUEST['marca_producto']))
{$post[18] = $_REQUEST['marca_producto'];}
else
{$post[18] = null;}

if (isset($_REQUEST['modelo_producto']))
{$post[19] = $_REQUEST['modelo_producto'];}
else
{$post[19] = null;}

if (isset($_REQUEST['precio_producto']))
{$post[20] = $_REQUEST['precio_producto'];}
else
{$post[20] = null;}

if (isset($_REQUEST['descripcion_producto']))
{$post[21] = $_REQUEST['descripcion_producto'];}
else
{$post[21] = null;}

$new = 0;
if(isset($_GET['new']))
{$new = $_GET['new'];}

$del = null;
if(isset($_GET['del']))
{$del = $_GET['del'];}

$objetoVie = new I_NewOrder("Registrar Nuevo Envio",$post,$new,$del);

?>