/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function validar(form1) {

   if(form1.cedula.value==""){
      alert("Llene el campo \"RIF/Cedula\".");
   // form1.cedula.focus();
return(false);

     }else{
  if (form1.cedula.value.length < 6) {
    alert("Escriba por lo menos entre 6 y 9 caracteres en el campo \"RIF/Cedula\".");
    form1.cedula.focus();
    return (false);
  }

   if (form1.cedula.value.length > 9) {
    alert("Escriba por lo menos entre 6 y 9 caracteres en el campo \"RIF/Cedula\".");
    form1.cedula.focus();
    return (false);
  }
   checkOK = "0123456789";
   checkStr = form1.cedula.value;
   allValid = true;
 
  var allNum = "";
  for (i = 0; i < checkStr.length; i++) {
    ch = checkStr.charAt(i);
    for (j = 0; j < checkOK.length; j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length) {
      allValid = false;
      break;
    }
    allNum += ch;
  }
  if (!allValid) {
    alert("Escriba s\363lo d\355gitos en el campo \"RIF/Cedula\".");
   // form1.cedula.focus();
    return (false);
  }

}
  if(form1.nombre.value==""){

     alert("Debe llenar el campo \"Nombre y Apellido\".");
    form1.nombre.focus();
return(false);
 }
  else{
  if (form1.nombre.value.length < 2) {
    alert("Escriba por lo menos 2 caracteres en el campo \"Nombre y Apellido\".");
    form1.nombre.focus();
    return (false);
  }
  var checkOK = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚ" + "abcdefghijklmnñopqrstuvwxyzáéíóú" +  " ";
  var checkStr = form1.nombre.value;
  var allValid = true;
  for (i = 0; i < checkStr.length; i++) {
    ch = checkStr.charAt(i);
    for (j = 0; j < checkOK.length; j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length) {
      allValid = false;
      break;
    }
  }
  if (!allValid) {
    alert("Escriba s\363lo letras en el campo \"Nombre y Apellido\".");
    //formu1.nombre1.focus();
    return (false);
  }
  }
  
  
  if(form1.razonsocial.value==""){

     alert("Debe llenar el campo \"Razon Social\".");
    form1.razonsocial.focus();
return(false);
 }
  else{
  if (form1.razonsocial.value.length < 2) {
    alert("Escriba por lo menos 2 caracteres en el campo \"Razon Social\".");
    form1.razonsocial.focus();
    return (false);
  }
   checkOK = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚ" + "abcdefghijklmnñopqrstuvwxyzáéíóú" + "0123456789" + ",.`"+" &_";
   checkStr = form1.razonsocial.value;
   allValid = true;
  for (i = 0; i < checkStr.length; i++) {
    ch = checkStr.charAt(i);
    for (j = 0; j < checkOK.length; j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length) {
      allValid = false;
      break;
    }
  }
  if (!allValid) {
    alert("Escriba s\363lo caracteres alfanumericos y tildes basicos en el campo \"Razon Social\".");

    //formu1.apellido1.focus();
    return (false);
  }
  }
  
  if(form1.ciudad.value==""){

     alert("Debe selecionar una  \"Ciudad\".");
    form1.ciudad.focus();
return(false);
 }
  
  if(form1.direccion.value==""){

 alert("Llene el campo\"Direccion Local\".");


return(false);

 }
 else{

 if (form1.direccion.value.length < 2) {
    alert("Coloque una direccion local completa.");
	form1.direccion.focus();
	return (false);
  }
}


   if(form1.codigoArea.value==""){
      alert("Llene el campo \"C\363digo Area\".");
    //form1.telefono.focus();
return(false);

     }else{
	 if (form1.codigoArea.value.length < 3) {
    alert("Escriba por lo menos entre 3 y 4 caracteres en el campo \"C\363digo de Area\".");
    form1.codigoArea.focus();
    return (false);
  }
   if (form1.codigoArea.value.length > 4) {
    alert("Escriba por lo menos entre 6 y 8 caracteres en el campo \"C\363digo de Area\".");
    form1.codigoArea.focus();
    return (false);
  }

   checkOK = "0123456789";
   checkStr = form1.codigoArea.value;
   allValid = true;
  
   allNum = "";
  for (i = 0; i < checkStr.length; i++) {
    ch = checkStr.charAt(i);
    for (j = 0; j < checkOK.length; j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length) {
      allValid = false;
      break;
    }
    allNum += ch;
  }
  if (!allValid) {
    alert("Escriba s\363lo d\355gitos en el campo \"Codigo Area\".");
   // form1.codigoArea.focus();
    return (false);
  }

}

   if(form1.telefono.value==""){
      alert("Llene el campo \"Tel\351fono Local\".");
    //form1.telefono.focus();
return(false);

     }else{
	  if (form1.telefono.value.length < 7) {
    alert("Escriba por lo menos entre 7 y 15 caracteres en el campo \"Tel\351fono Local\".");
    form1.telefono.focus();
    return (false);
  }
    if (form1.telefono.value.length > 15) {
    alert("Escriba por lo menos entre 7 y 15 caracteres en el campo \"Tel\351fono Local\".");
    form1.telefono.focus();
    return (false);
  }

  checkOK = "0123456789";
    checkStr = form1.telefono.value;
   allValid = true;
 
   allNum = "";
  for (i = 0; i < checkStr.length; i++) {
    ch = checkStr.charAt(i);
    for (j = 0; j < checkOK.length; j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length) {
      allValid = false;
      break;
    }
    allNum += ch;
  }
  if (!allValid) {
    alert("Escriba s\363lo d\355gitos en el campo \"Tel\351fono Local\".");
   // form1.telefono.focus();
    return (false);
  }

}

 if(form1.mail.value==""){

 alert("Llene el campo\"Email\".");

//form1.mail.focus();
return(false);

 }
 else{

 if ((form1.mail.value.indexOf ('@', 0) == -1)||(form1.mail.value.length < 3)) {
    alert("Escriba una direcci\363n de correo v\341lida en el campo \"Direcci\363n de correo\".");
       form1.mail.focus();
	return (false);
  }
}

 

  if(form1.referencia.value==""){

     alert("Debe llenar el campo \"Referencia o Deposito\".");
    form1.referencia.focus();
return(false);
 }
  else{
  if (form1.referencia.value.length < 2) {
    alert("El campo \"Referencia o Deposito\" tiene mas de un caracter.");
    form1.referencia.focus();
    return (false);
  }
   checkOK = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚ" + "abcdefghijklmnñopqrstuvwxyzáéíóú" + "0987654321";
   checkStr = form1.referencia.value;
   allValid = true;
  for (i = 0; i < checkStr.length; i++) {
    ch = checkStr.charAt(i);
    for (j = 0; j < checkOK.length; j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length) {
      allValid = false;
      break;
    }
  }
  if (!allValid) {
    alert("Escriba s\363lo numeros y/o letras en el campo \"Referencia o Deposito\".");

    //formu1.apellido1.focus();
    return (false);
  }
  }


if(form1.monto.value==""){
      alert("Llene el campo \"Monto\".");
    //form1.celular.focus();
return(false);

     }else{

   checkOK = "0123456789" + "," + ".";
   checkStr = form1.monto.value;
   allValid = true;

   allNum = "";
  for (i = 0; i < checkStr.length; i++) {
    ch = checkStr.charAt(i);
    for (j = 0; j < checkOK.length; j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length) {
      allValid = false;
      break;
    }
    allNum += ch;
  }
  if (!allValid) {
    alert("Escriba s\363lo d\355gitos decimales en el campo \"Monto\".");
   // form1.celular.focus();
    return (false);
  }

}

    if(form1.fecha.value==""){
	 alert("Debe colocar la Fecha de Pago.");
	  form1.fecha.focus();
return(false);

    }else{
  if (form1.fecha.value.length < 10) {
    alert("La longitud de la fecha no debe ser menor a 10. Coloque el formato indicado.");
    form1.fecha.focus();
    return (false);
  }
   checkOK =  "0987654321" + "/";
   checkStr = form1.fecha.value;
   allValid = true;
  for (i = 0; i < checkStr.length; i++) {
    ch = checkStr.charAt(i);
    for (j = 0; j < checkOK.length; j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length) {
      allValid = false;
      break;
    }
  }
  if (!allValid) {
    alert("Escriba s\363lo caracteres numericos y slath en el campo correspondiente a la Fecha de Pago.");
    //form1.respuesta.focus();
    return (false);
  }

  }


  return (allValid);

   }

function validarProducto(form1)
{
     if(form1.cantidad.value=="" || form1.cantidad.value=="0"){
      alert("La cantidad no debe ser nula.");
   // form1.cedula.focus();
return(false);

     }else{
 
   checkOK = "0123456789";
   checkStr = form1.cantidad.value;
   allValid = true;
 
  var allNum = "";
  for (i = 0; i < checkStr.length; i++) {
    ch = checkStr.charAt(i);
    for (j = 0; j < checkOK.length; j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length) {
      allValid = false;
      break;
    }
    allNum += ch;
  }
  if (!allValid) {
    alert("Escriba s\363lo d\355gitos enteros en el campo \"cantidad\".");
   // form1.cedula.focus();
    return (false);
  }

}

 if(form1.tipo_producto.value==""){

     alert("Debe llenar el campo \"Tipo de Producto\".");
    form1.tipo_producto.focus();
return(false);
 }
  else{
  if (form1.tipo_producto.value.length < 2) {
    alert("Escriba por lo menos 2 caracteres en el campo \"Tipo de Producto\".");
    form1.tipo_producto.focus();
    return (false);
  }
  var checkOK = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚ" + "abcdefghijklmnñopqrstuvwxyzáéíóú" +  " ,.-_@";
  var checkStr = form1.tipo_producto.value;
  var allValid = true;
  for (i = 0; i < checkStr.length; i++) {
    ch = checkStr.charAt(i);
    for (j = 0; j < checkOK.length; j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length) {
      allValid = false;
      break;
    }
  }
  if (!allValid) {
    alert("Escriba s\363lo letras en el campo \"Tipo de Producto\".");
    //formu1.nombre1.focus();
    return (false);
  }
  }
  
   if(form1.marca_producto.value==""){

     alert("Debe llenar el campo \"Marca del Producto\".");
    form1.marca_producto.focus();
return(false);
 }
  else{
  if (form1.marca_producto.value.length < 2) {
    alert("El campo \"Marca del Producto\" tiene mas de un caracter.");
    form1.marca_producto.focus();
    return (false);
  }
   checkOK = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚ" + "abcdefghijklmnñopqrstuvwxyzáéíóú" + "0987654321" +  " ,.-_@";
   checkStr = form1.marca_producto.value;
   allValid = true;
  for (i = 0; i < checkStr.length; i++) {
    ch = checkStr.charAt(i);
    for (j = 0; j < checkOK.length; j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length) {
      allValid = false;
      break;
    }
  }
  if (!allValid) {
    alert("Escriba s\363lo numeros y/o letras en el campo \"Marca del Producto\".");

    //formu1.apellido1.focus();
    return (false);
  }
  }

if(form1.modelo_producto.value==""){

     alert("Debe llenar el campo \"Modelo del Producto\".");
    form1.modelo_producto.focus();
return(false);
 }else{
  if (form1.modelo_producto.value.length < 2) {
    alert("El campo \"Modelo del Producto\" tiene mas de un caracter.");
    form1.modelo_producto.focus();
    return (false);
  }
   checkOK = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚ" + "abcdefghijklmnñopqrstuvwxyzáéíóú" + "0987654321" + " -,.";
   checkStr = form1.modelo_producto.value;
   allValid = true;
  for (i = 0; i < checkStr.length; i++) {
    ch = checkStr.charAt(i);
    for (j = 0; j < checkOK.length; j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length) {
      allValid = false;
      break;
    }
  }
  if (!allValid) {
    alert("Escriba s\363lo numeros y/o letras en el campo \"Modelo del Producto\".");

    //formu1.apellido1.focus();
    return (false);
  }
  }
  
  if(form1.precio_producto.value==""){
      alert("Llene el campo \"Precio del Producto\".");
    //form1.precio_producto.focus();
return(false);

     }else{

   checkOK = "0123456789" + "," + ".";
   checkStr = form1.precio_producto.value;
   allValid = true;

   allNum = "";
  for (i = 0; i < checkStr.length; i++) {
    ch = checkStr.charAt(i);
    for (j = 0; j < checkOK.length; j++)
      if (ch == checkOK.charAt(j))
        break;
    if (j == checkOK.length) {
      allValid = false;
      break;
    }
    allNum += ch;
  }
  if (!allValid) {
    alert("Escriba s\363lo d\355gitos decimales en el campo \"Precio del Producto\".");
   // form1.celular.focus();
    return (false);
  }

}

if(form1.descripcion_producto.value==""){
      alert("Llene colocar la \"Descripcion del Producto\".");
    //form1.descripcion_producto.focus();
return(false);

     }
  
   return (allValid);
}

function  cambiarOption(form1) {

if(form1.pais.value!=""){
    
    return true;
}else
    {return false;}

}

function rellenarForm(form1)
{
   if(form1.seudonimo.value!=""){ 
    return true;
    }else
    {return false;}
  
}