<?php
//Antes que todo hay que incluir la conexión para que esté disponible en la págin

include('conexion_db.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TaskManager CRUD con PHP y MySQL</title>
</head>
<body>
<form action="guardar_tarea.php" method="POST">
<label for="ltitulo">Titulo:</label><br>
<input type="text" id="titulo" name="titulo"><br>
<label for="ldescripcion">Descripcion:</label><br>
<textarea name="descripcion" cols="30" rows="2"></textarea><br>
<button name="bt_guardar_tarea" type="submit" value="Guardar Tarea" >Guardar Ta
rea</button>