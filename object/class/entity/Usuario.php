<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author pablo
 */
class Usuario {
    //put your code here
    private $user_id = null;
    private $login = null;
    private $perfil = null;
    private $level = null;
    private $isVisible = null;
    private $nombres = null;
    private $apellidos = null;
    private $razon_social = null;
    private $seudonimo = null;
    private $rif_ci = null;
    private $pais = null;
    private $estado = null;
    private $ciudad = null;
    private $direccion = null;
    private $email = null;
    private $telefonoLocal = null;
    private $telefono_Movil = null;
    private $pregunta_seguridad = null;
    private $repuesta_seguridad = null;

    public function  __construct() {

         include_once  '../class/arraysql/arregloTablaCampos.php';
    }

    public function getUser_id() {
        return $this->user_id;
    }

    private function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    public function getLogin() {
        return $this->login;
    }

    private function setLogin($login) {
        $this->login = $login;
    }

    public function getNombres() {
        return $this->nombres;
    }

    private function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    private function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function getRazon_social() {
        return $this->razon_social;
    }

    private function setRazon_social($razon_social) {
        $this->razon_social = $razon_social;
    }

    public function getSeudonimo() {
        return $this->seudonimo;
    }

    private function setSeudonimo($seudonimo) {
        $this->seudonimo = $seudonimo;
    }

    public function getRif_ci() {
        return $this->rif_ci;
    }

    private function setRif_ci($rif_ci) {
        $this->rif_ci = $rif_ci;
    }

    public function getPais() {
        return $this->pais;
    }

    private function setPais($pais) {
        $this->pais = $pais;
    }

    public function getEstado() {
        return $this->estado;
    }

    private function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getCiudad() {
        return $this->ciudad;
    }

    private function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    private function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getEmail() {
        return $this->email;
    }

    private function setEmail($email) {
        $this->email = $email;
    }

    public function getTelefonoLocal() {
        return $this->telefonoLocal;
    }

    private function setTelefonoLocal($telefonoLocal) {
        $this->telefonoLocal = $telefonoLocal;
    }

    public function getTelefono_Movil() {
        return $this->telefono_Movil;
    }

    private function setTelefono_Movil($telefono_Movil) {
        $this->telefono_Movil = $telefono_Movil;
    }

    public function getPregunta_seguridad() {
        return $this->pregunta_seguridad;
    }

    private function setPregunta_seguridad($pregunta_seguridad) {
        $this->pregunta_seguridad = $pregunta_seguridad;
    }

    public function getRepuesta_seguridad() {
        return $this->repuesta_seguridad;
    }

    private function setRepuesta_seguridad($repuesta_seguridad) {
        $this->repuesta_seguridad = $repuesta_seguridad;
    }

    public function getPerfil() {
        return $this->perfil;
    }

    private  function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    public function getLevel() {
        return $this->level;
    }

    private  function setLevel($level) {
        $this->level = $level;
    }

    public function getIsVisible() {
        return $this->isVisible;
    }

    private  function setIsVisible($isVisible) {
        $this->isVisible = $isVisible;
    }


    public function InsertarUsuario($arregloValores = null)
    {
        $tabla = null;
	$data = null;
           
    $tabla[0] = 'users';
	$data = new arregloTablaCampos($tabla);
	$data->PonerValores($arregloValores);
	$rep = $data->Insertar();

    }

    // Modificar Usuario
	public function Modificar_Usuario($codigo = "", $arregloValores = null)
	{
		$tabla = null;
	$data = null;
	$criterio = null;

    $tabla[0] = 'users';
	$data = new arregloTablaCampos($tabla);
	$criterio['user_id'] = $codigo;
	$data->PonerCondicion($criterio);
	$data->PonerValores($arregloValores);
	$data->Modificar();

	}

        public function SeleccionarUsuario($login = "", $clave = "")
        {
             $tabla = null;
	$data = null;
	$criterio = null;
	$usuario = null;

	$tabla[0] = 'users';
        $tabla[1] = 'profiles';
        $tabla[2] = 'countries';
        $tabla[3] = 'states';
        $tabla[4] = 'citys';
	$data = new arregloTablaCampos($tabla);
	$criterio['username'] = "'".$login."'";
        $criterio['password'] = "'".md5($clave)."'";
        $criterio['users.profile_id'] = "profiles.profile_id";
        $criterio['users.country_id'] = "countries.country_id";
        $criterio['users.state_id'] = "states.id_state";
        $criterio['users.city_id'] = "citys.city_id";
	$data->PonerCondicion($criterio);
   $row = $data->Seleccionar();
   if (count($row)>0)
   {
       $usuario = new Usuario();

       $usuario->setUser_id($row[1][1]);
       $usuario->setLogin($row[1][2]);
       $usuario->setRif_ci($row[1][12].$row[1][13]);
       $usuario->setNombres($row[1][7]);
       $usuario->setApellidos($row[1][8]);
       $usuario->setRazon_social($row[1][14]);
       $usuario->setEmail($row[1][9]);
       $usuario->setDireccion($row[1][10]);
       $usuario->setTelefonoLocal($row[1][15]);
       $usuario->setTelefono_Movil($row[1][16]);
       $usuario->setPregunta_seguridad($row[1][18]);
       $usuario->setRepuesta_seguridad($row[1][19]);
       $usuario->setPais($row[1][29]);
       $usuario->setEstado($row[1][32]);
       $usuario->setCiudad($row[1][36]);
   }

   return $usuario;

        }

