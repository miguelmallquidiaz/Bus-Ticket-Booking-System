<?php
include_once 'Conexion.php';
class Negocio
{

    //    ################ VISTA RUTA ################   

    //PAG_01 LISTADO DE RUTAS

    //    ========= PAG01 LISTADO DE RUTA =========
    
    //    ========= AGREGAR RUTA =========
    function AgregarRuta($codRuta, $nomRuta, $pagoChofer)
    {
        $obj = new conexion();
        $sql = "insert into ruta values('$codRuta','$nomRuta',$pagoChofer)";
        $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
    }



    //    =============== ELIMINAR RUTA ===============
    function anulaRuta($code)
    {
        $obj = new Conexion();
        $sql = "delete from ruta where RUTCOD='$code'";
        $resp = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        if ($resp) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    //    ========= CONSULTAR RUTA POR CÓDIGO =========
    function ConsultarRuta($cod)
    {
        $obj = new conexion();
        $sql = "SELECT SELECT r.ro_id, r.ro_name, r.ro_cost 
        FROM routes r
        WHERE r.ro_id='$cod'";
        $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        //leer filaxfila y colocarlo en un vector
        $vec = array();
        if ($f = mysqli_fetch_array($res)) {
            $vec[] = $f;
        }
        return $vec;
    }

    //    =============== EDITAR RUTA ===============
    function cambiaRuta($code, $codRuta, $nomRuta, $pagoChofer)
    {
        $obj = new Conexion();
        $sql = "update ruta set RUTCOD='$codRuta',RUTNOM='$nomRuta',pago_cho=$pagoChofer where RUTCOD='$code'";
        $resp = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        if ($resp) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    //PAG_02 LISTADO DE VIAJES

    //    ========= PAG02 LISTADO DE VIAJES =========
    

    //PAG_03 LISTADO DE PASAJEROS

    //    ========= PAG03 LISTADO DE PASAJEROS =========
    

    //    =============== ELIMINAR PASAJERO ===============
    function anula($code)
    {
        $obj = new Conexion();
        $sql = "delete from pasajeros where BOLNRO=$code";
        $resp = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        if ($resp) {
            echo "ok";
        } else {
            echo "error";
        }
    }


    //PAG_04 ADICONAR PASAJERO

    //    =============== LISTA DE NRO DE ASIENTO ===============
    
    //    =============== ADICIONAR PASAJERO ===============
    



    //PAG_05 EDITAR PASAJERO

    //    =============== EDITAR PASAJERO ===============
    function cambia($code, $bolnro, $nroV, $nom, $asiento, $tip, $pag)
    {
        $obj = new Conexion();
        $sql = "update pasajeros set BOLNRO='$bolnro',VIANRO='$nroV',Nom_pas='$nom',Nro_asi=$asiento, 
        tipo='$tip',pago=$pag where BOLNRO='$code'";
        $resp = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        if ($resp) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    //    =============== Consulta el código de boleto del pasajero ===============
    


    //    ################ VISTA VIAJES ################

    //    ========= LISTADO TOTAL DE VIAJES =========    
    function listadoViajes()
    {
        $obj = new conexion();
        $sql = "SELECT VIANRO,BUSNRO,r.RUTNOM,c.CHONOM,VIAHRS,VIAFCH,COSVIA 
        FROM viaje v JOIN ruta r ON v.RUTCOD=r.RUTCOD
        JOIN chofer c ON v.IDCOD=c.IDCOD";
        $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        //leer filaxfila y colocarlo en un vector
        $vec = array();
        while ($f = mysqli_fetch_array($res)) {
            $vec[] = $f;
        }
        return $vec;
    }

    //    ################ VISTA GRÁFICOS ################   

    //PAG01 GRÁFICO 1

    //    =============== LISTA DE RUTA PARA EL GRAFICO 1 ===============
    function ListRuta()
    {
        //conexion
        $obj = new Conexion();
        //consulta en el sql
        $sql = "SELECT RUTCOD,RUTNOM FROM ruta";
        $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        //leer filaxfila y colocarlo en un vector
        $vec = array();
        while ($f = mysqli_fetch_array($res)) {
            $vec[] = $f;
        }
        return $vec;
    }

    //    =============== LISTA DE RUTA PARA EL GRAFICO 1 POR CÓDIGO ===============
    function ListCodRuta($cod)
    {
        //conexion
        $obj = new Conexion();
        //consulta en el sql
        $sql = "call SP_GRAFICO1_RUTA('$cod')";
        $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        //leer filaxfila y colocarlo en un vector
        $vec = array();
        while ($f = mysqli_fetch_array($res)) {
            $vec[] = $f;
        }
        return $vec;
    }

    //PAG02 GRÁFICO 2

    //    =============== LISTA DE RUTA PARA EL GRAFICO 2 POR CÓDIGO ===============
    function ListCodChofer($cod)
    {
        //conexion
        $obj = new Conexion();
        //consulta en el sql
        $sql = "call SP_GRAFICO2_CHOFER('$cod')";
        $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        //leer filaxfila y colocarlo en un vector
        $vec = array();
        while ($f = mysqli_fetch_array($res)) {
            $vec[] = $f;
        }
        return $vec;
    }

    //    ################ VISTA CHOFER ################   

    //PAG01 LISTADO CHOFER

    //    ========= LISTADO TOTAL DE CHOFERES =========    
    function listadoChofer()
    {
        $obj = new conexion();
        $sql = "SELECT IDCOD,CHONOM,CHOFIN,CHOCAT,CHOSBA FROM chofer";
        $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        //leer filaxfila y colocarlo en un vector
        $vec = array();
        while ($f = mysqli_fetch_array($res)) {
            $vec[] = $f;
        }
        return $vec;
    }
    //    ========= LISTADO DE VIAJE POR CÓDIGO DE CHOFER =========    
    function listadoChoferViaje($cod)
    {
        $obj = new conexion();
        $sql = "SELECT v.VIANRO,r.RUTNOM,v.VIAFCH,v.COSVIA 
        FROM viaje v JOIN ruta r ON v.RUTCOD=r.RUTCOD
        WHERE IDCOD='$cod'";
        $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        //leer filaxfila y colocarlo en un vector
        $vec = array();
        while ($f = mysqli_fetch_array($res)) {
            $vec[] = $f;
        }
        return $vec;
    }

    //    =============== ADICIONAR CHOFER ===============
    function AdicionChofer($nom, $fec, $cat, $pago)
    {
        $obj = new Conexion();
        $sql = "call SP_ADI_CHOFER('$nom','$fec','$cat',$pago)";
        mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
    }

    //    =============== ELIMINAR CHOFER ===============
    function anulaChofer($code)
    {
        $obj = new Conexion();
        $sql = "delete from chofer where IDCOD='$code'";
        $resp = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        if ($resp) {
            echo "ok";
        } else {
            echo "error";
        }
    }
    //    =============== Consulta el código de Chofer ===============
    function consultaChof($code)
    {
        $obj = new Conexion();
        $sql = "select IDCOD,CHONOM,CHOFIN,CHOCAT,CHOSBA from chofer where IDCOD='$code'";
        $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        //leer fila * fila y colocarlo en un vector(arraylist)
        $vec = array();
        //ya no es un vector por que voy a hacer una consulta
        if ($f = mysqli_fetch_array($res)) {
            $vec = $f;
        }
        return $vec;
    }

    //    =============== EDITAR CHOFER ===============
    function cambiaChof($code, $cod, $chonom, $chofin, $chocat, $chosvia)
    {
        $obj = new Conexion();
        $sql = "update chofer set IDCOD='$cod',CHONOM='$chonom',CHOFIN='$chofin',CHOCAT='$chocat', 
        CHOSBA=$chosvia where IDCOD='$code'";
        $resp = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        if ($resp) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    function consultarNombreUsuario($email)
    {
        $obj = new Conexion();
        $sql = "SELECT u.usr_name FROM users as u WHERE u.usr_email = '$email'";
        $resp = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        if ($resp) {
            $fila = mysqli_fetch_assoc($resp); // Obtener fila como array asociativo
            $nombreCompleto = $fila["usr_name"]; // Acceder al valor del campo "NOMBRE"
            return $nombreCompleto; // Retornar el nombre completo
        } else {
            echo "error";
        }
    }

    function listadoRuta()
    {
        $obj = new conexion();
        $sql = "SELECT r.ro_id, r.ro_name, r.ro_cost FROM routes r";
        $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        //leer filaxfila y colocarlo en un vector
        $vec = array();
        while ($f = mysqli_fetch_array($res)) {
            $vec[] = $f;
        }
        return $vec;
    }

    function listadoViaje($cod)
    {
        $obj = new conexion();
        $sql = "SELECT t.trip_id, t.trip_date, t.trip_time, r.ro_cost
        FROM trips t inner join routes r ON (t.route_id = r.ro_id)
        WHERE t.route_id = '$cod' AND t.trip_date >= CURDATE()";
        $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        //leer filaxfila y colocarlo en un vector
        $vec = array();
        while ($f = mysqli_fetch_array($res)) {
            $vec[] = $f;
        }
        return $vec;
    }

    function listadoPasajero($cod)
    {
        $obj = new conexion();
        $sql = "SELECT p.pa_id, p.pa_name, p.pa_seat, p.pa_cost 
        FROM passengers p 
        WHERE p.trip_id = '$cod'";
        $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        //leer filaxfila y colocarlo en un vector
        $vec = array();
        while ($f = mysqli_fetch_array($res)) {
            $vec[] = $f;
        }
        return $vec;
    }

    function listNroAsiento($cod)
    {
        //conexion
        $obj = new Conexion();
        //consulta en el sql
        $sql = "SELECT p.pa_seat, p.trip_id
        FROM passengers p
        WHERE p.trip_id = '$cod'";
        $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        //leer filaxfila y colocarlo en un vector
        $vec = array();
        while ($f = mysqli_fetch_array($res)) {
            $vec[] = $f;
        }
        return $vec;
    }

    function consultaPasaj($code)
    {
        $obj = new Conexion();
        $sql = "select pa_name, pa_flastname, pa_mlastname, pa_dni, pa_phone, pa_email, pa_seat, pa_type, pa_cost, trip_id from passengers where pa_id='$code'";
        $res = mysqli_query($obj->conecta(), $sql) or die(mysqli_error($obj->conecta()));
        $vec = array();
        if ($f = mysqli_fetch_array($res)) {
            $vec = $f;
        }
        return $vec;
    }

}