<?php
        $i=0;
        $imagenes=$producto->getImagen();
        $caracteristicas=$producto->getCaracteristicas();
        $imagenes=explode(",",$imagenes);
        $caracteristicas=explode(",",$caracteristicas);
        ?>
    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <div class="container-fluid">
                <div id="myCarousel<?php echo $i;?>" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php for($x=0;$x<count($imagenes);$x++){
                if ($x==0){
                ?>
                        <li data-target="#myCarousel<?php echo $i;?>" data-slide-to="0" class="active"></li>
                        <?php     
                }else{
                ?>
                        <li data-target="#myCarousel<?php echo $i;?>" data-slide-to=<?php echo $x; ?>></li>
                        <?php }
        } ?>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <?php for($y=0;$y<count($imagenes);$y++){
           if ($y==0){?>
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="<?php echo $imagenes[$y]; ?>" alt="Diagrama de Ficharos" style="width:100%; height:auto;">

                        </div>
                        <?php
                     }else{
                    ?>
                            <div class="carousel-item">
                                <img src="<?php echo $imagenes[$y]; ?>" alt="Diagrama de Clases" style="width:100%;height:auto;">
                            </div>
                            <?php }
        }?>
                    </div>
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#myCarousel<?php echo $i;?>" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
                    <a class="carousel-control-next" href="#myCarousel<?php echo $i;?>" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-6">
            <h1><span style="color:#44d62c"><?php echo $producto->getMarca(); ?></span><strong style="color: white"><?php echo $producto->getNombre(); ?> </strong> </h1>
            <p style="color:#44d62c"><span style="color:white">Familia:</span>
                <?php echo $producto->getFamilia(); ?>
            </p>
            <table class="table" style="border: transparent solid;">
                <tr style="border: transparent solid;">
                    <th><button id="Carac" class="btn btn-outline-success my-2 my-sm-0">Caracteristicas</button></th>
                    <th><button id="Desc" class="btn btn-outline-success my-2 my-sm-0">Descripcion</button></th>
                </tr>
                <tr>
                    <td colspan="2" style="color:#44d62c;text-align: left">
                        <ul id="TCarac" style="margin-left: 40px">
                            <?php for($z=0;$z<count($caracteristicas);$z++){ 
                        echo "<li>".$caracteristicas[$z]."</li>";
        }?>
                        </ul>
                        <ul id="Tdesc" class="list-unstyled" style="margin-left: 40px">
                            <li>
                                <?php echo $producto->getDescProducto(); ?>
                            </li>
                        </ul>
                    </td>
                </tr>
            </table>
            <p style="color:#44d62c"><span style="color:white">Precio: </span>
                <?php echo $producto->getPrecio(); ?>€</p>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="margin:auto;">Comprar</button>
        </div>
    </div>
<script>
        $(document).ready(function() {
            $("#TCarac").show();
            $("#Tdesc").hide();
            $("#Carac").click(function() {
                $("#TCarac").show();
            $("#Tdesc").hide();
            });
            $("#Desc").click(function() {
                $("#TCarac").hide();
            $("#Tdesc").show();
            });
        });

    </script>