<?php
//include 'producto.php';
include 'ABM.php';

$Numeroid = $_POST['NumID'];

$BD = new B_Datos("localhost", "root", "", "bd_Productos");
$BD->conectar();

$abm = New ABM($BD);
$abm->eliminar($Numeroid);

?>