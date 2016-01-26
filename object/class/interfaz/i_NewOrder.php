<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of i_Registro
 *
 * @author Pablo Moya
 */

require_once ('../../object/view/view_base.php');
require_once ('interface_Contenido.php');
require_once "../../object/class/other/field.php";
require_once "../../object/class/entity/Pais.php";
require_once "../../object/class/entity/Estado.php";
require_once "../../object/class/entity/Equipo.php";
require_once "../../object/class/entity/Usuario.php";
require_once "../../object/class/entity/Ciudad.php";
require_once "../../object/class/entity/Banco.php";
require_once ("../../lib/classlibFecHor.php");

class I_NewOrder extends View_base implements Interface_Contenido{
 //put your code here
    private $formulario = null;
    private $quitar = null;

    public function __construct($titulo,$post,$new,$del) {
        $this->Set_JS("<script type='text/javascript' src='../../dinamy/js/js_registro.js'></script>");
        $this->Set_Style("<link href='../../style/css/mefamdd.css' rel='stylesheet' type='text/css'>");
        
        parent::__construct($titulo, $this->js, $this->css, null, true);
        $this->arrayPost = $post;
      
        if($new == 1)
        { $this->FinalizarSession();}
        
        $this->quitar = $del;
   
        $this->Set_Mensaje("<p>Solicitud de Envio Microelectronic Famdd C.A</p>");
   $this->Get_Mensaje();
   
   $this->preparedDatosForm();
   
   echo $this->formulario;
   
   $this->CerrarHiperTexto();
   
    }
/**
 * @return unknown_type
 */
private function preparedDatosForm()
{
$isLleno = true;
$carro = false;
        $ite = 0;
        while ($ite<22)
        {
            if($ite < 16)
            {
            if($this->arrayPost[$ite] != null)
            {$isLleno &= true;}
            else
            {
                if($ite != 7)
                {$isLleno &= false;}
            }
            }
            
            ++$ite;
        }
        
         $item = null;
        if($this->arrayPost[16] != null && $this->arrayPost[17] != null && $this->arrayPost[18] != null && $this->arrayPost[19] != null && $this->arrayPost[20] != null && $this->arrayPost[21] != null)
        {
        $equipo = null;   
        $carro = true;
        $equipo[0] = $this->arrayPost[16];
        $equipo[1] = $this->arrayPost[17];
        $equipo[2] = $this->arrayPost[18];
        $equipo[3] = $this->arrayPost[19];
        $equipo[4] = $this->arrayPost[20];
        $equipo[5] = $this->arrayPost[21];
        $item = $equipo;    
         $this->arrayPost[16] = null;
         $this->arrayPost[17] = null;
         $this->arrayPost[18] = null;
         $this->arrayPost[19] = null;
         $this->arrayPost[20] = null;
         $this->arrayPost[21] = null;
        }
$itemsEnCesta=$_SESSION['itemsEnCesta']; 

if ($item){ 
    $isLleno = false;
   if (!isset($itemsEnCesta)){ 
      $itemsEnCesta[0]=$item; 
   }else{ 
       $cont = 0;
      foreach($itemsEnCesta as $k => $v){ 
         if ($item==$v){ 
         $itemsEnCesta[$k]+=$item; 
         $encontrado=1; 
         } 
         ++$cont;
      } 
      if (!$encontrado) $itemsEnCesta[$cont]=$item; 
   } 
}

if($this->quitar != null)
{  $isLleno = false;
    if (isset($itemsEnCesta))
    {   $itemsEnCestaTemp = null;
        foreach($itemsEnCesta as $k => $v){ 
         if ($this->quitar!=$k){ 
         $itemsEnCestaTemp[$k]=$v;      
         } 

      } 
      
      $itemsEnCesta =  $itemsEnCestaTemp;
    }
}
$_SESSION['itemsEnCesta']=$itemsEnCesta; 
    $alerta = null;
if(!isset($itemsEnCesta) && $isLleno)
        { $isLleno = false;
         $alerta = "Debes agregar por lo menos un Producto.";
        }
        
        if(!$isLleno)
        {
            if($alerta != null)
            { echo "<font face= 'arial' color = 'red'>".$alerta."</font>";}
            
        $campo2 = new Field();
        
        $campo2->setLabel1("DATOS BASICOS");
        $campo2->setEtiqueta("label");
        $campo2->setSize(30);
        
        $user = new Usuario();
        $equipo = new Equipo();
        
        $userObten = null;
        $equipoObten = null;
         
        if($this->arrayPost[7] != null && !$isLleno)
        {

        	$userObten = $user->SeleccionarUsuario_Apodo($this->arrayPost[7]);
        	if($userObten != null)
        	{
        		$this->arrayPost[6] = $userObten->getRazon_social();
        		$this->arrayPost[2] = $userObten->getNombres();
        		$this->arrayPost[7] = $userObten->getSeudonimo();
        		$this->arrayPost[0] = substr($userObten->getRif_ci(),0,1);
        		$this->arrayPost[1] = substr($userObten->getRif_ci(),1);
        		$this->arrayPost[3] = substr($userObten->getTelefonoLocal(),0,4);
        		$this->arrayPost[4] = substr($userObten->getTelefonoLocal(),4);
        		$this->arrayPost[5] = $userObten->getEmail();
        		$this->arrayPost[11] = $userObten->getDireccion();
        		$this->arrayPost[8] = $userObten->getPais();
				if( $this->arrayPost[9] == null)
        		{ $this->arrayPost[9] = $userObten->getEstado(); }
				if( $this->arrayPost[10] == null)
        		{ $this->arrayPost[10] = $userObten->getCiudad(); }
        		 
        		if(!$carro)
        		{
        		$equipoObten = $equipo->ObtenerProductoOfertado($userObten->getUser_id());
        		if($equipoObten != null)
        		{
        			$this->arrayPost[16] = $equipoObten->getCantidad();
        			$this->arrayPost[17] = $equipoObten->getCategoria();
        			$this->arrayPost[18] = $equipoObten->getMarca();
        			$this->arrayPost[19] = $equipoObten->getModelo();
        			$this->arrayPost[20] = $equipoObten->getPrecio();
        			$this->arrayPost[21] = $equipoObten->getNombre();
        
        		}
        		}
        	}
        
        }
        
        $campo15 = new Field();
        
        $campo15->setLabel1("Seud&oacute;nimo Comercial:");
        $campo15->setEtiqueta("input");
        $campo15->setName("seudonimo");
        $campo15->setSize(30);
        $campo15->setType("text");
        $campo15->setMaxLenth(100);
        $campo15->setValue($this->arrayPost[7]);
        $campo15->setLabel2("(Si posee Apodo M.L y ha ofertado coloquelo y haga click)");
        $campo15->setOnClick('if(rellenarForm(this.form)) { document.f2.action = "neworder.php";  document.f2.submit();}');

        
        $campo1 = new Field();
        
        $campo1->setLabel1("Nombre y Apellido del Cliente:");
        $campo1->setEtiqueta("input");
        $campo1->setName("nombre");
        $campo1->setSize(30);
        $campo1->setType("text");
        $campo1->setMaxLenth(45);
        $campo1->setValue($this->arrayPost[2]);
        $campo1->setLabel2("*");     

         $campo3 = new Field();

        $campo3->setLabel1("RIF/C.I:");
        $campo3->setEtiqueta("select");
        $campo3->setName("inici");
        $campo3->setSize(1);
        $listOptions = array($this->arrayPost[0] => $this->arrayPost[0], "V" => "V", "E" => "E", "P" => "P","J" => "J","G" => "G" );
        $campo3->setListOptions($listOptions);

        $campo4 = new Field();

        $campo4->setEtiqueta("input");
        $campo4->setName("cedula");
        $campo4->setSize(20);
        $campo4->setMaxLenth(9);
        $campo4->setValue($this->arrayPost[1]);
        $campo4->setLabel2("*");

        $campo5 = new Field();

         $campo5->setEtiqueta("input");
        $campo5->setName("codigoArea");
        $campo5->setSize(3);
        $campo5->setMaxLenth(4);
        $campo5->setLabel1("Tel&eacute;fono:");
        $campo5->setValue($this->arrayPost[3]);
        $campo5->setLabel2("-");

         $campo6 = new Field();

         $campo6->setEtiqueta("input");
        $campo6->setName("telefono");
        $campo6->setSize(10);
        $campo6->setMaxLenth(7);
        $campo6->setValue($this->arrayPost[4]);
        $campo6->setLabel2("*");             

        $campo8 = new Field();

        $campo8->setEtiqueta("input");
        $campo8->setName("mail");
        $campo8->setSize(40);
        $campo8->setMaxLenth(120);
        $campo8->setLabel1("Direcci&oacute;n de Correo:");
        $campo8->setValue($this->arrayPost[5]);
        $campo8->setLabel2("*");     

         $campo14 = new Field();

        $campo14->setLabel1("Raz&oacute;n Social:");
        $campo14->setEtiqueta("input");
        $campo14->setName("razonsocial");
        $campo14->setSize(30);
        $campo14->setType("text");
        $campo14->setMaxLenth(255);
        $campo14->setValue($this->arrayPost[6]);
        $campo14->setLabel2("*");
            
        //$campo16 = "<div align = 'center'><img src='http://localhost/workspace/mefamdd_envio/object/class/other/captcha.php' width='80' height='28' class=''/></div>";
        /*
        $campo17 = new Field();
        
        $campo17->setLabel1("Verificaci&oacute;n de la palabra reflejada:");
        $campo17->setEtiqueta("input");
        $campo17->setName("palabra");
        $campo17->setSize(15);
        $campo17->setType("text");
        $campo17->setMaxLenth(5);
        $campo17->setValue($this->arrayPost[15]);
        $campo17->setLabel2("*");
        */
        $campo18 = new Field();

        $campo18->setLabel1("Pais:");
        $campo18->setEtiqueta("select");
        $campo18->setName("pais");
        $campo18->setSize(1);
        $campo18->setOnChange('if(cambiarOption(this.form)) { document.f2.action = "neworder.php";  document.f2.submit();}');
        
        $pais = new Pais();
        
       $vectorPais = $pais->SeleccionarTodos();
       $paisList = null;
       $postPais = null;
       
       if($this->arrayPost[8] != null)
       {$postPais = $pais->SeleccionarPais($this->arrayPost[8])->getNombre();
        $paisList[$postPais] = $this->arrayPost[8];
       }
       else
       { $paisList["Venezuela"] = "232";}
           
       
       foreach ( $vectorPais as $key => $value) 
           { 
              $paisList[$value->getNombre()] = $value->getId();
           }     
        $campo18->setListOptions($paisList);
        
        $campo19 = new Field();
        
        $campo19->setLabel1("Estado:");
        $campo19->setEtiqueta("select");
        $campo19->setName("estado");
        $campo19->setSize(1);
        $campo19->setOnChange('if(cambiarOption(this.form)) { document.f2.action = "neworder.php";  document.f2.submit();}');
        
        $estado = new Estado();
        
        $vectorEstado = null;
        
        if($this->arrayPost[8] != null)
        {$vectorEstado = $estado->SelecionarEstadoId_Pais($this->arrayPost[8]);}
        else
        {$vectorEstado = $estado->SelecionarEstadoId_Pais("232");}
        
       $estadoList = null;
       $postEstado = null; 
      
       if($this->arrayPost[8] != null )
       {
       if($this->arrayPost[9] != null)      
       {
          $ObjEstado = $estado->SelecionarEstadoId($this->arrayPost[9], $this->arrayPost[8]);
         if($ObjEstado != null)
         { $postEstado = $ObjEstado->getNombre();
          $estadoList[$postEstado] = $this->arrayPost[9];
         }
       }
        else
       {$estadoList["DISTRITO CAPITAL"] = "1";}   
       
       }
       
       if($vectorEstado != null)
       {
       foreach ( $vectorEstado as $key => $value) 
           { 
             $estadoList[$value->getNombre()] = $value->getId();
           } 
           
       }else
       { $estadoList["NO DEFINIDO"] = "-1";}
       
        $campo19->setListOptions($estadoList);
        
        $campo20 = new Field();
        
        $campo20->setLabel1("Ciudad:");
        $campo20->setEtiqueta("select");
        $campo20->setName("ciudad");
        $campo20->setSize(1);
        
        $ciudad = new Ciudad();
        
        $vectorCiudad = null;
        if($this->arrayPost[9] != null)
        {$vectorCiudad = $ciudad->SelecionarCiudadId_Estado($this->arrayPost[9]);}
        else
        {$vectorCiudad = $ciudad->SelecionarCiudadId_Estado("1");}
        
       $ciudadList = null;     
       $postCiudad = null;
        
       if($this->arrayPost[10] != null)
       {  if($ciudad->Comprobar_Ciudad_In_Estado($this->arrayPost[10], $this->arrayPost[9]))
          {
           $postCiudad = $ciudad->SelecionarCiudadId($this->arrayPost[10])->getNombre();
           $ciudadList[$postCiudad] = $this->arrayPost[10];     
          }
       }else
       {
           $ciudadList["-Seleccione-"] = "''";
       }
       
       if($vectorCiudad != null)
       {
       foreach ( $vectorCiudad as $key => $value) 
           { 
             $ciudadList[$value->getNombre()] = $value->getId();
           }   
       }else
       {
           $ciudadList["NO DEFINIDA"] = "-1";
       }
       
        $campo20->setListOptions($ciudadList);
        
          $campo21 = new Field();

        $campo21->setLabel1("Direcci&oacute;n de Env&iacute;o:");
        $campo21->setEtiqueta("textarea");
        $campo21->setName("direccion");
        $campo21->setRows(2);
        $campo21->setCols(45);
        $campo21->setListOptions($this->arrayPost[11]);
        $campo21->setLabel2("*");
        
        $campo7 = new Field();
        
        $campo7->setLabel1("<br>DATOS DEL PAGO");
        $campo7->setEtiqueta("label");
        $campo7->setSize(30);
        
        $campo25 = new Field();
        
        $campo25->setLabel1("Banco:");
        $campo25->setEtiqueta("select");
        $campo25->setName("banco");
        $campo25->setSize(1);
        $campo25->setLabel2("(Banco Destino)");
        
        $banco = new Banco();
        
        $vectorBanco = $banco->SeleccionarTodos();
        
       $bancoList = null;
       $postBanco = null;
       if($this->arrayPost[12] != null)
       {$postBanco = $banco->SeleccionarBanco($this->arrayPost[12])->getNombre();}
       $bancoList[$postBanco] = $this->arrayPost[12];
  
       foreach ( $vectorBanco  as $key => $value) 
           { 
             $bancoList[$value->getNombre()] = $value->getId();
           }     
        $campo25->setListOptions($bancoList);
        
         $campo9 = new Field();

        $campo9->setEtiqueta("input");
        $campo9->setName("referencia");
        $campo9->setSize(40);
        $campo9->setMaxLenth(120);
        $campo9->setLabel1("Referencia (Recibo):");
        $campo9->setValue($this->arrayPost[13]);
        $campo9->setLabel2("* (Debe colocar el N&uacute;mero de Dep&oacute;sito &oacute; Refencia de la Transacci&oacute;n)");

        $campo10 = new Field();

        $campo10->setLabel1("Monto Depositado &oacute; Transferido BsF.:");
        $campo10->setEtiqueta("input");
        $campo10->setName("monto");
        $campo10->setSize(20);
        $campo10->setMaxLenth(12);
        $campo10->setValue($this->arrayPost[14]);
        $campo10->setLabel2("* (Introducir en formato Decimal 0,00)");

          $campo11 = new Field();

        $campo11->setLabel1("Fecha de Pago:");
        $campo11->setEtiqueta("input");
        $campo11->setName("fecha");
        $campo11->setSize(20);
        $campo11->setMaxLenth(10);
        $campo11->setValue($this->arrayPost[15]);
        $campo11->setLabel2("* (En Formato DD/MM/AAAA)");
     
       
         $campo26 = new Field();
        
        $campo26->setLabel1("<br>PRODUCTOS");
        $campo26->setEtiqueta("label");
        $campo26->setSize(30);
        
        $campo261 = new Field();
        
         $campo261->setLabel1("<br>Cantidad  |  Tipo/Categoria  |  Marca del Producto  |  Modelo del Producto  |  Precio BsF.  |  Descripcion del Producto");
        $campo261->setEtiqueta("label");
        $campo261->setSize(500);      
        
        $campo28 = new Field();
        
        $this->arrayPost[16] = 1;

        $campo28->setEtiqueta("input");
        $campo28->setName("cantidad");
        $campo28->setSize(7);
        $campo28->setType("text");
        $campo28->setMaxLenth(10);
        $campo28->setValue($this->arrayPost[16]);
        $campo28->setLabel2("*");
        
         $campo27 = new Field();

        $campo27->setEtiqueta("select");
        $campo27->setName("tipo_producto");
        $campo27->setSize(1);
        //$campo27->setType("text");
        //$campo27->setMaxLenth(100);
        //$campo27->setValue($this->arrayPost[17]);
        $campo27->setLabel2("*");
        
        $postTipo = null;
        $listOptionsTipo = null;
        $vectorTipo = null;
        
        $equipoCat = new Equipo();
        $vectorTipo = $equipoCat->Listar_Categorias_Equipo();

        if($this->arrayPost[17] != null)
        {
            $postTipo = $equipoCat->Dame_Categoria_Name($this->arrayPost[17]);
            $listOptionsTipo[$postTipo] = $this->arrayPost[17];
        }
        else
        {  $listOptionsTipo["-Seleccione-"] = "''";}
        
        if($vectorTipo != null)
        {
            foreach ($vectorTipo as $key => $value)
            {
                $listOptionsTipo[$value->getCategoria()] = $value->getCategoria();
            }
        }
  
        $campo27->setListOptions($listOptionsTipo);
        
        $campo29 = new Field();

        $campo29->setEtiqueta("select");
        $campo29->setName("marca_producto");
        $campo29->setSize(1);
       // $campo29->setType("text");
       // $campo29->setMaxLenth(100);
       // $campo29->setValue($this->arrayPost[18]);
        $campo29->setLabel2("*");
        
         $postMarca = null;
        $listOptionsMarca = null;
        $vectorMarca = null;
        
        $equipoM = new Equipo();
        $vectorMarca = $equipoM->Listar_Marcas_Equipo();

        if($this->arrayPost[18] != null)
        {
            $postMarca = $equipoM->Dame_Marca_Name($this->arrayPost[18]);
            $listOptionsMarca[$postMarca] = $this->arrayPost[18];
        }
        else
        {  $listOptionsMarca["-Seleccione-"] = "''";}
        
        if($vectorMarca != null)
        {
            foreach ($vectorMarca as $key => $value)
            {
                $listOptionsMarca[$value->getMarca()] = $value->getMarca();
            }
        }
  
        $campo29->setListOptions($listOptionsMarca);
        
        $campo30 = new Field();
        
        $campo30->setEtiqueta("input");
        $campo30->setName("modelo_producto");
        $campo30->setSize(23);
        $campo30->setType("text");
        $campo30->setMaxLenth(45);
        $campo30->setValue($this->arrayPost[19]);
        $campo30->setLabel2("*");
     
        $campo31 = new Field();

        $campo31->setEtiqueta("input");
        $campo31->setName("precio_producto");
        $campo31->setSize(10);
        $campo31->setType("text");
        $campo31->setMaxLenth(10);
        $campo31->setValue($this->arrayPost[20]);
        $campo31->setLabel2("*");
        
        $campo32 = new Field();
        
        $campo32->setEtiqueta("input");
        $campo32->setName("descripcion_producto");
        $campo32->setSize(45);
        $campo32->setType("text");
        $campo32->setMaxLenth(200);
        $campo32->setValue($this->arrayPost[21]);
        $campo32->setLabel2("*");
        
        $buttonAdd = new Field();
        
        $buttonAdd->setEtiqueta("button");
         //$buttonAdd->setType("button");
         $buttonAdd->setName("botonAdd");
        //$buttonAdd->setValue("Add");
         $buttonAdd->setIcon("<img src='../../style/img/add.png' width='16' height='16' alt=''/>");
        $buttonAdd->setOnClick('if(validarProducto(this.form)){ document.f2.action="neworder.php"; document.f2.submit();} else {return false;}');
        
        $tablaDatosProductos = "<table>
                                    <tr>
                                         <td>Cantidad</td>
                                         <td>Tipo/Categoria</td>
                                         <td>Marca del Producto</td>
                                         <td>Modelo del Producto</td>
                                         <td>Precio BsF.</td>
                                         <td>Descripcion del Producto</td>
                                    </tr>
                                    <tr>
                                         <td>".$campo28->getField()."</td>
                                         <td>".$campo27->getField()."</td>
                                         <td>".$campo29->getField()."</td>
                                         <td>".$campo30->getField()."</td>
                                         <td>".$campo31->getField()."</td>
                                         <td>".$campo32->getField().$buttonAdd->getField()."</td>
                                    </tr>
                               </table>";
          //Caogo el Carrito de compra
        $cesta = $this->Mostrar_Carrito();
    //"15" => $campo261->getField(), "4" => $campo18->getField(),
        $arrayField = array("-2"=>$campo2->getField(),  "-1" => $campo15->getField(), "0" => $campo3->getField().$campo4->getField(),"1" => $campo1->getField(),  "3" => $campo14->getField(),
                           "4" => $campo18->getField(), "5" => $campo19->getField(), "6" => $campo20->getField(), "7" => $campo21->getField(), "8" => $campo5->getField().$campo6->getField(),"8.1" => $campo8->getField(),      		  
                            "9" => $campo7->getField(), "10" => $campo25->getField(),"11" => $campo9->getField(),"12" => $campo10->getField(),"13" => $campo11->getField(),
                             "14" => $campo26->getField(),"15" => $tablaDatosProductos  , "16" => $cesta);
        
        $button = new Field();
        
         $button->setEtiqueta("input");
         $button->setType("submit");
         $button->setName("boton1");
         $button->setValue("Enviar");
       
        
        $this->formulario = $this->CreateForm("f2", "neworder.php", "return validar(this)", $arrayField, $button->getField());
      
        }
        else
        {
             $user_id = 0;
             require_once '../../object/class/entity/Usuario.php';
             require_once '../../object/class/entity/Equipo.php';
             require_once '../../object/class/entity/Pedido.php';
             

             $usuario = new Usuario();
              $user_id = 0;
              $array_Fiels_User = null;
             //Verifico si esta Registrado
             $rif = $this->arrayPost[0].$this->arrayPost[1];
             $hayUser = $usuario->SeleccionarUsuario_RifCI($rif);
            
             if($hayUser != null)
             { //Modifico
                 $user_id = $hayUser->getUser_id();
                                            
             $array_Fiels_User["users.city_id"] = $this->arrayPost[10];       
             $array_Fiels_User["firstname"] = "'".strtoupper($this->arrayPost[2])."'";
             $array_Fiels_User["lastname"] = "'".strtoupper($this->arrayPost[2])."'";
             $array_Fiels_User["email"] = "'".strtolower($this->arrayPost[5])."'";
             $array_Fiels_User["address"] = "'".$this->arrayPost[11]."'";          
             $array_Fiels_User["phone"] = "'".$this->arrayPost[3].$this->arrayPost[4]."'";
             $array_Fiels_User["phone_movil"] = "'".$this->arrayPost[3].$this->arrayPost[4]."'";
             $array_Fiels_User["pin"] = "NULL";        
             $array_Fiels_User["users.country_id"] = "'".$this->arrayPost[8]."'";
             $array_Fiels_User["users.state_id"] = "'".$this->arrayPost[9]."'";
             $array_Fiels_User["seudonimo"] = "'".$this->arrayPost[7]."'";
           // Update el Usuario
             $usuario->Modificar_Usuario($user_id, $array_Fiels_User);
                 
             }else
             {  //New user, Inserto
                 $user_id = $usuario->SelectMax_Id_User();
                 ++$user_id;
                               
             $array_Fiels_User["user_id"] = $user_id;
             $array_Fiels_User["username"] = "'".$this->arrayPost[0].$this->arrayPost[1]."'";
             $array_Fiels_User["users.city_id"] = $this->arrayPost[10];
             $array_Fiels_User["users.profile_id"] = "4";
             $array_Fiels_User["password"] = "'".md5($this->arrayPost[0].$this->arrayPost[1])."'";
             $array_Fiels_User["users.level"] = "3";
             $array_Fiels_User["firstname"] = "'".strtoupper($this->arrayPost[2])."'";
             $array_Fiels_User["lastname"] = "'".strtoupper($this->arrayPost[2])."'";
             $array_Fiels_User["email"] = "'".strtolower($this->arrayPost[5])."'";
             $array_Fiels_User["address"] = "'".$this->arrayPost[11]."'";
             $array_Fiels_User["users.visible"] = "1";
             $array_Fiels_User["letterrif"] = "'".$this->arrayPost[0]."'";
             $array_Fiels_User["rif"] = "'".$this->arrayPost[1]."'";
             $array_Fiels_User["socialreason"] = "'".$this->arrayPost[6]."'";
             $array_Fiels_User["phone"] = "'".$this->arrayPost[3].$this->arrayPost[4]."'";
             $array_Fiels_User["phone_movil"] = "'".$this->arrayPost[3].$this->arrayPost[4]."'";
             $array_Fiels_User["pin"] = "NULL";
             $array_Fiels_User["question_segurity"] = "'Cual es tu mascota preferida?'";
             $array_Fiels_User["responce_segurity"] = "'perrito'";
             $array_Fiels_User["word_verifyq"] = "'as4fs'";
             $array_Fiels_User["users.country_id"] = "'".$this->arrayPost[8]."'";
             $array_Fiels_User["users.state_id"] = "'".$this->arrayPost[9]."'";
             $array_Fiels_User["seudonimo"] = "'".$this->arrayPost[7]."'";
           // Cargo el Usuario
             $usuario->InsertarUsuario($array_Fiels_User);
             
             }         

           $userReg =  $usuario->SeleccionarUsuario_Id($user_id);

            if($userReg)
            { //Cargo el Pedido
                
                $pedido = new Pedido();
                $id_pedido = $pedido->SelectMax_Id_Pedido();
                ++$id_pedido;
                
                 $objFecha = new classlibFecHor();
                 $bancoObj = new Banco();
                 $bancoPostRep = $bancoObj->SeleccionarBanco($this->arrayPost[12]);

		     $this->arrayPost[14] = str_replace(",",".",$this->arrayPost[14]);
                     $this->arrayPost[14] = $this->Formatear_Decimal((string)$this->arrayPost[14]);
             
                        $campos = null;
                        $campos['codigoPedido'] = $id_pedido;
			$campos['user_id'] = $user_id;
			$campos['direccionEntrega'] = "'".$this->arrayPost[11]."'";
			$campos['montoAcumulado'] =  $this->arrayPost[14];
			$campos['cuentaBanc'] = "'".$bancoPostRep->getCuenta()."'";
			$campos['deposito'] = "'".$this->arrayPost[13]."'";
			$campos['status'] = "'INICIANDO'";
			$campos['fechaDeposito'] = "'".$objFecha->flibInvertirEsIn($this->arrayPost[15])."'";
			$campos['fechaEntrega'] = 'NULL';
			$campos['nroRefBancaria'] = "'".$this->arrayPost[13]."'";
			$campos['responsableFacturador'] = 'NULL';
			$campos['fechaApertura'] =  "'".$objFecha->flibDataTime()."'";
			$campos['actualizacion'] = "'NUEVO'";
			$campos['banco'] = "'".$bancoPostRep->getNombre()."'";;;
			$campos['montoDepositado'] = $this->arrayPost[14];
			$campos['modoPago'] = "'DEPOSITO'";
			$campos['observaciones'] = 'NULL';
			$campos['fechaRepuesta'] = 'NULL';
			$campos['bancoOrigen'] = 'NULL';
                        
                 //Cargo los Productos
       $itemsEnCesta=$_SESSION['itemsEnCesta']; 
       $productoList = null;
    if (isset($itemsEnCesta))
    {          $itera = 0;
          foreach($itemsEnCesta as $k => $v)
          {  
              $equipo = null;
              $ite = 0;
              
              foreach ($v  as $indice => $valor)
              { 
                  $equipo[$ite] = $valor;
                  ++$ite;
              }
              
              $arrayEquipo = null;
              $productEquipo = new Equipo();
              $product_idMax = $productEquipo->SelectMax_Id_Equipo();
              ++$product_idMax;

	      $equipo[4] = str_replace(",",".",$equipo[4]);              
              $equipo[4] = $this->Formatear_Decimal((string)$equipo[4]);
              
              $arrayEquipo["product_id"] = $product_idMax;
              $arrayEquipo["type_id"] = "'".$equipo[1]."'";
              $arrayEquipo["id_brand"] = "'".$equipo[2]."'";
              $arrayEquipo["category_id3"] = "'".$equipo[1]."'";
              $arrayEquipo["model_id2"] = "'".$equipo[3]."'";
              $arrayEquipo["date_arrival"] = "'".$objFecha->flibDataTime()."'";
              $arrayEquipo["price"] = $equipo[4];
              $arrayEquipo["discount"] = "0.0";
              $arrayEquipo["picture"] = "NULL";
              $arrayEquipo["is_new"] = "1";
              $arrayEquipo["visible"] = "1";
              $arrayEquipo["description"] = "'".$equipo[5]."'";
              $arrayEquipo["inventario"] = "1";
              
               $productEquipo->Ingresar_Equipo($arrayEquipo);
               
               if( $productEquipo->Seleccionar_Equipo_Id($product_idMax) != null)
               { 
                   $arrayEquipo_Subpedido = null;
                   $arrayEquipo_Subpedido["codigoSubpedido"] = $id_pedido;
                   $arrayEquipo_Subpedido["product_id"] = $product_idMax;
                   $arrayEquipo_Subpedido["cantidad"] = $equipo[0];
                   $productoList[$itera] = $arrayEquipo_Subpedido;
                   
                   ++$itera;
               }
              
          }
    }
    
      //Ingreso el Pedido Definitivo
     $pedido->Ingresar_Pedido($campos,$productoList);
     $newPedido = $pedido->Selecionar_PedidoUnico($id_pedido);
     if($newPedido != null)
     {
                $this->formulario = "<label>PEDIDO REGISTRADO</label>";
                $this->formulario .= "<table border = '1' align='center'>
                <tr>
                <td>Nombre y Apellido:</td>
                <td>".$userReg->getNombres()."</td>              
                </tr>          
                <tr>
                <td>Cedula de Indentidad / RIF:</td>
                <td>".$userReg->getRif_ci()."</td>
                </tr>
                 <tr>
                <td>Direccion de Envio:</td>
                <td>".$newPedido->getDireccion_Entrega()."</td>
                </tr>   
                <tr>
                <td>Telefono Local:</td>
                <td>".$userReg->getTelefonoLocal()."</td>
                </tr>              
                <tr>
                <td>Correo Electr&oacute;nico:</td>
                <td>".$userReg->getEmail()."</td>
                </tr>
                <tr>
                <td>Codigo de Pedido:</td>
                <td>".$newPedido->getCodigo_Pedido()."</td>
                </tr>
                <tr>
                <td>Monto del Pedido:</td>
                <td>".$newPedido->getMontoDepositado()."</td>       
                </tr>
                </table >";

                $this->formulario .= "<br><H1>Su solicitud de Envio de Pedido sera procesada a la brevedad posible</H1><br>";
                
                $this->formulario .= "<a href='neworder.php?new=1'>Volver</a>";

                // enviar correo...
                $para  = $userReg->getEmail().", microelectronicfamdd@hotmail.com";
                //$para .= 'wez@example.com';

                // asunto
                $asunto = 'Datos de Registro de Usuario. Microelectronic FAMDD C.A';
                $mail='registro@mefamdd.com.ve';
                // mensaje
                $mensaje = " Nombres y Apellidos: ".$userReg->getNombres()."\n Cedula/RIF: ".$userReg->getRif_ci().
                        "\n Codigo de Pedido: ".$newPedido->getCodigo_Pedido()."\n Direccion de Envio: ".$newPedido->getDireccion_Entrega().
                        "\n Telefono Local: ".$userReg->getTelefonoLocal()."\n Monto del Pedido: ".$newPedido->getMontoAcumulado()."\n Fecha de Apertura: ".$newPedido->getFecha_Apertura();
                // Para enviar correo HTML, la cabecera Content-type debe definirse
                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                // Cabeceras adicionales
                $cabeceras .= 'From: Datos del Usuario Registrado' . "\r\n";
                // Enviarlo
                mail($para, $asunto, $mensaje,"FROM: ".$mail);
                }
            
               }
            else
            {  echo "<font face = 'Arial' color = 'red'>No se pudo Registrar el usuario. Intente mas tarde</font>";}
        }
}

private function Mostrar_Carrito()
{
    $carrito = "<br><br><div align = 'center'><label>Carrito Vac&iacute;o.</label></div>";
    
    $itemsEnCesta=$_SESSION['itemsEnCesta']; 
    if (isset($itemsEnCesta))
    {       
        $carrito = "<br><br><div align = 'center'><label>El contenido de su pedido es:</label></div><br>
                   <table align='center' border = '1'>				
                    <tr> 
                     <td>Quitar</td>
                     <td>Cantidad</td>
                     <td>Tipo/Categoria</td>
                     <td>Marca</td>
                     <td>Modelo</td>
                     <td>Precio BsF</td>
                     <td>Descripcion</td>
                   </tr>";
          foreach($itemsEnCesta as $k => $v)
          {  
              $equipo = null;
              $ite = 0;
              
              foreach ($v  as $indice => $valor)
              { 
                  $equipo[$ite] = $valor;
                  ++$ite;
              }
              
              $getFormVariables = "inici=".$this->arrayPost[0]."&cedula=".$this->arrayPost[1]."&nombre=".$this->arrayPost[2]."&
                                   codigoArea=".$this->arrayPost[3]."&telefono=".$this->arrayPost[4]."&mail=".$this->arrayPost[5]."&razonsocial=".$this->arrayPost[6]."&
                                   seudonimo=".$this->arrayPost[7]."&pais=".$this->arrayPost[8]."&estado=".$this->arrayPost[9]."&ciudad=".$this->arrayPost[10]."&
                                   direccion=".$this->arrayPost[11]."&banco=".$this->arrayPost[12]."&referencia=".$this->arrayPost[13]."&monto=".$this->arrayPost[14]."&
                                   fecha=".$this->arrayPost[15]."&cantidad=".$this->arrayPost[16]."&tipo_producto=".$this->arrayPost[17]."&marca_producto=".$this->arrayPost[18]."&
                                   modelo_producto=".$this->arrayPost[19]."&precio_producto=".$this->arrayPost[20]."&descripcion_producto=".$this->arrayPost[21];
                  
               $carrito .= "<tr>
                     <td align='center'><a href='neworder.php?del=".$k."&".$getFormVariables."' ><img src='../../style/img/edit-delete.png' width='16' height='16' alt=''/></a></td>
                     <td>".$equipo[0]."</td>
                     <td>".$equipo[1]."</td>
                     <td>".$equipo[2]."</td>
                     <td>".$equipo[3]."</td>
                     <td>".$equipo[4]."</td>
                     <td>".$equipo[5]."</td>
                   </tr>"; 
              
          }
          
           $carrito .= "</table>";
    }
    
    return $carrito;
}

private function Formatear_Decimal($monto = "")
{ 
    $i = 0;
    $limite = strlen($monto);
    $ultimoIndice = $limite -1;
    $entero = "";
    $decimal = "";
    
    while($i < $limite )
    {
        if( "." != substr($monto,$ultimoIndice -$i,1))
        { $decimal = substr($monto,$ultimoIndice -$i,1).$decimal;}
        else
        {
            $decimal = substr($monto,$ultimoIndice -$i,1).$decimal;
             $entero = substr($monto,0, $ultimoIndice - $i);
             $entero = str_replace(".", "", $entero);
             $i = $limite;
        }
        ++$i;
    }
    
    return doubleval($entero.$decimal);
    
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
	
}
