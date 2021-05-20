<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- DATATABLE -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">


    <title> Prueba técnica OrionTek</title>

  </head>
  <body>
    
    <div class="container-fluid">
      
     
        
        <div class="row mt-4">
          
          <!-- CARD - EMPRESAS -->
          <div class="col-md-4">
            
            <div class="card">
              
              <div class="card-header">

                <h3 class="card-title"> 
                
                  <button class="btn btn-dark" data-toggle="modal" data-target="#agregarEmpresa">Agregar Empresa</button>

                </h3>

              </div>

              <div class="card-body">

                
                <table class="table table-hover table-striped" id="myTable">
                  <thead>

                    <tr>
                      <th>No.</th>
                      <th>Empresa</th>
                    </tr> 

                  </thead>

                  <tbody>

                    <?php

                      $campo = null;
                      $valor = null;

                      $mostrarEmpresas = ctrEmpresa::ctrMostrarEmpresa($campo, $valor);

                    ?>

                    <?php foreach ($mostrarEmpresas as $key => $value) : ?>

                  
                    <tr>
                      <td><?= ($key+1) ?></td>
                      <td><?= $value['nombre']; ?></td>
                    </tr>

                  <?php endforeach; ?>
                  
                    </tr>
                  
                  </tbody>
                  
                </table>

              </div>

            </div>
          
          </div>
          <!-- FIN CARD - EMPRESAS -->


          <!-- CARD - USUARIOS -->

          <div class="col-md-8">
            
            <div class="card">
              
              <div class="card-header">

                <h3 class="card-title"> 
                  
                  <button class="btn btn-primary" data-toggle="modal" data-target="#agregarCliente">Agregar Cliente </button>

                </h3>

              </div>

              <div class="card-body">

                
                <table class="table table-hover table-striped" id="myTable">
                  <thead>

                    <tr>
                      <th>No.</th>
                      <th>Nombre</th>
                      <th>Empresa</th>
                    </tr> 

                  </thead>

                  <tbody>

                    <?php

                      $campo = null;
                      $valor = null;

                      $mostrarUsuario = ctrUsuario::ctrMostrarUsuario($campo, $valor);
                    ?>

                    <?php foreach ($mostrarUsuario as $key => $value) : ?>

                    <tr>
                      <td><?= ($key+1) ?></td>
                      <td><?php echo $value['nombre'] . " " . $value['apellido']; ?></td>
                      <td><?= $value['empresaID']?></td>
                    </tr>

                  <?php endforeach; ?>
                                    
                  </tbody>
                  
                </table>

              </div>

            </div>
          
          </div>

          <!-- FIN CARD - USUARIOS -->

        </div>
    
      
    
    </div>


  
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  
    <script type="text/javascript" src="./recursos/scripts/dataTable.js"></script>


  </body>

  
</html>




<!-- MODAL AGREGAR CLIENTE -->
<div class="modal fade" id="agregarCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="container-flui">
          
          <div class="row">
            
            <div class="col-12">
              
              <form method="POST">

                <div class="form-group">
                  <label for="nombre">Nombre:</label>
                  <input type="text" class="form-control" id="nombre" value="" required name="nombre">
                </div>

                <div class="form-group">
                  <label for="apellido">Apellido:</label>
                  <input type="text" class="form-control" id="apellido" value="" required name="apellido">
                </div>

                <?php 

                $campo = null;
                $valor = null;

                $mostrarEmpresa = ctrEmpresa::ctrMostrarEmpresa($campo, $valor);

                ?>
  
                <div class="form-group">
                  <label for="empresa">Empresa:</label>
                  <select class="form-control" id="empresa" name="empresaID">
                    <option value="" required>Seleccionar empresa</option>
                    <?php foreach ($mostrarEmpresa as $key => $value) : ?>
                    <option value="<?=$value['Id']?>"><?= $value['nombre']?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="direccion">Dirección:</label>
                  <input type="text" class="form-control" id="direccion" value="" name="direccion">
                </div>             

            </div>

          </div>
        
        </div>

      </div>
      
      <div class="modal-footer">
        <button type="reset" class="btn btn-danger">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>

      <?php

        $nuevoCliente = new ctrUsuario();
        $nuevoCliente -> ctrCrearUsuario();

      ?>
 
      </form>

    </div>
  
  </div>

</div>



<!-- MODAL AGREGAR EMPRESA -->
<div class="modal fade" id="agregarEmpresa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Empresa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="container-flui">
          
          <div class="row">
            
            <div class="col-12">
              
              <form method="POST" id="repeater_form">

                <div class="form-group">
                  <label for="empresa">Empresa:</label>
                  <input type="text" class="form-control" id="empresa" value="" required name="empresa">
                </div>

            </div>

          </div>
        
        </div>

      </div>
      
      <div class="modal-footer">
        <button type="reset" class="btn btn-danger">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>

      <?php

        $nuevaEmpresa = new ctrEmpresa();
        $nuevaEmpresa -> ctrCrearEmpresa();

      ?>
 
      </form>

    </div>
  
  </div>

</div>



