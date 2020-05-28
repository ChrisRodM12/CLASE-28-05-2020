<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PORTAL DE DENUNCIAS CIUDADANAS</title>
    <style>
        html {
            height: auto;
        }
        body {
            height: auto;
            background-attachment: scroll;
            
        }
        h1, h2{
            text-align: center;
            font-style: italic;
        }
        .header{
            height: auto;
            background-color: #cba21e;
            background-attachment: scroll;
            font-family: Arial, Helvetica, sans-serif;
        }
        .seccion {
            height: 85%;
            background-color: #abc12d;
            background-attachment: scroll;
            border: #abc96a solid 2px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            text-align: center;
        }
        /* .item-form{
            text-align: center;
        } */
        .tabla{
            padding: 3px 10px;
            background-color: #cba21e;
            border: #cba21e 5px dashed;
            border-top-left-radius: 20px;
            border-bottom-right-radius: 20px;
            border-collapse: separate;
            margin-left: auto;
            margin-right: auto;
        }
        .footer{
            height: auto;
            background-color: #cba21e;
            background-attachment: scroll;
        } 
    </style>
</head>

<body>
    <div class="header">
    <h1>DENUNCIAS WEB DE TRANSITO </h1>
    <h2>BIENVENIDO AL PORTAL WEB DE DENUNCIAS CIUDADANAS</h2>
    <p>Por medio de esta página puede redactar su denuncia, queja, reclamo. Todo esto con respecto al funcionamiento 
    vehicular, si esta presentando algún tipo de contaminación, desechos, infracciones, atropellos a la comunidad
    ciudadana. REPORTELO, NO SE QUEDE CALLADO.</p>
    </div>
    
    <div class="seccion">
        <h2>Registre Aquí sus Denuncias</h2>
        <form action="crearDenuncia.php" method="POST">
            <div class="item-form">
                <p><label for="">Lugar</label></p>
                <p><input type="text" name="input_lugar" id="" required></p>
            </div>
            <div class="item-form">
                <p><label for="">Fecha</label></p>
                <p><input type="date" name="input_fecha" id="" required></p>
            </div>
            <div class="item-form">
                <p><label for="">Hora</label></p>
                <p><input type="datetime" name="input_hora" id="" required></p>
            </div>
            <div class="item-form">
                <p><label for="">Tipo de Vehiculo</label></p>
                <p><input type="text" name="input_vehiculo" id="" required></p>
            </div>
            <div class="item-form">
                <p><label for="">Placa</label></p>
                <p><input type="text" name="input_placa" id="" required></p>
            </div>
            <div class="item-form">
                <p><label for="">Denuncia</label></p>
                <p><input type="textarea" name="input_denuncia" id="" required></p>
            </div>
            <div class="item-form">
                <br>
                <input type="submit">
            </div>
        </form>
        <br>
        <table class="tabla" border ="2">
            <tr>
                <th>id</th>
                <th>Lugar</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Tipo de Vehiculo</th>
                <th>Placa</th>
                <th>Denuncia</th>
                <th></th>
                <th></th>
            </tr>
            <br>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "denuncias_bd";
            
            $conn = new mysqli ($servername, $username, $password, $dbname);
            
            if ($conn->connect_error) {
                echo "<strong><center>Mi conexion con la Base de Datos falló</center></strong>";
                die ("La conexion falló".$conn->connect_error);
            }else {
                echo "<strong><center>Mi conexión con la Base de Datos entre PHP y mySQL ha sido exitosa</center></strong>";
                echo "</br>";
            }
            $sql = "SELECT * from denuncias";
            $respuesta = $conn->query($sql);
            while ($row=$respuesta->fetch_array()) {
            ?>
            <tr>
                <th><?php echo $row['id_pk']; ?></th>
                <th><?php echo $row['lugar']; ?></th>
                <th><?php echo $row['fecha']; ?></th>
                <th><?php echo $row['hora']; ?></th>
                <th><?php echo $row['tipo']; ?></th>
                <th><?php echo $row['placa']; ?></th>
                <th><?php echo $row['denuncia']; ?></th>
                <th><a href="editarDenuncia.php?id_para_editar=<?php echo $row['id_pk']; ?>">Editar</a></th>
                <th><a href="eliminarDenuncia.php?id_para_borrar=<?php echo $row['id_pk'];?>">Eliminar</a></th>
            </tr>
            <?php
            }
            $conn->close();
            ?>
        </table>
        <div class="footer">
            Realizado por Christian Rodriguez Messa
        </div>
    </div>
</body>

</html>