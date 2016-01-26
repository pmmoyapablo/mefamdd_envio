<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of i_ListProducts
 *
 * @author Pablo Moya
 */

require_once ('../../object/view/view_base.php');
require_once ('interface_Contenido.php');
require_once "../../object/class/entity/Equipo.php";
require('../../lib/ezPdf/class.ezpdf.php');

class I_ListProducts extends View_base implements Interface_Contenido{
    
    public function  __construct($titulo,$post,$get)
     {
    $this->Set_Style("<link href='../../style/css/mefamdd.css' rel='stylesheet' type='text/css'>");
  if($get == 1)
    {        $this->make_pdf(); }
    parent::__construct($titulo,  $this->js, $this->css, null, true);
      
    
  $this->Set_Mensaje("<p>Lista de Productos Disponibles.</p>");
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

private function make_pdf()
{
         $pdf = new Cezpdf('letter','portrait');
                $pdf->selectFont('../../lib/ezPdf/fonts/Courier');

                $res = array();
		$res = $this->return_tables();
              
                $imagen = "../../style/img/Logo.jpg";
			     $pdf->ezImage($imagen,0,500,'none','left');
                          
                             $fecha = date("d-m-Y");
                            $titulo = "Lista de Precios.";

                   $pdf->ezText("\n".$titulo."                      "."Caracas,  ".$fecha."\n", 14);   
                    $pdf->ezText("Estacion del metro Teatro,  Av. Lecuna con Calle Municipal, Edificio Saverio Russo, piso 6. Caracas - Distrito Capital. Telefono: (0212) 4846578.\n",12);
                                 
                  $pdf->ezTable($res[0],'TABLA',$res[1],array('fontSize'=>10,'width'=>550));                             

                                $pdf->ezText("\n\nMicroelectronica FAMDD C.A\n\n\n",8);


                $pdfcode = $pdf->output(1);
                $file=fopen( str_replace(" ","_",'../../utility/Lista de Precios').".pdf","w+");
                utf8_encode($pdfcode);
                fwrite ($file,$pdfcode);
                fclose($file);

                header('Content-type: application/pdf');

                // It will be called downloaded.xml
                header('Content-Disposition: attachment; filename='.str_replace(" ","_",'../../utility/Lista de Precios').'.pdf');

                // The PDF source is in original.xml
                readfile(str_replace(" ","_",'../../utility/Lista de Precios').'.pdf');
                die();

}

 //Imprimir vista tabla
private function return_tables()
{
    $equipo = new Equipo();
    $vectorTipo = $equipo->Listar_Categorias_Equipo();
    $fila = null;
    
    if($vectorTipo != null)
    {
         $x= array();        
         $res = array();
        foreach ($vectorTipo as $key => $value)
            {
               $categoria = null;         
               $categoria = $value->getCategoria();
               $vectorProducts =$equipo->Seleccionar_Equipo_Categoria($categoria);
                $res1 = array('Codigo'=>'','Categoria'=>'','Nombre'=>'','Precio/U BsF'=>'');                              
                
               if($vectorProducts != null)
               {
                   foreach ( $vectorProducts  as $campo => $rowEquipo)    
                   {
                        $res1['Codigo']= $rowEquipo->getReference();
                        $res1['Nombre']= $rowEquipo->getNombre();
                        $res1['Categoria']= $categoria;
                        $res1['Precio/U BsF']= number_format((float)$rowEquipo->getPrecio(),2,",",".");
                                                                              
                       array_push($res,$res1);
                   }
               }
                
            }
    }
                          
             array_push($x,$res);

                return $x;

}   

private function Create_Contenido()
{ 
    $equipo = new Equipo();
    $vectorTipo = $equipo->Listar_Categorias_Equipo();
    $fila = null;
    
    if($vectorTipo != null)
    {
        
        foreach ($vectorTipo as $key => $value)
            {
               $categoria = null;         
               $categoria = $value->getCategoria();
               $vectorProducts =$equipo->Seleccionar_Equipo_Categoria($categoria);
               
                $fila .= "<tr bgcolor='gray'>
                    <td><b>Codigo</b></td><td><b>".$categoria."</b></td><td><b>Precio BsF</b></td>
                </tr>";
                
               if($vectorProducts != null)
               {
                   foreach ( $vectorProducts  as $campo => $rowEquipo)    
                   {
                       
                       $fila .= "<tr bgcolor = '#66ff33'>
                                     <td>".$rowEquipo->getReference()."</td><td>".$rowEquipo->getNombre()."</td><td>".number_format((float)$rowEquipo->getPrecio(),2,",",".")."</td>
                                 </tr>";
                   }
               }
                
            }
            
     return "<a href = 'listProducts.php?pdf=1'>Imprimir Lista PDF</a><br><br>
             <table>
                ".$fila."
             </table>";
    }
}
}
?>