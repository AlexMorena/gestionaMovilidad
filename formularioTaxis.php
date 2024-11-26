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
        <h1>Formularios para Taxis</h1>
            <?php
                $matricula = $_POST['matricula'];
                $usuario = $_POST['usuario'];
                
                function validaVacios($matriculaParam, $usuarioParam){
                    $datosValidos = true;

                    if(empty($matriculaParam)){
                        echo "Matricula: <input type='text' name='matricula' ><p style='color: red'>No puedes introducir la matrícula vacía</p><br>";
                        $datosValidos = false;
                    }else{
                        echo "<br>Matricula: <input type='text' name='matricula' value =$matriculaParam><br>";
                    }

                    if(empty($usuarioParam)){
                        echo "Usuario: <input type='text' name='usuario' ><p style='color: red'>No puedes introducir el usuario vacío</p><br>";
                        $datosValidos = false;
                    }else{
                        echo "<br>Usuario: <input type='text' name='usuario' value =$usuarioParam><br>";
                    }

                    if(!$datosValidos){
                        echo "<br><input type='submit' name='enviar' value='Enviar'>";
                    }
                    if($datosValidos){
                        echo "<br><button><a href='../index.html'>Volver</a></button>";
                    }
                    return $datosValidos;
                }
                echo '<form action="formularioTaxis.php" method="post">';
                $sonDatosValidos = validaVacios($matricula,$usuario);
                if($sonDatosValidos){
                    $fichero = fopen("../TXT/taxis.txt","a");
                    if($fichero){
                        fwrite($fichero, "$matricula $usuario\n");
                        fclose($fichero);
                        echo "<p style='color: green;'>Datos guardados correctamente</p>";
                    }else{
                        echo "error en la lectura del archivo";
                    }
                }
                echo '</form>';
            ?>
        </form>
    </div>
</body>
</html>