<?php
    
    function anadirReciente($reciente){
        session_start();
        if(isset($_SESSION['usuario'])){
            if(!isset($_SESSION['recientes'])){
                $arrayRecientes= array($reciente);
            }
            else{
                $arrayRecientes= explode(",",$_SESSION['recientes']);
                if(($posicion = array_search($reciente, $arrayRecientes)) !== false){
                    unset($arrayRecientes[$posicion]);
                }
                array_unshift($arrayRecientes,$reciente);
            }
            $stringRecientes = implode(",",$arrayRecientes);
               $_SESSION['recientes'] = $stringRecientes;
        }
    }
?>