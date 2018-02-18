<?php
if(isset($productos)){
    for ($i=0;$i<count($productos);$i++){
        $imagenes=$productos[$i]->getImagen();
        $imagenes=explode(",",$imagenes);
        ?>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8" style="margin:auto">
            <h1><span style="color:#44d62c"><?php echo $productos[$i]->getMarca(); ?> </span><strong style="color: white"><?php echo $productos[$i]->getNombre(); ?> </strong> </h1>
            <img class="d-block img-fluid" src="<?php echo $imagenes[0]; ?>" alt="Diagrama de Ficharos">
            <p style="color:#44d62c"><span style="color:white">Precio: </span>
                <?php echo $productos[$i]->getPrecio(); ?>€</p>
            <a href="index.php?pagina=producto&Producto=<?php echo $productos[$i]->getCodProducto(); ?>" class="btn btn-outline-success my-2 my-sm-0" role="button" style="color:#44d62c;margin:auto;">Ver mas</a>
        </div>
</div>
        <?php }
}else{
    ?>
    <div class="row">
       <h1 class="col-12" style="color: white;">Lo Sentimos </h1>
        <p class="r-verde col-12">No se han encontrado Productos</p>
    </div>
    <?php
}
?>
