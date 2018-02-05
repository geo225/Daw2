<?php
class Rest{
    public static function RestAltitud($latitud,$longitud){
        $arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);       
        $fichero=file_get_contents('https://maps.googleapis.com/maps/api/elevation/json?locations='.$_POST['latitud'].','.$_POST['longitud'].'&key=AIzaSyD7o9NLvucck3huMwLsF7jqLEhvs2zI_s4', false, stream_context_create($arrContextOptions));
        $mostrar=json_decode($fichero);
    return $mostrar;
    }
}
?>    