<?php
     if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title> Evaluacion COBIT 4.1 </title>
    <link rel="stylesheet" type="text/css" href="CSS/pagina.css">
    <link rel="stylesheet" type="text/css" href="CSS/semaforo.css">

    <script>
        function setSubmitId(buttonId) {
            var submitIdField = document.getElementById("submit_id");
            submitIdField.value = buttonId;
            console.log("submit_id set to:", buttonId);
        }
    </script>

</head>
<body>

<h2>Administrar la Calidad</h2>

    <div style="display: flex; align-items: flex-start;">
    <form class="form-container" action="" method="POST">
        <table>
                <tr>
                    <th style="text-align: center;">Evaluación de Administración de datos</th>
                    <th style="text-align: center;">Sí</th>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">No Aplica</th>
                </tr>

                <?php
                include 'data/conexion.php';
                $dominioId = '0001'; // Cambiar al ID del dominio que deseas cargar
                $id_proceso= '0PO8';
                $sql = "SELECT * FROM objetivo_control WHERE id_proceso IN (SELECT id_proceso FROM proceso WHERE id_dominio = '$dominioId')";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $pregunta = $row['pregunta'];
                    $idObjetivo = $row['id_objetivo_control'];
                    echo "
                        <tr>
                            <td>$pregunta</td>
                            <td><input type='radio' name='respuestas[$idObjetivo]' value='si'></td>
                            <td><input type='radio' name='respuestas[$idObjetivo]' value='no'></td>
                            <td><input type='radio' name='respuestas[$idObjetivo]' value='n/a' checked></td>
                        </tr>
                    ";

                }
                ?>

        </table>
        <input type="hidden" name="submit_id" value="submit_planificacion">
        <input type="submit" name="submit_planificacion" value="Evaluar">
    </form>

        <div class="php-container-planificacion" id="php-container-planificacion">
            <div style="width: 130px; height: 325px; background-color: orange; position: static; margin: auto; padding-top: 1px; border: 2px solid black; border-radius: 15% ">
                <div name="circle-1" id="circle-1" style="width: 95px; height: 95px; border-radius: 50%; background-color: black; position: relative; margin: auto; margin-top: 6px; border: 2px solid black;"></div>
                <div name="circle-2" id="circle-2" style="width: 95px; height: 95px; border-radius: 50%; background-color: black; position: relative; margin: auto; margin-top: 10px; border: 2px solid black;"></div>
                <div name="circle-3" id="circle-3" style="width: 95px; height: 95px; border-radius: 50%; background-color: black; position: relative; margin: auto; margin-top: 10px; border: 2px solid black;"></div>

                <?php
                    if (isset($_SESSION['semaforoPlanificacion'])) {
                        $arrayPlanificacion = $_SESSION['semaforoPlanificacion'];
                        $color1 = $arrayPlanificacion[0];
                        $color2 = $arrayPlanificacion[1];
                        $color3 = $arrayPlanificacion[2];
                        echo "
                            <script>
                                var circulo1 = document.querySelector('#php-container-planificacion #circle-1');
                                var circulo2 = document.querySelector('#php-container-planificacion #circle-2');
                                var circulo3 = document.querySelector('#php-container-planificacion #circle-3');

                                circulo1.style.backgroundColor = '$color1';
                                circulo2.style.backgroundColor = '$color2';
                                circulo3.style.backgroundColor = '$color3';
                            </script>
                        ";
                    }
                ?>

            </div>
        </div>

    </div>



    <div style="display: flex; align-items: flex-start;">
    <form  class="form-container" action="" method="POST">
        <table>
                <tr>
                    <th style="text-align: center;">Evaluación de Riesgos de TI</th>
                    <th style="text-align: center;">Sí</th>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">No Aplica</th>
                </tr>
                <?php
                include 'data/conexion.php';
                $dominioId = '0002'; // Cambiar al ID del dominio que deseas cargar
                $id_proceso = '0P09';
                $sql = "SELECT * FROM objetivo_control WHERE id_proceso IN (SELECT id_proceso FROM proceso WHERE id_dominio = '$dominioId')";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $pregunta = $row['pregunta'];
                    $idObjetivo = $row['id_objetivo_control'];
                    echo "
                        <tr>
                            <td>$pregunta</td>
                            <td><input type='radio' name='respuestas[$idObjetivo]' value='si'></td>
                            <td><input type='radio' name='respuestas[$idObjetivo]' value='no'></td>
                            <td><input type='radio' name='respuestas[$idObjetivo]' value='n/a' checked></td>
                        </tr>
                    ";
                }
                ?>

            </table>
        <input type="hidden" name="submit_id" value="submit_riesgos">
        <input type="submit" name="submit_riesgos" value="Evaluar">
    </form>

        <div class="php-container-riesgos" id="php-container-riesgos">
            <div style="width: 130px; height: 325px; background-color: orange; position: static; margin: auto; padding-top: 1px; border: 2px solid black; border-radius: 15% ">
                <div name="circle-1" id="circle-1" style="width: 95px; height: 95px; border-radius: 50%; background-color: black; position: relative; margin: auto; margin-top: 6px; border: 2px solid black;"></div>
                <div name="circle-2" id="circle-2" style="width: 95px; height: 95px; border-radius: 50%; background-color: black; position: relative; margin: auto; margin-top: 10px; border: 2px solid black;"></div>
                <div name="circle-3" id="circle-3" style="width: 95px; height: 95px; border-radius: 50%; background-color: black; position: relative; margin: auto; margin-top: 10px; border: 2px solid black;"></div>
                
                <?php
                    if (isset($_SESSION['semaforoRiesgos'])) {
                        $arrayRiesgos = $_SESSION['semaforoRiesgos'];
                        $color1 = $arrayRiesgos[0];
                        $color2 = $arrayRiesgos[1];
                        $color3 = $arrayRiesgos[2];
                        echo "
                            <script>
                                var circulo1 = document.querySelector('#php-container-riesgos #circle-1');
                                var circulo2 = document.querySelector('#php-container-riesgos #circle-2');
                                var circulo3 = document.querySelector('#php-container-riesgos #circle-3');

                                circulo1.style.backgroundColor = '$color1';
                                circulo2.style.backgroundColor = '$color2';
                                circulo3.style.backgroundColor = '$color3';
                            </script>
                        ";
                    }

                ?>
            
            </div>
        </div>

    </div>

    <div style="display: flex; align-items: flex-start;">
    <form  class="form-container" action="" method="POST">
        <table>
                <tr>
                    <th style="text-align: center;">Administración de Datos</th>
                    <th style="text-align: center;">Sí</th>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">No Aplica</th>
                </tr>
                <?php
                include 'data/conexion.php';
                $dominioId = '0003'; // Cambiar al ID del dominio que deseas cargar
                $id_proceso= 'DS11';
                $sql = "SELECT * FROM objetivo_control WHERE id_proceso IN (SELECT id_proceso FROM proceso WHERE id_dominio = '$dominioId')";
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $pregunta = $row['pregunta'];
                    $idObjetivo = $row['id_objetivo_control'];
                    echo "
                        <tr>
                            <td>$pregunta</td>
                            <td><input type='radio' name='respuestas[$idObjetivo]' value='si'></td>
                            <td><input type='radio' name='respuestas[$idObjetivo]' value='no'></td>
                            <td><input type='radio' name='respuestas[$idObjetivo]' value='n/a' checked></td>
                        </tr>
                    ";
                }
                ?>
            </table>

        <input type="hidden" name="submit_id" value="submit_calidad">
        <input type="submit" name="submit_calidad" value="Evaluar">
    </form>

        <div class="php-container-calidad" id="php-container-calidad">
            <div style="width: 130px; height: 325px; background-color: orange; position: static; margin: auto; padding-top: 1px; border: 2px solid black; border-radius: 15% ">
                <div name="circle-1" id="circle-1" style="width: 95px; height: 95px; border-radius: 50%; background-color: black; position: relative; margin: auto; margin-top: 6px; border: 2px solid black;"></div>
                <div name="circle-2" id="circle-2" style="width: 95px; height: 95px; border-radius: 50%; background-color: black; position: relative; margin: auto; margin-top: 10px; border: 2px solid black;"></div>
                <div name="circle-3" id="circle-3" style="width: 95px; height: 95px; border-radius: 50%; background-color: black; position: relative; margin: auto; margin-top: 10px; border: 2px solid black;"></div>
            
                <?php
                    if (isset($_SESSION['semaforoCalidad'])) {
                        $arrayCalidad = $_SESSION['semaforoCalidad'];
                        $color1 = $arrayCalidad[0];
                        $color2 = $arrayCalidad[1];
                        $color3 = $arrayCalidad[2];
                        echo "
                            <script>
                                var circulo1 = document.querySelector('#php-container-calidad #circle-1');
                                var circulo2 = document.querySelector('#php-container-calidad #circle-2');
                                var circulo3 = document.querySelector('#php-container-calidad #circle-3');

                                circulo1.style.backgroundColor = '$color1';
                                circulo2.style.backgroundColor = '$color2';
                                circulo3.style.backgroundColor = '$color3';
                            </script>
                        ";
                    }

                ?>
            
            </div>
        </div>

    </div>

    <form class="form-container" action="" method="POST">
        <input type="hidden" name="submit_id" value="clear_semaforos">
        <input type="submit" name="clear_semaforos" value="Limpiar">
    </form>



    <?php
        if (isset($_POST['submit_planificacion']) || isset($_POST['submit_riesgos'])
        || isset($_POST['submit_calidad'])) {
            $respuestas = $_POST['respuestas'];
            $submitId = $_POST['submit_id'];
            include 'logic/semaforo.php';
        }

        if (isset($_POST['clear_semaforos'])) {
            echo "<script>
                var circulo1_planificacion = document.querySelector('#php-container-planificacion #circle-1');
                var circulo2_planificacion = document.querySelector('#php-container-planificacion #circle-2');
                var circulo3_planificacion = document.querySelector('#php-container-planificacion #circle-3');

                circulo1_planificacion.style.backgroundColor = 'black';
                circulo2_planificacion.style.backgroundColor = 'black';
                circulo3_planificacion.style.backgroundColor = 'black';

                var circulo1_riesgos = document.querySelector('#php-container-riesgos #circle-1');
                var circulo2_riesgos = document.querySelector('#php-container-riesgos #circle-2');
                var circulo3_riesgos = document.querySelector('#php-container-riesgos #circle-3');

                circulo1_riesgos.style.backgroundColor = 'black';
                circulo2_riesgos.style.backgroundColor = 'black';
                circulo3_riesgos.style.backgroundColor = 'black';

                var circulo1_calidad = document.querySelector('#php-container-calidad #circle-1');
                var circulo2_calidad = document.querySelector('#php-container-calidad #circle-2');
                var circulo3_calidad = document.querySelector('#php-container-calidad #circle-3');

                circulo1_calidad.style.backgroundColor = 'black';
                circulo2_calidad.style.backgroundColor = 'black';
                circulo3_calidad.style.backgroundColor = 'black';
            </script>";

            //unset($_SESSION['semaforoPlanificacion']);
            //unset($_SESSION['semaforoRiesgos']);
            //unset($_SESSION['semaforoCalidad']);
        }
    ?>

</body>
</html>