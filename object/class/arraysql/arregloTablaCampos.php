<?php 
/*
    En este archivo vamos a generar el arreglo de datos de la tabla tbresultados
    Pollamax.
*/
require_once ("../../db/Classdb.php");
class arregloTablaCampos
{
var $Tabla ="", $campo = null, $campoMax = null, $criterio = null, $arregloTabla = null;
var $arregloOrder = null, $arreglolimite = null,$arregloGrup = null, $objdb = null, $conector = null, $arregloCamposMaxExiste = null;
  
function arregloTablaCampos($ComboTabla)
{
$this->arregloTabla = $ComboTabla;
$i = 0;
while($i < count($ComboTabla))
{
if($ComboTabla[$i] =='tb_equipo_subpedido')
{
$this->Tabla="tb_equipo_subpedido";
$this->campo['codigoSubpedido']="";
$this->campo['product_id']="";
$this->campo['cantidad']="";
}
elseif($ComboTabla[$i] =='ventas_ml')
{
$this->Tabla="ventas_ml";
$this->campo['id_product']="";
$this->campo['cantidad']="";
$this->campo['precio_fin']="";
}
elseif($ComboTabla[$i] =='tb_pedido')
{
$this->Tabla="tb_pedido";
$this->campo['codigoPedido']="";
$this->campo['user_id']="";
$this->campo['direccionEntrega']="";
$this->campo['montoAcumulado']="";
$this->campo['cuentaBanc']="";
$this->campo['deposito']="";
$this->campo['status']="";
$this->campo['fechaDeposito']=""; 
$this->campo['fechaEntrega']="";
$this->campo['nroRefBancaria']="";
$this->campo['responsableFacturador']="";
$this->campo['fechaApertura']="";
$this->campo['actualizacion']="";
$this->campo['banco']="";
$this->campo['montoDepositado']="";
$this->campo['modoPago']="";
$this->campo['observaciones']="";
$this->campo['fechaRepuesta']="";
$this->campo['bancoOrigen']="";
}
elseif($ComboTabla[$i] =='users')
{
$this->Tabla="users";
$this->campo['user_id']="";
$this->campo['username']="";
$this->campo['users.city_id']="";
$this->campo['users.profile_id']="";
$this->campo['password']="";
$this->campo['users.level']="";
$this->campo['firstname']="";
$this->campo['lastname']="";
$this->campo['email']="";
$this->campo['address']="";
$this->campo['users.visible']="";
$this->campo['letterrif']="";
$this->campo['rif']="";
$this->campo['socialreason']="";
$this->campo['phone']="";
$this->campo['phone_movil']="";
$this->campo['pin']="";
$this->campo['question_segurity']="";
$this->campo['responce_segurity']="";
$this->campo['word_verifyq']="";
$this->campo['users.country_id']="";
$this->campo['users.state_id']="";
$this->campo['seudonimo']="";
}
elseif($ComboTabla[$i] =='shippings')
{
$this->Tabla="shippings";
$this->campo['pedido_id']="";
$this->campo['gasto_envio']="";
$this->campo['companie_id']="";
$this->campo['number_guia']="";
$this->campo['date_close']="";
}
elseif($ComboTabla[$i] =='visitas')
{
$this->Tabla="visitas";
$this->campo['id_vis']="";
$this->campo['cant_vis']="";
}
elseif($ComboTabla[$i] =='products')
{
$this->Tabla="products";
$this->campo["product_id"] = "";
$this->campo["type_id"] = "";
$this->campo["id_brand"] = "";
$this->campo["category_id3"] = "";
$this->campo["model_id2"] = "";
$this->campo["date_arrival"] = "";
$this->campo["price"] = "";
$this->campo["discount"] = "";
$this->campo["picture"] = "";
$this->campo["is_new"] = "";
$this->campo["visible"] = "";
$this->campo["description"] = "";
$this->campo["inventario"] = "";
}
++$i;

}

$this->objdb=new classdb("../../db/Clave.php");

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