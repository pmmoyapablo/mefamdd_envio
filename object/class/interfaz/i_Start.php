<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of I_Start
 *
 * @author Pablo Moya
 */
require_once ('../../object/view/view_base.php');
require_once ('interface_Contenido.php');
include_once '../class/entity/Equipo.php';

class I_Start extends View_base implements Interface_Contenido
{
private $Mensaje = null;
private $resultado = null;
private $post_txt = null;

public function  __construct($titulo,$post,$get)
{
    $this->Set_Style("<link href='../../style/css/mefamdd.css' rel='stylesheet' type='text/css'>");

    parent::__construct($titulo,  $this->js, $this->css, null, true);
   
     $this->SetResultadoGet($get);
  $this->Set_Mensaje("<p>Los Productos Disponibles</p>");
   $this->Get_Mensaje();
   $this->Procesar_Busqueda($post);
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

    return "<form name='frm1' method='post' action='start.php'>
<label>Buscar:</label><input name='txt_buscar' type='text' size='37' value='".$this->post_txt."'/>
       <input type='submit' name='Submit' value='Buscar...' />
</form>";

}

private function Procesar_Busqueda($post_variable = null)
{
 if( $post_variable != null)
 {
     $this->post_txt = $post_variable;
  
       $this->post_txt =  $this->ClearString($this->post_txt);

     $equipo = new Equipo();

    $vector = $equipo->Buscar_Equipo_Like($this->post_txt);

    if($vector != null)
    {
     $this->resultado = "<label>Se encontro los siguientes Resultados:</label><br><br><br>";

     foreach ( $vector as $campo => $valor)
     {
       $this->resultado .=  "<a href='start.php?id=".$valor->getId()."&descripcion=".$valor->getNombre()."'>".$valor->getTipoEquipo()." - ".$valor->getMarca()." - ".$valor->getModelo()."</a><br><br>";
     }

    }else
    { $this->resultado = "<font face = 'Verdana' size='1' color = 'red'>No se encontraron resultados.</font>";}
 }


}

private function SetResultadoGet($get = null)
{
    $tabla = "";
    
    $equipo = new Equipo();
    $vector = $equipo->Seleccionar_Equipos_Id_Lang($get[0]);
    
    if($vector != null)
    {
        $tabla = "<table border = '1'>";
        
            $this->resultado = "<p>".$get[1]."</p>";
            
            foreach ($vector as $key => $value)
                {
      
                $tabla .= "<tr>
                           <td>
                          <table>
                           <tr>
                             <td>Foto:</td><td>".$value->getFoto()."</td>
                           </tr>
                           <tr> 
                            <td>Tipo:</td><td>".$value->getTipoEquipo()."</td>
                           </tr>
                           <tr>
                            <td>Marca:</td><td>".$value->getMarca()."</td>
                           </tr>
                           <tr>
                            <td>Modelo:</td><td>".$value->getModelo()."</td>
                           </tr>
                           <tr>
                            <td>Descripcion:</td><td>".$value->getNombre()."</td>
                           </tr>
                           <tr>
                            <td>Caracteristicas:</td><td>".$value->getCaracteristicas()."</td>
                           </tr>
                           <tr>
                             <td>Costo BsF:</td><td>".number_format((float)$value->getPrecio(),2,",",".")."</td>
                           </tr>                         
                           </table>
                           </td>
                           </tr>";
                }
                
                $tabla .= "</table>";
                
                $this->resultado .= $tabla;
    }
       
}

}
?>
