<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catalogo de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
  </head>
  <body>
    <?php $this->load->view("catalogo/menu"); ?>
    <div class="container-fluid mt-3">
        <div class="row">
           <div class="col-2">
                
                <div class="list-group">
                <a href="<?php echo site_url("catalogo"); ?>" class="list-group-item list-group-item-action <?php echo ($categoria_id==0 and !isset($buscar))?"active":""; ?>">
                  <i class="bi bi-house-fill"></i> Inicio
                </a>
               <?php foreach($categorias as $c){ ?>   
                  <a href="<?php echo site_url("catalogo/categoria/".$c["categoria_id"]); ?>" class="list-group-item list-group-item-action <?php echo ($categoria_id==$c["categoria_id"])?"active":""; ?>"><?php echo $c["icono"]; ?> <?php echo $c["nombre"]; ?></a>
               <?php } ?>
               </div>
           </div>
            <div class="col-10">
              <?php if($producto){ ?>
                <?php if($categoria_id>0){ ?>
                  <h1 class="display-3">
                    <?php echo $categoria_seleccionada["icono"];?>
                    <?php echo str_pad($producto["producto_id"],5,"0",STR_PAD_LEFT); ?> 
                     - <?php echo $producto["nombre"]; ?> > 
                    <small class="text-body-secondary">
                      <?php echo $categoria_seleccionada["nombre"];?>
                    </small>
                  </h1>
                <?php }else{ ?>
                    <h1 class="display-3">
                    <?php echo str_pad($producto["producto_id"],5,"0",STR_PAD_LEFT); ?> 
                    <?php echo $producto["nombre"]; ?>
                    </h1>
                <?php } ?>
                <br>
                <div class="card col-md-8">
                  <?php if(file_exists(FCPATH.DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR.$producto["producto_id"].".png")){ ?>
                    <img src="<?php echo base_url("img/".$producto["producto_id"].".png"); ?>" class="img-fluid card-img-top">
                  <?php }else{ ?>
                    <img src="<?php echo base_url("img/sin-imagen.png"); ?>" class="img-fluid card-img-top">
                  <?php } ?>
                  
                  <div class="card-body">
                    <h5 class="card-title">
                      <?php echo str_pad($producto["producto_id"],5,"0",STR_PAD_LEFT); ?> 
                      <?php echo $producto["nombre"]; ?>
                    </h5>
                    <p class="card-text"><?php echo $producto["descripcion"]; ?></p>
                    <div class="col-sm-2">
                        <img src="<?php echo base_url("img/qr/".$producto["producto_id"].".png");?>" class="img-fluid">
                    </div>
                    
                    <p class="float-end text-end">
                        Precio Final sin IVA <br> <b> $<?php echo $producto["costo"]; ?></b>
                    </p>
                  </div>
                </div>
                  
                <?php }else{ ?>
                    
                      <div class="alert alert-info">
                          No Existe el producto
                      </div>
                   
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>