<div class="w3-container w3-light-grey" id="contact" style="margin-top:25px;width:90;">
    <h1 class="w3-xxlarge w3-text-red"><b>WS Rest</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <h2 class="w3-xlarge"><b>Rest Ajeno</b></h2>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <br/><br/><br/></div>
    <form class="form-horizontal w3-half w3-center w3-dark-grey w3-padding-16 w3-margin-bottom" id="RestAltura" name="FormularioRest" action="<?PHP if (isset($_GET['ant'])){ echo "index.php?pagina=rest&ant=".$_GET['ant'];}else {echo "index.php?pagina=rest";} ?>" method="post">
      <p> Introduce latitud y longitud para saber la altura</p>
        <hr class="w3-round">
    <div class="form-group">
            <label for="latitud" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label w3-left">Latitud</label>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
                <input class="w3-input w3-border form-control" type="text" name="latitud" id="latitud" placeholder="-180 a 180" >
            </div>
        </div>
        <div class="form-group">
        <label for="longitud" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label w3-left">Longitud</label>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
                <input class="w3-input w3-border form-control" type="text" name="longitud" id="longitud" placeholder="-180 a 180" >
            </div>
            
        </div> 
        <div class="form-group">
            <div class="col-xs-5 col-sm-6 col-md-7 col-lg-8"></div>
    <button name="altura" type="submit" class="w3-button w3-red w3-margin-bottom" value="altura">Calcular</button>
            
        </div>
    </form>
    <?php if (!empty($datos)) { 
            echo "<table class='table table-bordered w3-margin-top' >"; 
            echo "<thead class='thead-inverse'>"; 
            echo "<tr>"; 
            echo "<th class='w3-red'>Latitud</th>"; 
            echo "<th class='w3-dark-grey'>Longitud</th>"; 
            echo "<th class='w3-red'>Altura</th>"; 
            echo "</tr>"; 
            echo "</thead>"; 
            echo "<tr>"; 
            echo "<td>"; 
            echo $latitud; 
            echo "</td>"; 
            echo "<td>"; 
            echo $longitud; 
            echo "</td>"; 
            echo "<td>"; 
            echo $datos->results[0]->elevation; 
            echo "</td>"; 
            echo "</tr>"; 
            echo "</table>"; 
        } 
        ?>
    <form class="w3-bar" id="formulario" name="FormularioVolver" action="<?PHP if (isset($_GET['ant'])){ echo "index.php?pagina=rest&ant=".$_GET['ant'];}else {echo "index.php?pagina=rest";} ?>" method="post">
        <button name="Volver" type="submit" class="w3-button w3-red w3-margin-bottom w3-left " value="volver">Volver</button>
    </form>
</div>
