<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of i_MetPag
 *
 * @author Pablo Moya
 */
require_once ('../../object/view/view_base.php');
require_once ('interface_Contenido.php');
include_once '../class/entity/Banco.php';

class I_MetPag extends View_base implements Interface_Contenido{
 public function  __construct($titulo,$post,$get)
{
    $this->Set_Style("<link href='../../style/css/mefamdd.css' rel='stylesheet' type='text/css'>");

    parent::__construct($titulo,  $this->js, $this->css, null, true);
    
  $this->Set_Mensaje("<p>M&eacute;todos de Pago</p>");
   $this->Get_Mensaje();
      $contenido = $this->Create_Contenido();      
      $this->Set_Body($contenido);
      $this->Get_Body();
    $this->CerrarHiperTexto();
  
}
public function Set_Mensaje($mensaje = "")
{
    $this->Mensaje = $mensaje;
}
public function Get_Mensaje()
{
    echo $this->Mensaje;
}

public function  Set_JS($js = "")
{
    $this->js = $js;
}

public function  Set_Body($contenido = "") {
    $this->body = $contenido;
    }

 public function  Get_Body() {
     echo  $this->body;
    }

public function  Set_Style($css = "")
{
    $this->css = $css;
}

private function Create_Contenido()
{  
    $tabla = "<table align='center' border = '1'>				
            <tr> 
                <td>BANCO</td>
                <td>N&Uacute;MERO DE CUENTA</td>
                <td>TIPO DE CUENTA</td>
                <td>A NOMBRE DE ...</td>
            </tr>";
    
    $banco = new Banco();
    $vectorBanco = $banco->SeleccionarTodos();
    
    foreach ($vectorBanco as $campo => $valor)
    {
        $tabla .= "<tr> 
                <td>".$valor->getNombre()."</td>
                <td>".$valor->getCuenta()."</td>
                <td>".$valor->getTipo()."</td>
                <td>".$valor->getTitular()."</td>
            </tr>";
    }
    
    $tabla .= "</table>";
    
    return $tabla;

}
}
?>
