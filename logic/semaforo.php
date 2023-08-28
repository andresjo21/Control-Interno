
    <?php
    // Recibir las respuestas enviadas desde el formulario
    $respuestas = $_POST['respuestas']; // Aquí asumimos que el formulario envía las respuestas como un array con el nombre 'respuestas'
    $submitId = $_POST['submit_id'];

    // Contar las respuestas
    $totalRespuestas = count($respuestas);
    $siCount = 0;
    $noCount = 0;
    $naCount = 0;

    // Verificar las respuestas y contarlas
    foreach ($respuestas as $respuesta) {
        if ($respuesta === "si") {
            $siCount++;
        } elseif ($respuesta === "no") {
            $noCount++;
        } elseif ($respuesta === "n/a") {
            $naCount++;
        }
    }

    // Calcular el porcentaje de respuestas "si" (sin contar las respuestas "n/a")
    if($siCount == 0 && $noCount == 0){
        $porcentajeSi = 0;
    }else{
        $porcentajeSi = ($siCount / ($totalRespuestas - $naCount)) * 100;

        // Definir los colores de los círculos según el porcentaje de respuestas "si"
        if ($porcentajeSi == 100) {
            $color1 = "green";
            $color2 = "black";
            $color3 = "black";
        } elseif ($porcentajeSi > 50 && $porcentajeSi < 100) {
            $color1 = "black";
            $color2 = "yellow";
            $color3 = "black";
        } else {
            $color1 = "black";
            $color2 = "black";
            $color3 = "red";
        }
    }

    ?>

    <script>
        console.log("Se ejecutó el script");

        var submitId = "<?php echo $submitId; ?>"; // Definir submitId aquí
        var color1 = "<?php echo $color1; ?>"; // Definir color1 aquí
        var color2 = "<?php echo $color2; ?>"; // Definir color2 aquí
        var color3 = "<?php echo $color3; ?>"; // Definir color3 aquí

        if (submitId === "submit_planificacion") {

            var circulo1 = document.querySelector("#php-container-planificacion #circle-1"); // Cambio aquí
            var circulo2 = document.querySelector("#php-container-planificacion #circle-2"); // Cambio aquí
            var circulo3 = document.querySelector("#php-container-planificacion #circle-3"); // Cambio aquí

            circulo1.style.backgroundColor = color1;
            circulo2.style.backgroundColor = color2;
            circulo3.style.backgroundColor = color3;
        }

        if (submitId === "submit_riesgos") {

            var circulo1 = document.querySelector("#php-container-riesgos #circle-1"); // Cambio aquí
            var circulo2 = document.querySelector("#php-container-riesgos #circle-2"); // Cambio aquí
            var circulo3 = document.querySelector("#php-container-riesgos #circle-3"); // Cambio aquí

            circulo1.style.backgroundColor = color1;
            circulo2.style.backgroundColor = color2;
            circulo3.style.backgroundColor = color3;
        }

        if (submitId === "submit_calidad") {

            var circulo1 = document.querySelector("#php-container-calidad #circle-1"); // Cambio aquí
            var circulo2 = document.querySelector("#php-container-calidad #circle-2"); // Cambio aquí
            var circulo3 = document.querySelector("#php-container-calidad #circle-3"); // Cambio aquí

            circulo1.style.backgroundColor = color1;
            circulo2.style.backgroundColor = color2;
            circulo3.style.backgroundColor = color3;
        }
    </script>