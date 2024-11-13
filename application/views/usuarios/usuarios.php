<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenida de usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
  </head>
  <body>
    <?php $this->load->view("menu"); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
              
                <h1 class="display-1">Lista de usuarios</h1>

                <div class="card">
                    <div class="card-body">
                    <?php foreach($usuarios as $c){ ?>
                      <table class="table table-bordered border-black">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Rol</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row"><?php echo $c["usuario_id"]; ?></th>
                            <td><?php echo $c["usuario"]; ?></td>
                            <td><?php echo $c["apellido"]; ?></td>
                            <td><?php echo $c["nombre"]; ?></td>
                            <td><?php echo $c["email"]; ?></td>
                            <td><?php echo $c["estado"]; ?></td>
                            <td><?php echo $c["rol_id"]; ?></td>
                          </tr>
                        </tbody>
                      </table>
                   <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>