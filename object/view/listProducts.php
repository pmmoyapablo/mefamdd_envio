<?php

require_once ('../../object/class/interfaz/i_ListProducts.php');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$pdf = 0;
if(isset($_GET['pdf']))
{$pdf = $_GET['pdf'];}

$objetoVie = new I_ListProducts("Lista de Productos",$post,$pdf);
?>
