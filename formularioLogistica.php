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
        <h1>Formulario para Logistica</h1>
        <?php
            $matricula = $_POST['matricula'];
            $empresa = $_POST['empresa'];

            function validaVacios($matriculaParam,$empresaParam){
                $datosValidos = true;
                if(empty($matriculaParam)){
                    echo "<br>Matricula: <input type='text' name='matricula'><p style='color: red'>No puedes introducir la matrícula vacía</p><br>";
                    $datosValidos = false;
                }else{
                    echo "<br>Matricula: <input type='text' name='matricula' value=$matriculaParam><br>";
                }
                if(empty($empresaParam)){
                    echo "<br>Empresa Logistica: <input type='text' name='empresa'><p style='color: red'>No puedes introducir la empresa de logística vacía</p><br>";
                    $datosValidos = false;
                }else{
                    echo "<br>Empresa Logistica: <input type='text' name='empresa' value=$empresaParam><br>";
                }

                if($datosValidos){
                    echo "<br><button><a href='../index.html'>Volver</a></button>";
                }else{
                    echo "<br><input type='submit' name='enviar' value='Enviar Datos'>";
                }
                return $datosValidos;
            }
            echo "<form action='formularioLogistica.php' method='post'>";
                $esValido = validaVacios($matricula,$empresa);
                if($esValido){
                    $fichero = fopen("../TXT/logistica.txt","a");
                    if ($fichero){
                        fwrite($fichero,"$matricula $empresa\n");
                        fclose($fichero);
                        echo "<p style='color: green'>Datos guardados correctamente</p>";
                    }else{
                        echo "error al abrir el archivo";
                    }
                }
            echo "</form>";
        ?>
    </div>
</body>
</html>