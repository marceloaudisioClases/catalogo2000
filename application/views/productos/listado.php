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
              
                <h1>Listado de Productos:
                  <span class="float-end">
                      <a href="<?php echo site_url("productos/alta"); ?>" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Nuevo</a>
                  </span>
                  
                </h1>
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col" class="col-sm-1">Código</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Categoría</th>
                        <th scope="col" class="col-sm-2">Costo</th>
                        <th scope="col" class="col-sm-1">&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($productos as $p){ ?>
                      <tr>
                        <th scope="row">
                          <?php echo str_pad($p["producto_id"],5,"0",STR_PAD_LEFT); ?>
                        </th>
                        <td><?php echo $p["nombre"]; ?></td>
                        <td><?php echo $p["categoria_id"]; ?></td>
                        <td class="text-end">$<?php echo $p["costo"]; ?></td>
                        <td class="text-end">
                          <a href="<?php echo site_url("productos/editar/".$p["producto_id"]); ?>" title="Editar" class="btn btn-primary btn-sm"><i class="bi bi-pencil-fill"></i></a>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>