<?php
    $host ="localhost" ;
    $usuario = "root" ;
    $password = "" ;
    $basedatos = "estudiantes";
    $puerto = 3306;

    $conexion = new mysqli($host, $usuario, $password, $basedatos, $puerto);
    if($conexion -> connect_errno){
        echo"la conexion a la base de datos fallo".$conexion -> connect_errno;
    }
    
    echo"<br>";
    $codigo= $_POST["codigo"];
    $nombre= $_POST["nombre"];
    $grado= $_POST["grado"];
    $celular= $_POST["celular"];

    $consulta = "SELECT * FROM activos  WHERE  codigo = '$codigo'";
    $resultado = $conexion->query($consulta);
    $filas = mysqli_num_rows($resultado);
    
    if($filas==1){
        echo "El registro ya existe en base de datos";
    } else{
        $insert = "INSERT INTO activos  (codigo, nombre, grado, celular)  VALUES ('$codigo','$nombre','$grado','$celular')";
        if($conexion ->query($insert)){
            echo "Registro agregado exitosamente";
        }
        else{
            echo"El registro no se pudo agregar". $conexion->error;
        }
        echo "<br>";
        if ($grado >=10 && $grado <12){
            echo" Usted esta proximo a salir del colegio";
        }
        else{
            echo "Te esperamos el proximo año";
        }
    }
    $conexion-> close();
?>
