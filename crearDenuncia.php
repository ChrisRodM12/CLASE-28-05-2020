<?php
$lugar = $_POST['input_lugar'];
$fecha = $_POST['input_fecha'];
$hora = $_POST['input_hora'];
$tipo = $_POST['input_vehiculo'];
$placa = $_POST['input_placa'];
$denuncia = $_POST['input_denuncia'];

echo $lugar;
echo "</br>";
echo $fecha;
echo "</br>";
echo $hora;
echo "</br>";
echo $tipo;
echo "</br>";
echo $placa;
echo "</br>";
echo $denuncia;
echo "</br>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "denuncias_bd";

$conn = new mysqli ($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo "Mi conexion con la Base de Datos falló";
    die ("La conexion falló".$conn->connect_error);
}else {
    echo "Mi conexion con la Base de Datos entre PHP y mySQL ha sido exitosa";
    echo "</br>";
}

$sql = "INSERT INTO denuncias (lugar, fecha, hora, tipo, placa, denuncia) 
VALUES ('".$lugar."', '".$fecha."', '".$hora."', '".$tipo."', '".$placa."', '".$denuncia."')";

$respuesta = $conn->query($sql);

if ($respuesta === TRUE) {
    echo "Registro creado correctamente";
    echo "</br>";
}else {
    echo "ERROR:" .$conn->error;
    echo "</br>";
}

$conn->close();

header("Location: index.php");

?>