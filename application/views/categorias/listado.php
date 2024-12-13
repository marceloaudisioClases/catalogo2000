<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alta de categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
  </head>
  <body>
    <?php $this->load->view("menu"); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
              <h1>Listado de Categorias:<i class="bi bi-tag-fill"></i>
              <span class="float-end">
                      <a href="<?php echo site_url("categorias/alta"); ?>" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Nuevo</a>
                  </span>
               </h1>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">
                    <a href="<?php echo site_url("categorias/listar/orden/categoria_id"); ?>">Codigo</a>
                    </th>
                    <th scope="col">
                    <a href="<?php echo site_url("categorias/listar/orden/nombre"); ?>">Nombre</a>
                    </th>
                    <th scope="col">
                    <a href="<?php echo site_url("categorias/listar/orden/estado"); ?>">Estado</a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($categorias as $c){ ?>
                  <tr>
                    <th scope="row"><?php echo $c["categoria_id"]; ?></th>
                    <td><?php echo $c["nombre"]; ?></td>
                    <td><?php echo $c["estado"]; ?></td>
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