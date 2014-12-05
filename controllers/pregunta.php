<?php @session_start();
/**
 * Created by PhpStorm.
 * User: MaggieMtz
 * Date: 24/10/2014
 * Time: 06:44 PM
 */
//Esta información se puede sacar de una consulta

$pre = new Preguntas();
$titulo = 'Bienvenido(a)';
$contendio = ' ';

//Se coloca la información en variables en un array
$variables = array ('titulo'=>$titulo , 'contenido'=>$contendio , 'pre'=>$pre);

//Vista donde ducae el home y envia las variables
view('pregunta', $variables);
