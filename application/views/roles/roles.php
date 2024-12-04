<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Roles de los usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
  </head>
  <body>
    <?php $this->load->view("menu"); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
              
                <h1 class="display-1">Roles de cada usuario:</h1>
                <br>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col" class="col-sm-1">Identificador</th>
                      <th scope="col" class="col-sm-1">Usuario</th>
                      <th scope="col" class="col-sm-1">Nombre</th>
                      <th scope="col" class="col-sm-1">rol</th>
                      <th scope="col" class="col-sm-1">estado</th>
                    </tr>
                  </thead>
                  <?php foreach($usuarios as $u){ ?>
                  <tbody>
                    <tr>
                      <th scope="row" class="col-sm-1"><?php echo $u["usuario_id"]; ?></th>
                      <td><?php echo $u["nombre"]; ?></td>
                      <td><?php echo $u["usuario"]; ?></td>
                      <td><?php echo $u["rol_nombre"]; ?></td>
                      <td><?php echo $u["estado"]; ?></td>
                    </tr>
                  </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>