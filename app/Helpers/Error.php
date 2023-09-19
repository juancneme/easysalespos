<?php
namespace App\Helpers;

class WSError {
    
    protected static $errors = array(
        "0000" => "Transaccion Exitosa",
        // Mensajes para la cabecera
        "0001" => "Cabecera invalida",
        "0002" => "Imei invalido",
        "0003" => "Fecha invalida",
        "0004" => "Formato de fecha invalido",
        "0005" => "Version invalida",
        "0006" => "Formato de version invalida",
        "0007" => "Division invalida",
        "0008" => "Division Invalida",
        "0009" => "Coordenada X invalida",
        "0010" => "Coordenada Y invalida",
        "0011" => "Coordenada Z invalida",
        "0012" => "Token invalido",
        "0013" => "Session invalida",
        "0015" => "no tiene company asignada este usuario",
        "0016" => "Error al crear una comercio"
        
    );
    
    public static function get($codigo){
        return isset(self::$errors[$codigo]) ? self::$errors[$codigo] : "Error desconocido";
    }
}
