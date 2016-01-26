<?php
class Equipo 
{
    
	// Atributos
        private $id = "";
        private $categoria = "";
        private $tipoEquipo = "";
        private $modelo = "";
		  private $reference = "";
	private $marca = "";
	private $nombre = "";
        private $foto = "";
        private $precio = "";	
        private $descuento = "";
        private $cantidad = 0;
	private $disponibilidad = "";
	private $inventario = 0;
        private $is_Nuevo = false;
        private $caracteristica = "";
        private $otros_detalles = "";
        
         public function getId() {
            return $this->id;
        }

        private function setId($id) {
            $this->id = $id;
        }
		
		 private function setReferencen($ref)
        {
            $this->reference = $ref;
        }
        
        public function getReference()
        {
            return $this->reference;
        }
        
        public function getDescuento() {
            return $this->descuento;
        }

        private function setDescuento($descuento) {
            $this->descuento = $descuento;
        }

                public function getIs_Nuevo() {
            return $this->is_Nuevo;
        }

        private function setIs_Nuevo($is_Nuevo) {
            $this->is_Nuevo = $is_Nuevo;
        }

                // Metodos Get  y Set
        
        private function setFoto($fotoIn)
        { 
            $this->foto = "http://www.mefamdd.com.ve/img/p/".$this->id."-".$fotoIn."-home.jpg";
        }
        
