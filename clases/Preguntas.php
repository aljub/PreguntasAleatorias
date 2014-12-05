<?php @session_start();
/**
 * Created by PhpStorm.
 * User: MaggieMtz
 * Date: 24/10/2014
 * Time: 06:13 PM
 */
require_once('bd/DB.php');
class Preguntas {

    public function readGeneral($id)
    {
        $sqlReadGeneral = "select * from usuario_preguntas where id_usuario= $id";
        $resultReadGeneral = mysql_query($sqlReadGeneral) or die ("Error en $sqlReadGeneral");

        echo "<div class=carousel>";
        while ($field = mysql_fetch_array($resultReadGeneral)) {
            $this->id = $field['id_usuario'];
            $this->nombre = $field['nombre_usuario'];
            $this->apellidoPaterno = $field ['apellido_paterno_usuario'];
            $this->apellidoMaterno = $field ['apellido_materno_usuario'];

                echo "$this->nombre $this->apellidoPaterno $this->apellidoMaterno";


        }

    }


    public function Mostrarpreguntas(){

        //Numero de preguntas a mostrar
        $nunPre = 10;

        echo "<center><h2> Examen de conocimientos generales</h2></center>\n";

        // seleccionar las preguntas aleatoriamente
        $preguntas = mysql_query("select count(idPregunta) as 'cuantas' from preguntas");
        $pregsExistentes = mysql_result($preguntas,0,'cuantas');

        for($cont=0;$cont<$pregsExistentes;$cont++) $vector[$cont]=0;

        for($cont=0;$cont<$pregsExistentes;$cont++){

            $aleatorio=rand(1,$pregsExistentes);
            $ban=true;

            for($f=0;$f<$cont;$f++)

                if($vector[$f]==$aleatorio){
                    $ban=false;
                    break;
                }
            if(!$ban){

                $cont--; continue; }
            $vector[$cont]=$aleatorio;
        }


        // muestra preguntas
        echo '<form action="calificar.php" method="post">';

        for($cont=0;$cont<$nunPre;$cont++){

            $pregunta = mysql_query("select pregunta from preguntas where idPregunta='$vector[$cont]'");
            $preguntaResultado = mysql_result($pregunta,0,'pregunta');

            //$tpPreg = mysql_query("select clasificacion from preguntas where idPregunta='$vector[$r]'");
            //$tipoPreg = mysql_result($tpPreg,0,'clasificacion');
           // echo "<p>\n";

            echo "".($cont+1).") ".$preguntaResultado;

                $sqlRespuestas = mysql_query("select idRespuesta from respuesta where idPregunta='$vector[$cont]'");
                $RespuestasNum = mysql_num_rows($sqlRespuestas);
            echo "</p>\n";
                echo ' <input type="hidden" name="preg'.($cont+1).'" value="'.$vector[$cont].'">'."\n";

                for($new=0;$new<$RespuestasNum;$new++){

                    $consultaRespuesta = mysql_query("select * from respuesta where idRespuesta='".mysql_result($sqlRespuestas,$new,'idRespuesta')."'");
                    $valor= mysql_result($consultaRespuesta,0,'idRespuesta');
                    $valor1= mysql_result($consultaRespuesta,0,'respuesta');
                    echo '<input type="radio" name="'.$cont.'" value="'.$valor.'">'.$valor1."<br>\n";

            }
            echo "</p>\n";
        }
        echo '<input type="submit" value="Terminar">'."\n";
        echo '</form>'."\n";

    }
}




