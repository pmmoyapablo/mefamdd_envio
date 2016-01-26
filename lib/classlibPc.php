<?php
/*
    Caracas; 24/03/2006
    Clase Libreria de Pc (classLibPc)
*/
	class classlibPc
	{
		function classlibPc()
		{
		}
		/*
			Funcion de Libreria, Host Ip (flibHostIp())
			Identificar la direccion Ip del Host conectado al Servidor
			Solo Funciona si el Servidor es APACHE
			Retorna la IP del Host conectado
		*/
		function flibHostIp()
		{
			return $_SERVER['REMOTE_ADDR'];
		}
		/*
			Funcion de Libreria, Host Name (flibHostName())
			Identifica el nombre del Host conectado al Servidor
			Solo Funciona si el Servidor es APACHE
			Retorna el nombre del Host conectado
		*/
		function flibHostName()
		{
			return gethostbyaddr($this->flibHostIp());
		}
    }
?>