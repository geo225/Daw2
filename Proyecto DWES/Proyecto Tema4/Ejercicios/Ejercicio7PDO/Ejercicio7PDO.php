<?php 

    if (file_exists('../Ejercicio8PDO/ejer8.xml')) { 
    $xml = simplexml_load_file('../Ejercicio8PDO/ejer8.xml'); 

    } else { 
    exit('Error abriendo ejer8.xml.'); 
    } 
    try { 
			define ("mysql_host","192.168.20.19");
			define ("mysql_User","DAW204");
			define ("mysql_Password","paso");
			define ("mysql_BaseDatos","DAW204_DBdepartamentos");
			define("DATOSCONEXION","mysql:host=192.168.20.19;dbname=DAW204_DBdepartamentos");
        //Creamos el objeto PDO para conectar a la base de datos. 
        $conn = new PDO(DATOSCONEXION, mysql_User, mysql_Password); 
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $entradaOK=true; 

       $conn->beginTransaction();//Iniciamos la transaccion. 
    //Hacemos la consulta preparada. 
    $consulta=$conn->prepare("Insert into Departamento(CodDepartamento,DescDepartamento) values(:codigo,:descripcion)");

    //Utilizamos el bindParam() para decirle el valor de los parametros. 
    $consulta->bindParam(":codigo",$CodDepartamento); 
    $consulta->bindParam(":descripcion",$DescDepartamento); 
    foreach($xml->Departamento as $departamento){ 
        $CodDepartamento=$departamento->Codigo; 
        $DescDepartamento=$departamento->Descripcion; 
        $entradaOK=$consulta->execute(); 
    } 

    if($entradaOK) { 
       $conn->commit(); 
        unset($conn); 
        }else{ 
        echo "Ha habido errores"; 
       $conn->rollBack(); 
        } 
        unset($conexion); 

    }catch (PDOException $exception) { 
        echo $exception->getMessage(); 
        unset($conn); 
    } 
?>