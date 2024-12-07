<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista De Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
  </head>
  <body>
    <div class="body">
  <?php $this->load->view("catalogo/menu"); ?>
        <br>
    <div class="container">
        <div class="row">
            <div class="col">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Email</th>
                    <th scope="col">Creado</th>
                    <th scope="col">Ult Vez Conectado</th>
                    <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($usuarios as $s){ ?> 
                    <tr>
                    <td scope="row"><?php echo $s["usuario_id"]; ?></td>
                    <td><?php echo $s["nombre"]; ?></td>
                    <td><?php echo $s["password"]; ?></td>
                    <td><?php echo $s["usuario"]; ?></td>
                    <td><?php echo $s["email"]; ?></td>
                    <td><?php echo $s["creado"]; ?></td>
                    <td><?php echo $s["ult_login"]; ?></td>
                    <td><?php echo $s["estado"]; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
                        <a href="<?php echo site_url("principal") ?>" class="btn btn-primary">Volver</a>
            </div>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>