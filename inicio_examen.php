<?php @session_start();
/**
 * Created by PhpStorm.
 * User: MaggieMtz
 * Date: 24/10/2014
 * Time: 06:18 PM
 */

require('template/header.php');
require('template/footer.php');
require('template/menu.php');
require('clases/Preguntas.php');
require ('helpers.php');

if (empty($_GET['url']))
$_GET['url']='pregunta';

controller($_GET['url']);