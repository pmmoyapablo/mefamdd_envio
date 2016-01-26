<?php
require_once ('../../object/class/interfaz/i_Menu.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$isAutentica = false; 
$errorMsn = "";
$user = null;

if(isset ($_POST['txt_login']) && isset ($_POST['txt_clave']))
   {
    
     require_once "../../object/class/entity/Usuario.php";
            
            $usuario = new Usuario();           
           $user = $usuario->SeleccionarUsuario($_POST['txt_login'], $_POST['txt_clave']);
                
            if($user != null)
             {                    
            $isAutentica = true; 
            } 
             else
             {
                 $errorMsn = "<tr><td><font face= 'arial' color = 'red'>Datos Incorrectos!</font></td></tr>";
                $isAutentica = false; 
             }
   }
   
   if(isset($_GET['cerrar']))
   {
   require_once "../../lib/classlibSession.php";

$user = null;
$isAutentica = false; 
$errorMsn = "";
$session = new classlibSession();
$session->flibDestrurtor();
   }
   
$objetoVie = new I_Menu("Menu Principal", $user, $isAutentica,$errorMsn);
?>