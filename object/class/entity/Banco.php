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
class Banco{
	 //put your code here
    private $id = null;
    private $nombre = null;
    private $cuenta = null;
    private $tipo = null;
    private $titular = null;


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
    
    public function getCuenta()
    {
        return $this->cuenta;
    }
    
    private function setCuenta($cta)
    {
        $this->cuenta = $cta;
    }
    
    public function getTipo()
    {
        return $this->tipo;
    }
    
    private function setTipo($tip)
    {
        $this->tipo = $tip;
    }
    
    public function getTitular()
    {
        return $this->titular;
    }
    
    private function setTitular($tit)
    {
        $this->titular = $tit;
    }

    public function SeleccionarBanco($id_bank = "")
    {
          $tabla = null;
	$data = null;
	$criterio = null;
	$banco = null;

	$tabla[0] = 'banks';
	$data = new arregloTablaCampos($tabla);
	$criterio['bank_id'] = $id_bank;
	$data->PonerCondicion($criterio);
   $row = $data->Seleccionar();
   if (count($row)>0)
   {
     $banco = new Banco();
     $banco->setId($row[1][1]);
     $banco->setNombre($row[1][2]);
     $banco->setCuenta($row[1][3]);
     $banco->setTipo($row[1][4]);
     $banco->setTitular($row[1][5]);
       
   }

   return $banco;

    }
    
    public function SeleccionarTodos()
    {
          $tabla = null;
	$data = null;
	$bankList = null;

	$tabla[0] = 'banks';
	$data = new arregloTablaCampos($tabla);
   $row = $data->Seleccionar();
   if (count($row)>0)
   {

   	$ite = 1;
	$indice = 0;
   	while($ite <= count($row))
	{
     $bankList[$indice] = new Banco();
     $bankList[$indice]->setId($row[$ite][1]);
     $bankList[$indice]->setNombre($row[$ite][2]);
     $bankList[$indice]->setCuenta($row[$ite][3]);
     $bankList[$indice]->setTipo($row[$ite][4]);
     $bankList[$indice]->setTitular($row[$ite][5]);

          ++$indice;
          ++$ite;

        }

   }

   return $bankList;

    }
    
	
}
?>