        public function getFoto()
        {  
           // return "<img src='../../photo/".$this->foto."' width='100' height='100' class=''/>";
            return "<img src='".$this->foto."' width='100' height='100' class=''/>";
        }
        /**
     * Sets $ategoria.
     * @param object $ategoria
     * @see Equipo::$ategoria
     */
    private function setCategoria($ategoria)
    {
        $this->categoria = $ategoria;
    }
    /**
     * Returns $categoria.
     * @see Equipo::$categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Returns $cantidad.
     * @see Equipo::$cantidad
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }
    
    /**
     * Sets $cantidad.
     * @param object $cantidad
     * @see Equipo::$cantidad
     */
    private function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }
    
    /**
     * Returns $marca.
     * @see Equipo::$marca
     */
    public function getMarca()
    {
        return $this->marca;
    }
    
    /**
     * Sets $marca.
     * @param object $marca
     * @see Equipo::$marca
     */
    private function setMarca($marca)
    {
        $this->marca = $marca;
    }
    
    /**
     * Returns $modelo.
     * @see Equipo::$modelo
     */
    public function getModelo()
    {
        return $this->modelo;
    }
    
    /**
     * Sets $modelo.
     * @param object $modelo
     * @see Equipo::$modelo
     */
    private function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }
    
    /**
     * Returns $nombre.
     * @see Equipo::$nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    
    /**
     * Sets $nombre.
     * @param object $nombre
     * @see Equipo::$nombre
     */
    private function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    
     public function getCaracteristicas()
    {
        return $this->caracteristica;
    }
    
    private function setCaracteristicas($caracter)
    {
        $this->caracteristica = $caracter;
    }
    
    public function getOtrosDetalles()
    {
        return $this->otros_detalles;
    }
    
    private function setOtrosDetalles($otros)
    {
        $this->otros_detalles = $otros;
    }
    
    /**
     * Returns $precio.
     * @see Equipo::$precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }
    
    /**
     * Sets $precio.
     * @param object $precio
     * @see Equipo::$precio
     */
    private function setPrecio($precio)
    {
        $this->precio = $precio;
    }
	 /**
     * Returns $disponibilidad.
     * @see Equipo::$disponibilidad
     */
    public function getDisponibilidad()
    {
        return $this->disponibilidad;
    }
    
    /**
     * Sets $disponibilidad.
     * @param object $disponibilidad
     * @see Equipo::$disponibilidad
     */
    private function setDisponibilidad($disponibilidad)
    {
        $this->disponibilidad = $disponibilidad;
    }
    
    /**
     * Returns $tipoEquipo.
     * @see Equipo::$tipoEquipo
     */
    public function getTipoEquipo()
    {
        return $this->tipoEquipo;
    }
    
    /**
     * Sets $tipoEquipo.
     * @param object $tipoEquipo
     * @see Equipo::$tipoEquipo
     */
    private function setTipoEquipo($tipoEquipo)
    {
        $this->tipoEquipo = $tipoEquipo;
    }
	/**
     * Returns $inventario.
     * @see Equipo::$inventario
     */
    public function getInventario()
    {
        return $this->inventario;
    }
    
    /**
     * Sets $inventario.
     * @param object $inventario
     * @see Equipo::$inventario
     */
    private function setInventario($inventario)
    {
        $this->inventario = $inventario;
    }
	//Constructor
	public function Equipo()
	{
            include_once  '../class/arraysql/arregloTablaCampos.php';
            include_once  '../class/arraysql/arregloTablaCampos2.php';
        }
	// Ingresar un equipo
	public function Ingresar_Equipo($arregloValores = "")
	{
		$tabla = null;
	    $data = null;
	
	
    $tabla[0] = 'products';
	$data = new arregloTablaCampos($tabla);
	$data->PonerValores($arregloValores);
	$data->Insertar();
	
	}
	// Modificar Equipo
	public function Modificar_Equipo($codigo = "", $arregloValores = null)
	{
		$tabla = null;
	$data = null;
	$criterio = null;
	
    $tabla[0] = 'products';
	$data = new arregloTablaCampos($tabla);
	$criterio['product_id'] = $codigo;
	$data->PonerCondicion($criterio);
	$data->PonerValores($arregloValores);
	$data->Modificar();
	
	}
	// Retorna un objeto de tipo Equipo recibiendo como parametro el modelo del mismo
	public function Seleccionar_Equipo_Id($id = "")
	{
    $tabla = null;
	$data = null;
	$criterio = null;
	$equipo = null;
	
	$tabla[0] = 'products';
     
	$data = new arregloTablaCampos($tabla);
	$criterio['product_id'] = $id;
      
	$data->PonerCondicion($criterio);
   $row = $data->Seleccionar();
   if (count($row)>0)
   {
   
   $equipo = new Equipo();
   $equipo->setId($row[1][1]);
    $equipo->setCategoria($row[$ite][4]);
   $equipo->setTipoEquipo($row[$ite][2]);
   $equipo->setMarca($row[$ite][3]);
   $equipo->setModelo($row[$ite][5]);  
   $equipo->setPrecio($row[1][7]);
   $equipo->setDescuento($row[1][8]);
   $equipo->setFoto($row[1][9]);  
   $equipo->setIs_Nuevo($row[1][10]);
   $equipo->setDisponibilidad($row[1][11]);
   $equipo->setNombre($row[1][12]);
   $equipo->setInventario($row[1][13]);
   
   }
   
   return $equipo;
   
	}
	// Retorna una lista de objetos de tipo Equipo recibiendo como parametro el numero de sub-pedido
	public function Seleccionar_Equipos_SubPedido($subpedido = 0)
	{
    $tabla = null;
	$data = null;
	$criterio = null;
	$equipo = null;
	$lista_equipo = null;
	
	$tabla[0] = 'products';
	$tabla[2] = 'equipos_subpedido';
	$data = new arregloTablaCampos($tabla);
	$criterio['codigoSubpedido'] = $subpedido;
	$criterio['products.product_id'] = 'equipos_subpedido.product_id';
	$data->PonerCondicion($criterio);
   $row = $data->Seleccionar();
   if (count($row)>0)
   {
   	$ite = 1;
	$indice = 0;
   	while($ite <= count($row))
	{
   $equipo = new Equipo();
   $equipo->setId($row[$ite][1]);
    $equipo->setCategoria($row[$ite][4]);
   $equipo->setTipoEquipo($row[$ite][2]);
   $equipo->setMarca($row[$ite][3]);
   $equipo->setModelo($row[$ite][5]);  
   $equipo->setCantidad($row[$ite][16]);
   $equipo->setPrecio($row[$ite][7]);
   $equipo->setDescuento($row[$ite][8]);
   $equipo->setFoto($row[$ite][9]);  
   $equipo->setIs_Nuevo($row[$ite][10]);
   $equipo->setDisponibilidad($row[$ite][11]);
   $equipo->setNombre($row[$ite][12]);
   $equipo->setInventario($row[$ite][13]);
   
   
   $lista_equipo[$indice] = $equipo;
   
   ++$ite;
   ++$indice;
   }
   }
   
   return $lista_equipo;
   
	}
        // Retorna una lista de objetos de tipo Equipo recibiendo como parametro la categoria del equipo
	public function Seleccionar_Equipos_Id_Lang($id = "")
	{
    $tabla = null;
	$data = null;
	$criterio = null;
	$equipo = null;
        $grupo = null;
	$lista_equipo = null;
        
        if($id == "")
        {$id = "0";}
	
	 $tabla[0] = "ps_product";
        $tabla[1] = "ps_product_lang";
        $tabla[2] = "ps_image";
        $tabla[3] = "ps_manufacturer";
        $tabla[4] = "ps_supplier";
        $tabla[5] = "ps_category_lang";

	$data = new arregloTablaCampos2($tabla);
        $criterio['ps_product.id_product'] = $id;
        $criterio['ps_product.active'] = "1";
        $criterio['ps_product_lang.id_lang'] = "3";
        $criterio['ps_product_lang.id_product'] = "ps_product.id_product";
        $criterio['ps_image.id_product'] = "ps_product.id_product";
        $criterio['ps_product.id_manufacturer'] = "ps_manufacturer.id_manufacturer";
        $criterio['ps_product.id_supplier'] = "ps_supplier.id_supplier";
        $criterio['ps_category_lang.id_category'] = "ps_product.id_category_default";
        $grupo['ps_product_lang.name'] ="ps_product_lang.name";
        $data->PonerAgrupamiento($grupo);
	$data->PonerCondicion($criterio);
   $row = $data->SeleccionarEspecifico();
   if (count($row)>0)
   {
   	$ite = 1;
	$indice = 0;
   	while($ite <= count($row))
	{
  $equipo = new Equipo();
   $equipo->setId($row[$ite][1]);
   $equipo->setCategoria($row[$ite][11]);
   $equipo->setTipoEquipo($row[$ite][11]);
   $equipo->setMarca($row[$ite][10]);
   $equipo->setModelo($row[$ite][3]);  
   $equipo->setPrecio($row[$ite][2]);
   $equipo->setDescuento($row[$ite][4]);
   $equipo->setFoto($row[$ite][9]);  
   $equipo->setDisponibilidad($row[$ite][5]);
   $equipo->setNombre($row[$ite][6]);
   $equipo->setCaracteristicas($row[$ite][7]);
   $equipo->setOtrosDetalles($row[$ite][8]);
   $equipo->setInventario($row[$ite][5]);
  
   $lista_equipo[$indice] = $equipo;
   
   ++$ite;
   ++$indice;
   }
   }
   
   return $lista_equipo;
   
	}
	// Retorna una lista de objetos de tipo Equipo recibiendo como parametro el tipo de equipo
	public function Seleccionar_Equipos_Tipo($tipo = "")
	{
    $tabla = null;
	$data = null;
	$criterio = null;
	$equipo = null;
	$lista_equipo = null;
	
	$tabla[0] = 'products';
	$data = new arregloTablaCampos($tabla);
        $criterio['type_id'] = "'".$tipo."'";
      
	$data->PonerCondicion($criterio);
   $row = $data->Seleccionar();
   if (count($row)>0)
   {
   	$ite = 1;
	$indice = 0;
   	while($ite <= count($row))
	{
  $equipo = new Equipo();
   $equipo->setId($row[$ite][1]);
    $equipo->setCategoria($row[$ite][4]);
   $equipo->setTipoEquipo($row[$ite][2]);
   $equipo->setMarca($row[$ite][3]);
   $equipo->setModelo($row[$ite][5]);  
   $equipo->setPrecio($row[$ite][7]);
   $equipo->setDescuento($row[$ite][8]);
   $equipo->setFoto($row[$ite][9]);  
   $equipo->setIs_Nuevo($row[$ite][10]);
   $equipo->setDisponibilidad($row[$ite][11]);
   $equipo->setNombre($row[$ite][12]);
   $equipo->setInventario($row[$ite][13]);
  
   $lista_equipo[$indice] = $equipo;
   
   ++$ite;
   ++$indice;
   }
   }
   
   return $lista_equipo;
   
	}
        // Retorna una lista de objetos de tipo Equipo recibiendo como parametro la marca del equipo
	public function Seleccionar_Equipos_Marca($marca = "")
	{
    $tabla = null;
	$data = null;
	$criterio = null;
	$equipo = null;
	$lista_equipo = null;
	
	$tabla[0] = 'products';
       
	$data = new arregloTablaCampos($tabla);
        $criterio['products.id_brand'] =  "'".$marca."'";
	$data->PonerCondicion($criterio);
   $row = $data->Seleccionar();
   if (count($row)>0)
   {
   	$ite = 1;
	$indice = 0;
   	while($ite <= count($row))
	{
  $equipo = new Equipo();
   $equipo->setId($row[$ite][1]);
    $equipo->setCategoria($row[$ite][4]);
   $equipo->setTipoEquipo($row[$ite][2]);
   $equipo->setMarca($row[$ite][3]);
   $equipo->setModelo($row[$ite][5]);  
   $equipo->setPrecio($row[$ite][7]);
   $equipo->setDescuento($row[$ite][8]);
   $equipo->setFoto($row[$ite][9]);  
   $equipo->setIs_Nuevo($row[$ite][10]);
   $equipo->setDisponibilidad($row[$ite][11]);
   $equipo->setNombre($row[$ite][12]);
   $equipo->setInventario($row[$ite][13]);
  
   $lista_equipo[$indice] = $equipo;
   
   ++$ite;
   ++$indice;
   }
   }
   
   return $lista_equipo;
   
	}
        // Retorna una lista de objetos de tipo Equipo recibiendo como parametro el modelo del equipo
	public function Seleccionar_Equipos_Modelo($modelo = "")
	{
    $tabla = null;
	$data = null;
	$criterio = null;
	$equipo = null;
	$lista_equipo = null;
	
	$tabla[0] = 'products';
       
	$data = new arregloTablaCampos($tabla);
        $criterio['model_id2'] ="'".$modelo."'";
	$data->PonerCondicion($criterio);
   $row = $data->Seleccionar();
   if (count($row)>0)
   {
   	$ite = 1;
	$indice = 0;
   	while($ite <= count($row))
	{
  $equipo = new Equipo();
   $equipo->setId($row[$ite][1]);
   $equipo->setCategoria($row[$ite][4]);
   $equipo->setTipoEquipo($row[$ite][2]);
   $equipo->setMarca($row[$ite][3]);
   $equipo->setModelo($row[$ite][5]);  
   $equipo->setPrecio($row[$ite][7]);
   $equipo->setDescuento($row[$ite][8]);
   $equipo->setFoto($row[$ite][9]);  
   $equipo->setIs_Nuevo($row[$ite][10]);
   $equipo->setDisponibilidad($row[$ite][11]);
   $equipo->setNombre($row[$ite][12]);
   $equipo->setInventario($row[$ite][13]);
  
   $lista_equipo[$indice] = $equipo;
   
   ++$ite;
   ++$indice;
   }
   }
   
   return $lista_equipo;
   
	}
        
        public function Buscar_Equipo_Like($parametro = "")
        {
             $tabla = null;
	$data = null;
	$criterio = null;
	$equipo = null;
        $grupo = null;
	$lista_equipo = null;
	
	//$tabla[0] = 'products';
        $tabla[0] = "ps_product";
        $tabla[1] = "ps_product_lang";
        $tabla[2] = "ps_image";
        $tabla[3] = "ps_manufacturer";
        $tabla[4] = "ps_supplier";
        $tabla[5] = "ps_category_lang";
       
	$data = new arregloTablaCampos2($tabla);
      //  $criterio['model_id2'] =$parametro;
       
        $criterio['ps_product.active'] = "1";
        $criterio['ps_image.position'] = "1";
        $criterio['ps_product.id_product'] = "ps_product_lang.id_product";      
        $criterio['ps_image.id_product'] = "ps_product.id_product";
        $criterio['ps_product.id_manufacturer'] = "ps_manufacturer.id_manufacturer";
        $criterio['ps_product.id_supplier'] = "ps_supplier.id_supplier";
        $criterio['ps_category_lang.id_category'] = "ps_product.id_category_default";
        $criterio['ps_category_lang.name'] =$parametro;
        $grupo['ps_category_lang.name'] ="ps_category_lang.name";
        $data->PonerAgrupamiento($grupo);
	$data->PonerCondicion($criterio);
   $row = $data->SeleccionarconLike();
  if (count($row) == 0)
   {    $criterio = null;
        $grupo = null;
       $data = new arregloTablaCampos2($tabla);
          $criterio['ps_product.active'] = "1";
        $criterio['ps_image.position'] = "1";
        $criterio['ps_product.id_product'] = "ps_product_lang.id_product";      
        $criterio['ps_image.id_product'] = "ps_product.id_product";
        $criterio['ps_product.id_manufacturer'] = "ps_manufacturer.id_manufacturer";
        $criterio['ps_product.id_supplier'] = "ps_supplier.id_supplier";
        $criterio['ps_category_lang.id_category'] = "ps_product.id_category_default";
        $criterio['ps_manufacturer.name'] =$parametro;
        $grupo['ps_category_lang.name'] ="ps_category_lang.name";
        $data->PonerAgrupamiento($grupo);
	$data->PonerCondicion($criterio);
       $row = $data->SeleccionarconLike();
       
        if (count($row) == 0)
        {   $criterio = null;
            $grupo = null;
            $data = new arregloTablaCampos2($tabla);
         $criterio['ps_product.active'] = "1";
        $criterio['ps_image.position'] = "1";
        $criterio['ps_product.id_product'] = "ps_product_lang.id_product";      
        $criterio['ps_image.id_product'] = "ps_product.id_product";
        $criterio['ps_product.id_manufacturer'] = "ps_manufacturer.id_manufacturer";
        $criterio['ps_product.id_supplier'] = "ps_supplier.id_supplier";
        $criterio['ps_category_lang.id_category'] = "ps_product.id_category_default";
        $criterio['ps_product.ean13'] =$parametro;
        $grupo['ps_category_lang.name'] ="ps_category_lang.name";
        $data->PonerAgrupamiento($grupo);
	$data->PonerCondicion($criterio);
       $row = $data->SeleccionarconLike();
       
           if (count($row) == 0)
            {   $criterio = null;
               $grupo = null;
                $data = new arregloTablaCampos2($tabla);
            $criterio['ps_product.active'] = "1";
        $criterio['ps_image.position'] = "1";
        $criterio['ps_product.id_product'] = "ps_product_lang.id_product";      
        $criterio['ps_image.id_product'] = "ps_product.id_product";
        $criterio['ps_product.id_manufacturer'] = "ps_manufacturer.id_manufacturer";
        $criterio['ps_product.id_supplier'] = "ps_supplier.id_supplier";
        $criterio['ps_category_lang.id_category'] = "ps_product.id_category_default";
        $criterio['ps_product.reference'] =$parametro;
        $grupo['ps_category_lang.name'] ="ps_category_lang.name";
        $data->PonerAgrupamiento($grupo);
            $data->PonerCondicion($criterio);
            $row = $data->SeleccionarconLike();
            
             if (count($row) == 0)
            {   $criterio = null;
               $grupo = null;
                $data = new arregloTablaCampos2($tabla);
           $criterio['ps_product.active'] = "1";
        $criterio['ps_image.position'] = "1";
        $criterio['ps_product.id_product'] = "ps_product_lang.id_product";      
        $criterio['ps_image.id_product'] = "ps_product.id_product";
        $criterio['ps_product.id_manufacturer'] = "ps_manufacturer.id_manufacturer";
        $criterio['ps_product.id_supplier'] = "ps_supplier.id_supplier";
        $criterio['ps_category_lang.id_category'] = "ps_product.id_category_default";
        $criterio['ps_product_lang.name'] =$parametro;
        $grupo['ps_category_lang.name'] ="ps_category_lang.name";
        $data->PonerAgrupamiento($grupo);
            $data->PonerCondicion($criterio);
            $row = $data->SeleccionarconLike();
            
             if (count($row) == 0)
            {   $criterio = null;
               $grupo = null;
                $data = new arregloTablaCampos2($tabla);
             $criterio['ps_product.active'] = "1";
        $criterio['ps_image.position'] = "1";
        $criterio['ps_product.id_product'] = "ps_product_lang.id_product";      
        $criterio['ps_image.id_product'] = "ps_product.id_product";
        $criterio['ps_product.id_manufacturer'] = "ps_manufacturer.id_manufacturer";
        $criterio['ps_product.id_supplier'] = "ps_supplier.id_supplier";
        $criterio['ps_category_lang.id_category'] = "ps_product.id_category_default";
        $criterio['ps_product_lang.description'] =$parametro;
        $grupo['ps_category_lang.name'] ="ps_category_lang.name";
        $data->PonerAgrupamiento($grupo);
            $data->PonerCondicion($criterio);
            $row = $data->SeleccionarconLike();
            
            if (count($row) == 0)
            {   $criterio = null;
               $grupo = null;
                $data = new arregloTablaCampos2($tabla);
             $criterio['ps_product.active'] = "1";
        $criterio['ps_image.position'] = "1";
        $criterio['ps_product.id_product'] = "ps_product_lang.id_product";      
        $criterio['ps_image.id_product'] = "ps_product.id_product";
        $criterio['ps_product.id_manufacturer'] = "ps_manufacturer.id_manufacturer";
        $criterio['ps_product.id_supplier'] = "ps_supplier.id_supplier";
        $criterio['ps_category_lang.id_category'] = "ps_product.id_category_default";
        $criterio['ps_product_lang.description_short'] =$parametro;
        $grupo['ps_category_lang.name'] ="ps_category_lang.name";
        $data->PonerAgrupamiento($grupo);
            $data->PonerCondicion($criterio);
            $row = $data->SeleccionarconLike();
            
            if (count($row) == 0)
            {   $criterio = null;
               $grupo = null;
                $data = new arregloTablaCampos2($tabla);
            $criterio['ps_product.active'] = "1";
        $criterio['ps_image.position'] = "1";
        $criterio['ps_product.id_product'] = "ps_product_lang.id_product";      
        $criterio['ps_image.id_product'] = "ps_product.id_product";
        $criterio['ps_product.id_manufacturer'] = "ps_manufacturer.id_manufacturer";
        $criterio['ps_product.id_supplier'] = "ps_supplier.id_supplier";
        $criterio['ps_category_lang.id_category'] = "ps_product.id_category_default";
        $criterio['ps_product_lang.link_rewrite'] =$parametro;
        $grupo['ps_category_lang.name'] ="ps_category_lang.name";
        $data->PonerAgrupamiento($grupo);
            $data->PonerCondicion($criterio);
            $row = $data->SeleccionarconLike();
            
            }
            
            }
            
            }
            
            }
            
            }
        
        }
   }
   
    if (count($row) > 0)
   {
   	$ite = 1;
	$indice = 0;
   	while($ite <= count($row))
	{
  $equipo = new Equipo();
   $equipo->setId($row[$ite][1]);
   $equipo->setCategoria($row[$ite][11]);
   $equipo->setTipoEquipo($row[$ite][11]);
   $equipo->setMarca($row[$ite][10]);
   $equipo->setModelo($row[$ite][3]);  
   $equipo->setPrecio($row[$ite][2]);
   $equipo->setDescuento($row[$ite][4]);
   $equipo->setFoto($row[$ite][9]);  
   $equipo->setDisponibilidad($row[$ite][5]);
   $equipo->setNombre($row[$ite][6]);
   $equipo->setInventario($row[$ite][5]);
  
   $lista_equipo[$indice] = $equipo;
   
   ++$ite;
   ++$indice;
   }
   }
   
   return $lista_equipo;
   
        }
	// Retorna una lista de objetos de tipo Equipo recibiendo como parametro la disponibilidad de equipo
	function Seleccionar_Equipos_Disponibilidad($disponibilidad = 0)
	{
    $tabla = null;
	$data = null;
	$criterio = null;
	$equipo = null;
	$lista_equipo = null;
	
	$tabla[0] = 'products';
      
	$data = new arregloTablaCampos($tabla);
	$criterio['visible'] = $disponibilidad;
	$data->PonerCondicion($criterio);
   $row = $data->Seleccionar();
   if (count($row)>0)
   {
   	$ite = 1;
	$indice = 0;
   	while($ite <= count($row))
	{
   $equipo = new Equipo();
  $equipo->setId($row[$ite][1]);
   $equipo->setCategoria($row[$ite][4]);
   $equipo->setTipoEquipo($row[$ite][2]);
   $equipo->setMarca($row[$ite][3]);
   $equipo->setModelo($row[$ite][5]);  
   $equipo->setPrecio($row[$ite][7]);
   $equipo->setDescuento($row[$ite][8]);
   $equipo->setFoto($row[$ite][9]);  
   $equipo->setIs_Nuevo($row[$ite][10]);
   $equipo->setDisponibilidad($row[$ite][11]);
   $equipo->setNombre($row[$ite][12]);
   $equipo->setInventario($row[$ite][13]);
   
   $lista_equipo[$indice] = $equipo;
   
   ++$ite;
   ++$indice;
   }
   }
   
   return $lista_equipo;
   
	}
	//Obtiene producto ofertado de mercado libre
	public function ObtenerProductoOfertado($user_id = 0)
	{
		$tabla = null;
		$data = null;
		$criterio = null;
		$equipo = null;
	
		$tabla[0] = 'ventas_ml';
		 
		$data = new arregloTablaCampos($tabla);
		$criterio['id_user'] = $user_id;
		$data->PonerCondicion($criterio);
		$row = $data->Seleccionar();
		 
		if (count($row)>0)
		{
			$tabla = null;
			$data = null;
			$criterio2 = null;
	
			$tabla[0] = "ps_product";
			$tabla[1] = "ps_product_lang";
			$tabla[2] = "ps_manufacturer";
			$tabla[3] = "ps_category_lang";
			 
			$data = new arregloTablaCampos2($tabla);
			 
			$criterio2['ps_category_lang.id_lang'] = "3";
			$criterio2['ps_product_lang.id_lang'] = "3";
			$criterio2['ps_product_lang.id_product'] = "ps_product.id_product";
			$criterio2['ps_product.id_manufacturer'] = "ps_manufacturer.id_manufacturer";
			$criterio2['ps_category_lang.id_category'] = "ps_product.id_category_default";
			$criterio2['ps_product.id_product'] = $row[1][3];
			 
			$data->PonerCondicion($criterio2);
			$row2 = $data->Seleccionar();
			 
			if(count($row2)>0)
			{
				$equipo = new Equipo();
				$equipo->setCategoria($row2[1][53]);
				$equipo->setTipoEquipo($row2[1][53]);
				$equipo->setMarca($row2[1][48]);
				$equipo->setModelo($row2[1][21]);
				$equipo->setPrecio($row[1][5]);
				$equipo->setNombre($row2[1][44]);
				$equipo->setCantidad($row[1][4]);
	
			}
	
		}
		return $equipo;
	}
	// Retorna una lista de objetos de tipo Equipo de todos
	function Seleccionar_Equipos_Todos()
	{
    $tabla = null;
	$data = null;
	$equipo = null;
	$lista_equipo = null;
	
	$tabla[0] = 'products';
    
	$data = new arregloTablaCampos($tabla);
   $row = $data->Seleccionar();
   if (count($row)>0)
   {
   	$ite = 1;
	$indice = 0;
   	while($ite <= count($row))
	{
   $equipo = new Equipo();
   $equipo->setId($row[$ite][1]);
   $equipo->setCategoria($row[$ite][4]);
   $equipo->setTipoEquipo($row[$ite][2]);
   $equipo->setMarca($row[$ite][3]);
   $equipo->setModelo($row[$ite][5]);  
   $equipo->setPrecio($row[$ite][7]);
   $equipo->setDescuento($row[$ite][8]);
   $equipo->setFoto($row[$ite][9]);  
   $equipo->setIs_Nuevo($row[$ite][10]);
   $equipo->setDisponibilidad($row[$ite][11]);
   $equipo->setNombre($row[$ite][12]);
   $equipo->setInventario($row[$ite][13]);
  
   $lista_equipo[$indice] = $equipo;
   
   ++$ite;
   ++$indice;
   }
   }
   
   return $lista_equipo;
   
	}
        
        //Select Maximo Product ID
  public function  SelectMax_Id_Equipo()
        {
            $idMax =  0;
            $tabla = null;
	$data = null;
	$criterio = null;

	$tabla[0] = 'products';

	$data = new arregloTablaCampos($tabla);
	$condicion['product_id'] = "product_id";
	$data->PonerCampoMax($condicion);
        $row = $data->SeleccionarMax();

       if (count($row)>0)
        {
           $idMax = $row[1][1];
        }

        return $idMax;

        }
  //Lista los Tipos categorias de Equipo
  public function  Listar_Categorias_Equipo()
  {
        $tabla = null;
	$data = null;
	$orden = null;
	$equipo = null;
	$lista_equipo = null;
	$condicion = null;
	
	//$tabla[0] = 'ps_category_lang';
        $tabla[0] = 'ps_category_lang';
       
	$data = new arregloTablaCampos2($tabla);
        $orden['name'] ="name";
	     $condicion['id_lang'] = "3";
		 $data->PonerCondicion($condicion);
	$data->PonerOrden($orden);
   $row = $data->Seleccionar();
   if (count($row)>0)
   {
   	$ite = 1;
	$indice = 0;
   	while($ite <= count($row))
	{
	      if( !($row[$ite][1] == 1))
            { 
  $equipo = new Equipo();
  
   $equipo->setCategoria($row[$ite][3]);
   $equipo->setTipoEquipo($row[$ite][3]);
  
   $lista_equipo[$indice] = $equipo;
   
   ++$indice;
          }
		  ++$ite;
   }
   }
   
   return $lista_equipo;
  }
  //Seleciona una categoria con Id de paramero
  public function Dame_Categoria_Name($name)
  {
       $tabla = null;
       $data = null;
       $condicion = null;
       $categoria = null;
       
      // $tabla[0] = 'ps_category_lang';
      $tabla[0] = 'ps_category_lang';
       
	$data = new arregloTablaCampos2($tabla);
        $condicion["name"] = "'".$name."'";;
        $data->PonerCondicion($condicion);
         $row = $data->Seleccionar();
   if (count($row)>0)
   {
       $categoria = $row[1][3];
   }
   
     return $categoria;

  }
   //Lista los Tipos categorias de Equipo
  public function  Listar_Marcas_Equipo()
  {
        $tabla = null;
	$data = null;
	$orden = null;
        $grupo = null;
	$equipo = null;
	$lista_equipo = null;
	
	//$tabla[0] = 'ps_manufacturer';
        $tabla[0] = 'ps_manufacturer';
       
	$data = new arregloTablaCampos2($tabla);
        $grupo['name'] ="name";
        $orden['name'] ="name";
        $data->PonerAgrupamiento($grupo);
	$data->PonerOrden($orden);
   $row = $data->Seleccionar();
   if (count($row)>0)
   {
   	$ite = 1;
	$indice = 0;
   	while($ite <= count($row))
	{
  $equipo = new Equipo();
  
   $equipo->setMarca($row[$ite][2]);
  
   $lista_equipo[$indice] = $equipo;
   
   ++$ite;
   ++$indice;
   }
   }
   
   return $lista_equipo;
  }
  //Seleciona una categoria con Id de paramero
  public function Dame_Marca_Name($name)
  {
       $tabla = null;
       $data = null;
       $condicion = null;
       $marca = null;
       
       //$tabla[0] = 'ps_manufacturer';
        $tabla[0] = 'ps_manufacturer';
       
	$data = new arregloTablaCampos2($tabla);
        $condicion["name"] = "'".$name."'";
        $data->PonerCondicion($condicion);
         $row = $data->Seleccionar();
   if (count($row)>0)
   {
       $marca  = $row[1][2];
   }
   
     return $marca;

  }
  
    public function  Seleccionar_Equipo_Categoria($name_Cat)
  {
       $tabla = null;
       $data = null;
       $condicion = null;
       $categoria = null;
       
      // $tabla[0] = 'ps_category_lang';
      $tabla[0] = 'ps_category_lang';
       
	$data = new arregloTablaCampos2($tabla);
        $condicion["name"] = "'".$name_Cat."'";;
        $data->PonerCondicion($condicion);
         $row = $data->Seleccionar();
   if (count($row)>0)
   {
       $categoria = $row[1][1];
   }
   
        $tabla = null;
	$data = null;
	$orden = null;     
	$equipo = null;
        $condicion = null;
	$lista_equipo = null;
		
        $tabla[0] = 'ps_product';
        $tabla[1] = 'ps_product_lang';
        
       if( $categoria != 1)
	   {
	$data = new arregloTablaCampos2($tabla);
        $orden['ps_product_lang.name'] ="ps_product_lang.name";
	$data->PonerOrden($orden);
        $condicion["id_category_default"] = $categoria;
        $condicion["id_lang"] = 3;
        $condicion['ps_product.id_product'] = "ps_product_lang.id_product";
        $data->PonerCondicion($condicion);
   $row = $data->Seleccionar();
   if (count($row)>0)
   {
   	$ite = 1;
	$indice = 0;
   	while($ite <= count($row))
	{
  $equipo = new Equipo();
  
   $equipo->setReferencen($row[$ite][21]);
   $equipo->setNombre($row[$ite][44]);
   $equipo->setPrecio($row[$ite][15]);
  
   $lista_equipo[$indice] = $equipo;
   
   ++$ite;
   ++$indice;
   }
   }
   }
   return $lista_equipo;
  }
}
?>
