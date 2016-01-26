<?php
/*
    Caracas; 23/03/2006
    Clase Libreria de Fechas y Horas (classLibFecHor)
*/
	class classlibFecHor
	{
		function classlibFecHor()
		{
		}
		/*
		    Funcion de libreria, Mes en String (flibMesString($numMes))
		    $numMes: un numero entre [01,12] y 
		    retorna el mes asociado a ese numero.
		*/
		function flibMesString($numMes)
        {
            if($numMes>=1 && $numMes<=12)
            {
            	$nombreMes= array(
            		"1"	=>"Enero",
            		"2"	=>"Febrero",
            		"3"	=>"Marzo",
            		"4"	=>"Abril",
            		"5"	=>"Mayo",
            		"6"	=>"Junio",
            		"7"	=>"Julio",
            		"8"	=>"Agosto",
            		"9"	=>"Septiembre",
            		"10"=>"Octubre",
            		"11"=>"Noviembre",
            		"12"=>"Diciembre");
            	return $nombreMes[$numMes];
            }
            else
            {
                return "Error 0001: Valor del par�metro incorrecto. [01,12]";
            }
        }
		/*
    		Funcion de libreria, Invertir de Espa�ol a Ingles flibInvertirEsIn($fechaEs)
    		Formato Espa�ol: dd/mm/yyyy
    		Formato Ingles: yyyy/mm/dd 
		*/
		function flibInvertirEsIn($fechaEs)
        {
        	$dia=substr($fechaEs, 0, 2);
        	$mes=substr($fechaEs, 3, 2);
        	$ano=substr($fechaEs, 6, 4);
        	$fechaIn = $ano."-".$mes."-".$dia;
        	return $fechaIn;
        }
        /*
    		Funcion de libreria, Invertir de Ingles a Espa�ol flibInvertirInEs($fechaIn)
    		Formato Ingles: yyyy/mm/dd 
    		Formato Espa�ol: dd/mm/yyyy
		*/
		function flibInvertirInEs($fechaIn)
        {
        	$dia=substr($fechaIn, 8, 2);
        	$mes=substr($fechaIn, 5, 2);
        	$ano=substr($fechaIn, 0, 4);
        	$fechaEs = ($dia."/".$mes."/".$ano);
        	return $fechaEs;
        }
		/*
            Funcion libreria, Suma N dias a una fecha Dada flibSumNdiaFecha($nDia, $fecha, $formato)
            Uso de los par�metros:
                $nDia: Numeros de d�as que se desean Sumar
                $fecha: Fecha que se le desea sumar los d�as
                $formato:
                            0 => Indica si es Espa�ol. (dd/mm/yyyy)
                            1 => Indica si es Ingles. (yyyy/mm/dd)
        */
        function flibSumNdiaFecha($nDia="", $fecha="", $formato="")
        {
            if($formato>=0 && $formato<=1)
            {
                if($nDia>=0)
                {
                    if($formato==0)
                        $fechaFun=$this->flibInvertirEsIn($fecha);//Convertimos al formato ingles
                    else
                        $fechaFun=$fecha;
                    //Extraemos las sub cadenas
                    $dia=substr($fechaFun, 8, 2);
                	$mes=substr($fechaFun, 5, 2);
                	$ano=substr($fechaFun, 0, 4);
                    $fechaFunAux= mktime (0, 00, 00, $mes, $dia, $ano );
                    $sum=$fechaFunAux + 86400*$nDia;
                    $fechaFun= getdate($sum);
					// Para poder hacer la conversion de datos
                    if($fechaFun['mday']<10)
                    {
                    	$dia="0".$fechaFun['mday'];
                    }
                    else
                    {
                    	$dia=$fechaFun['mday'];
                    }
                    // Para poder hacer la conversion de datos
                    if($fechaFun['mon']<10)
                    {
                    	$mes="0".$fechaFun['mon'];
                    }
                    else
                    {
                    	$mes=$fechaFun['mon'];
                    }
                    $fechaFun=$fechaFun['year']."/".$mes."/".$dia;
                    if($formato==0)
                        return $this->flibInvertirInEs($fechaFun);
                    else
                        return $fechaFun;
                }
                else
                {
                    return "Error 0001: Valor del par�metro 'nDia' incorrecto. [nDia >= 0]";
                }
            }
            else
            {
                return "Error 0001: Valor del par�metro 'Formato' incorrecto. [0,1]";
            }
        }
        /*
            Funcion libreria, Resta N dias a una fecha Dada flibResNdiaFecha($nDia, $fecha, $formato)
            Uso de los par�metros:
                $nDia: Numeros de d�as que se desean Sumar
                $fecha: Fecha que se le desea restar los d�as
                $formato:
                            0 => Indica si es Espa�ol. (dd/mm/yyyy)
                            1 => Indica si es Ingles. (yyyy/mm/dd)
        */
        function flibResNdiaFecha($nDia, $fecha, $formato)
        {
            if($formato>=0 && $formato<=1)
            {
                if($nDia>=0)
                {
                    if($formato==0)
                        $fechaFun=$this->flibInvertirEsIn($fecha);//Convertimos al formato ingles
                    else
                        $fechaFun=$fecha;
                    //Extraemos las sub cadenas
                    $dia=substr($fechaFun, 8, 2);
                	$mes=substr($fechaFun, 5, 2);
                	$ano=substr($fechaFun, 0, 4);
                    $fechaFunAux= mktime (0, 00, 00, $mes, $dia, $ano );
                    $resta=$fechaFunAux - 86400*$nDia;
                    $fechaFun= getdate($resta);
                    if($fechaFun['mday']<10)
                    {
                    	$dia="0".$fechaFun['mday'];
                    }
                    else
                    {
                    	$dia=$fechaFun['mday'];
                    }
                    // Para poder hacer la conversion de datos
                    if($fechaFun['mon']<10)
                    {
                    	$mes="0".$fechaFun['mon'];
                    }
                    else
                    {
                    	$mes=$fechaFun['mon'];
                    }
                    $fechaFun=$fechaFun['year']."/".$mes."/".$dia;
                    if($formato==0)
                        return $this->flibInvertirInEs($fechaFun);
                    else
                        return $fechaFun;
                }
                else
                {
                    return "Error 0001: Valor del par�metro 'nDia' incorrecto. [nDia >= 0]";
                }
            }
            else
            {
                return "Error 0001: Valor del par�metro 'Formato' incorrecto. [0,1]";
            }
        }
         /*
            Funcion de libreria, Data Time (flibDataTime())
            Retorna el dato: Dia y Hora actual, unidos.
   		*/
   		function flibDataTime()
   		{
   			return $this->flibDia()." ".date("H:i:s");
   		}
   		/*
            Funcion de libreria, Dia Actual del Servidor (flibDia())
            Retorna el d�a actual en formato Ingles.
        */
        function flibDia()
        {
        	return date("Y-m-d");
        }
        /*
            Funcion de libreria, Hora Actual del servidor (flibHora())
            retorna la hora actual en formato: Hora:Minutos:Segundos
        */
        function flibHora()
        {
        	return date("H:i:s a");
        }
        /*
            Funcion de libreria,
        */
        function flibAnoActual()
        {
        	return date("Y");
        }
        /*
            Funcion de libreria,
        */
        function flibMesActual()
        {
        	return date("n");
        }
		 /*
            Devuelve el nombre del dia de la semana de una fecha actual
        */
		function Dia_Semana()
		{
		   $var= date("w"); 
		   $dia = "";
           switch($var) { 
		   
              case 0: $dia = "Domingo"; 
              break; 
			  
              case 1: $dia = "Lunes"; 
              break; 
			  
			   case 2: $dia = "Martes"; 
              break; 
			  
			   case 3: $dia = "Miercoles"; 
              break; 
			  
			   case 4: $dia = "Jueves"; 
              break; 
			  
			  case 5: $dia = "Viernes"; 
              break;
			  
              case 6: $dia = "Sabado"; 
              break; 
			  
                     }  

		     return $dia;
		}
		/*
            Devuelve el nombre del dia de la semana de una fecha pasada
			parametro: $fechaAnt = fecha  vieja a la que se le quiere sacar el nombre del dia
        */
		function Dia_SemanaPas($fechaAnt = "")
		{
		 	   
		   $array_dias['Sunday'] = "Domingo";
			$array_dias['Monday'] = "Lunes";
			$array_dias['Tuesday'] = "Martes";
			$array_dias['Wednesday'] = "Miercoles";
			$array_dias['Thursday'] = "Jueves";
			$array_dias['Friday'] = "Viernes";
			$array_dias['Saturday'] = "Sabado";

			$fecha = $fechaAnt;

        $diaSem = $array_dias[date('l', strtotime($fecha))]; 

		     return $diaSem;
		}
		/*Convierte una fecha DateTime  en una fecha string*/
		function convertir_fecha($fecha_datetime)
		{
		$fecha = split("-",$fecha_datetime);
		$dia = substr($fecha[2],0,2);
		$fecha_convertida=$dia.'-'.$fecha[1].'-'.$fecha[0];
		 		 	
		return $fecha_convertida;
		}
		/*Convierte una hora DateTime  en una hora string*/
		function convertir_hora($fecha_datetime)
		{
		$hora = split(":",$fecha_datetime);
		$hor = substr($hora[0],11,2);
		$fecha_convertida=$hor.':'.$hora[1];
		$nh = (int)substr($fecha_convertida,0,2); 
		
		 if ( $nh >= 12)
		     {
              if($nh > 12)			 
			 $hi =  $nh - 12;
			 else
			 $hi =  $nh;
			 
			$hstr = (string)$hi;
			 $fecha_convertida = $hstr.substr($fecha_convertida,2)." pm";
			 }elseif($nh = 0)
			 $fecha_convertida = "12".substr($fecha_convertida,2)." am";
			 else
			 $fecha_convertida = $fecha_convertida." am";
		
		return $fecha_convertida;
		}
    }
?>