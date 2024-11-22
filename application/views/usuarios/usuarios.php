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
                    <table class="table table-bordered border-black">
                        <thead>
                          <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Usuario</th>
                            <th scope="col" class="text-center">Apellido</th>
                            <th scope="col" class="text-center">Nombre</th>
                            <th scope="col" class="text-center">Email</th>
                            <th scope="col" class="text-center">Estado</th>
                            <th scope="col" class="text-center">Rol</th>
                          </tr>
                        </thead>
                    <?php foreach($usuarios as $c){ ?>
                        <tbody>
                          <tr>
                            <th scope="row" class="col-md-1 text-center"><?php echo $c["usuario_id"]; ?></th>
                            <td class="col-md-2 text-center"><?php echo $c["usuario"]; ?></td>
                            <td class="col-md-2 text-center"><?php echo $c["apellido"]; ?></td>
                            <td class="col-md-2 text-center"><?php echo $c["nombre"]; ?></td>
                            <td class="col-md-3 text-center"><?php echo $c["email"]; ?></td>
                            <form action="<?php echo site_url('usuarios/editar_estado/'.$c["usuario_id"]); ?>" method="post">
                            <td class="col-md-1 text-center"><select name="estado" id="estado">
                              <option value="1" <?php if($c["estado"] == 2){ echo "selected"; } ?>>Activo</option>
                              <option value="0" <?php if($c["estado"] == 1){ echo "selected"; } ?>>Pendiente</option>
                              <option value="2" <?php if($c["estado"] == 0){ echo "selected"; } ?>>Inactivo</option>
                            </select>
                            <button class="btn btn-primary" type="submit">Editar</button>
                            </form>
                          </td>
                          <form action="<?php echo site_url('usuarios/editar_rol/'.$c["usuario_id"]); ?>" method="post">
                          <td class="col-md-1 text-center"><select name="rol_id" id="rol_id">
                              <option value="1" <?php if($c["rol_id"] == 1){ echo "selected"; } ?>>Administrador</option>
                              <option value="2" <?php if($c["rol_id"] == 2){ echo "selected"; } ?>>Usuario</option>
                              <option value="3" <?php if($c["rol_id"] == 3){ echo "selected"; } ?>>Cliente</option>
                            </select><button class="btn btn-primary" type="submit">Editar</button>
                            </form>
                          </tr>
                        </tbody>
                        <?php } ?>
                      </table>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>