 <?php
$errorBorrar="";
$departamento=Departamento::ObtenerDepartamento($_GET['Departamento']);
       if(!isset($_SESSION['usuario'])){//Comprobamos que si no existe la sesion se redirige al index.php. 
        header("Location: index.php");       
    }else{if(isset($_POST['enviarBorrar'])){
            if($_POST['enviarBorrar']=="si"){
               if($departamento->borrarDepartamento()){    
                header('Location: index.php?pagina=departamento');	
                }else{
                    $errorBorrar="Error al Borrar el Departamento";
                    $_GET["pagina"]="borrardepartamento";
                    include_once 'view/layout.php';  
               } 
            }
            else {
            header("Location: index.php?pagina=departamento");
            }
        }else{
            
        }       
        $_GET["pagina"]="borrardepartamento";
        include_once 'view/layout.php';
    }