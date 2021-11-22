<?php
    
    function anadirReciente($reciente){
        if(!isset($_COOKIE['recientes'])){
            $arrayRecientes= array($reciente);
        }
        else{
            $arrayRecientes= explode(",",$_COOKIE['recientes']);
            if(($posicion = array_search($reciente, $arrayRecientes)) !== false){
                unset($arrayRecientes[$posicion]);
            }
            array_unshift($arrayRecientes,$reciente);
        }
        $stringRecientes = implode(",",$arrayRecientes);
            setcookie("recientes",$stringRecientes);
    }
?>