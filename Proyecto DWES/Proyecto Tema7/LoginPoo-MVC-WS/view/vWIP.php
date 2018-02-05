<div class="w3-container" id="contact" style="margin-top:75px;">
    <h1 class="w3-xxlarge"><b>Lo Sentimos</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <p>
        Pagina en Contruccion
    </p>
    <form id="formulario" name="FormularioVolver" action="<?PHP if (isset($_GET['ant'])){ echo "index.php?pagina=WIP&ant=".$_GET['ant'];}else {echo "index.php?pagina=WIP";} ?>" method="post">
        <button name="Volver" type="submit" class="w3-button w3-red w3-margin-bottom w3-left " value="volver">Volver</button>
    </form>
</div>
