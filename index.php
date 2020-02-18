<?php
/**
 * 
 * @param type $className
 * @throws RuntimeException
 */
function myAutoLoader($className) {

    $path = ('libs/' . $className . '.php');
       
    if (file_exists($path)) {
               require ( $path );
    } else {
        $path = strtolower('classes/' . $className . '.php');
        require ( $path );
    }

    if (!class_exists($className, false)) {
        throw new RuntimeException('Class ' . $className . ' has not been         
       loaded yet');
    }
}

spl_autoload_register('myAutoLoader');

require './config/paths.php';


$alliquaApp = new Bootstrap();
?>
