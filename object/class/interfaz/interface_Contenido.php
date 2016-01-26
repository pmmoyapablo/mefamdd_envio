<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Pablo Moya
 */
interface Interface_Contenido {
    //put your code here
    public function Set_Style($css = ""); 
    public function Set_JS($js = "");
    public function Set_Body($contenido = "");
    public function Get_Body();
    public function Set_Mensaje($mensaje = "");
    public function Get_Mensaje();

}

?>