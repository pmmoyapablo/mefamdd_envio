<?php
/*
    Caracas; 28/03/2006
    Clase Libreria de Session (classLibSession)
*/
	class classlibSession 
	{
		/*
			Construcctor de la clase classlibSession()
			Continua y crea la Session.
		*/
		function classlibSession()
		{
			session_start();
		}
		/*
			Funcion de Libreria Crear Variable (flibCrearVariable)
			Esta funcion crea todas las variables session que se le solicite a traves del
			arreglo asociativo $arregloDatos que es el parametro de la funcion.
			El arreglo asociativo debe estar de la siguiente manera:
			
			$arregloDatos['nombreVarSession']=$valorVarSession;
			
			Donde:
			$arregloDatos: Nombre de la variable arrays.
			$inicial: es para saber si se usara al inicio:
				1 = Si, la funcion es de incio.
				2 = No, solo registre las variables que envio.
		*/
		function flibCrearVariable($arregloDatos, $inicial)
		{
			$i=0; $j=1;// Contador
			foreach($arregloDatos as  $nombreVarSession => $valorVarSession )
	         {
	         	if ($inicial==1)
	         	{ 
	         	   $_SESSION[$nombreVarSession] = $valorVarSession; 
	         	}
	         	else
	         	{
	         		$_SESSION[$nombreVarSession]=$valorVarSession; 
	         	}
	         	$i++;
	         }
		}
                /*
			Funcion de libreria Register (session_register($variableAraay))
			Esta funcion registra una variable arreglo en  la session.
		*/
                function flibRegister($variable)
                {   
                    //session_register($variable); 
                }
		/*
			Funcion de libreria Destructor (flibDestrurtor())
			Esta funcion destruye toda la session.
		*/
		function flibDestrurtor()
		{
			session_unset(); 
		}
	}
?>