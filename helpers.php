<?php
/**
 * Created by PhpStorm.
 * User: MaggieMtz
 * Date: 24/10/2014
 * Time: 06:50 PM
 */

function view ($plantilla, $variables = array())
{

    extract($variables);
    require('views/'. $plantilla .'.tpl.php');

}

function controller ($nombre){

    if (empty($nombre))
        $nombre = 'pregunta';

    $archivo = "controllers/$nombre.php";

    if (file_exists($archivo))
        require($archivo);

    else
        echo "Error archivo no encontrado";

}