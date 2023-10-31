<?php
// include 'BaseDatos.php';
include 'ABM.php';

$Numeroid = $_POST['NumID'];
$Prod = $_POST['Product'];
$Prec = $_POST['Price'];
$Cant = $_POST['Amount'];

$btn = $_POST['Btn'];

class Producto {
  public $ID;
  public $Nombre_p;
  public $Precio_p;
  public $Cantidad_p;

  public function __construct($ID,$Nombre_p,$Precio_p,$Cantidad_p)
  {
    $this->ID =$ID;
    $this->Nombre_p =$Nombre_p;
    $this->Precio_p = $Precio_p;
    $this->Cantidad_p = $Cantidad_p;
  }

  public function getID(){
    return $this->ID;
  }
  public function getNombre(){
    return $this->Nombre_p;
  }
  public function getPrecio(){
    return $this->Precio_p;
  }
  public function getCantidad(){
    return $this->Cantidad_p;
  }


  public function setID(){
    return $this->ID;
  }
  public function setNombre(){
    return $this->Nombre_p;
  }
  public function setPrecio(){
    return $this->Precio_p;
  }
  public function setCantidad(){
    return $this->Cantidad_p;
  }
}

$producto = new Producto($Numeroid,$Prod,$Prec,$Cant);

$BD = new B_Datos("localhost", "root", "", "bd_Productos");
$BD->conectar();


if ($btn == 'Guardar'){

  $abm = New ABM($BD);
  $abm->agregar($producto);
} else
 if ($btn == 'Editar'){

  $abm = New ABM($BD);
  $abm->modificar($producto);
} 
else 
if ($btn == 'Eliminar'){

  $abm = New ABM($BD);
  $abm->eliminar($Numeroid);

   }













?>