<?php
class Pedido
{

// Atributos de la clase Pedido
private $codigo_Pedido = 0;
private $user_id = 0;
private $relacion_equipos = null;
private $direccion_Entrega= "";
private $montoAcumulado = 0.00;
private $cuenta_Banc = "";
private $deposito_Nro = 0;
private $status_Pedido; 
private $fecha_Deposito = null;
private $fecha_Entrega = null;
private $fecha_Apertura = null;
private $nro_RefBanca = 0;
private $facturador_Responsable;
private $actualizacion = "";
private $banco = "";
private $montoDepositado = 0.00;
private $modoPago = "";
private $observaciones = "";
private $fechaRespuesta = "";
private $bancoOrigen = "";
private $cliente = "";
private $nro_Guia_Envio = "";
private $casaEnvio = "";
private $ciudad = "";
private $estado = "";
private $fechaEstimada = null;
private $gasto_Envio = 0;

// Metodos Get  y   Set

    private function setCliente($cli)
    {
        $this->cliente = $cli;
    }
    
    public function getCliente()
    {
        return $this->cliente;
    }
    
    private function setGasto_Envio($gasto)
    {
        $this->gasto_Envio = $gasto;
    }
    
    public function getGasto_Envio()
    {
        return $this->gasto_Envio;
    }

    public function getFecha_Estimada()
    {
        return $this->fechaEstimada;
    }
   
    private function setFecha_Estimada($fecha_Estimada)
    {
        $this->fechaEstimada = $fecha_Estimada;
    }
    
    
    private function setCasa_Envio($casa)
    {
        $this->casaEnvio = $casa;
    }
    
    public function getCasa_Envio()
    {
        return $this->casaEnvio;
    }
    
    private function setCiudad($city)
    {
        $this->ciudad = $city;
    }
    
    public function getCiudad()
    {
        return $this->ciudad;
    }
   
    private function setEstado($state)
    {
        $this->estado = $state;
    }
    
    public function getEstado()
    {
        return $this->estado;
    }

    private function  setNro_Guia($guia)
    {
        $this->nro_Guia_Envio = $guia;
    }
    
    public function getNro_Guia()
    {
        return $this->nro_Guia_Envio;
    }
    /**
     * Returns $actualizacion.
     * @see Pedido::$actualizacion
     */
    public function getActualizacion()
    {
        return $this->actualizacion;
    }
    
    /**
     * Sets $actualizacion.
     * @param object $actualizacion
     * @see Pedido::$actualizacion
     */
    public function setActualizacion($actualizacion)
    {
        $this->actualizacion = $actualizacion;
    }
    /**
     * Returns $relacion_equipos.
     * @see Pedido::$relacion_equipos
     */
    public function getRelacion_equipos()
    {
        return $this->relacion_equipos;
    }
    
    /**
     * Sets $relacion_equipos.
     * @param object $relacion_equipos
     * @see Pedido::$relacion_equipos
     */
    public function setRelacion_equipos($relacion_equipos)
    {
        $this->relacion_equipos = $relacion_equipos;
    }
    /**
     * Returns $user_id.
     * @see Pedido::$user_id
     */
    public function getuser_id()
    {
        return $this->user_id;
    }
    
    /**
     * Sets $user_id.
     * @param object $user_id
     * @see Pedido::$user_id
     */
    public function setuser_id($user_id)
    {
        $this->user_id = $user_id;
    }
    
    /**
     * Returns $codigo_Pedido.
     * @see Pedido::$codigo_Pedido
     */
    public function getCodigo_Pedido()
    {
        return $this->codigo_Pedido;
    }
    
    /**
     * Sets $codigo_Pedido.
     * @param object $codigo_Pedido
     * @see Pedido::$codigo_Pedido
     */
    public function setCodigo_Pedido($codigo_Pedido)
    {
        $this->codigo_Pedido = $codigo_Pedido;
    }
    
    
    /**
     * Returns $cuenta_Banc.
     * @see Pedido::$cuenta_Banc
     */
    public function getCuenta_Banc()
    {
        return $this->cuenta_Banc;
    }
    
