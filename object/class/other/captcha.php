<?php  // session_start();
       ini_set('display_errors', '0');     # don't show any errors...
error_reporting(E_ALL | E_STRICT);  # ...but do log them
      //Creamos una cadena aleatoria de caracteres
  
      $md5 = md5(microtime() * mktime());
  
      //Reducimos a 5 los caracteres

      $string = substr($md5,0,5);
 
       //echo $string;
       
	  // $archivo = 'C:\xampp\htdocs\p4a\applications\se_famdd\uploads\captcha.txt';  
	  //  $archivo = '/var/www/p4a/applications/se_famdd/captcha.txt';
            $archivo = '../../../templates/captcha.txt';
       $fp = fopen($archivo, "w");
       $write = fputs($fp, $string);
       fclose($fp); 

       
 
      //creamos un fondo de imagen y lo subimos, luego con la funcion imagecreatefrompng, la pasamos al captcha
 
      $captcha = imagecreatefrompng("../../../templates/captcha.png");
    

      //podemos configurar los colores para las lineas

      $black = imagecolorallocate($captcha, 0, 1, 0);
      $line = imagecolorallocate($captcha,233,239,239);
 
       

      //y para evitar las ara�as le a�adimos las lineas

      imageline($captcha,0,0,39,29,$line);
      imageline($captcha,40,0,64,29,$line);

 
      //insertamos la cadena creada aleatoriamente en la imagen

      imagestring($captcha, 5, 20, 10, $string, $black);

       

      //como no, encriptamos y almacenamos el valor de la cadena en una variabe sesion

      $_SESSION['key'] = md5($string);

       

      //devolvemos la imagen para crearla
  
      header("Content-type: image/png");
      imagepng($captcha);
        
        
?>
