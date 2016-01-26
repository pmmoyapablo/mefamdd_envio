<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ciudad
 *
 * @author pablo
 */
class Ciudad {
    //put your code here
    private $id = null;
    private $nombre = null;
    private $Estado = null;

     public function  __construct() {
         include_once  '../class/arraysql/arregloTablaCampos.php';
    }
    public function getId() {
        return $this->id;
    }

    private function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    private function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function getEstado() {
        return $this->Estado;
    }

    private  function setEstado($Estado) {
        $this->Estado = $Estado;
    }

    public function SelecionarCiudadTodas()
    {
         $tabla = null;
	$data = null;
	$ciudad = null;
        $ciudadList = null;

	$tabla[0] = 'citys';      
	$data = new arregloTablaCampos($tabla);	
        $orden["description_city"] = "description_city";
        $data->PonerOrden($orden);
   $row = $data->Seleccionar();
 
   if (count($row)>0)
   {
   	$ite = 1;
	$indice = 0;
   	while($ite <= count($row))
	{
     $ciudadList[$indice] = new Ciudad();
     $ciudadList[$indice]->setId($row[$ite][1]);
     $ciudadList[$indice]->setNombre($row[$ite][3]);
     
        ++$ite;
          ++$indice;
        }


   }

   return $ciudadList;
    }
    
    public function SelecionarCiudadId($id_city = "")
    {
          $tabla = null;
	$data = null;
	$criterio = null;
	$ciudad = null;

	$tabla[0] = 'citys';
       // $tabla[1] = 'states';
	$data = new arregloTablaCampos($tabla);
	$criterio['citys.city_id'] = $id_city;
       // $criterio['citys.id_state'] = "states.id_state";
	$data->PonerCondicion($criterio);
   $row = $data->Seleccionar();
   if (count($row)>0)
   {
     $ciudad = new Ciudad();
     $ciudad->setId($row[1][1]);
     $ciudad->setNombre($row[1][3]);
   }

   return $ciudad;
    }

    public function SelecionarCiudadId_Estado($id_Estado = "")
    {
         $tabla = null;
	$data = null;
	$criterio = null;
	$ciudadList = null;

	$tabla[0] = 'citys';
        $tabla[1] = 'states';
	$data = new arregloTablaCampos($tabla);
	$criterio['id_state2'] = $id_Estado;
        $criterio['citys.id_state2'] = "states.id_state";
	$data->PonerCondicion($criterio);
   $row = $data->Seleccionar();
   if (count($row)>0)
   {


   	$ite = 1;
	$indice = 0;
   	while($ite <= count($row))
	{
     $ciudadList[$indice] = new Ciudad();
     $ciudadList[$indice]->setId($row[$ite][1]);
     $ciudadList[$indice]->setNombre($row[$ite][3]);
     $ciudadList[$indice]->setEstado($row[$ite][2]);
     
        ++$ite;
          ++$indice;
        }


   }

   return $ciudadList;
    }
   
    public function Comprobar_Ciudad_In_Estado($idCity = 0, $idState = 0)
    {
         $tabla = null;
	$data = null;
	$criterio = null;
        
        $tabla[0] = 'citys';
        
        $data = new arregloTablaCampos($tabla);
        $criterio['id_state2'] = $idState;
        $criterio['city_id'] = $idCity;
        $data->PonerCondicion($criterio);
   $row = $data->Seleccionar();
   
   if (count($row)>0)
   {
       return true;
   }
   else
   {
       return false;
   }
   
    }
}
?>