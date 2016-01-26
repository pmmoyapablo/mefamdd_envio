<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of view_base
 *
 * @author Pablo Moya
 */
class View_base {
    //put your code here
protected  $body = null;
protected  $css = null;
protected  $js = null;
protected  $arrayPost = null;
protected  $isAutentica = false;

protected  function  __construct($titulo = "", $jscrip = "",$style = "", $user = null, $isLogin = false)
{
    $this->isAutentica = $isLogin;
    if($this->isAutentica)
    {
       require_once "../../lib/classlibSession.php";
            $session = new classlibSession();
            $variable = "itemsEnCesta";
            $session->flibRegister($variable);
           // $arregloDatos = array("itemsEnCesta" => null);
           // $session->flibCrearVariable($arregloDatos, 1);
            /*
            if($user != null)
            {
                $arregloDatos = array( "id" => $user->getUser_id(), "usuario" => $user->getLogin(), "nombres" => $user->getNombres(),
                                      "apellidos" => $user->getApellidos(), "rif_ci" => $user->getRif_ci(),
                                       "razonsocial" => $user->getRazon_social(), "email" => $user->getEmail());
                $session->flibCrearVariable($arregloDatos, 1);
            }
             
             */
    }
    $this->Abrir_Html($titulo, $jscrip ,$style);
   
}

private  function Abrir_Html($titulo = "",$jscrip = "",$style = "")
{
    echo  "<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>".$titulo."</title>
    ".$jscrip."
    ".$style."
</head>
<body><center>";
}

protected  function CerrarHiperTexto()
{
	echo "</center></body>
     </html>";
}

protected function CreteMenu($tilulo = "", $submenu = null )
{
    $menu = "<br><table>
               <tr>
                   <td>".$tilulo."</td>
               </tr>";

    foreach ($submenu as $campo => $valor)
    {
        $menu .= " <tr>
                      <td><a href='".$valor."' target='mainFrame'>".$campo."</a></td>
                   </tr>";
    }

     $menu .= "</table>";

    return $menu;
}

protected function CreateForm($name = "", $action = "", $onSubmit = "", $arrayField = null, $button = null)
{
    $form = "<table>
             <form  name = '".$name."' method='post' action='".$action."' onSubmit = '".$onSubmit."' >";
    
    foreach ($arrayField as $campo => $valor)
    {
      $form .=  "<tr>
                     <td>".$valor."</td>
                 </tr>";
    }
    
     $form .=  "<tr>
                    <td><p>&nbsp;</p></td>
                </tr>
                 <tr>
                     <td align = 'center'>".$button."</td>
                 </tr>";
    
     $form .= "</form></table>";
     
     return $form;
}

protected function  ClearString($cadena)
{
 // Add Slashes
  if (get_magic_quotes_gpc()!=1)
   {$cadena=addslashes($cadena);}
   
  // Filtros Html
   $cadena = htmlentities($cadena);

        return $cadena;

}

protected function ClearArrayString()
{
     foreach($this->arrayPost as  $campo => $valor )
 {
  if (get_magic_quotes_gpc()!=1)
   {$valor=addslashes($valor);}
 }

}

protected function FinalizarSession()
{
    require_once "../../lib/classlibSession.php";

$user = null;
$session = new classlibSession();
$session->flibDestrurtor();

}

}

?>
