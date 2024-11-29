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
    <?php $this->load->view("catalogo/menu"); ?>
    <div class="container-fluid mt-3">
        <div class="row">
           <div class="col-2">
                
                <div class="list-group">
                <a href="<?php echo site_url("catalogo"); ?>" class="list-group-item list-group-item-action <?php echo ($categoria_id==0 and !isset($buscar))?"active":""; ?>">
                  <i class="bi bi-house-fill"></i> Inicio
                </a>
                <?php if(isset($buscar)){ ?>
                  <a href="#" class="list-group-item list-group-item-action active">
                    <i class="bi bi-search"></i> Busqueda
                  </a>
                <?php } ?>
               <?php foreach($categorias as $c){ ?>   
                  <a href="<?php echo site_url("catalogo/categoria/".$c["categoria_id"]); ?>" class="list-group-item list-group-item-action <?php echo ($categoria_id==$c["categoria_id"])?"active":""; ?>"><?php echo $c["icono"]; ?> <?php echo $c["nombre"]; ?></a>
               <?php } ?>
               </div>
           </div>
            <div class="col-10">
              
                <?php if($categoria_id>0){ ?>
                  <h1 class="display-3">
                    <?php echo $categoria_seleccionada["icono"];?> 
                    <?php echo $categoria_seleccionada["nombre"];?>
                  </h1>
                <?php }else{ ?>
                  <?php if(isset($buscar)){ ?>
                    <h1 class="display-3"><i class="bi bi-search"></i> Buscando: "<?php echo $buscar; ?>"</h1>
                  <?php }else{ ?>
                    <h1 class="display-3">Portada</h1>
                    <div class="col-md-6 offset-md-3">
                    <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="<?php echo base_url("img/1.png"); ?>" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="<?php echo base_url("img/2.png"); ?>" class="d-block w-100" alt="...">
                      </div>
                      
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
                    </div>
                    
                  <?php } ?>
                <?php } ?>
                <br>
                <?php if($productos){ ?>
                  <table class="table">
                      <tbody>
                        <?php foreach($productos as $p){ ?>
                            <tr>
                              <th scope="row" class="col-sm-2">

                                
                                <?php if(file_exists(FCPATH.DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR.$p["producto_id"].".png")){ ?>
                                  <img src="<?php echo base_url("img/".$p["producto_id"].".png"); ?>" class="img-fluid">
                                <?php }else{ ?>
                                  <img src="<?php echo base_url("img/sin-imagen.png"); ?>" class="img-fluid">
                                <?php } ?>
                              </th>
                              <td>
                                
                                  <?php echo str_pad($p["producto_id"],5,"0",STR_PAD_LEFT); ?> - 
                                <?php echo $p["nombre"]; ?>
                                <br>                                
                                
                                  <a href="#" class="btn btn-sm btn-outline-primary align-self-end">+ Info</a>                                
                              </td>
                              <td class="text-end col-sm-2">
                                <b>$<?php echo $p["costo"]; ?></b>
                              </td>
                              
                            </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                <?php }else{ ?>
                    <?php if(isset($buscar)){ ?>
                      <div class="alert alert-warning">
                      No hay productos que coincidan con la busqueda
                      </div>
                    <?php }else{ ?>
                      <div class="alert alert-info">
                          No hay productos en esta categoría
                      </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>