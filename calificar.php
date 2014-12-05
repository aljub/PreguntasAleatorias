<?php @session_start();
/**
 * Created by PhpStorm.
 * User: MaggieMtz
 * Date: 30/10/2014
 * Time: 05:13 PM
 */

require ('helpers.php');
require ('template/header.php');
require ('clases/Preguntas.php');
require ('bd/DB.php');
 $numPregs = 10;
// diseño estatico para solo revisar diez preguntas
$preg[0] = (isset($_POST['preg1'])?$_POST['preg1']:1);
$preg[] = (isset($_POST['preg2'])?$_POST['preg2']:1);
$preg[] = (isset($_POST['preg3'])?$_POST['preg3']:1);
$preg[] = (isset($_POST['preg4'])?$_POST['preg4']:1);
$preg[] = (isset($_POST['preg5'])?$_POST['preg5']:1);
$preg[] = (isset($_POST['preg6'])?$_POST['preg6']:1);
$preg[] = (isset($_POST['preg7'])?$_POST['preg7']:1);
$preg[] = (isset($_POST['preg8'])?$_POST['preg8']:1);
$preg[] = (isset($_POST['preg9'])?$_POST['preg9']:1);
$preg[] = (isset($_POST['preg10'])?$_POST['preg10']:1);


$respDada[0] = (isset($_POST['0'])?$_POST['0']:NULL);
$respDada[] = (isset($_POST['1'])?$_POST['1']:NULL);
$respDada[] = (isset($_POST['2'])?$_POST['2']:NULL);
$respDada[] = (isset($_POST['3'])?$_POST['3']:NULL);
$respDada[] = (isset($_POST['4'])?$_POST['4']:NULL);
$respDada[] = (isset($_POST['5'])?$_POST['5']:NULL);
$respDada[] = (isset($_POST['6'])?$_POST['6']:NULL);
$respDada[] = (isset($_POST['7'])?$_POST['7']:NULL);
$respDada[] = (isset($_POST['8'])?$_POST['8']:NULL);
$respDada[] = (isset($_POST['9'])?$_POST['9']:NULL);
$calificacion=0;
//echo $matricula;
if(!$preg||!$respDada){
    echo "<p>Acceso invalido</p>";
}
else {
    $conexion = mysql_connect("localhost", "root", "");
    if (!$conexion) {
        echo "<p>Error: No se puede conectar al servidor<br>\n";
        echo "<a href=inicio_examen.php> Regresar al homie ese</a> </p>\n";
    } else {
        $bd = mysql_select_db("banco_pregunta", $conexion);
        if (!$bd) {
            echo "<p>Error: No se pudo seleccionar la bd<br>\n";
            echo "<a href='inicio_examen.php'> Regresar al homie ese</a> </p>\n";
        } else {

            $consulta = mysql_query("select * from usuario_preguntas where id_usuario=".$_SESSION["sesionUsuario"]."",$conexion);
            echo "<center><h2> Tesultados del éxamen  </h2></center>\n";
            echo "<center><p> Usuario:". mysql_result($consulta,0,'nombre_usuario') .mysql_result($consulta,0,'apellido_paterno_usuario') . mysql_result($consulta,0,'apellido_materno_usuario')."  </p></center>\n";


            for ($cju = 0; $cju < sizeof($preg); $cju++) {

                $consulta = mysql_query("select respuesta from respuesta_bien where pregunta=$preg[$cju]", $conexion);
                $idres = mysql_result($consulta, 0, 'respuesta');

                if ($respDada[$cju] == $idres)
                    $calificacion += 1;

            }

                    mysql_query("update usuario_preguntas set cal_usuario='$calificacion' where id_usuario=".$_SESSION["sesionUsuario"]."",$conexion);
                    mysql_Close($conexion);


                echo "<center><h4>Tu calificación es de $calificacion</h4>";
                echo "<p><a href='inicio_examen.php'> Inicio del examen</a> </p></center>";
            }
        }
    }

require ('template/footer.php');
