<?php @session_start();
/**
 * Created by PhpStorm.
 * User: MaggieMtz
 * Date: 02/10/2014
 * Time: 01:12 PM
 */
require_once('bd/DB.php');
require('template/header.php');

//se realiza la busqueda del usuario en la BD para verificar si exíste, así mismo, se verifíca que esté activo y se redirecciona según el resultado de las consultas.
$sqlUsuario = "select * from usuario_preguntas where usuario_usuario = '".$_POST['user']."' and contrasena_usuario = '".$_POST['psw']."';";
$consultaUsuario = mysql_query($sqlUsuario) or die (mysql_error());
$cuantosUsuario = mysql_num_rows($consultaUsuario);

if($cuantosUsuario != 0){
    $_SESSION["sesionUsuario"] = null;
    $estatus = mysql_result($consultaUsuario, 0, 'estatus_usuario');

    //Comparación para verificar si esta activo
    if($estatus != 'si'){


        echo "<script>
                    alert('Tu cuenta no esta activa.');
                    location.href = 'http://localhost/Banco_Preguntas/acceso_usuario.php';
                    </script>";
    }
    else{

        $nombre = mysql_result($consultaUsuario, 0, 'nombre_usuario');
        $id = mysql_result($consultaUsuario, 0, 'id_usuario');

        $_SESSION['sesionUsuario'] = $id;


        echo "<script>
                    location.href = 'inicio_examen.php';
                    </script>";

    }
}
else{

        //Aviso de iniciar sesión
        $_SESSION["sesionUsuario"] = null;

    echo "<script>
               alert(' Usuario Incorrecto o contraseña incorrecto.');
               location.href = 'http://localhost/Banco_Preguntas/acceso_usuario.php';
               </script>";
}