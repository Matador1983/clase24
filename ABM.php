<?php
include 'BaseDatos.php';


class ABM {

  private $baseDeDatos;

    public function __construct($baseDeDatos)
    {
      $this->baseDeDatos = $baseDeDatos;
    }

    public function agregar(Producto $producto){

      $sql = "INSERT INTO productos (Id,nombre,precio,cantidad) VALUES (?,?,?,?)";
      $parametros = [$producto->getID(),$producto->getNombre(),$producto->getPrecio(),$producto->getCantidad()];
      $this->baseDeDatos->consulta($sql,$parametros);
      echo'
      <script>
        alert("Producto agregado exitasamente.");	
          location.href="index.php";		
      </script>';
    }


    public function modificar(Producto $producto){    
      $sql = "UPDATE productos SET nombre = ?, precio = ?, cantidad = ? WHERE Id = ?";
      $parametros = [$producto->getNombre(),$producto->getPrecio(),$producto->getCantidad(),$producto->getID()];
      $this->baseDeDatos->consulta($sql,$parametros);
      echo'
      <script>
        alert("Producto modificado exitasamente.");	
          location.href="index.php";		
      </script>';
    }

    public function eliminar($id){

      $sql = "DELETE FROM productos WHERE Id = ?";      
      $this->baseDeDatos->consulta($sql,[$id]);
      echo'
      <script>
        alert("Producto eliminado exitasamente.");	
          location.href="index.php";		
      </script>';
    }

    public function mostrar(){

      $sql = "SELECT * FROM productos";
        $stmt = $this->baseDeDatos->consulta($sql,[]);
        return $stmt;
      
     
    }


}


?>