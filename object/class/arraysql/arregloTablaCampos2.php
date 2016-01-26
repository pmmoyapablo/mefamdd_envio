<?php
/*
    En este archivo vamos a generar el arreglo de datos de la tabla tbresultados
    Pollamax.
*/
require_once ("../../db/Classdb.php");
class arregloTablaCampos2
{
var $Tabla ="", $campo = null, $campoMax = null, $criterio = null, $arregloTabla = null;
var $arregloOrder = null, $arreglolimite = null,$arregloGrup = null, $objdb = null, $conector = null, $arregloCamposMaxExiste = null;
  
function arregloTablaCampos2($ComboTabla)
{
$this->arregloTabla = $ComboTabla;
$i = 0;
while($i < count($ComboTabla))
{
if($ComboTabla[$i] =='ps_product')
{
$this->Tabla="ps_product";
$this->campo['ps_product.id_product']="";
$this->campo['ps_product.price']="";
$this->campo['ps_product.supplier_reference']="";
$this->campo['ps_product.ecotax']="";
$this->campo['ps_product.quantity']="";
$this->campo['ps_product.id_manufacturer']="";
$this->campo['ps_product.id_category_default']="";
$this->campo['ps_product.reference']="";
}
elseif($ComboTabla[$i] =='ps_category_lang')
{
$this->Tabla="ps_category_lang";
$this->campo['ps_category_lang.name']="";
}
elseif($ComboTabla[$i] =='ps_manufacturer')
{
$this->Tabla="ps_manufacturer";
$this->campo['ps_manufacturer.name']="";
}
elseif($ComboTabla[$i] =='ps_product_lang')
{
$this->Tabla="ps_product_lang";
$this->campo['ps_product_lang.name']="";
$this->campo['ps_product_lang.description']="";
$this->campo['ps_product_lang.description_short']="";
$this->campo['ps_product_lang.id_product']="";
}
elseif($ComboTabla[$i] =='ps_image')
{
$this->Tabla="ps_image";
$this->campo['ps_image.id_image']="";
}
++$i;
}

$this->objdb=new classdb("../../db/Clave2.php");

}

function PonerValores($vector)
{  
 reset($vector);
// Moverse dentro del Arreglo asociativo
 foreach($vector as  $campo => $valor )
 {
   $this->campo[$campo] = $valor;
 }
 
}

function PonerCondicion($condicion)
{
  $this->criterio = $condicion;
}

function PonerOrden($condicion)
{
  $this->arregloOrder = $condicion;
}

function PonerAgrupamiento($condicion)
{
  $this->arregloGrup = $condicion;
}

function PonerLimitacion($condicion)
{
  $this->arreglolimite = $condicion;
}

function PonerCampoMax($condicion)
{
  $this->campoMax = $condicion;
}

function PonerCampoMaxExiste($condicion)
{
  $this->arregloCamposMaxExiste = $condicion;
}

function Insertar()
{ 
$this->conector = $this->objdb->fdbConectar();
$this->objdb->fdbInsert($this->Tabla,$this->campo);
$this->objdb->fdbDesConexion($this->conector);
}

function Modificar()
{
$this->conector = $this->objdb->fdbConectar();
$this->objdb->fdbdUpdate($this->Tabla,$this->campo, $this->criterio);
$this->objdb->fdbDesConexion($this->conector);
}

function Borrar()
{
$this->conector = $this->objdb->fdbConectar();
 $this->objdb->fdbDelete($this->Tabla,$this->criterio);
 $this->objdb->fdbDesConexion($this->conector);
}

function Seleccionar()
{
$this->conector = $this->objdb->fdbConectar();
$arreglData = $this->objdb->fbdSelect($this->arregloTabla,$this->campo,$this->criterio, $this->arregloOrder, $this->arregloGrup, $this->arreglolimite);
$this->objdb->fdbDesConexion($this->conector);

return $arreglData;
}

function SeleccionarEspecifico()
{
$this->conector = $this->objdb->fdbConectar();
$arreglData = $this->objdb->fbdSelectEspecif($this->arregloTabla,$this->campo,$this->criterio, $this->arregloOrder, $this->arregloGrup, $this->arreglolimite);
$this->objdb->fdbDesConexion($this->conector);

return $arreglData;
}

function SeleccionarconOR()
{ 
  $this->conector = $this->objdb->fdbConectar();
$arreglData = $this->objdb->fbdSelectOR($this->arregloTabla,$this->campo,$this->criterio, $this->arregloOrder, $this->arregloGrup, $this->arreglolimite);
$this->objdb->fdbDesConexion($this->conector);

return $arreglData;
} 

function SeleccionarconLike()
{ 
  $this->conector = $this->objdb->fdbConectar();
$arreglData = $this->objdb->fbdSelectLike($this->arregloTabla,$this->campo,$this->criterio, $this->arregloOrder, $this->arregloGrup, $this->arreglolimite);
$this->objdb->fdbDesConexion($this->conector);

return $arreglData;
}

function SeleccionarconDistn()
{ 
  $this->conector = $this->objdb->fdbConectar();
$arreglData = $this->objdb->fbdSelectDistin($this->arregloTabla,$this->campo,$this->criterio, $this->arregloOrder, $this->arregloGrup, $this->arreglolimite);
$this->objdb->fdbDesConexion($this->conector);

return $arreglData;
}

function SeleccionarMax()
{
$this->conector = $this->objdb->fdbConectar();
$arreglData = $this->objdb->fbdSelectMax($this->arregloTabla,$this->campoMax,$this->criterio, $this->arregloOrder, $this->arregloGrup, $this->arreglolimite);
$this->objdb->fdbDesConexion($this->conector);

return $arreglData;
}

function SeleccionarMaxExiste()
{
$this->conector = $this->objdb->fdbConectar();
$arreglData = $this->objdb->fbdSelectMaxExiste($this->arregloTabla,$this->campo,$this->arregloCamposMaxExiste,$this->criterio, $this->arregloOrder, $this->arregloGrup, $this->arreglolimite);
$this->objdb->fdbDesConexion($this->conector);

return $arreglData;
}

}
?>