<?php
/**
 * Created by PhpStorm.
 * User: MaggieMtz
 * Date: 02/10/2014
 * Time: 11:42 AM
 */

require('bd/DB.php');
require('template/header.php');


Echo"   <center><h1>Iniciar Sesión</h1>
            <table align='center' bgcolor='blue'> <form name='forma' action='validando.php' method='POST'>
            <tr><td><label for='nombre'>Usuario: </label></td>
            <td><input name='user' type='text'  placeholder='Escribe el usuario' required/><br><br></td></tr>
            <tr><td><label for='psw'>Contraseña:   </label></td>
            <td><input name='psw' type='password' placeholder='Escribe la constraseña' required/><br><br></td></tr><br><br>
            <tr><td colspan='2'><center><input name='btnguardar' type='submit' class='btn maincolor small' value='Entrar' >
            <input name='btnborrar' type='reset' value='Borrar' class='btn maincolor small'></center></td></tr>
            <br></form>";

require('template/footer.php');