    /**
     * Sets $cuenta_Banc.
     * @param object $cuenta_Banc
     * @see Pedido::$cuenta_Banc
     */
    public function setCuenta_Banc($cuenta_Banc)
    {
        $this->cuenta_Banc = $cuenta_Banc;
    }
    
    /**
     * Returns $deposito_Nro.
     * @see Pedido::$deposito_Nro
     */
    public function getDeposito_Nro()
    {
        return $this->deposito_Nro;
    }
    
    /**
     * Sets $deposito_Nro.
     * @param object $deposito_Nro
     * @see Pedido::$deposito_Nro
     */
    public function setDeposito_Nro($deposito_Nro)
    {
        $this->deposito_Nro = $deposito_Nro;
    }
    
    /**
     * Returns $direccion_Entrega.
     * @see Pedido::$direccion_Entrega
     */
    public function getDireccion_Entrega()
    {
        return $this->direccion_Entrega;
    }
    
    /**
     * Sets $direccion_Entrega.
     * @param object $direccion_Entrega
     * @see Pedido::$direccion_Entrega
     */
    public function setDireccion_Entrega($direccion_Entrega)
    {
        $this->direccion_Entrega = $direccion_Entrega;
    }
    
    /**
     * Returns $facturador_Responsable.
     * @see Pedido::$facturador_Responsable
     */
    public function getFacturador_Responsable()
    {
        return $this->facturador_Responsable;
    }
    
    /**
     * Sets $facturador_Responsable.
     * @param object $facturador_Responsable
     * @see Pedido::$facturador_Responsable
     */
    public function setFacturador_Responsable($facturador_Responsable)
    {
        $this->facturador_Responsable = $facturador_Responsable;
    }
    
    /**
     * Returns $fecha_Deposito.
     * @see Pedido::$fecha_Deposito
     */
    public function getFecha_Deposito()
    {
        return $this->fecha_Deposito;
    }
    
    /**
     * Sets $fecha_Deposito.
     * @param object $fecha_Deposito
     * @see Pedido::$fecha_Deposito
     */
    public function setFecha_Deposito($fecha_Deposito)
    {
        $this->fecha_Deposito = $fecha_Deposito;
    }
    
    /**
     * Returns $fecha_Entrega.
     * @see Pedido::$fecha_Entrega
     */
    public function getFecha_Entrega()
    {
        return $this->fecha_Entrega;
    }
    
    /**
     * Sets $fecha_Entrega.
     * @param object $fecha_Entrega
     * @see Pedido::$fecha_Entrega
     */
    public function setFecha_Entrega($fecha_Entrega)
    {
        $this->fecha_Entrega = $fecha_Entrega;
    }  
    /**
     * Returns $nro_RefBanca.
     * @see Pedido::$nro_RefBanca
     */
    public function getNro_RefBanca()
    {
        return $this->nro_RefBanca;
    }
    
    /**
     * Sets $nro_RefBanca.
     * @param object $nro_RefBanca
     * @see Pedido::$nro_RefBanca
     */
    public function setNro_RefBanca($nro_RefBanca)
    {
        $this->nro_RefBanca = $nro_RefBanca;
    }
    
   
    /**
     * Returns $status_Pedido.
     * @see Pedido::$status_Pedido
     */
    public function getStatus_Pedido()
    {
        return $this->status_Pedido;
    }
    
    /**
     * Sets $status_Pedido.
     * @param object $status_Pedido
     * @see Pedido::$status_Pedido
     */
    public function setStatus_Pedido($status_Pedido)
    {
        $this->status_Pedido = $status_Pedido;
    }
	 /**
     * Returns $fecha_Apertura.
     * @see Pedido::$fecha_Apertura
     */
    public function getFecha_Apertura()
    {
        return $this->fecha_Apertura;
    }
    
