<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pais
 *
 * @author pablo
 */
class Pais {
    private $id = null;
    private $nombre = null;

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

    public function SeleccionarPais($id_pais = "")
    {
          $tabla = null;
	$data = null;
	$criterio = null;
	$pais = null;

	$tabla[0] = 'countries';
	$data = new arregloTablaCampos($tabla);
	$criterio['country_id'] = $id_pais;
	$data->PonerCondicion($criterio);
   $row = $data->Seleccionar();
   if (count($row)>0)
   {
     $pais = new Pais();
     $pais->setId($row[1][1]);
     $pais->setNombre($row[1][2]);
       
   }

   return $pais;

    }

     public function SeleccionarTodos()
    {
          $tabla = null;
	$data = null;
	$paisList = null;

	$tabla[0] = 'countries';
	$data = new arregloTablaCampos($tabla);
   $row = $data->Seleccionar();
   if (count($row)>0)
   {

   	$ite = 1;
	$indice = 0;
   	while($ite <= count($row))
	{
     $paisList[$indice] = new Pais();
     $paisList[$indice]->setId($row[$ite][1]);
     $paisList[$indice]->setNombre($row[$ite][2]);

          ++$indice;
          ++$ite;

        }

   }

   return $paisList;

    }


}
?>
