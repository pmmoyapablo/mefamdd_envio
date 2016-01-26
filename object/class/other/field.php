<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of field
 *
 * @author Pablo Moya
 */
class Field {
    //put your code here
    private $label1 = null;
    private $label2 = null;
    private $etiqueta = null;
    private $closed_etiqueta = null;
    private $name = null;
    private $type = null;
    private $size = null;
    private $rows = null;
    private $cols = null;
    private $value = null;
    private $maxLenth = null;
    private $listOptions = null;
    private $class = null;
    private $disabled = null;
    private $onClick = null;
    private $onkeypress = null;
    private $onchange = null;
    private $icono = null;


    public function __construct() {
        
    }
    
    public function getField()
    {
        $slath = "/";
        $type = "type = '".$this->getType()."'";
        $dimension = null;
        
        if($this->getEtiqueta() != "input")
        {
         $slath = "";
         $type = "";
         
         if($this->getEtiqueta() == "textarea")
         { $dimension = " rows = '".$this->getRows()."' cols = '".$this->getCols()."' ";}
        }                           
        
        return $this->getLabel1()."<".$this->getEtiqueta()." ".$type." name = '".$this->getName()."' size = '".$this->getSize()."' maxlength = '".$this->getMaxLenth()
                ."' value = '".$this->getValue()."' ".$dimension." class = '".$this->getClass()."' onClick = '".$this->getOnClick()."' onkeypress = '".$this->getOnKeyPess()."' onchange = '".$this->getOnChange()."' ".$this->getDisabled()." ".$slath.">"
                .$this->getListOptions().
                $this->getIcon().
                $this->getClosed_Etiqueta()." ".$this->getLabel2();
    }
    private function getRows() {
        return $this->rows;
    }

    public function setRows($rows) {
        $this->rows = $rows;
    }

    private function getCols() {
        return $this->cols;
    }

    public function setCols($cols) {
        $this->cols = $cols;
    }
    
     private function getIcon() {
        return $this->icono;
    }

    public function setIcon($ico) {
        $this->icono = $ico;
    }
    
    public function  setOnClick($click)
    {
    	$this->onClick = $click;
    }
    
    private function  getOnClick()
    {
    	return $this->onClick;
    }
    
    public function  setOnKeyPess($key)
    {
    	$this->onkeypress = $key;
    }
    
    private function  getOnKeyPess()
    {
    	return $this->onkeypress;
    }
    
     public function  setOnChange($evento)
    {
    	$this->onchange = $evento;
    }
    
    private function  getOnChange()
    {
    	return $this->onchange;
    }

        private function getSize() {
        return $this->size;
    }

    public function setSize($size) {
        $this->size = $size;
    }

    private function getEtiqueta() {
        return $this->etiqueta;
    }

    public function setEtiqueta($etiqueta) {
        $this->etiqueta = $etiqueta;
        
        if($etiqueta != "input")
        {
                        $this->setClosed_Etiqueta($etiqueta);                            
        }
    }
    
     private function getClosed_Etiqueta() {
        return $this->closed_etiqueta;
    }

   private function setClosed_Etiqueta($etiqueta) {
        $this->closed_etiqueta = "</".$etiqueta.">";
    }

        private function getMaxLenth() {
        return $this->maxLenth;
    }

    public function setMaxLenth($maxLenth) {
        $this->maxLenth = $maxLenth;
    }
        private function getLabel1() {
return $this->label1;
}

public function setLabel1($label1) {
$this->label1 = $label1;
}

private function getLabel2() {
return $this->label2;
}

public function setLabel2($label2) {
$this->label2 = $label2;
}

private function getName() {
return $this->name;
}

public function setName($name) {
$this->name = $name;
}

private function getType() {
return $this->type;
}

public function setType($type) {
$this->type = $type;
}

private function getValue() {
return $this->value;
}

public function setValue($value) {
$this->value = $value;
}

private function getListOptions() {
return $this->listOptions;
}

public function setListOptions($listOptions) {
    if($this->getEtiqueta() == "select")
    {  // $listOptions es un array de opciones => value 
        foreach ($listOptions as $campo => $valor)
        {
            if($valor != null)
            { $this->listOptions .= "<option value = '".$valor."'>".$campo."</option>"; }
        }
    }
    else
    {$this->listOptions = $listOptions;}
}

private function getClass() {
return $this->class;
}

public function setClass($class) {
$this->class = $class;
}

private function getDisabled() {
return $this->disabled;
}

public function setDisabled($disabled) {
$this->disabled = $disabled;
}

}


?>
