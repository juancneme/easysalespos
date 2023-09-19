<?php

//$base_dir = __DIR__.'/phpOlap/';
//
//$gestor_dir = opendir($base_dir);
//$files = array();
//$dirs = array();
//$dirs2 = array();
//
//while (false !== ($nombre_fichero = readdir($gestor_dir))) {
//    if($nombre_fichero != '.' && $nombre_fichero != '..'){
//        if(is_dir($base_dir.$nombre_fichero)){
//            $dirs[] = $base_dir.$nombre_fichero;
//        }
//        else {
//            $files[] = $base_dir.$nombre_fichero;
//        }
//    }
//}
//
//$flag = true;
//while($flag){
//    $flag = false;
//    foreach($dirs as $dir){
//        $gestor_dir = opendir($dir);
//        while (false !== ($nombre_fichero = readdir($gestor_dir))) {
//            if($nombre_fichero != '.' && $nombre_fichero != '..'){
//                if(is_dir($dir.'/'.$nombre_fichero)){ 
//                    if(!in_array($dir.'/'.$nombre_fichero, $dirs)){
//                        $dirs[] = $dir.'/'.$nombre_fichero;
//                        $flag = true;
//                    }
//                }
//                else if(!in_array($dir.'/'.$nombre_fichero, $files)) {
//                    $files[] = $dir.'/'.$nombre_fichero;
//                }
//            }
//        }
//    }
//}
//
////var_dump($files);
//
//foreach($files as $file){
//    include_once $file;
//}
//
//


require_once __DIR__.'/../../vendor/Symfony/Component/ClassLoader/UniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
	'phpOlap\\Tests' => __DIR__.'/tests',
	'phpOlap' => __DIR__.'/src',
	'Symfony' => __DIR__.'/vendor',
));
$loader->register();