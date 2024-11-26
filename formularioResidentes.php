<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../estilosFormularios.css">
</head>
<body>
    <div id="formu">
        <h1>Formularios para residentes</h1>
        <?php
        // Variables de los campos del formulario
        $matricula = $_POST['matricula'];
        $direccion = $_POST['direccion'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];
        $boton = $_POST['enviar'];
        $inicio = new DateTime($fechaInicio);
        $final = new DateTime($fechaFin);

        // Función para validar si hay campos vacíos
        function ValidaVacios($matriculaParam, $direccionParam, $FechaI, $FechaF) {
            $datosValidos = true;
            $intervalo = $FechaI->diff($FechaF);
            

            // Validación de la matrícula
            if (empty($matriculaParam)) {
                echo "<br>Matricula: <input type='text' name='matricula'><small style='color: red;'>La matrícula del vehículo no puede estar vacía</small><br>";
                $datosValidos = false;
            } else {
                echo "<br>Matricula: <input type='text' name='matricula' value=$matriculaParam><br>";
            }

            // Validación de la dirección
            if (empty($direccionParam)) {
                echo "<br>Direccion: <input type='text' name='direccion'><small style='color: red;'>La dirección no puede estar vacía</small><br>";
                $datosValidos = false;
            } else {
                echo "<br>Direccion: <input type='text' name='direccion' value=$direccionParam><br>";
            }

            // Validación de las fechas

            if($intervalo -> format('%R%') == '-' or $FechaI -> format('Y/m/d') == $FechaF -> format('Y/m/d')){
                echo "<br>Fecha Inicio: <input type='Date' name='fechaInicio'><small style='color: red;'>La fecha de inicio no puede ser mayor que la de </small><br>";
                echo "<br>Fecha Fin: <input type='Date' name='fechaFin'><small style='color: red;'>La fecha de fin no puede ser mayor que la de inicio</small><br>";
                $datosValidos = false;
            }else{
                echo "<br>Fecha de Inicio registrada: ".$FechaI -> format('Y/m/d').'<br>';
                echo "<br>Fecha de Fin registrada: ".$FechaF -> format('Y/m/d').'<br>';
             }
            
             if($datosValidos){
                echo "<br><button><a href='../index.html'>Volver</a></button>";
            }else{
                echo "<br><input type='submit' name='enviar' value='Enviar Datos'>";
            }

            // Devolver si todos los datos son válidos
            return $datosValidos;
        }

        // Validación y escritura en el archivo
        if (isset($boton)) {
            echo '<form action="formularioResidentes.php" method="post">';
            
            // Llamamos a la función de validación y guardamos el resultado
            $esFormularioValido = ValidaVacios($matricula, $direccion, $inicio, $final);
            
            // Si el formulario es válido, guardamos los datos en el archivo .txt
            if ($esFormularioValido) {
                $fichero = fopen("../TXT/residentes.txt", "a");
                if ($fichero) {
                    fwrite($fichero, "\n$matricula $direccion"." ". $inicio -> format('Y/m/d') ." ".$final -> format('Y/m/d')."\n");
                    fclose($fichero);
                    echo "<p style='color: green;'>Datos guardados correctamente</p>";
                } else {
                    echo "<p style='color: red;'>Error al abrir el archivo para escritura.</p>";
                }
            }
            echo '</form>';
        } else {
            // Mostrar el formulario inicial si no se ha enviado nada
            echo '<form action="formularioResidentes.php" method="post">';
            ValidaVacios($matricula, $direccion, $fechaInicio, $fechaFinal);
            echo '</form>';
        }
        ?>
    </div>
</body>
</html>
