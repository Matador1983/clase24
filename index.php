<!DOCTYPE html>
<html>
<head>
  <!-- METADATOS--> 
  <meta charset="utf-8">
  <meta name="author" content="Antonio Izzo">
  
  <!--Titulo-->
  <title>Pagina Web de Productos</title>  
  <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="StylesP.css">
    <!--Incluir Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<style>
  table {
  width: 50%;
  border-collapse: collapse;
  margin: 20px;

  }

  table, th, td {
  border: 1px solid black;
  }

  th, td {
  padding: 10px;
  text-align: center;
  }   
</style>
<body>
<section class="datos text-center">
<h3>Panel de Productos</h3>
  <div class="row">
    <div class = "columna col-4">    
      <form  action="producto.php" method="POST">
              <h2>Incluir de Productos</h2>
              <h1 for="NumID">ID:</h1>
              <input type="text" id="id-prod" name= "NumID" value=""> 				
              <h1 for="Prod">Producto:   </h1>
              <input type="text" id="name-prod"name= "Product" value="">					
              <h1 for="Precio">Precio:</h1>
              <input type="text" id="price-prod"name= "Price" value="">	
              <h1 for="Cantidad">Cantidad:</h1>
              <input type="text" id="amount-prod"name= "Amount" value="">				
              <!-- <input class="btn" type="submit" value ="Guardar"> -->
              <button type="submit" class="btn" name="Btn"  value="Guardar">
                  Guardar
                  <i class="bi bi-arrow-right-circle-fill"></i>
              </button>
      </form>
    </div>
    <div class = "columna col-4">
        
          <form   action="producto.php" method="POST">
            <h2>Modificar Productos</h2>
            <h1 for="NumID">ID:</h1>
            <input type="text" id="id-prod" name= "NumID" value=""> 				
            <h1 for="Prod">Producto:   </h1>
            <input type="text" id="name-prod"name= "Product" value="">					
            <h1 for="Precio">Precio:</h1>
            <input type="text" id="price-prod"name= "Price" value="">	
            <h1 for="Cantidad">Cantidad:</h1>
            <input type="text" id="amount-prod"name= "Amount" value="">				
            <!-- <input class="btn" type="submit" value ="Guardar"> -->
            <button type="submit" class="btn" name="Btn" value="Editar">
                Editar
              <i class="bi bi-arrow-right-circle-fill"></i>
            </button>
          </form>
    </div>
    <div class = "columna col-4">    
      <form  action="eliminar.php" method="POST">
            <h2>Eliminar Productos</h2>
            <h1 for="NumID">ID:</h1>
            <input type="text" id="id-prod" name= "NumID" value=""> 				
            
            <button type="submit" class="btn" name="Btn" value="Eliminar">
                Eliminar
                <i class="bi bi-arrow-right-circle-fill"></i>
            </button>
      </form>
    </div>
  </div>
</section> 


<section class="datos">
  <div class="row">
    <div class = "columna col-12"> 
    <h2>Listado de Productos</h2>
      <?php
        include 'ABM.php';

        $BD = new B_Datos("localhost", "root", "", "bd_Productos");
        $BD->conectar();
        $abm = New ABM($BD);
        $result = $abm->mostrar();

          if (!empty($result)) {
            echo '<table>';
            // Imprime la fila de encabezados de la tabla
            echo '<tr>';
            foreach ($result[0] as $clave => $valor) {
                echo '<th>' . $clave . '</th>';
            }
            echo '</tr>';

            // Imprime los datos del arreglo en filas de la tabla
            foreach ($result as $fila) {
                echo '<tr>';
                foreach ($fila as $valor) {
                    echo '<td>' . $valor . '</td>';
                }
                echo '</tr>';
            }

            echo '</table>';
          } else {
            echo 'El arreglo está vacío.';
          }
      ?>
    </div>
  </div>
</section> 
</body>
</html>