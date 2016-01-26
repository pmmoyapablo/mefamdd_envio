<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of I_Status
 *
 * @author Pablo Moya
 */
require_once ('../../object/view/view_base.php');
require_once ('interface_Contenido.php');
require_once "../../object/class/entity/Ciudad.php";
require_once "../../object/class/other/field.php";
include_once '../class/entity/Pedido.php';

class I_Status extends View_base implements Interface_Contenido{
    
private $Mensaje = null;
private $resultado = null;
private $get_txt = null;

public function  __construct($titulo,$post,$get)
{
    $this->Set_Style("<link href='../../style/css/mefamdd.css' rel='stylesheet' type='text/css'>");

    parent::__construct($titulo,  $this->js, $this->css, null, true);
    $this->arrayPost = $post;
    $this->get_txt = $get;
    $this->Set_Mensaje("<p>Status del Pedido</p>");
    $this->Procesar_Busqueda();
   $this->Get_Mensaje();
   $contenido = $this->Create_SearhBox();      
      $contenido = $contenido.$this->resultado;
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

private function Create_SearhBox()
{  
    
     $campo20 = new Field();
        
        $campo20->setLabel1("Ciudad:");
        $campo20->setEtiqueta("select");
        $campo20->setName("ciudad");
        $campo20->setSize(1);
        
        $ciudad = new Ciudad();
          
        $vectorCiudad = $ciudad->SelecionarCiudadTodas();
        
       $ciudadList = null;     
       $postCiudad = null;
             
       $ciudadList["-Seleccione-"] = "''";
     
       if($vectorCiudad != null)
       {
       foreach ( $vectorCiudad as $key => $value) 
           { 
             $ciudadList[$value->getNombre()] = $value->getId();
           }   
       }
       
        $campo20->setListOptions($ciudadList);
        
         $button = new Field();
        
         $button->setEtiqueta("input");
         $button->setType("submit");
         $button->setName("boton1");
         $button->setValue("Consultar");
        
        $arrayCampo[0] = $campo20->getField().$button->getField();  
                   
        $formulario2 = $this->CreateForm("f2status", "status.php",null,$arrayCampo, null);

    return "<form name='frm1' method='post' action='status.php'>
<label>Codigo del Pedido:</label><input name='txt_buscar' type='text' size='37' value='".$this->arrayPost[0]."'/>
       <input type='submit' name='Submit' value='Consultar' />
</form>".$formulario2;

}

private function Procesar_Busqueda()
{
 if( $this->arrayPost[0] != null || $this->arrayPost[1] != null || $this->get_txt != null)
 {  
     $Pedido_select = null;
     $Pedido_Ciudad = null;
     $pedido = new Pedido();

    if ($this->arrayPost[0] != null || $this->get_txt != null)
    {
        if($this->get_txt != null)
        {  $this->arrayPost[0] = $this->get_txt; }
        
       $this->arrayPost[0] =  $this->ClearString($this->arrayPost[0]);
       
       $i = 0;
       $codigo = "";
       while ($i < strlen($this->arrayPost[0]))
       {
           $char = substr($this->arrayPost[0], $i,1);
           if($char == "0" || $char == "1" || $char == "2" || $char == "3" || $char == "4" || $char == "5" || $char == "6" || $char == "7" || $char == "8" || $char == "9" )
           {
               $codigo = $codigo.$char;
           }
           ++$i;
       }
       
       if($codigo == "")
       {  $codigo = "0";}
       
       $this->arrayPost[0] = $codigo;     

    $Pedido_select = $pedido->Selecionar_PedidoUnicoCompleto($this->arrayPost[0]);
    
    }elseif ($this->arrayPost[1] != null)
    {
         $Pedido_Ciudad = $pedido->Seleccionar_Pedidos_Ciudad($this->arrayPost[1]);
    }

    if($Pedido_select != null)
    {
        $datosAdd = "";
        
        if($Pedido_select->getStatus_Pedido() == "ENVIADO")
        {
            $datosAdd =  "<tr>
                          <td>Empresa de Envio:</td>
                          <td>".$Pedido_select->getCasa_Envio()."</td>
                          </tr>
                          <tr>
                          <td>Numero de Guia:</td>
                          <td>".$Pedido_select->getNro_Guia()."</td>
                          </tr>
                          <tr>
                          <td>Gasto de Envio BsF:</td>
                          <td>".$Pedido_select->getGasto_Envio()."</td>
                          </tr>
                          <tr>
                          <td>Fecha de Salida:</td>
                          <td>".$Pedido_select->getFecha_Entrega()."</td>
                          </tr>
                           <tr>
                          <td>Fecha Estimada Destino:</td>
                          <td>".$Pedido_select->getFecha_Estimada()."</td>
                          </tr>
                          <tr>
                          <td>Observaciones:</td>
                          <td>".$Pedido_select->getObservaciones()."</td>
                          </tr>";
        }
        
     $this->resultado = "<b>Detalles del Pedido Nro. ".$this->arrayPost[0].":</b><br><br>";

     $this->resultado .= "<table>
                          <tr>
                          <td>Codigo del Pedido:</td>
                          <td>".$Pedido_select->getCodigo_Pedido()."</td>
                          </tr>
                          <tr>
                          <td>Cliente:</td>
                          <td>".$Pedido_select->getCliente()."</td>
                          </tr>
                           <tr>
                          <td>Status:</td>
                          <td>".$Pedido_select->getStatus_Pedido()."</td>
                          </tr>
                          ".$datosAdd."
                           <tr>
                          <td>Monto Total BsF:</td>
                          <td>".$Pedido_select->getMontoAcumulado()."</td>
                          </tr>
                          <tr>
                          <td>Ciudad:</td>
                          <td>".$Pedido_select->getCiudad()."</td>
                          </tr>
                           <tr>
                          <td>Estado:</td>
                          <td>".$Pedido_select->getEstado()."</td>
                          </tr>
                          <tr>
                          <td>Direccion de Envio:</td>
                          <td>".$Pedido_select->getDireccion_Entrega()."</td>
                          </tr>
                          </table>";

    }elseif($Pedido_Ciudad != null)
    {
        $this->resultado = "<label>Se encontro los siguientes Resultados:</label><br><br><br>";
        
        foreach ($Pedido_Ciudad as $campo => $value)
        {
            $this->resultado .=  "<a href='status.php?code=".$value->getCodigo_Pedido()."' >".$value->getCliente()." - ".$value->getCodigo_Pedido()."</a><br><br>";
        }
    }
    else
    { $this->resultado = "<font face = 'Verdana' size='1' color = 'red'>No se encontraron resultados para este numero de pedido.</font>";}
 }


}

}
?>
