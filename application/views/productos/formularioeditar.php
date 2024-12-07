<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edicion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">  
  </head>
  <body>
    <div class="body">
    <?php $this->load->view("menu"); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <?php if($producto){ ?>
                <h1>Edición de Producto: <?php echo str_pad($producto["producto_id"],5,"0",STR_PAD_LEFT);?></h1>
                <?php
                  switch($this->session->flashdata("MSJ")) {
                    case "Actualizado":
                      ?>
                      <div class="alert alert-success">
                          Producto Actualizado!
                      </div>
                      <?php
                      break;
                  }
                ?>
                <?php echo validation_errors() ?>
                <div class="card bg-black p-2 text-dark bg-opacity-10">
                  <div class="card-body">
                  <form method="post" action="<?php echo site_url("productos/editar/".$producto["producto_id"]); ?>">
                  <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control bg-black p-2 text-dark bg-opacity-10" name="nombre" placeholder="Ingresa el nombre del producto" value="<?php echo set_value("nombre",$producto["nombre"]); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control bg-black p-2 text-dark bg-opacity-10" name="descripcion" rows="3"><?php echo set_value("descripcion",$producto["descripcion"]); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="categoria_id" class="form-label">Categoría</label>
                        <select class="form-select bg-black p-2 text-dark bg-opacity-10" name="categoria_id">
                            <option selected>Selecciona una categoría</option>
                            <?php foreach($categorias as $c){ ?>
                              <option value="<?php echo $c["categoria_id"]; ?>" <?php echo set_select("categoria_id",$c["categoria_id"],($c["categoria_id"]==$producto["categoria_id"])); ?>><?php echo $c["nombre"]; ?></option>
                            <?php } ?>
                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="stock_actual" class="form-label">Stock Actual</label>
                        <input type="number" class="form-control bg-black p-2 text-dark bg-opacity-10" name="stock_actual" value="<?php echo set_value("stock_actual",$producto["stock_actual"]); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="stock_min" class="form-label">Stock Mínimo</label>
                        <input type="number" class="form-control bg-black p-2 text-dark bg-opacity-10" name="stock_min" value="<?php echo set_value("stock_min",$producto["stock_min"]); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="costo" class="form-label">Costo</label>
                        <input type="number" class="form-control bg-black p-2 text-dark bg-opacity-10" name="costo" value="<?php echo set_value("costo",intval($producto["costo"])); ?>">
                    </div>
            
                    
                    
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
                  </div>
                </div>
                <?php }else{ ?>
                <br>
                <div class="alert alert-info">
                    Articulo no existe!
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>