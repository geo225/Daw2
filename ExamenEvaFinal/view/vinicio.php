<script type="text/javascript">
    $(document).ready(function() {
        $("#b_getJSON").click(function() {
            $.getJSON("webroot/json/frutas.json", function(data) {
                var res = "";
                $.each(data, function(key, val) {
                    res += "<b>Frutas (json): " + "<br></b>";
                    $.each(val, function(key2, val2) {
                        res += " <b>Naranja:</b> " + val2.naranja + " <b>Tiempo:</b> " + val2.tiempo + "<br>";
                    });
                });
                $("#d1").html(res);
            });
        });
        $("#b_reset").click(function() {
            location.reload();
        });
    });
    tamano = 4 * 1024 * 1024;
    var dbWeb = openDatabase('BBDDFrutas', '1.0', 'Mi primera Base de Datos', tamano);
    var db = null;
    var object = null;
    var leeNombre = "Ana";
    var leeApellido = "Juanja";
    var leeDNI = "71020439G";
    var leeMovil = "605735522";
    var crearTb = null;
    var creardb = null;

    function AbrirWebSQL() {
        if (dbWeb) {
            dbWeb.transaction(function(tx) {
                tx.executeSql("Create table if not exists frutas(idFruta integer Primary key autoincrement,naranja text,tiempo text)");
            });
        }
    }

    function insertarWebSQL() {

        $.getJSON("webroot/json/frutas.json", function(data) {
            var res = "";
            $.each(data, function(key, val) {
                $.each(val, function(key2, val2) {
                    dbWeb.transaction(function(tx) {
                        tx.executeSql("insert into frutas (naranja,tiempo) values (?,?)", [val2.naranja, val2.tiempo]);
                    });
                });
            });
            $("#d1").html(res);
        });
    }

    function borrarWebSQL() {
        dbWeb.transaction(function(tx) {
            tx.executeSql("delete from frutas where 1");
            tx.executeSql("update sqlite_sequence set seq= 0");
        });
    }

    function borrarTwebSQL() {
        dbWeb.transaction(function(tx) {
            tx.executeSql("drop table frutas");
        });
    }

    function buscarWebSQL(codigoBuscar) {
        dbWeb.transaction(function(tx) {
            tx.executeSql("select * from calculadora where idOp=?", [codigoBuscar], function(tx, vx) {
                console.log(vx);
            })
        });
    }

    function usoBBDDNavegador() {
        navegador()
        if (esSQLWeb && esIndexeDBD) {
            AbrirWebSQLSQL();
            abrirIndexedDB();
        } else if (esSQLWeb) {
            AbrirWebSQL();
        } else if (esIndexeDBD) {
            abrirIndexedDB();
        } else {
            alert("Error");
        }
    }

    function abrirIndexedDB() {
        indexedDB = window.indexedDB || window.mozIndexedDB || window.webKitIndexedDB || window.msIndexedDB;
        window.IDBTransaction = window.IDBTransaction || window.webkitIDBTransaction || window.msIDBTransaction;
        window.IDBKeyRange = window.IDBKeyRange || window.webkitIDBKeyRange || window.msIDBKeyRange;
        if (indexedDB) {
            console.log("Se abre la BBDD");
        } else {
            console.log("Error de apertura BBDD");
            return;
        }
        db = indexedDB.open("FrutasDDBB", 2);
        db.onupgradeneeded = function(e) {
            console.log("Abriendo para Actualizar BDD : onupgradeneeded" + db.result + "  " + e.target.result);
            crearTb = db.result;
            object = crearTb.createObjectStore('frutas', {
                KeyPath: 'id',
                autoIncrement: true
            });
            object.createIndex('miclave', 'id', {
                unique: true
            });
            //  agregarObjeto();
        }
        db.onsucces = function(e) {
            db = e.target.result;
            console.log("Se ha creado la base de datos");
        }
        db.onerror = function(e) {
            console.log("Se ha producido un error en la apertura/Creacion " + e);
        }
    }

    function agregarObjeto() {
        // definimos los campos para operar
        $.getJSON("webroot/json/frutas.json", function(data) {
            var res = "";
            $.each(data, function(key, val) {
                $.each(val, function(key2, val2) {
                    console.log(object);
                    creardb = db.result;
                    var data = creardb.transaction(['frutas'], "readwrite");
                    var object = data.objectStore("frutas");
                    object.oncomplete = function(event) {
                        console.log('se completo la transaccion');
                    }
                        var request = object.add({
                            naranja: val2.naranja,
                            tiempo: val2.tiempo,
                        });
                        request.onerror = function(e) {
                            console.log("Se ha producido un error al agregar");
                        }
                        request.onsuccess = function(e) {
                            console.log("Agrego con exito");
                        }
                });
            });
            $("#d1").html(res);
        });
    }
</script>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8" style="margin:auto">
        <table class="table" style="color:#44d62c;">
            <tr>
                <td><input class="btn btn-outline-success my-2 my-sm-0" type="button" value="getJSON" id="b_getJSON" class="cb" /></td>
                <td><input class="btn btn-outline-success my-2 my-sm-0" type="button" value="Reset" id="b_reset" class="cbr" /></td>
            </tr>
            <tr>
                <td colspan=2>
                    <div id="d1">Aqui se incorpora el texto</div>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
        <button class="btn btn-outline-success my-2 my-sm-0" onclick="AbrirWebSQL()">Crear Tabla</button>
        <button class="btn btn-outline-success my-2 my-sm-0" onclick="insertarWebSQL()">Insertar datos</button>
        <button class="btn btn-outline-success my-2 my-sm-0" onclick="borrarWebSQL()">Borrar datos tabla</button>
        <button class="btn btn-outline-success my-2 my-sm-0" onclick="borrarTwebSQL()">Borrar Tabla</button>
        <button class="btn btn-outline-success my-2 my-sm-0" onclick="abrirIndexedDB()">Iniciar IndexedDB</button>
        <button class="btn btn-outline-success my-2 my-sm-0" onclick="agregarObjeto()">Agregar IndexedDB</button>
    </div>
</div>
<script>
    document.cookie = "username=<?php echo $_SESSION['usuario']->getCodUsuario(); ?>";
    sessionStorage.setItem('examenFinal', 'aprobado');
    var esIndexedDB = false;
    var esWebSQL = false;

    function navegador() {
        var agente = window.navigator.userAgent;
        var navegadores = ["Chrome", "Firefox", "Safari", "Opera", "Trident", "MSIE", "Edge"];

        for (var i in navegadores) {
            if (agente.indexOf(navegadores[i]) != -1) {
                switch (i) {
                    case "0":
                        esIndexedDB = true;
                        esWebSQL = true;
                        break;
                    case "1":
                        esIndexedDB = true;
                        esWebSQL = false;
                        break;
                    case "4":
                    case "7":
                        esIndexedDB = false;
                        esWebSQL = true;
                        break;
                }
                return navegadores[i];
            }
        }

    }
    window.onload = function() {
        console.log("El navegador es: " + navegador() + " esIndexedDB: " + esIndexedDB + " esWebSQL: " + esWebSQL);
    }

</script>
