<div class="container-fluid w3-light-grey">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
        <h1 class="w3-xxxlarge w3-text-red "><b>Departamentos</b></h1>
        <hr style="width:50px;border:5px solid red" class="w3-round ">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 w3-right">
        <form class="form-horizontal w3-dark-grey w3-margin-bottom w3-padding-16" id="Buscador" name="FormularioBuscador" action="index.php?pagina=departamento" method="post"> 
    <div class="form-group">
            <label for="desc" class="col-xs-3 col-sm-3 col-md-3 col-lg-3 control-label w3-left">Descripcion</label>
             <div class="col-xs-5 col-sm-5 col-md-5 col-lg-6">
             <input class="w3-input w3-border form-control" type="text" name="desc" id="desc" placeholder="Descripcion de un departamento" > 
            </div>
        <div class="col-xs-4 col-sm-2 col-md-2 col-lg-3">
         <button name="Buscar" type="submit" class="w3-button w3-red w3-margin-bottom" value="Buscar">Buscar</button>
        </div>
        </div> 
    </form>
        </div>
    <div class="table-responsive w3-bar">
        <table class="table ">
             <thead>
                 <tr>
                    <th class="w3-red">Codigo</th>
                    <th class="w3-dark-grey">Descripcion</th>
                    <th class="w3-red">Alta</th>
                    <th class="w3-dark-grey">Capacidad</th>
                    <th class="w3-red">Creador</th>
                    <th class="w3-dark-grey">Editar/Borrar</th>
                 </tr>                 
             </thead>
             <tbody>
                 <?php
                    for ($i=0;$i<count($departamentos);$i++){
                    echo "<tr>";
                        echo "<td>". $departamentos[$i]->getCodDepartamento() ."</td>";
                        echo "<td>". $departamentos[$i]->getDescDepartamento() ."</td>";
                        echo "<td>". $departamentos[$i]->getAltaDepartamento() ."</td>";
                        echo "<td>". $departamentos[$i]->getCapacidad() ."</td>";
                        echo "<td>". $departamentos[$i]->getCreador() ."</td>";
                        echo '<td><a href="index.php?Departamento='.$departamentos[$i]->getCodDepartamento().'&pagina=editardepartamento"><img src="/DAW204/public_html/Images/015-lapiz.png"/>editar</a>/
                        <a href="index.php?Departamento='.$departamentos[$i]->getCodDepartamento().'&pagina=borrardepartamento"><img src="/DAW204/public_html/Images/014-cubo-de-basura.png"/>borrar</a>
                        </td>';
                    echo "</tr>";        
                    }     
                 ?>
             </tbody>   
        </table>   
    </div>
</div>
