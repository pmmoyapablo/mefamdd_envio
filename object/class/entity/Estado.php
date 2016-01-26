<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estado
 *
 * @author pablo
 */
class Estado {
    //put your code here
    private $id = null;
    private $nombre = null;
    private $pais = null;

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
    public function getPais() {
        return $this->pais;
    }

    private  function setPais($pais) {
        $this->pais = $pais;
    }
    
    public function SelecionarTodosEstado()
    {
         $tabla = null;
	$data = null;	
	$estado = null;
        $estadoList = null;

	$tabla[0] = 'states';   
	$data = new arregloTablaCampos($tabla);
        $orden["description_state"] = "description_state";
        $data->PonerOrden($orden);
        $row = $data->Seleccionar();
   
  if (count($row)>0)
   {
   	$ite = 1;
	$indice = 0;
   	while($ite <= count($row))
	{
     $estadoList[$indice] = new Estado();
     $estadoList[$indice]->setId($row[$ite][1]);
     $estadoList[$indice]->setNombre($row[$ite][2]);
     
          ++$ite;
          ++$indice;
        }


   }

      return $estadoList;
      
    }


    public function SelecionarEstadoId($id_estado = "", $id_pais = "")
    {
         $tabla = null;
	$data = null;
	$criterio = null;
	$estado = null;

	$tabla[0] = 'states';
        $tabla[1] = 'countries';
	$data = new arregloTablaCampos($tabla);
	$criterio['id_state'] = $id_estado;
        $criterio['id_countrie_state'] = $id_pais;
        $criterio['states.id_countrie_state'] = "countries.country_id";
	$data->PonerCondicion($criterio);
   $row = $data->Seleccionar();
   if (count($row)>0)
   {
     $estado = new Estado();
     $estado->setId($row[1][1]);
     $estado->setNombre($row[1][2]);
     $estado->setPais($row[1][5]);

   }

   return $estado;
    }

    public function SelecionarEstadoId_Pais($id_pais = "")
    {
         $tabla = null;
	$data = null;
	$criterio = null;
	$estadoList = null;

	$tabla[0] = 'states';
        $tabla[1] = 'countries';
	$data = new arregloTablaCampos($tabla);
	$criterio['id_countrie_state'] = $id_pais;
        $criterio['states.id_countrie_state'] = "countries.country_id";
	$data->PonerCondicion($criterio);
   $row = $data->Seleccionar();
   if (count($row)>0)
   {


   	$ite = 1;
	$indice = 0;
   	while($ite <= count($row))
	{
     $estadoList[$indice] = new Estado();
     $estadoList[$indice]->setId($row[$ite][1]);
     $estadoList[$indice]->setNombre($row[$ite][2]);
     $estadoList[$indice]->setPais($row[$ite][5]);
     
          ++$ite;
          ++$indice;
        }


   }

   return $estadoList;
    }

}
?>
