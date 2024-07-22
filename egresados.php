<?php
    $host ="localhost" ;
    $usuario = "root" ;
    $password = "" ;
    $basedatos = "estudiantes";
    $puerto = 3306;

    $conexion = new mysqli($host, $usuario, $password, $basedatos, $puerto);
    if($conexion -> connect_errno){
        echo "La conexión a la base de datos fallo".$conexion -> connect_errno;
    }

    echo"<br>";
    $cedula= $_POST["cedula"];
    $nombre= $_POST["nombre"];
    $ano_retiro= $_POST["ano_retiro"];
    $ano_cursados= $_POST["ano_cursados"];
    $celular= $_POST["celular"];


    $consulta = "SELECT * FROM egresados  WHERE  cedula = '$cedula'";
    $resultado = $conexion->query($consulta);
    $filas = mysqli_num_rows($resultado);

    if($filas==1){
        echo "El registro ya existe en base de datos";
    } else{
        $insert = "INSERT INTO egresados  (cedula,nombre, ano_retiro, ano_cursados, celular)  VALUES ('$cedula','$nombre','$ano_retiro','$ano_cursados','$celular')";
        if($conexion ->query($insert)){
            echo "Registro agregado exitosamente";
        }
        else{
            echo "El registro no se pudo agregar". $conexion->error;
        }
        echo "<br>";
    }
    $conexion-> close();
?>
