<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi Cuenta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
  </head>
  <body>
    <?php $this->load->view("menu"); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
              
                <h1>Editar Perfil:</h1>
                <?php 
                if($this->session->flashdata("OP")){
                    echo "<p>Contraseña Actualizada!</p>";
                } 
                ?>
                <div class="card">
                  <div class="card-body">
                  <form method="post" action="<?php echo site_url("principal/micuenta"); ?>">
              
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value("password"); ?>">
                        <?php echo form_error("password",'<div class="form-text text-danger">','</div>'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="conf-password" class="form-label">Confirmar Contraseña:</label>
                        <input type="password" class="form-control" id="conf-password" name="conf-password">
                        <?php echo form_error("conf-password",'<div class="form-text text-danger">','</div>'); ?>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>