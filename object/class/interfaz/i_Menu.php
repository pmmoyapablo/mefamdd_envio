<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of i_Menu
 *
 * @author Pablo Moya
 */

require_once ('../../object/view/view_base.php');

class I_Menu extends View_base {
    //put your code here
    private $errorMsn = "";

    public function __construct($titulo = "", $user = null, $isLogin = false, $error = "") {
        $this->css = "<link href='../../style/css/mefamdd.css' rel='stylesheet' type='text/css'>";     
        parent::__construct($titulo, $this->js, $this->css, $user , $isLogin);
         
        $this->errorMsn = $error;
       // $this->createLoginBox();
        $this->prepareMenu();
          $this->CerrarHiperTexto();
    }
    
    private function createLoginBox()
    { 
       
        if($this->isAutentica)
        {         
            echo "<table>
	<tr>
		<td >BIENVENIDO: ".$_SESSION['nombres']." ".$_SESSION['apellidos']."</td>
	</tr>
        <tr>
		<td>Usuario: ".$_SESSION['usuario']."</td>
	</tr>
         <tr>
		<td><a href='perfil.php?' target='mainFrame'>Perfil</a></td>
	</tr>
        <tr>
		<td><a href='menu.php?cerrar=1'>Cerrar Session</a></td>
	</tr>
               </table>";
            
        }
         else
        {        
        echo "<table>
	<tr>
		<td >INICIAR SESSION</td>
	</tr>
        ".$this->errorMsn."
	<form name='form1' method='post' action='../../object/view/menu.php'>
	<tr>
		<td>Usuario:</td>
	</tr>
	<tr>
		<td ><input name='txt_login' type='text' size='30' /></td>
	</tr>
	<tr>
            <td>Clave:</td>
	</tr>
	<tr>
		<td ><input name='txt_clave' type='password' size='20' /></td>
	</tr>
        <tr>
		<td></td>
	</tr>
	<tr>
		<td align='right'><a href=''>Recuperar Clave</a></td>
	</tr>
         <tr>
		<td></td>
	</tr>
        <tr>
		<td><br></td>
	</tr>
	<tr>
		<td align='center'><input type='submit' name='Submit' value='Entrar' /></td>
	</tr>
	<input type='hidden' name='Lbl_Llamar' value='ok'>
	</form>
        <tr>
		<td><br></td>
	</tr>
        <tr>
		<td><label>Nuevo Usuario</label></td>
	</tr>
        <tr>
		<td align='center'><a href='registro.php' target='mainFrame'>Registrar Cuenta</a></td>
	</tr>
	</table>";
        }
    }
    
    private function prepareMenu()
    {
       $submenu = array("Nuevo Envio" => "neworder.php?new=1", "M&eacute;todos de Pago" => "metpag.php", "Ubicaci&oacute;n" => "ubicacion.php", "Consultar Pedido" => "status.php" ,"Consultar Productos" => "start.php");

        echo $this->CreteMenu("MEN&Uacute; PRINCIPAL", $submenu);

        include_once  '../class/arraysql/arregloTablaCampos.php';

        $tabla = null;
	$objdb = null;
        $categorias = null;
        $criterio = null;

         $tabla[0] = "products";
        $objdb = new arregloTablaCampos($tabla);
        $grupo["category_id3"] = "category_id3";
        $objdb->PonerAgrupamiento($grupo);
       $row = $objdb->Seleccionar();

        if (count($row)>0)
            {
            $i = 1;
            $categorias = array();
            while($i <= count($row))
             {
                $categorias[$row[$i][2]] = "start.php?id_cat=".$row[$i][4];
                ++$i;
             }
            }

             //echo  $this->CreteMenu("PRODUCTOS",$categorias);
            
            echo  $this->CreteMenu("PRODUCTOS", array("Lista de Precios" => "listProducts.php"));
        
    }

  
}

?>
