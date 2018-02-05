<?php
	//Funciones de Validación
	//Blibioteca con funciones de validación
	//Función para comprobar si es un campo solo texto
			 function comprobarTexto($cadena){
				 //Patrón para campos de solo texto
				$patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";
				$correcto = false;
				if( preg_match($patron_texto, $cadena) )
				{
                    $correcto =true;
                }
				return $correcto;
			 }
			 //Función para comprobar si es un campo entero
			 function comprobarEntero($integer){
				$correcto = false;
				if( filter_var($integer, FILTER_VALIDATE_INT)){
					$correcto = true;
				}
				return $correcto;
			 }
			 //Función para comprobar si es un campo float
			 function comprobarFloat($float){
				$correcto = false;
				if (filter_var($float, FILTER_VALIDATE_FLOAT)){
					$correcto= true;
				}
				return $correcto;
			 }
			 //Función para comprobar si es un correo electronico
			 function validarEmail ($email){
				$correcto = false;
				if (filter_var($email, FILTER_VALIDATE_EMAIL)){
					$correcto =true;
				}
				return $correcto;
			 }			 
			 //Función para comprobar si es una url
			 function validarURL ($url){
				$correcto = false;
				if (filter_var ($URL, FILTER_VALIDATE_URL)){
					$correcto = true;
				}
				return $correcto;
			 }
			//Función para validar si no esta vacio
			function comprobarNoVacio($cadena){
				$correcto = false;
				$cadena = trim($cadena);
				if (!empty($cadena)){
					$correcto=true;
				}
				return $correcto;
			}
			 
		?>