<?php
/*
    Caracas; 20/03/2009
    Clase Base de Datos (classdb)
    Version 2.0.
*/
	class classdb
	{
		//Variables Globales de la Clase
		var $dbName="", $dbLogin="", $dbPassword="", $dbServidor="", $dbPuerto="";
		var $conElem="";
		/*
			Constructor de la aplicaci�n, se le envia por parametro la ruta del archivo 
			que contiene la informacion necesaria para establecer la conexiond de la base
			de datos, Este archivo debe tener:
			$archivoName: Tiene el nombre de la Base de Datos
			$archivoLogin: Tiene el login de la Base de Datos
			$archivoPas: Tiene el password de la Base de Datos
			$archivoServidor: Contiene el Root de la Base de Datos
			$archivoPuerto: Contiene el n�mero del puerto
		*/
		function classdb($archivoInfoDb)
		{
			require($archivoInfoDb);
			$this->dbName=$database_conexfamdd;
			$this->dbLogin=$username_conexfamdd;
			$this->dbPassword=$password_conexfamdd;
			$this->dbServidor=$hostname_conexfamdd;
								
		}
		/*
			Funcion de Data Base Conectar ( fdbConectar )
			Es la encarga de hacer la conexion a la Base de Datos,
			Retorna el Id de Conexion
		*/
		function fdbConectar()
		{
			$conexion="";
			$conexion = mysql_connect($this->dbServidor,$this->dbLogin,$this->dbPassword);
			mysql_select_db($this->dbName,$conexion);
			return $conexion;
		}
		/*
			Funcion de Data Base Desconexion ( fdbDesConexion )
			Es la encarga de hacer la desconexion a la Base de Datos.
		*/
		function fdbDesConexion($conexion="")
		{
			mysql_close($conexion);
		}
		/*
			Funcion Data Base Insertar (fdbInsert)
			Esta funcion permite insertar datos dentro de una base de datos, acorde a los parametros
			enviados, los cuale son:
			$nombreTabla: Nombre de la tabla en donde se va hacer el insert.
			$arregloDatos: Es el arreglo asociativo de los datos que se desean insertar. Un arreglo
			asociativo es de la siguiente manera:
			
			$arregloDatos['campoTabla']=$infoGuardar;
			
			Donde:
			$arregloDatos: Nombre de la variable arrays.
			'campoTabla': Nombbre del campo de la tabla que se desea hacer el insert, debe estar 
			entre comillas simples.
			$infoGuardar: Tiene la informacion que va hacer insertada en la base de datos.
		*/
		function fdbInsert($nombreTabla,$arregloDatos) 
		{
			//$sql: Variable que construye el SQl.
            $sql = "insert into ".$nombreTabla." (";
            $datos="";
            //Para llevar al arreglo a su primer valor
            reset($arregloDatos);
			// Moverse dentro del Arreglo asociativo
            foreach($arregloDatos as  $campo => $valor )
            {
            	$sql .=  $campo . ",";
            	$datos .=  $valor . ",";
            }
            $sql=substr($sql,0,strlen($sql)-1);
            $datos=substr($datos,0,strlen($datos)-1);
            $sql.= ") values (". $datos.")";
         // echo "<br>SQL=> ".$sql."<br>";        

            if (!mysql_query($sql))
            {
            	echo "Error 0501: Error en la Funcion fdbInsert,<br>Al momento de realizar la insercci�n, No se logro con Exito";
            	exit;
            }
		}
		/*
			Funcion Data Base Update (fdbUpdate)
			Esta funcion permite modificar datos dentro de una base de datos, acorde a los parametros
			enviados, los cuale son:
			$nombreTabla: Nombre de la tabla en donde se va hacer el insert.
			$arregloDatos: Es el arreglo asociativo de los datos que se desean modificar. Un arreglo
			asociativo es de la siguiente manera:
			
			$arregloDatos['campoTabla']=$infoGuardar;
			
			Donde:
			$arregloDatos: Nombre de la variable arrays.
			'campoTabla': Nombbre del campo de la tabla que se desea hacer el insert, debe estar 
			entre comillas simples.
			$infoGuardar: Tiene la informacion que va hacer insertada en la base de datos.
			
			$criterio: Es el arreglo asociativo que contiene los criterios para realizar el update.
			NOTA: El "Criterio" se forma solo con AND.
		*/
		function fdbdUpdate($nombreTabla, $arregloDatos, $criterio)
		{
			//$sql: Variable que construye el SQL
			$sql = "update ".$nombreTabla." set ";
            $datos = '';
            // Para llevar el arreglo de a su primer valor
            reset($arregloDatos);
            // Para moverme dentro del arrays
            foreach($arregloDatos as  $campo => $valor )
            {
				if($valor != "")
            	$sql .=  $campo . " = " . $valor . ",";
            }          
            $sql=substr($sql,0,strlen($sql)-1);
            // Se verifica que existe un criterio
            if($criterio)
            {
            	$datos .= ' where ';
            	reset($criterio);
            	foreach($criterio as  $campo => $valor )
            	{
            		$datos .=   $campo. " = " . $valor . "  and ";
            	}
            	$datos=substr($datos,0,strlen($datos)-4);
            }
            $sql.= $datos;
           //echo "<br>SQL=> ".$sql."<br>";
            if (!@mysql_query($sql))
            {
            	echo "Error 0502: Error en la Funcion fdbUpdate,<br>Al momento de realizar la modificacion, No se logro con Exito";
            	exit;
            }
		}
		/*
			Funcion Data Base Borrar (fdbDelete)
			Esta funcion permite eliminar  registro de  datos dentro de una base de datos, acorde a los parametros
			enviados, los cuale son:
			$nombreTabla: Nombre de la tabla en donde se va hacer el delete.
			$criterio: Es el arreglo asociativo de los datos que se desean borrar. Un arreglo
			asociativo es de la siguiente manera:
			
			$criterio['campoTabla']=$infoBorrar;
			
			Donde:
			$criterio: Nombre de la variable arrays.
			'campoTabla': Nombbre del campo de la tabla que se desea hacer el delete, debe estar 
			entre comillas simples.
			$infoGuardar: Tiene la informacion que va hacer borrada en la base de datos.
		*/
		function fdbDelete($nombreTabla,$criterio) 
		{
			//$sql: Variable que construye el SQl.
            $sql = "delete from ".$nombreTabla." ";
            $datos="";
             // Se verifica que existe un criterio
            if($criterio)
            {
            	$datos .= ' where ';
            	reset($criterio);
            	foreach($criterio as  $campo => $valor )
            	{
            		$datos .= $campo."  =  ". $valor ." and ";
            	}
            	$datos=substr($datos,0,strlen($datos)-4);
            }
            $sql.= $datos;
           //echo "<br>SQL=> ".$sql."<br>";
            if (!@mysql_query($sql))
            {
            	echo "Error 0502: Error en la Funcion fdbDelete,<br>Al momento de realizar la modificacion, No se logro con Exito";
            	exit;
            }
		}
		/*  Funcion que hace los select de registros de una tabla
		  retorna una matriz bidimencional de datos. 
		*/
		function fbdSelect($arregloTable, $arregloCampos, $arregloCondicion, $arregloOrder, $arregloGrup, $arreglolimite)
		{
			$x=1;// VARIABLE QUE CONTROLA LAS FILAS DE LA MATRIZ
			// $sql: Variable que construye el sql.
			$sql="SELECT * ";
		/*	foreach ($arregloCampos as $index => $valor)
			{
				$sql.=$index.",";
			} */
			//$sql=substr($sql,0,strlen($sql)-1);
			$sql.=" FROM ";
			foreach ($arregloTable as $index => $valor)
			{
				$sql.=$valor.",";
			}
			$sql=substr($sql,0,strlen($sql)-1);
			$i=count($arregloCondicion);
			if($i > 0)
			{
	   			$sql.=" WHERE ";
	   			foreach($arregloCondicion as  $campo => $valor )
	           	{
	           		$sql .= $campo."=" . $valor . " and ";
	           	}
	           	$sql=substr($sql,0,strlen($sql)-4);
	         }
	         
	         $i=count($arregloGrup);
			if($i > 0)
			{
	   			$sql.=" GROUP BY ";
	   			foreach($arregloGrup as  $campo => $valor )
	           	{
	           		$sql .= $valor . ",";
	           	}
	           	$sql=substr($sql,0,strlen($sql)-1);
	         }
                 $i=count($arregloOrder);
			if($i > 0)
			{
	   			$sql.=" ORDER BY ";
	   			foreach($arregloOrder as  $campo => $valor )
	           	{
	           		$sql .= $valor . ",";
	           	}
	           	$sql=substr($sql,0,strlen($sql)-1);
	         }
	         $i=count($arreglolimite);
			if($i > 0)
			{
	   			$sql.=" LIMIT (".$arreglolimite['INICIO'].",".$arreglolimite['FIN'].")";
	         }
        	//echo "<br>SQL=> ".$sql."<br>";
        	$arrayResultado=mysql_query($sql);
        	if (!@$arrayResultado)
             {
             	echo "Error 0503: Error en la Funcion fbdSelect,<br>Al momento de realizar la consulta, No se logro con Exito";
             	exit;
             }
	         else
	         {
         		$matrizDatos=array();
                       
         		while($array_resul=mysql_fetch_array($arrayResultado))
			   {
					$j=1;//VARIABLE QUE CONTROLA LAS COLUMNAS
					$tam=count($array_resul,COUNT_RECURSIVE);  
					//echo "Tama�o del arrays: ".$tam."<br>";
					for ($y = 0; $y < ($tam/1); $y++)
					{
                                               if(isset ($array_resul[$y]))
                                               {$matrizDatos[$x][$j] = $array_resul[$y];}
						 //echo $j.") MatrizDatos[".$x."][".$j."]".$matrizDatos[$x][$j]." [y]".$array_resul[$y]."<br>";
						$j++;
					}
					$x++;
				}
			    return $matrizDatos;
			}
		}
                /*  Funcion que hace los select de registros de una tabla
		  retorna una matriz bidimencional de datos. 
		*/
		function fbdSelectEspecif($arregloTable, $arregloCampos, $arregloCondicion, $arregloOrder, $arregloGrup, $arreglolimite)
		{
			$x=1;// VARIABLE QUE CONTROLA LAS FILAS DE LA MATRIZ
			// $sql: Variable que construye el sql.
			$sql="SELECT ";
			foreach ($arregloCampos as $index => $valor)
			{
				$sql.=$index.",";
			} 
			$sql=substr($sql,0,strlen($sql)-1);
			$sql.=" FROM ";
			foreach ($arregloTable as $index => $valor)
			{
				$sql.=$valor.",";
			}
			$sql=substr($sql,0,strlen($sql)-1);
			$i=count($arregloCondicion);
			if($i > 0)
			{
	   			$sql.=" WHERE ";
	   			foreach($arregloCondicion as  $campo => $valor )
	           	{
	           		$sql .= $campo."=" . $valor . " and ";
	           	}
	           	$sql=substr($sql,0,strlen($sql)-4);
	         }
	         
	         $i=count($arregloGrup);
			if($i > 0)
			{
	   			$sql.=" GROUP BY ";
	   			foreach($arregloGrup as  $campo => $valor )
	           	{
	           		$sql .= $valor . ",";
	           	}
	           	$sql=substr($sql,0,strlen($sql)-1);
	         }
                 $i=count($arregloOrder);
			if($i > 0)
			{
	   			$sql.=" ORDER BY ";
	   			foreach($arregloOrder as  $campo => $valor )
	           	{
	           		$sql .= $valor . ",";
	           	}
	           	$sql=substr($sql,0,strlen($sql)-1);
	         }
	         $i=count($arreglolimite);
			if($i > 0)
			{
	   			$sql.=" LIMIT (".$arreglolimite['INICIO'].",".$arreglolimite['FIN'].")";
	         }
        	//echo "<br>SQL=> ".$sql."<br>";
        	$arrayResultado=mysql_query($sql);
        	if (!@$arrayResultado)
             {
             	echo "Error 0503: Error en la Funcion fbdSelect,<br>Al momento de realizar la consulta, No se logro con Exito";
             	exit;
             }
	         else
	         {
         		$matrizDatos=array();
                       
         		while($array_resul=mysql_fetch_array($arrayResultado))
			   {
					$j=1;//VARIABLE QUE CONTROLA LAS COLUMNAS
					$tam=count($array_resul,COUNT_RECURSIVE);  
					//echo "Tama�o del arrays: ".$tam."<br>";
					for ($y = 0; $y < ($tam/1); $y++)
					{
                                               if(isset ($array_resul[$y]))
                                               {$matrizDatos[$x][$j] = $array_resul[$y];}
						 //echo $j.") MatrizDatos[".$x."][".$j."]".$matrizDatos[$x][$j]." [y]".$array_resul[$y]."<br>";
						$j++;
					}
					$x++;
				}
			    return $matrizDatos;
			}
		}
		/*  Funcion que hace los select de registros de una tabla con condicior OR
		  retorna una matriz bidimencional de datos. 
		*/
		function fbdSelectOR($arregloTable, $arregloCampos, $arregloCondicion, $arregloOrder, $arregloGrup, $arreglolimite)
		{
			$x=1;// VARIABLE QUE CONTROLA LAS FILAS DE LA MATRIZ
			// $sql: Variable que construye el sql.
			$sql="SELECT ";
			foreach ($arregloCampos as $index => $valor)
			{
				$sql.=$index.",";
			}
			$sql=substr($sql,0,strlen($sql)-1);
			$sql.=" FROM ";
			foreach ($arregloTable as $index => $valor)
			{
				$sql.=$valor.",";
			}
			$sql=substr($sql,0,strlen($sql)-1);
			$i=count($arregloCondicion);
			if($i > 0)
			{
	   			$sql.=" WHERE ";
	   			foreach($arregloCondicion as  $campo => $valor )
	           	{
	           		$sql .= $campo."=" . $valor . " or ";
	           	}
	           	$sql=substr($sql,0,strlen($sql)-4);
	         }
	         $i=count($arregloOrder);
			if($i > 0)
			{
	   			$sql.=" ORDER BY ";
	   			foreach($arregloOrder as  $campo => $valor )
	           	{
	           		$sql .= $valor . ",";
	           	}
	           	$sql=substr($sql,0,strlen($sql)-1);
	         }
	         $i=count($arregloGrup);
			if($i > 0)
			{
	   			$sql.=" GROUP BY ";
	   			foreach($arregloGrup as  $campo => $valor )
	           	{
	           		$sql .= $valor . ",";
	           	}
	           	$sql=substr($sql,0,strlen($sql)-1);
	         }
	         $i=count($arreglolimite);
			if($i > 0)
			{
	   			$sql.=" LIMIT (".$arreglolimite['INICIO'].",".$arreglolimite['FIN'].")";
	         }
        	// echo "<br>SQL=> ".$sql."<br>";
        	$arrayResultado=mysql_query($sql);
        	if (!@$arrayResultado)
             {
             	echo "Error 0503: Error en la Funcion fbdSelectOR,<br>Al momento de realizar la consulta, No se logro con Exito";
             	exit;
             }
	         else
	         {
         		$matrizDatos=array();
         		while($array_resul=mysql_fetch_array($arrayResultado))
			   {
					$j=1;//VARIABLE QUE CONTROLA LAS COLUMNAS
					$tam=count($array_resul,COUNT_RECURSIVE);
					//echo "Tama�o del arrays: ".$tam."<br>";
					for ($y = 0; $y < ($tam/2); $y++)
					{
						$matrizDatos[$x][$j] = $array_resul[$y];
						// echo $j.") MatrizDatos[".$x."][".$j."]".$matrizDatos[$x][$j]." [y]".$array_resul[$y]."<br>";
						$j++;
					}
					$x++;
				}
			    return $matrizDatos;
			}
		}
		/*  Funcion que hace los select de registros de una tabla con condicion aproximadora
		  retorna una matriz bidimencional de datos. 
		*/
		function fbdSelectLike($arregloTable, $arregloCampos, $arregloCondicion, $arregloOrder, $arregloGrup, $arreglolimite)
		{
			$x=1;// VARIABLE QUE CONTROLA LAS FILAS DE LA MATRIZ
			// $sql: Variable que construye el sql.
			$sql="SELECT ";
			foreach ($arregloCampos as $index => $valor)
			{
				$sql.=$index.",";
			}
			$sql=substr($sql,0,strlen($sql)-1); 
			$sql.=" FROM ";
			foreach ($arregloTable as $index => $valor)
			{
				$sql.=$valor.",";
			}
			$sql=substr($sql,0,strlen($sql)-1);
			$i=count($arregloCondicion);
			if($i > 0)
			{
	   			$sql.=" WHERE ";
				$j = 0;
				$n = count($arregloCondicion) - 1;
	   			foreach($arregloCondicion as  $campo => $valor )
	           	{   
				   if($j == $n)
	           		$sql .= $campo." like '%" . $valor . "%' and ";
					else
					$sql .= $campo."=" . $valor . " and ";
					
					++$j;
					
	           	}
	           	$sql=substr($sql,0,strlen($sql)-4);
	         }
	         $i=count($arregloOrder);
			if($i > 0)
			{
	   			$sql.=" ORDER BY ";
	   			foreach($arregloOrder as  $campo => $valor )
	           	{
	           		$sql .= $valor . ",";
	           	}
	           	$sql=substr($sql,0,strlen($sql)-1);
	         }
	         $i=count($arregloGrup);
			if($i > 0)
			{
	   			$sql.=" GROUP BY ";
	   			foreach($arregloGrup as  $campo => $valor )
	           	{
	           		$sql .= $valor . ",";
	           	}
	           	$sql=substr($sql,0,strlen($sql)-1);
	         }
	         $i=count($arreglolimite);
			if($i > 0)
			{
	   			$sql.=" LIMIT (".$arreglolimite['INICIO'].",".$arreglolimite['FIN'].")";
	         }
        	//echo "<br>SQL=> ".$sql."<br>";
        	$arrayResultado=mysql_query($sql);
        	if (!@$arrayResultado)
             {
             	echo "Error 0503: Error en la Funcion fbdSelectLike,<br>Al momento de realizar la consulta, No se logro con Exito";
             	exit;
             }
	         else
	         {
         		$matrizDatos=array();
         		while($array_resul=mysql_fetch_array($arrayResultado))
			   {
					$j=1;//VARIABLE QUE CONTROLA LAS COLUMNAS
					$tam=count($array_resul,COUNT_RECURSIVE);
					//echo "Tama�o del arrays: ".$tam."<br>";
					for ($y = 0; $y < ($tam/1); $y++)
					{
						$matrizDatos[$x][$j] = $array_resul[$y];
						// echo $j.") MatrizDatos[".$x."][".$j."]".$matrizDatos[$x][$j]." [y]".$array_resul[$y]."<br>";
						$j++;
					}
					$x++;
				}
			    return $matrizDatos;
			}
		}
		/*  Funcion que hace los select de registros de una tabla con condicion de desigualdad
		  retorna una matriz bidimencional de datos. 
		*/
		function fbdSelectDistin($arregloTable, $arregloCampos, $arregloCondicion, $arregloOrder, $arregloGrup, $arreglolimite)
		{
			$x=1;// VARIABLE QUE CONTROLA LAS FILAS DE LA MATRIZ
			// $sql: Variable que construye el sql.
			$sql="SELECT ";
			foreach ($arregloCampos as $index => $valor)
			{
				$sql.=$index.",";
			}
			$sql=substr($sql,0,strlen($sql)-1);
			$sql.=" FROM ";
			foreach ($arregloTable as $index => $valor)
			{
				$sql.=$valor.",";
			}
			$sql=substr($sql,0,strlen($sql)-1);
			$i=count($arregloCondicion);
			if($i > 0)
			{
	   			$sql.=" WHERE ";
				$j = 0;
				$n = count($arregloCondicion) - 1;
	   			foreach($arregloCondicion as  $campo => $valor )
	           	{   
				   if($j == $n)
	           		$sql .= $campo." <> " . $valor . " and ";
					else
					$sql .= $campo."=" . $valor . " and ";
					
					++$j;
					
	           	}
	           	$sql=substr($sql,0,strlen($sql)-4);
	         }
	         $i=count($arregloOrder);
			if($i > 0)
			{
	   			$sql.=" ORDER BY ";
	   			foreach($arregloOrder as  $campo => $valor )
	           	{
	           		$sql .= $valor . ",";
	           	}
	           	$sql=substr($sql,0,strlen($sql)-1);
	         }
	         $i=count($arregloGrup);
			if($i > 0)
			{
	   			$sql.=" GROUP BY ";
	   			foreach($arregloGrup as  $campo => $valor )
	           	{
	           		$sql .= $valor . ",";
	           	}
	           	$sql=substr($sql,0,strlen($sql)-1);
	         }
	         $i=count($arreglolimite);
			if($i > 0)
			{
	   			$sql.=" LIMIT (".$arreglolimite['INICIO'].",".$arreglolimite['FIN'].")";
	         }
        	//echo "<br>SQL=> ".$sql."<br>";
        	$arrayResultado=mysql_query($sql);
        	if (!@$arrayResultado)
             {
             	echo "Error 0503: Error en la Funcion fbdSelectDistin,<br>Al momento de realizar la consulta, No se logro con Exito";
             	exit;
             }
	         else
	         {
         		$matrizDatos=array();
         		while($array_resul=mysql_fetch_array($arrayResultado))
			   {
					$j=1;//VARIABLE QUE CONTROLA LAS COLUMNAS
					$tam=count($array_resul,COUNT_RECURSIVE);
					//echo "Tama�o del arrays: ".$tam."<br>";
					for ($y = 0; $y < ($tam/2); $y++)
					{
						$matrizDatos[$x][$j] = $array_resul[$y];
						// echo $j.") MatrizDatos[".$x."][".$j."]".$matrizDatos[$x][$j]." [y]".$array_resul[$y]."<br>";
						$j++;
					}
					$x++;
				}
			    return $matrizDatos;
			}
		}
		/*  Funcion que hace los select de registros de una tabla con Maximo
		  retorna una matriz bidimencional de datos. 
		*/
		function fbdSelectMax($arregloTable, $arregloCamposMax, $arregloCondicion, $arregloOrder, $arregloGrup, $arreglolimite)
		{
			$x=1;// VARIABLE QUE CONTROLA LAS FILAS DE LA MATRIZ
			// $sql: Variable que construye el sql.
			$sql="SELECT ";
			foreach ($arregloCamposMax as $index => $valor)
			{
				$sql.=" MAX(".$index."),";
			}
			$sql=substr($sql,0,strlen($sql)-1);
			$sql.=" FROM ";
			foreach ($arregloTable as $index => $valor)
			{
				$sql.=$valor.",";
			}
			$sql=substr($sql,0,strlen($sql)-1);
			$i=count($arregloCondicion);
			if($i > 0)
			{
	   			$sql.=" WHERE ";

	   			foreach($arregloCondicion as  $campo => $valor )
	           	{   		  
					$sql .= $campo."=" . $valor . " and ";
													
	           	}
	           	$sql=substr($sql,0,strlen($sql)-4);
	         }
	         $i=count($arregloOrder);
			if($i > 0)
			{
	   			$sql.=" ORDER BY ";
	   			foreach($arregloOrder as  $campo => $valor )
	           	{
	           		$sql .= $valor . ",";
	           	}
	           	$sql=substr($sql,0,strlen($sql)-1);
	         }
	         $i=count($arregloGrup);
			if($i > 0)
			{
	   			$sql.=" GROUP BY ";
	   			foreach($arregloGrup as  $campo => $valor )
	           	{
	           		$sql .= $valor . ",";
	           	}
	           	$sql=substr($sql,0,strlen($sql)-1);
	         }
	         $i=count($arreglolimite);
			if($i > 0)
			{
	   			$sql.=" LIMIT (".$arreglolimite['INICIO'].",".$arreglolimite['FIN'].")";
	         }
        	//echo "<br>SQL=> ".$sql."<br>";
        	$arrayResultado=mysql_query($sql);
        	if (!@$arrayResultado)
             {
             	echo "Error 0503: Error en la Funcion fbdSelectMax,<br>Al momento de realizar la consulta, No se logro con Exito";
             	exit;
             }
	         else
	         {
         		$matrizDatos=array();
         		while($array_resul=mysql_fetch_array($arrayResultado))
			   {
					$j=1;//VARIABLE QUE CONTROLA LAS COLUMNAS
					$tam=count($array_resul,COUNT_RECURSIVE);
					//echo "Tama�o del arrays: ".$tam."<br>";
					for ($y = 0; $y < ($tam/2); $y++)
					{
						$matrizDatos[$x][$j] = $array_resul[$y];
						// echo $j.") MatrizDatos[".$x."][".$j."]".$matrizDatos[$x][$j]." [y]".$array_resul[$y]."<br>";
						$j++;
					}
					$x++;
				}
			    return $matrizDatos;
			}
		}
		/*  Funcion que hace los select de MAXregistros de una tabla con subconsulta de existencia
		  retorna una matriz bidimencional de datos. 
		*/
		function fbdSelectMaxExiste($arregloTable, $arregloCampos, $arregloCamposMaxExiste, $arregloCondicion, $arregloOrder, $arregloGrup, $arreglolimite)
		{
			$x=1;// VARIABLE QUE CONTROLA LAS FILAS DE LA MATRIZ
			// $sql: Variable que construye el sql.
			$sql="SELECT ";
			foreach ($arregloCampos as $index => $valor)
			{
				$sql.=$index.",";			
			}
			//$sql=substr($sql,0,strlen($sql)-1);
			
			$h = count($arregloCamposMaxExiste);
			if( $h >0)
			{
			foreach($arregloCamposMaxExiste as  $index => $valor)
			   {
			       $sql.= $index."+";
			    
			   }
			   $sql=substr($sql,0,strlen($sql)-1);
			   
			   $i=count($arregloOrder);
			   
			if($i > 0)
			{
	   			$total = "";
	   			foreach($arregloOrder as  $campo => $valor )
	           	{
	           		$total = $campo." ";
	           	}
	           	
	         }			   
			   
			   $sql.= "  as ".$total;
			}
			
			$sql.=" FROM ";
			foreach ($arregloTable as $index => $valor)
			{
				$sql.=$valor.",";
			}
			$sql=substr($sql,0,strlen($sql)-1);
			
			$i=count($arregloCondicion);
			if($i > 0)
			{
			$sql.=" WHERE ";
			foreach($arregloCondicion as  $campo => $valor )
	           	{   		
					$sql .= $campo."=" . $valor . " and ";											
	           	}
	           	$sql=substr($sql,0,strlen($sql)-4);
			}
			
			
	         $i=count($arregloOrder);
			if($i > 0)
			{
	   			$sql.=" ORDER BY ";
	   			foreach($arregloOrder as  $campo => $valor )
	           	{
	           		$sql .= $campo . " desc ,";
	           	}
	           	$sql=substr($sql,0,strlen($sql)-1);
	         }
	         $i=count($arregloGrup);
			if($i > 0)
			{
	   			$sql.=" GROUP BY ";
	   			foreach($arregloGrup as  $campo => $valor )
	           	{
	           		$sql .= $valor . ",";
	           	}
	           	$sql=substr($sql,0,strlen($sql)-1);
	         }
	         $i=count($arreglolimite);
			if($i > 0)
			{
	   			$sql.=" LIMIT (".$arreglolimite['INICIO'].",".$arreglolimite['FIN'].")";
	         }
        	//echo "<br>SQL=> ".$sql."<br>";
        	$arrayResultado=mysql_query($sql);
        	if (!@$arrayResultado)
             {
             	echo "Error 0503: Error en la Funcion fbdSelectMax,<br>Al momento de realizar la consulta, No se logro con Exito";
             	exit;
             }
	         else
	         {
         		$matrizDatos=array();
         		while($array_resul=mysql_fetch_array($arrayResultado))
			   {
					$j=1;//VARIABLE QUE CONTROLA LAS COLUMNAS
					$tam=count($array_resul,COUNT_RECURSIVE);
					//echo "Tama�o del arrays: ".$tam."<br>";
					for ($y = 0; $y < ($tam/2); $y++)
					{
						$matrizDatos[$x][$j] = $array_resul[$y];
						// echo $j.") MatrizDatos[".$x."][".$j."]".$matrizDatos[$x][$j]." [y]".$array_resul[$y]."<br>";
						$j++;
					}
					$x++;
				}
			    return $matrizDatos;
			}
		}
    }
?>