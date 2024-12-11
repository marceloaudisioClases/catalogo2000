<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
  </head>
  <body>
    <?php $this->load->view("menu"); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
              
                <h1 class="display-1">Bienvenido <i class="bi bi-emoji-laughing"></i></h1>
                <br>
                <div class="card col-md-3" style="display: block">
                  <div class="card-body text-center col-offset-4" style="border: 2px solid black">
                    <h4><i class="bi bi-people-fill"></i> Total de usuarios: <?php echo $total_usuarios; ?></h4>
                    <h4><i class="bi bi-archive-fill"></i> Total de productos: <?php echo $total_productos; ?></h4>
                    <h4><i class="bi bi-tag-fill"></i> Total de categorias:  <?php echo $total_categorias; ?></h4>
                  </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>