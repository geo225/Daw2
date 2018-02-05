<div class="w3-container w3-light-grey" id="contact" style="margin-top:25px;width:90%">
    <h1 class="w3-xxlarge w3-text-red"><b>WS Soap</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
     <h2 class="w3-xlarge"><b>Soap Ajeno</b></h2>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <br/><br/><br/><br/><br/><br/><br/></div>
    
    <form class="form-horizontal w3-half w3-center w3-dark-grey w3-padding-16 w3-margin-bottom" id="SoapIP" name="FormularioSoapIP" action="<?PHP if (isset($_GET['ant'])){ echo "index.php?pagina=soap&ant=".$_GET['ant'];}else {echo "index.php?pagina=soap";} ?>" method="post"> 
    <p> Introduce una Ip para saber su localización</p>
        <hr class="w3-round">
    <div class="form-group">
            <label for="ip" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label w3-left">IP</label>
             <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
             <input class="w3-input w3-border form-control" type="text" name="ip" id="usuario" placeholder="80.24.201.183" > 
        </div>
        </div> 
        <div class="form-group">
            <div class="col-xs-5 col-sm-6 col-md-7 col-lg-8"></div>
    <button name="EnviarIP" type="submit" class="w3-button w3-red w3-margin-bottom" value="ip">Localizar</button>
        </div>
    </form>
    <?php if (!empty($datos)) { 
            echo "<table class='table table-bordered w3-margin-top'>"; 
            echo "<thead class='thead-inverse'>"; 
            echo "<tr>"; 
            echo "<th class='w3-red'>IP</th>"; 
            echo "<th class='w3-dark-grey'>Pais</th>"; 
            echo "<th class='w3-red'>Codigo Pais</th>"; 
            echo "</tr>"; 
            echo "</thead>"; 
            echo "<tr>"; 
            echo "<td>"; 
            echo $datos->GetGeoIPResult->IP; 
            echo "</td>"; 
            echo "<td>"; 
            echo $datos->GetGeoIPResult->CountryName; 
            echo "</td>"; 
            echo "<td>"; 
            echo $datos->GetGeoIPResult->CountryCode; 
            echo "</td>"; 
            echo "</tr>"; 
            echo "</table>"; 
        } 
        ?> 
    <form class="w3-bar" id="formulario" name="FormularioVolver" action="<?PHP if (isset($_GET['ant'])){ echo "index.php?pagina=soap&ant=".$_GET['ant'];}else {echo "index.php?pagina=soap";} ?>" method="post">
        <button name="Volver" type="submit" class="w3-button w3-red w3-margin-bottom w3-left " value="volver">Volver</button>
    </form>
</div>
