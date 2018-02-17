<div class="container-fluid">
    <div class="row" style="padding:30px;">
        <h1 class="text-center r-verde col-12"> Carrito</h1>
        <?php
        if (count($_SESSION['carrito']->getProductos())!=0){
        for ($i=0;$i<count($_SESSION['carrito']->getProductos());$i++){
            $productos=Producto::obtenerProductoCod($_SESSION['carrito']->getProductos()[$i]['codProducto']);
             $imagenes=$productos->getImagen();
            $imagenes=explode(",",$imagenes);
            ?>
            <div class="row col-12">
                <div class="col-3 d-flex align-items-center">
                    <img src="<?php echo $imagenes[0]; ?>" alt="Diagrama de Ficharos" style="width:150px; height:100px; margin-right: 20px;">
                </div>
                <div class="col-6 d-flex align-items-center r-verde">
                    <span style="color:white;margin-right:3px;">Marca: </span>
                    <?php echo $productos->getMarca(); ?><span style="color:white;;margin-right:3px; margin-left: 20px;">Nombre: </span><strong><?php echo $productos->getNombre(); ?> </strong> <span style="color:white;;margin-right:3px; margin-left: 20px;">Precio: </span><span class="atm"><?php echo $productos->getPrecio(); ?></span>€
                </div>
                <div class="col-3 d-flex align-items-center r-verde">
                    <label for="cantidad<?php echo $i; ?>" style="color:#44d62c;margin-right: 10px;">Cantidad: </label>
                    <input class="form-control amt" type="number" name="cantidad<?php echo $i; ?>" id="cantidad<?php echo $i; ?>" value="1" min="1">
                    <form action="<?PHP echo " index.php?pagina=carrito " ?>" method="post" style="margin-left:4px;">
                        <button name="borrarProducto" type="submit" class="btn btn-outline-success my-2 my-sm-0" value="<?php echo $i; ?>">Quitar</button>
                    </form>
                </div>
            </div>
            <?php
        }
    ?>
                <div class="r-verde">
                    <strong style="color:white;">Total: </strong><input type="text" id="total" value=0 readonly/>
                </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var importe_total = 0
         <?php for ($i=0;$i<count($_SESSION['carrito']->getProductos());$i++){
        $productos=Producto::obtenerProductoCod($_SESSION['carrito']->getProductos()[$i]['codProducto']);
        ?>
        precio=<?php echo $productos->getPrecio(); ?>;
        cantidad=document.getElementById("cantidad<?php echo $i; ?>").value;
        importe_total+=precio*cantidad;
        <?php } ?>
        console.log(importe_total);
        document.getElementById("total").value = importe_total+"€";
    });
    $('.amt').change(function() {
        var importe_total = 0
         <?php for ($i=0;$i<count($_SESSION['carrito']->getProductos());$i++){
        $productos=Producto::obtenerProductoCod($_SESSION['carrito']->getProductos()[$i]['codProducto']);
        ?>
        precio=<?php echo $productos->getPrecio(); ?>;
        cantidad=document.getElementById("cantidad<?php echo $i; ?>").value;
        importe_total+=precio*cantidad;
        <?php } ?>
        console.log(importe_total);
        document.getElementById("total").value = importe_total+"€";
    });

</script>
<?php }else{ ?>
    <div class="row col-12">
        <p class="r-verde"> No tienes Productos</p>
    </div>
<?php } ?>    