         public function SeleccionarUsuario_Id($id = 0)
        {
             $tabla = null;
	$data = null;
	$criterio = null;
	$usuario = null;

	$tabla[0] = 'users';
        $tabla[1] = 'profiles';
        $tabla[2] = 'countries';
        $tabla[3] = 'states';
        $tabla[4] = 'citys';
	$data = new arregloTablaCampos($tabla);
	$criterio['user_id'] = $id;
        $criterio['users.profile_id'] = "profiles.profile_id";
        $criterio['users.country_id'] = "countries.country_id";
        $criterio['users.state_id'] = "states.id_state";
        $criterio['users.city_id'] = "citys.city_id";
	$data->PonerCondicion($criterio);
   $row = $data->Seleccionar();
   if (count($row)>0)
   {
       $usuario = new Usuario();

       $usuario->setUser_id($row[1][1]);
       $usuario->setLogin($row[1][2]);
       $usuario->setRif_ci($row[1][12].$row[1][13]);
       $usuario->setNombres($row[1][7]);
       $usuario->setApellidos($row[1][8]);
       $usuario->setRazon_social($row[1][14]);
       $usuario->setEmail($row[1][9]);
       $usuario->setDireccion($row[1][10]);
       $usuario->setTelefonoLocal($row[1][15]);
       $usuario->setTelefono_Movil($row[1][16]);
       $usuario->setPregunta_seguridad($row[1][18]);
       $usuario->setRepuesta_seguridad($row[1][19]);
       $usuario->setPais($row[1][29]);
       $usuario->setEstado($row[1][32]);
       $usuario->setCiudad($row[1][36]);
   }

   return $usuario;

        }
        
        public function SeleccionarUsuario_RifCI($rif = "")
        {
             $tabla = null;
	$data = null;
	$criterio = null;
	$usuario = null;

	$tabla[0] = 'users';
        $tabla[1] = 'profiles';
        $tabla[2] = 'countries';
        $tabla[3] = 'states';
        $tabla[4] = 'citys';
	$data = new arregloTablaCampos($tabla);
	$criterio['letterrif'] = "'".substr($rif, 0,1)."'";
        $criterio['rif'] = "'".substr($rif, 1)."'";
        $criterio['users.profile_id'] = "profiles.profile_id";
        $criterio['users.country_id'] = "countries.country_id";
        $criterio['users.state_id'] = "states.id_state";
        $criterio['users.city_id'] = "citys.city_id";
	$data->PonerCondicion($criterio);
   $row = $data->Seleccionar();
   if (count($row)>0)
   {
       $usuario = new Usuario();

       $usuario->setUser_id($row[1][1]);
       $usuario->setLogin($row[1][2]);
       $usuario->setRif_ci($row[1][12].$row[1][13]);
       $usuario->setNombres($row[1][7]);
       $usuario->setApellidos($row[1][8]);
       $usuario->setRazon_social($row[1][14]);
       $usuario->setEmail($row[1][9]);
       $usuario->setDireccion($row[1][10]);
       $usuario->setTelefonoLocal($row[1][15]);
       $usuario->setTelefono_Movil($row[1][16]);
       $usuario->setPregunta_seguridad($row[1][18]);
       $usuario->setRepuesta_seguridad($row[1][19]);
       $usuario->setPais($row[1][29]);
       $usuario->setEstado($row[1][32]);
       $usuario->setCiudad($row[1][36]);
   }

   return $usuario;

        }
        
        public function SeleccionarUsuario_Apodo($apodo = "")
        {
             $tabla = null;
	$data = null;
	$criterio = null;
	$usuario = null;

	$tabla[0] = 'users';
        $tabla[1] = 'profiles';
        $tabla[2] = 'countries';
        $tabla[3] = 'states';
        $tabla[4] = 'citys';
	$data = new arregloTablaCampos($tabla);       
        $criterio['users.profile_id'] = "profiles.profile_id";
        $criterio['users.country_id'] = "countries.country_id";
        $criterio['users.state_id'] = "states.id_state";
        $criterio['users.city_id'] = "citys.city_id";
        $criterio['seudonimo'] = $apodo;
	$data->PonerCondicion($criterio);
   $row = $data->SeleccionarconLike();
   if (count($row)>0)
   {
       $usuario = new Usuario();

       $usuario->setUser_id($row[1][1]);
       $usuario->setLogin($row[1][2]);
       $usuario->setRif_ci($row[1][12].$row[1][13]);
       $usuario->setNombres($row[1][7]);
       $usuario->setApellidos($row[1][8]);
       $usuario->setRazon_social($row[1][14]);
       $usuario->setEmail($row[1][9]);
       $usuario->setDireccion($row[1][10]);
       $usuario->setTelefonoLocal($row[1][15]);
       $usuario->setTelefono_Movil($row[1][16]);
       $usuario->setPregunta_seguridad($row[1][18]);
       $usuario->setRepuesta_seguridad($row[1][19]);
       $usuario->setPais($row[1][21]);
       $usuario->setEstado($row[1][22]);
       $usuario->setCiudad($row[1][3]);
   }

   return $usuario;

        }


        public function  SelectMax_Id_User()
        {
            $idMax =  0;
            $tabla = null;
	$data = null;
	$criterio = null;

	$tabla[0] = 'users';

	$data = new arregloTablaCampos($tabla);
	$condicion['user_id'] = "user_id";
	$data->PonerCampoMax($condicion);
        $row = $data->SeleccionarMax();

       if (count($row)>0)
        {
           $idMax = $row[1][1];
        }

        return $idMax;

        }

}
?>
