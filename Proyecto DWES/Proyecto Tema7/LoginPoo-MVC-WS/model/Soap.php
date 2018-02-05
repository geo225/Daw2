<?php
include_once ('Departamento.php');
/** 
 * File Soap.php 
 * @author  Rodrigo Gutiérrez Ollé
 *
 * Fichero del Modelo que crea y usa los objetos  
 * de la clase Soap
 */ 

/** 
 * Class Usuario 
 * @author  Rodrigo Gutiérrez Ollé
 *
 * Fecha de última modificación 18/01/2018
 */ 
    class Soap{
    public static function SoapService(){
        function getCapacidad($codDepartamento){
            $capacidad=0;
            $departamento = Departamento::ObtenerDepartamento($codDepartamento);
            if(!empty($departamento)){
                $capacidad=$departamento->getCapacidad();
            }
            return $capacidad;
        }
        try{
        $server= new SOAPServer(null,array(
     'uri' => 'http://192.168.20.19/DAW204/public_html/Proyecto%20DWES/Proyecto%20Tema7/LoginPoo-MVC-WS/core/SoapServer.php'
    ));
        
        $server->addFunction('getCapacidad');
        $server->handle();
        }catch(SOAPFault $f){
            print $f->faultstring;
        }
    }
        public static function SoapCliente($funcion,$parametros){
        $client = new SoapClient(null,array(
      'location' => 'http://192.168.20.19/DAW204/public_html/Proyecto%20DWES/Proyecto%20Tema7/LoginPoo-MVC-WS/core/SoapServer.php', 
      'uri'      => 'http://192.168.20.19/DAW204/public_html/Proyecto%20DWES/Proyecto%20Tema7/LoginPoo-MVC-WS/core/SoapServer.php',
      'trace'    => 1 ));
            return $client->__soapCall($funcion,$parametros);
        }
        public static function SoapIP($ip){
            $client= new SoapClient('http://www.webservicex.net/geoipservice.asmx?WSDL');
        $ip=array(
            'IPAddress' => $ip
        );
        return $ip=$client->GetGeoIP($ip);
        }
}

?>