    /**
     * Sets $fecha_Apertura.
     * @param object $fecha_Apertura
     * @see Pedido::$fecha_Apertura
     */
    public function setFecha_Apertura($fecha_Apertura)
    {
        $this->fecha_Apertura = $fecha_Apertura;
    } 
	
    /**
     * Returns $banco.
     * @see Pedido::$banco
     */
    public function getBanco()
    {
        return $this->banco;
    }
    
    /**
     * Sets $banco.
     * @param object $banco
     * @see Pedido::$banco
     */
    public function setBanco($banco)
    {
        $this->banco = $banco;
    }   
	
    /**
     * Returns $montoAcumulado.
     * @see Pedido::$montoAcumulado
     */
    public function getMontoAcumulado()
    {
        return $this->montoAcumulado;
    }
    
    /**
     * Sets $montoAcumulado.
     * @param object $montoAcumulado
     * @see Pedido::$montoAcumulado
     */
    public function setMontoAcumulado($montoAcumulado)
    {
        $this->montoAcumulado = $montoAcumulado;
    }
    
    /**
     * Returns $montoDepositado.
     * @see Pedido::$montoDepositado
     */
    public function getMontoDepositado()
    {
        return $this->montoDepositado;
    }
    
    /**
     * Sets $montoDepositado.
     * @param object $montoDepositado
     * @see Pedido::$montoDepositado
     */
    public function setMontoDepositado($montoDepositado)
    {
        $this->montoDepositado = $montoDepositado;
    }
   
    /**
     * Returns $modoPago.
     * @see Pedido::$modoPago
     */
    public function getModoPago()
    {
        return $this->modoPago;
    }
    
    /**
     * Sets $modoPago.
     * @param object $modoPago
     * @see Pedido::$modoPago
     */
    public function setModoPago($modoPago)
    {
        $this->modoPago = $modoPago;
    }
    
    /**
     * Returns $observaciones.
     * @see Pedido::$observaciones
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }
    
    /**
     * Sets $observaciones.
     * @param object $observaciones
     * @see Pedido::$observaciones
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    }
    
    /**
     * Returns $fechaRespuesta.
     * @see Pedido::$fechaRespuesta
     */
    public function getFechaRespuesta()
    {
        return $this->fechaRespuesta;
    }
    
    /**
     * Sets $fechaRespuesta.
     * @param object $fechaRespuesta
     * @see Pedido::$fechaRespuesta
     */
    public function setFechaRespuesta($fechaRespuesta)
    {
        $this->fechaRespuesta = $fechaRespuesta;
    }
	
    /**
     * Returns $bancoOrigen.
     * @see Pedido::$bancoOrigen
     */
    public function getBancoOrigen()
    {
        return $this->bancoOrigen;
    }
    
