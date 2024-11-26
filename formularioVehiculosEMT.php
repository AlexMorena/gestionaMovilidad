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
        <h1>Formularios para VehiculosEMT</h1>
        <?php
            $matricula = $_POST['matricula'];
            $lugar = $_POST['lugar'];

            function validaVacios($matriculaParam,$lugarParam){
                $datosValidos = true;
                if(empty($matriculaParam)){
                    echo "<br>Matricula: <input type='text' name='matricula'><p style='color: red'>No puedes introducir la matricula vacía</p><br>";
                    $datosValidos = false;
                }else{
                    echo "<br>Matricula: <input type='text' name='matricula' value='$matriculaParam'><br>";
                }
                if(empty($lugarParam)){
                    echo "<br>Lugar: <input type='text' name='lugar'><p style='color: red'> No puedes introducir el lugar vacío</p><br>";
                    $datosValidos = false;
                }else{
                    echo "<br>Lugar: <input type='text' name='lugar' value='$lugarParam'><br>";
                }

                if($datosValidos){
                    echo "<br><button><a href='../index.html'>Volver</a></button>";
                }else{
                    echo "<br><input type='submit' name='enviar' value='Enviar Datos'>";
                }

                return $datosValidos;
            }
            echo "<form action='formularioVehiculosEMT.php' method='post'>";
            $esValido = validaVacios($matricula,$lugar);
            if($esValido){
                $fichero = fopen("../TXT/vehiculosEMT.txt","a");
                if($fichero){
                    fwrite($fichero,"$matricula $lugar\n");
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