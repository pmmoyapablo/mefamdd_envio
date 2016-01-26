<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of i_Ubicacion
 *
 * @author Pablo Moya
 */
require_once ('../../object/view/view_base.php');
require_once ('interface_Contenido.php');

class I_Ubicacion extends View_base implements Interface_Contenido{
    public function  __construct($titulo,$post,$get)
{
    $this->Set_Style("<link href='../../style/css/mefamdd.css' rel='stylesheet' type='text/css'>");

    parent::__construct($titulo,  $this->js, $this->css, null, true);
    
  $this->Set_Mensaje("<p>Ubicaci&oacute;n</p>");
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

    return "<table>
                           <tr> 
                                <td><label>CENTRO</label></td>                   
                            </tr>
                            <tr> 
                                <td>Estacion del metro Teatro,  Av. Lecuna con Calle Municipal, Edificio Saverio Russo, piso 6. </td>                   
                            </tr>
                            <tr> 
                                <td>Caracas - Distrito Capital. </td>                   
                            </tr>
                             <tr> 
                                <td>Telefono: (0212) 4846578.</td>                   
                            </tr>
			     
		   	    <tr> 
                                <td></td>                   
                            </tr>
                            <tr> 
                                <td></td>                   
                            </tr>
                             <tr> 
                                <td></td>                   
                            </tr>
                           <tr> 
                                <td><label>SUCURSAL ALTAMIRA</label></td>                   
                            </tr>
                            <tr> 
                                <td>Estacion del metro Altamira, salida del metro,  Av. del Avila (al ladol), frente al banco Mercantil,</td>                   
                            </tr>
                            <tr> 
                                <td> por la Av. Fco. de Miranda, Edf. humboldt, piso 5, el mismo de la Autoescela Rossini. </td>
                            </td>
                            <tr> 
                                <td>Caracas - Miranda. </td>                   
                            </tr>
                             <tr> 
                                <td>Telefonos: (0212) 4160074,  (0416) 6222379,  (0424) 3601579.</td>                   
                            </tr>
			     <tr> 
                                <td></td>                   
                            </tr>
                            <tr> 
                                <td></td>                   
                            </tr>
                             <tr> 
                                <td></td>                   
                            </tr>
                           <tr> 
                                <td><label>SUCURSAL GUARENAS</label></td>                   
                            </tr>
                            <tr> 
                                <td>Av. Intercomunal Guarenas Guatire, Urb. Las Islas, Centro Comercial Plaza Mayor, nivel C1,</td>                   
                            </tr>
                            <tr> 
                                <td>local C12, Punto de Referencia: Al lado de la Villa Panamericana.</td>
                            </td>
                            <tr> 
                                <td>Guarenas - Miranda. </td>                   
                            </tr>
                             <tr> 
                                <td>Telefonos: (0412) 0240606.</td>                   
                            </tr>
			</table>";
              /*
                   $foto =  "<tr> 
                             <td><img src='http://www.mefamdd.com.ve/mefamdd_envio/photo/publicidad-micreo-electronic2_04.jpg' width='800' height='300' class=''/></td>                   
                            </tr>";
               */
}

}
?>