    /**
     * Sets $bancoOrigen.
     * @param object $bancoOrigen
     * @see Pedido::$bancoOrigen
     */
    public function setBancoOrigen($bancoOrigen)
    {
        $this->bancoOrigen = $bancoOrigen;
    }
// Constructor de la clase Pedido
function  Pedido()
{
 include_once  '../class/arraysql/arregloTablaCampos.php';
}
// Inserta datos de pedido en las tablas tb_pedido 

function Ingresar_Pedido($arregloValores = "", $arregloValores2 = "")
{
	$tabla = null;
	$data = null;
	$tabla2 = null;
	$data2 = null;
	$tabla3 = null;
	$data3 = null;
	
	
    $tabla[0] = 'tb_pedido'; 
	$data = new arregloTablaCampos($tabla);
	$data->PonerValores($arregloValores);
	$data->Insertar();
	
	if($this->Selecionar_PedidoUnico($arregloValores["codigoPedido"]) != null)
	{
	  // Cargo equipos_pedido
	foreach ($arregloValores2 as $index=> $valores)
	{
		
	$tabla2[0] = 'tb_equipo_subpedido';
	$data2 = new arregloTablaCampos($tabla2);
	$data2->PonerValores($valores);
	$data2->Insertar();
	
	}
	//Cargo tabla envio Inicializado datos
	  $array_shipping = null;
	  $array_shipping["pedido_id"] = $arregloValores["codigoPedido"];
	  $array_shipping["gasto_envio"] = 0.00;
	  $array_shipping["companie_id"] = 1;
	  $array_shipping["number_guia"] = "NULL";
	  $array_shipping["date_close"] = "NULL";
	  
	  $tabla3[0] = 'shippings';
	  $data3 = new arregloTablaCampos($tabla3);
	  $data3->PonerValores($array_shipping);
	  $data3->Insertar();
	  
	}
	
	
}
// Modifica los datos de un pedido
function Modificar_Pedido($codigo = 0, $arregloValores)
{ 
	$tabla = null;
	$data = null;
	$criterio = null;
	
	
    $tabla[0] = 'tb_pedido'; 
	$data = new arregloTablaCampos($tabla);
	$criterio['tb_pedido.codigoPedido'] = $codigo;
	$data->PonerCondicion($criterio);
	$data->PonerValores($arregloValores);
	$data->Modificar();
	
}
// Retorna un objeto de tipo Pedido recibiendo como parametro el codigo de ese pedido
function Selecionar_PedidoUnico($codigo = 0)
{

	$tabla = null;
	$data = null;
	$criterio = null;
	$pedido = null;
	$equipo = null;
	
    $tabla[0] = 'tb_pedido'; 
    $tabla[1] = 'users'; 
    
	$data = new arregloTablaCampos($tabla);
	$criterio['codigoPedido'] = $codigo;
        $criterio['tb_pedido.user_id'] = "users.user_id";
        
	$data->PonerCondicion($criterio);
    $row = $data->Seleccionar();
	
	if (count($row)>0)
	{
		$pedido = new Pedido();
		
		$pedido->setCodigo_Pedido($codigo);
		$pedido->setuser_id($row[1][2]);
		$pedido->setDireccion_Entrega($row[1][3]);
	        $pedido->setMontoAcumulado($row[1][4]);
		$pedido->setCuenta_Banc($row[1][5]);
		$pedido->setDeposito_Nro($row[1][6]);
		$pedido->setStatus_Pedido($row[1][7]);
		$pedido->setFecha_Deposito($row[1][8]);
		$pedido->setFecha_Entrega($row[1][9]);
		$pedido->setNro_RefBanca($row[1][10]);
		$pedido->setFacturador_Responsable($row[1][11]);
		$pedido->setFecha_Apertura($row[1][12]);
		$pedido->setActualizacion($row[1][13]);
		$pedido->setBanco($row[1][14]);
		$pedido->setMontoDepositado($row[1][15]);
		$pedido->setModoPago($row[1][16]);
		$pedido->setObservaciones($row[1][17]);
		$pedido->setFechaRespuesta($row[1][18]);
		$pedido->setBancoOrigen($row[1][19]);
                $pedido->setCliente($row[1][33]);
		
	}
	
	return $pedido;
	
        
}
// Retorna un objeto de tipo Pedido recibiendo como parametro el codigo de ese pedido
function Selecionar_PedidoUnicoCompleto($codigo = 0)
{

	$tabla = null;
	$data = null;
	$criterio = null;
	$pedido = null;
	$equipo = null;
	
    $tabla[0] = 'tb_pedido'; 
    $tabla[1] = 'users'; 
    $tabla[2] = 'shippings'; 
    $tabla[3] = 'companies'; 
    $tabla[4] = 'citys'; 
    $tabla[5] = 'states'; 
	$data = new arregloTablaCampos($tabla);
	$criterio['codigoPedido'] = $codigo;
        $criterio['tb_pedido.user_id'] = "users.user_id";
        $criterio['tb_pedido.codigoPedido'] = "shippings.pedido_id";
        $criterio['shippings.companie_id'] = "companies.company_id";
        $criterio['users.city_id'] = "citys.city_id";
        $criterio['users.state_id'] = "states.id_state";
	$data->PonerCondicion($criterio);
    $row = $data->Seleccionar();
	
	if (count($row)>0)
	{
		$pedido = new Pedido();
		
		$pedido->setCodigo_Pedido($codigo);
		$pedido->setuser_id($row[1][2]);
		$pedido->setDireccion_Entrega($row[1][3]);
	        $pedido->setMontoAcumulado($row[1][4]);
		$pedido->setCuenta_Banc($row[1][5]);
		$pedido->setDeposito_Nro($row[1][6]);
		$pedido->setStatus_Pedido($row[1][7]);
		$pedido->setFecha_Deposito($row[1][8]);
		$pedido->setFecha_Entrega($row[1][9]);
		$pedido->setNro_RefBanca($row[1][10]);
		$pedido->setFacturador_Responsable($row[1][11]);
		$pedido->setFecha_Apertura($row[1][12]);
		$pedido->setActualizacion($row[1][13]);
		$pedido->setBanco($row[1][14]);
		$pedido->setMontoDepositado($row[1][15]);
		$pedido->setModoPago($row[1][16]);
		$pedido->setObservaciones($row[1][17]);
		$pedido->setFechaRespuesta($row[1][18]);
		$pedido->setBancoOrigen($row[1][19]);
                $pedido->setCliente($row[1][33]);
		$pedido->setGasto_Envio($row[1][44]);
                $pedido->setNro_Guia($row[1][46]);
                $pedido->setFecha_Estimada($row[1][47]);
                $pedido->setCasa_Envio($row[1][49]);
                $pedido->setCiudad($row[1][53]);
                $pedido->setEstado($row[1][55]);
	}
	
	return $pedido;
	
        
}
// Retorna una lista de objetos de tipo Pedido recibiendo como parametro el codigo de conalot 
function Selecionar_Pedidos_User($user_id = 0)
{

	$tabla = null;
	$data = null;
	$criterio = null;
	$pedido = null;
	$equipo = null;
	$lista_Pedidos = null;
	
    $tabla[0] = 'tb_pedido'; 
	$data = new arregloTablaCampos($tabla);
	$criterio['tb_pedido.user_id'] = $user_id;
	$data->PonerCondicion($criterio);
    $row = $data->Seleccionar();
	
	if (count($row)>0)
	{
		$indice = 0;
		$ite = 1;
		
		while ($ite <= count($row))
		{
			
		$pedido = new Pedido();
		
		$pedido->setCodigo_Pedido($row[$ite][1]);
		$pedido->setuser_id($row[$ite][2]);
		$pedido->setDireccion_Entrega($row[$ite][3]);
		$pedido->setMontoAcumulado($row[$ite][4]);
		$pedido->setCuenta_Banc($row[$ite][5]);
		$pedido->setDeposito_Nro($row[$ite][6]);
		$pedido->setStatus_Pedido($row[$ite][7]);
		$pedido->setFecha_Deposito($row[$ite][8]);
		$pedido->setFecha_Entrega($row[$ite][9]);
		$pedido->setNro_RefBanca($row[$ite][10]);
		$pedido->setFacturador_Responsable($row[$ite][11]);
		$pedido->setFecha_Apertura($row[$ite][12]);
		$pedido->setActualizacion($row[$ite][13]);
		$pedido->setBanco($row[$ite][14]);
		$pedido->setMontoDepositado($row[$ite][15]);
		$pedido->setModoPago($row[$ite][16]);
		$pedido->setObservaciones($row[$ite][17]);
		$pedido->setFechaRespuesta($row[$ite][18]);
		$pedido->setBancoOrigen($row[$ite][19]);
		
		$lista_Pedidos[$indice] = $pedido;
		
		++$indice;
		++$ite;
		
		}
		
	}
	
	return $lista_Pedidos;
	
   
}
// Retorna una lista de objetos pedidos recibiendo como parametro un tipo de status de pedido
function Seleccionar_Pedidos($status = "")
{
	$tabla = null;
	$data = null;
	$criterio = null;
	$pedido = null;
	$lista_Pedidos = null;
	$equipo = null;
	
    $tabla[0] = 'tb_pedido'; 
	$data = new arregloTablaCampos($tabla);
	$criterio['tb_pedido.status'] = $status;
	$data->PonerCondicion($criterio);
    $row = $data->Seleccionar();
	
	
	if (count($row)>0)
	{
		$indice = 0;
		$ite = 1;
		
		while ($ite <= count($row))
		{
		$pedido = new Pedido();
	//	$equipo = new Equipo();
	 //   $relacion_eq = $equipo->Seleccionar_Equipos_Modelo($row[$ite][1]);
		
		$pedido->setCodigo_Pedido($row[$ite][1]);
		$pedido->setuser_id($row[$ite][2]);
		$pedido->setDireccion_Entrega($row[$ite][3]);
		$pedido->setMontoAcumulado($row[$ite][4]);
		$pedido->setCuenta_Banc($row[$ite][5]);
		$pedido->setDeposito_Nro($row[$ite][6]);
		$pedido->setStatus_Pedido($row[$ite][7]);
		$pedido->setFecha_Deposito($row[$ite][8]);
		$pedido->setFecha_Entrega($row[$ite][9]);
		$pedido->setNro_RefBanca($row[$ite][10]);
		$pedido->setFacturador_Responsable($row[$ite][11]);
		$pedido->setFecha_Apertura($row[$ite][12]);
		$pedido->setActualizacion($row[$ite][13]);
		$pedido->setBanco($row[$ite][14]);
		$pedido->setMontoDepositado($row[$ite][15]);
		$pedido->setModoPago($row[$ite][16]);
		$pedido->setObservaciones($row[$ite][17]);
		$pedido->setFechaRespuesta($row[$ite][18]);
		$pedido->setBancoOrigen($row[$ite][19]);
		
		$lista_Pedidos[$indice] = $pedido;
		
		++$indice;
		++$ite;
		
		}
	}
	
	return $lista_Pedidos;
	
}
// Retorna una lista de objetos pedidos recibiendo como parametro un tipo de status de pedido
function Seleccionar_Pedidos_Ciudad($city_id = 0)
{
	$tabla = null;
	$data = null;
	$criterio = null;
        $orden = null;
	$pedido = null;
	$lista_Pedidos = null;
	$equipo = null;
	
    $tabla[0] = 'tb_pedido'; 
    $tabla[1] = 'users'; 
	$data = new arregloTablaCampos($tabla);
        $criterio['users.city_id'] = $city_id;
        $criterio['tb_pedido.user_id'] = "users.user_id";
        $orden["codigoPedido"] = "codigoPedido";
        $data->PonerOrden($orden);
	$data->PonerCondicion($criterio);
    $row = $data->Seleccionar();
		
	if (count($row)>0)
	{
		$indice = 0;
		$ite = 1;
		
		while ($ite <= count($row))
		{
		$pedido = new Pedido();
	//	$equipo = new Equipo();
	 //   $relacion_eq = $equipo->Seleccionar_Equipos_Modelo($row[$ite][1]);
		
		$pedido->setCodigo_Pedido($row[$ite][1]);
		$pedido->setuser_id($row[$ite][2]);
		$pedido->setDireccion_Entrega($row[$ite][3]);
		$pedido->setMontoAcumulado($row[$ite][4]);
		$pedido->setCuenta_Banc($row[$ite][5]);
		$pedido->setDeposito_Nro($row[$ite][6]);
		$pedido->setStatus_Pedido($row[$ite][7]);
		$pedido->setFecha_Deposito($row[$ite][8]);
		$pedido->setFecha_Entrega($row[$ite][9]);
		$pedido->setNro_RefBanca($row[$ite][10]);
		$pedido->setFacturador_Responsable($row[$ite][11]);
		$pedido->setFecha_Apertura($row[$ite][12]);
		$pedido->setActualizacion($row[$ite][13]);
		$pedido->setBanco($row[$ite][14]);
		$pedido->setMontoDepositado($row[$ite][15]);
		$pedido->setModoPago($row[$ite][16]);
		$pedido->setObservaciones($row[$ite][17]);
		$pedido->setFechaRespuesta($row[$ite][18]);
		$pedido->setBancoOrigen($row[$ite][19]);
                $pedido->setCliente($row[1][33]);
		
		$lista_Pedidos[$indice] = $pedido;
		
		++$indice;
		++$ite;
		
		}
	}
	
	return $lista_Pedidos;
	
}
// Retorna una lista de todos los pedidos
function Seleccionar_TodosPedidos()
{
	$tabla = null;
	$data = null;
	$pedido = null;
	$lista_Pedidos = null;
	$equipo = null;
	
    $tabla[0] = 'tb_pedido'; 
	$data = new arregloTablaCampos($tabla);
    $row = $data->Seleccionar();
	
	
	if (count($row)>0)
	{
		$indice = 0;
		$ite = 1;
		
		while ($ite <= count($row))
		{
		$pedido = new Pedido();
		
		$pedido->setCodigo_Pedido($row[$ite][1]);
		$pedido->setuser_id($row[$ite][2]);
		$pedido->setDireccion_Entrega($row[$ite][3]);
		$pedido->setMontoAcumulado($row[$ite][4]);
		$pedido->setCuenta_Banc($row[$ite][5]);
		$pedido->setDeposito_Nro($row[$ite][6]);
		$pedido->setStatus_Pedido($row[$ite][7]);
		$pedido->setFecha_Deposito($row[$ite][8]);
		$pedido->setFecha_Entrega($row[$ite][9]);
		$pedido->setNro_RefBanca($row[$ite][10]);
		$pedido->setFacturador_Responsable($row[$ite][11]);
		$pedido->setFecha_Apertura($row[$ite][12]);
		$pedido->setActualizacion($row[$ite][13]);
		$pedido->setBanco($row[$ite][14]);
		$pedido->setMontoDepositado($row[$ite][15]);
		$pedido->setModoPago($row[$ite][16]);
		$pedido->setObservaciones($row[$ite][17]);
		$pedido->setFechaRespuesta($row[$ite][18]);
		$pedido->setBancoOrigen($row[$ite][19]);
		
		$lista_Pedidos[$indice] = $pedido;
		
		++$indice;
		++$ite;
		
		}
	}
	
	return $lista_Pedidos;
	
}
//Select Maximo Pedido ID
  public function  SelectMax_Id_Pedido()
        {
            $idMax =  0;
            $tabla = null;
	$data = null;
	$criterio = null;

	$tabla[0] = 'tb_pedido';

	$data = new arregloTablaCampos($tabla);
	$condicion['codigoPedido'] = "codigoPedido";
	$data->PonerCampoMax($condicion);
        $row = $data->SeleccionarMax();

       if (count($row)>0)
        {
           $idMax = $row[1][1];
        }

        return $idMax;

        }
// Anular Pedido
function Anular_Pedido($codigo = 0)
{
	$tabla = null;
	$data = null;
	$criterio = null;
	
    $tabla[0] = 'tb_pedido'; 
	$data = new arregloTablaCampos($tabla);
	$criterio['tb_pedido.codigoPedido'] = $codigo;
	$data->PonerCondicion($criterio);
	$Status['tb_pedido.status'] = 'ANULADO';
	$data->PonerValores($Status);
	$data->Modificar();
	
}
				
}
?>