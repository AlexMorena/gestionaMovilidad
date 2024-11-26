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
        <h1>Infractores</h1>
        <?php
            $ficheroVehiculos = fopen("../TXT/vehiculos.txt","r");
            $ficheroResidentes = fopen("../TXT/residentes.txt","r");
            $ficheroLogistica = fopen("../TXT/logistica.txt","r");
            $ficheroVehiculosEMT = fopen("../TXT/vehiculosEMT.txt","r");
            $ficheroTaxis = fopen("../TXT/taxis.txt","r");
            $ficheroServicios = fopen("../TXT/servicios.txt","r");

            function buscaMatricula($ficheroVehiculosParam,$ficheroParam){
                rewind($ficheroParam);
                while(($lineaFicheros = fgets($ficheroParam)) !== false){                    
                    $lineaFicheros = trim(substr($lineaFicheros,0,8));
                    if($lineaFicheros == $ficheroVehiculosParam){
                        return true;
                    }
                }
                return false;
            }

            if($ficheroVehiculos || $ficheroResidentes || $ficheroLogistica || $ficheroVehiculosEMT
            || $ficheroTaxis || $ficheroServicios){
                while(($lineaFicherosVehiculos = fgets($ficheroVehiculos)) !== false){
                    $salida = false;
                    if (strpos($lineaFicherosVehiculos,"electrico")){
                        $salida = true;
                    }
                    $lineaFicherosVehiculos = trim(substr($lineaFicherosVehiculos,0,8));
                    if(buscaMatricula($lineaFicherosVehiculos, $ficheroResidentes)){
                        $salida = true;
                    }else if(buscaMatricula($lineaFicherosVehiculos, $ficheroTaxis)){
                        $salida = true;
                    }else if(buscaMatricula($lineaFicherosVehiculos, $ficheroServicios)){
                        $salida = true;
                    }else if(buscaMatricula($lineaFicherosVehiculos, $ficheroLogistica)){
                        $salida = true;
                    }else if(buscaMatricula($lineaFicherosVehiculos, $ficheroVehiculosEMT)){
                        $salida = true;
                    }
                    if($salida == false){
                        echo "Infractor: $lineaFicherosVehiculos";
                        echo "<br><br>";
                    }
                }
                echo "<br><br>";
                echo "<br><button><a href='../index.html'>Volver</a></button>";
            }else{
                die("Error de problema de escritura");
            }
        ?>
    </div>
</body>
</html>