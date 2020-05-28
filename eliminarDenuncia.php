<?php
$id_para_borrar = $_GET['id_para_borrar'];

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


$sql = "DELETE FROM denuncias WHERE id_pk={$id_para_borrar}";
$respuesta = $conn->query($sql);

if ($respuesta === TRUE) {
    echo "Registro eliminado correctamente";
    echo "</br>";
}else {
    echo "ERROR:" .$conn->error;
    echo "</br>";
}

$conn->close();

header("Location: index.php");

?>