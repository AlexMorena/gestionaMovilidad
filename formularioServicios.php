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
        <h1>Formulario para servicios</h1>
        <?php
            $matricula = $_POST['matricula'];
            $servicio = $_POST['servicio'];
            function validaVacios($matriculaParam,$servicioParam){
                $datosValidos = true;
                if(empty($matriculaParam)){
                    echo "<br>Matricula: <input type='text' name='matricula'><p style='color: red'>No puedes introducir la matricula vacía</p><br>";
                    $datosValidos = false;
                }else{
                    echo "<br>Matricula: <input type='text' name='matricula' value='$matriculaParam'><br>";
                }
                if(empty($servicioParam)){
                    echo "<br>Tipo Servicio: <input type='text' name='servicio'><p style='color: red'> No puedes introducir el servicio vacío</p><br>";
                    $datosValidos = false;
                }else{
                    echo "<br>Tipo Servicio: <input type='text' name='servicio' value='$servicioParam'><br>";
                }

                if($datosValidos){
                    echo "<br><button><a href='../index.html'>Volver</a></button>";
                }else{
                    echo "<br><input type='submit' name='enviar' value='Enviar Datos'>";
                }

                return $datosValidos;
            }
            echo "<form action='formularioServicios.php' method='post'>";
            $esValido = validaVacios($matricula,$servicio);
            if($esValido){
                $fichero = fopen("../TXT/servicios.txt","a");
                if($fichero){
                    fwrite($fichero,"$matricula $servicio\n");
                    fclose($fichero);
                    echo "<p style='color: green'>Datos guardados correctamente</p>";
                }else{
                    echo "no se ha podido abrir el archivo";
                }
            }
            echo "</form>";
        ?>
    </div>
</body>
</html>