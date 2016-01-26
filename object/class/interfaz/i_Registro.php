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
require_once "../../object/class/entity/Ciudad.php";

class I_Registro extends View_base implements Interface_Contenido{
    //put your code here
    private $formulario = null;

    public function __construct($titulo,$post) {
        $this->Set_JS("<script type='text/javascript' src='../../dinamy/js/js_registro.js'></script>");
        $this->Set_Style("<link href='../../style/css/mefamdd.css' rel='stylesheet' type='text/css'>");
        
        parent::__construct($titulo, $this->js, $this->css, null, false);
        $this->arrayPost = $post;

        $this->Set_Mensaje("<p>Registro de Usuario Microelectronic Famdd C.A</p>");
   $this->Get_Mensaje();
   
   $this->preparedDatosForm();
   
   echo $this->formulario;
   
   $this->CerrarHiperTexto();
   
    }
    
    private function preparedDatosForm()
    {
        $isLleno = true;
        $ite = 0;
        while ($ite<20)
        {
            if($this->arrayPost[$ite] != null)
            {$isLleno &= true;}
            else
            { $isLleno &= false; }
            
            ++$ite;
        }
        
        if(!$isLleno)
        {
        $campo1 = new Field();
        
        $campo1->setLabel1("Nombres:");
        $campo1->setEtiqueta("input");
        $campo1->setName("nombre");
        $campo1->setSize(30);
        $campo1->setType("text");
        $campo1->setMaxLenth(45);
        $campo1->setValue($this->arrayPost[0]);
        $campo1->setLabel2("*");
        
        $campo2 = new Field();
        
        $campo2->setLabel1("Apellidos:");
        $campo2->setEtiqueta("input");
        $campo2->setName("apellido");
        $campo2->setSize(30);
        $campo2->setType("text");
        $campo2->setMaxLenth(45);
        $campo2->setValue($this->arrayPost[1]);
        $campo2->setLabel2("*");

         $campo3 = new Field();

        $campo3->setLabel1("RIF/C.I:");
        $campo3->setEtiqueta("select");
        $campo3->setName("inici");
        $campo3->setSize(1);
        $listOptions = array($this->arrayPost[2] => $this->arrayPost[2], "V" => "V", "E" => "E", "P" => "P","J" => "J","G" => "G" );
        $campo3->setListOptions($listOptions);

        $campo4 = new Field();

        $campo4->setEtiqueta("input");
        $campo4->setName("cedula");
        $campo4->setSize(20);
        $campo4->setMaxLenth(9);
        $campo4->setValue($this->arrayPost[3]);
        $campo4->setLabel2("*");

        $campo5 = new Field();

         $campo5->setEtiqueta("input");
        $campo5->setName("codigoArea");
        $campo5->setSize(3);
        $campo5->setMaxLenth(4);
        $campo5->setLabel1("Tel&eacute;fono Local:");
        $campo5->setValue($this->arrayPost[4]);
        $campo5->setLabel2("-");

         $campo6 = new Field();

         $campo6->setEtiqueta("input");
        $campo6->setName("telefono");
        $campo6->setSize(10);
        $campo6->setMaxLenth(7);
        $campo6->setValue($this->arrayPost[5]);
        $campo6->setLabel2("*");
        
         $campo7 = new Field();

        $campo7->setEtiqueta("input");
        $campo7->setName("celular");
        $campo7->setSize(15);
        $campo7->setMaxLenth(11);
        $campo7->setLabel1("Tel&eacute;fono Movil:");
        $campo7->setValue($this->arrayPost[6]);
        $campo7->setLabel2("*");

        $campo8 = new Field();

        $campo8->setEtiqueta("input");
        $campo8->setName("mail");
        $campo8->setSize(40);
        $campo8->setMaxLenth(120);
        $campo8->setLabel1("Direcci&oacute;n de Correo:");
        $campo8->setValue($this->arrayPost[7]);
        $campo8->setLabel2("*");

         $campo9 = new Field();

        $campo9->setEtiqueta("input");
        $campo9->setName("login");
        $campo9->setSize(40);
        $campo9->setMaxLenth(120);
        $campo9->setLabel1("Usuario:");
        $campo9->setValue($this->arrayPost[8]);
        $campo9->setLabel2("* (Debe coincidir con su Direcci&oacute;n de Correo)");

        $campo10 = new Field();

        $campo10->setLabel1("Clave:");
        $campo10->setEtiqueta("input");
        $campo10->setName("password");
        $campo10->setSize(20);
        $campo10->setType("password");
        $campo10->setMaxLenth(12);
        $campo10->setValue($this->arrayPost[9]);
        $campo10->setLabel2("* (Introducir entre 6-12 caracteres)");

          $campo11 = new Field();

        $campo11->setLabel1("Confirmar Clave:");
        $campo11->setEtiqueta("input");
        $campo11->setName("confirmar_password");
        $campo11->setSize(20);
        $campo11->setType("password");
        $campo11->setMaxLenth(12);
        $campo11->setValue($this->arrayPost[10]);
        $campo11->setLabel2("*");

         $campo12 = new Field();

        $campo12->setLabel1("Pregunta de Seguridad:");
        $campo12->setEtiqueta("select");
        $campo12->setName("preguntaSeguridad");
        $listOptions2 = array($this->arrayPost[11] => $this->arrayPost[11], "&iquest;Pelicula Favorita?" => "Pelicula Favorita", "&iquest;Nombre de mascota?" => "Nombre Mascota", "&iquest;A&ntilde;o de nacimiento?" => "Ano Nacimiento");
        $campo12->setListOptions($listOptions2);

        $campo13 = new Field();

        $campo13->setLabel1("Repuesta:");
        $campo13->setEtiqueta("input");
        $campo13->setName("respuesta");
        $campo13->setSize(25);
        $campo13->setType("text");
        $campo13->setMaxLenth(45);
        $campo13->setValue($this->arrayPost[12]);
        $campo13->setLabel2("*");

         $campo14 = new Field();

        $campo14->setLabel1("Raz&oacute;n Social:");
        $campo14->setEtiqueta("input");
        $campo14->setName("razonsocial");
        $campo14->setSize(30);
        $campo14->setType("text");
        $campo14->setMaxLenth(255);
        $campo14->setValue($this->arrayPost[13]);
        $campo14->setLabel2("*");

         $campo15 = new Field();

        $campo15->setLabel1("Seud&oacute;nimo Comercial:");
        $campo15->setEtiqueta("input");
        $campo15->setName("seudonimo");
        $campo15->setSize(30);
        $campo15->setType("text");
        $campo15->setMaxLenth(100);
        $campo15->setValue($this->arrayPost[14]);
        $campo15->setLabel2("(Opcional)");
        
        $campo16 = "<div align = 'center'><img src='http://localhost/workspace/mefamdd_envio/object/class/other/captcha.php' width='80' height='28' class=''/></div>";
        
        $campo17 = new Field();
        
        $campo17->setLabel1("Verificaci&oacute;n de la palabra reflejada:");
        $campo17->setEtiqueta("input");
        $campo17->setName("palabra");
        $campo17->setSize(15);
        $campo17->setType("text");
        $campo17->setMaxLenth(5);
        $campo17->setValue($this->arrayPost[15]);
        $campo17->setLabel2("*");
        
        $campo18 = new Field();

        $campo18->setLabel1("Pais:");
        $campo18->setEtiqueta("select");
        $campo18->setName("pais");
        $campo18->setSize(1);
        
        $pais = new Pais();
        
       $vectorPais = $pais->SeleccionarTodos();
       $paisList = null;
       $postPais = null;
       if($this->arrayPost[16] != null)
       {$postPais = $pais->SeleccionarPais($this->arrayPost[16])->getNombre();}
       
       $paisList[$postPais] = $this->arrayPost[16];
       $paisList["Venezuela"] = "232";
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
        
        $estado = new Estado();
        
        $vectorEstado = $estado->SelecionarEstadoId_Pais("232");
        
       $estadoList = null;
       $postEstado = null;
       if($this->arrayPost[17] != null)
       {$postEstado = $estado->SelecionarEstadoId($this->arrayPost[17])->getNombre();}
       $estadoList[$postEstado] = $this->arrayPost[17];
  
       foreach ( $vectorEstado as $key => $value) 
           { 
             $estadoList[$value->getNombre()] = $value->getId();
           }     
        $campo19->setListOptions($estadoList);
        
        $campo20 = new Field();
        
        $campo20->setLabel1("Ciudad:");
        $campo20->setEtiqueta("select");
        $campo20->setName("ciudad");
        $campo20->setSize(1);
        
        $ciudad = new Ciudad();
        
        $vectorCiudad = $ciudad->SelecionarCiudadId_Estado("1");
        
       $ciudadList = null;
        $postCiudad = null;
       if($this->arrayPost[18] != null)
       {$postCiudad = $ciudad->SelecionarCiudadId($this->arrayPost[18])->getNombre();}
       $ciudadList[$postCiudad] = $this->arrayPost[18];
  
       foreach ( $vectorCiudad as $key => $value) 
           { 
             $ciudadList[$value->getNombre()] = $value->getId();
           }     
        $campo20->setListOptions($ciudadList);
        
          $campo21 = new Field();

        $campo21->setLabel1("Direcci&oacute;n Local:");
        $campo21->setEtiqueta("textarea");
        $campo21->setName("direccion");
        $campo21->setRows(3);
        $campo21->setCols(45);
        $campo21->setListOptions($this->arrayPost[19]);
        $campo21->setLabel2("*");

        $arrayField = array("0" => $campo1->getField(), "1" => $campo2->getField(), "2" => $campo3->getField().$campo4->getField(), "3" => $campo5->getField().$campo6->getField(),
                            "4" => $campo7->getField(), "5" => $campo8->getField(), "6" => $campo9->getField(),"7" => $campo10->getField(), "8" => $campo11->getField(),  "9" => $campo12->getField(),
                            "10" => $campo13->getField(), "11" => $campo16,"12" => $campo17->getField(), "13" => $campo14->getField(), "14" => $campo15->getField(), "15" => $campo18->getField(), 
                            "16" => $campo19->getField(), "17" => $campo20->getField(), "18" => $campo21->getField() );
        
         $button = new Field();
        
         $button->setEtiqueta("input");
         $button->setType("submit");
         $button->setName("boton1");
         $button->setValue("Enviar");
       
        
        $this->formulario = $this->CreateForm("f1", "registro.php", "return validar(this)", $arrayField, $button->getField());
        }
        else
        {
             $user_id = 0;
             require_once '../../object/class/entity/Usuario.php';

             $usuario = new Usuario();
             $user_id = $usuario->SelectMax_Id_User();
             ++$user_id;

             $array_Fiels_User = null;
             $array_Fiels_User["user_id"] = $user_id;
             $array_Fiels_User["username"] = "'".strtolower($this->arrayPost[8])."'";
             $array_Fiels_User["city_id"] = $this->arrayPost[18];
             $array_Fiels_User["profile_id"] = "4";
             $array_Fiels_User["password"] = "'".md5($this->arrayPost[9])."'";
             $array_Fiels_User["level"] = "3";
             $array_Fiels_User["firstname"] = "'".strtoupper($this->arrayPost[0])."'";
             $array_Fiels_User["lastname"] = "'".strtoupper($this->arrayPost[1])."'";
             $array_Fiels_User["email"] = "'".strtolower($this->arrayPost[7])."'";
             $array_Fiels_User["address"] = "'".$this->arrayPost[19]."'";
             $array_Fiels_User["visible"] = "1";
             $array_Fiels_User["letterrif"] = "'".$this->arrayPost[2]."'";
             $array_Fiels_User["rif"] = "'".$this->arrayPost[3]."'";
             $array_Fiels_User["socialreason"] = "'".$this->arrayPost[13]."'";
             $array_Fiels_User["phone"] = "'".$this->arrayPost[4].$this->arrayPost[5]."'";
             $array_Fiels_User["phone_movil"] = "'".$this->arrayPost[6]."'";
             $array_Fiels_User["pin"] = "''";
             $array_Fiels_User["question_segurity"] = "'".$this->arrayPost[11]."'";
             $array_Fiels_User["responce_segurity"] = "'".$this->arrayPost[12]."'";
             $array_Fiels_User["word_verifyq"] = "'".$this->arrayPost[15]."'";
             $array_Fiels_User["country_id"] = "'".$this->arrayPost[16]."'";
             $array_Fiels_User["state_id"] = "'".$this->arrayPost[17]."'";
             $array_Fiels_User["seudonimo"] = "'".$this->arrayPost[14]."'";

             $usuario->InsertarUsuario($array_Fiels_User);

           $userReg =  $usuario->SeleccionarUsuario_Id($user_id);

            if($userReg)
            { 
                $this->formulario = "<label>DATOS REGISTRADOS</label>";
                $this->formulario .= "<table border = '1' align='center'>
                <tr>
                <td>Nombres:</td>
                <td>".$userReg->getNombres()."</td>
                <tr>
                </tr>
                <tr>
                <td>Apellidos:</td>
                <td>".$userReg->getApellidos()."</td>
                <tr>
                </tr>
                <tr>
                <td>Cedula de Indentidad / RIF:</td>
                <td>".$userReg->getRif_ci()."</td>
                <tr>
                </tr>
                <tr>
                <td>Telefono Local:</td>
                <td>".$userReg->getTelefonoLocal()."</td>
                <tr>
                </tr>
                <tr>
                <td>Telefono Celular:</td>
                <td>".$userReg->getTelefono_Movil()."</td>
                <tr>
                </tr>
                <tr>
                <td>Correo Electr&oacute;nico:</td>
                <td>".$userReg->getEmail()."</td>
                <tr>
                </tr>
                <tr>
                <td>Usuario:</td>
                <td>".$userReg->getLogin()."</td>
                </tr>
                <tr>
                <td>Pregunta de Seguridad:</td>
                <td>".$userReg->getPregunta_seguridad()."</td>
                <tr>
                </tr>
                </table >";

                $this->formulario .= "<br><H1>Puedes Iniciar Sessi&oacute;n para Efectuar Pedidos</H1>";

                // enviar correo...
                $para  = $userReg->getEmail();
                //$para .= 'wez@example.com';

                // asunto
                $asunto = 'Datos de Registro de Usuario. Microelectronic FAMDD C.A';
                $mail='registro@mefamdd.com';
                // mensaje
                $mensaje = " Nombres: ".$userReg->getNombres()."\n Apellidos: ".$userReg->getApellidos()."\n Usuario: ".$userReg->getLogin()
                        ."\n Cedula/RIF: ".$userReg->getRif_ci()."\n Pregunta de Seguridad: ".$userReg->getPregunta_seguridad()
                        ."\n Número de Celular: ".$userReg->getTelefono_Movil()."\n Telefono Local: ".$userReg->getTelefonoLocal()."\n";
                // Para enviar correo HTML, la cabecera Content-type debe definirse
                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                // Cabeceras adicionales
                $cabeceras .= 'From: Datos del Usuario Registrado' . "\r\n";
                // Enviarlo
                mail($para, $asunto, $mensaje,"FROM: ".$mail);

             }
            else
            {  echo "<font face = 'Arial' color = 'red'>No se pudo Registrar el usuario. Intente mas tarde</font>";}
        }
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

?>
