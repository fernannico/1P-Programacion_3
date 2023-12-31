<?php
/*1-
A- index.php: Recibe todas las peticiones que realiza el cliente (utilizaremos Postman), y administra a qué archivo se debe incluir.    */


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accion'])) {
        switch ($_POST['accion']) {
            case 'CuentaAlta':
                # code 1
                include_once "CuentaAlta.php";
                break;
            case 'ConsultarCuenta':
                # code 2
                include_once "ConsultarCuenta.php";
                break;
            case 'DepositoCuenta':
                # code 3
                include_once "DepositoCuenta.php";
                break;
            case 'RetiroCuenta':
                # code 6
                include_once "RetiroCuenta.php";
                break;
            case 'AjusteCuenta':
                # code 7
                include_once "AjusteCuenta.php";
                break;
            default:
                echo "la accion no se encuentra entre las opciones. Indicar:<br>
                <br>CuentaAlta<br>ConsultarCuenta<br>DepositoCuenta<br>RetiroCuenta<br>AjusteCuenta";
                break;
        }
    }else {
        echo 'Falta el parametro accion';
    }
}else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['consultarDepositos'])) {
        # code 4
        include_once "ConsultaMovimientos.php";        

        switch ($_GET['consultarDepositos']) {
            case 'totalDepositado':
                ConsultarTotalDepositado();
                break;
            case 'porUsuario':
                consultarDepositosPorUsuario();
                break;
            case 'entreFechas':
                consultarDepositosEntreFechas();
                break;
            case 'tipoDeCuenta':
                consultarDepositosPorTipoCuenta();
                break;
            case 'moneda':
                consultarDepositosPorMoneda();
                break;
            case 'operacionesUsuario':
                consultarOperacionesPorUsuario();
                break;
            default:
            echo "la accion no se encuentra entre las opciones. Indicar si la consulta de deposito es:<br>
            <br>totalDepositado<br>porUsuario<br>entreFechas<br>tipoDeCuenta<br>moneda<br>operacionesUsuario";
            break;    
        }
    }elseif (isset($_GET['consultarRetiros'])) {
        # code 10
        include_once "ConsultaMovimientos.php";        

        switch ($_GET['consultarRetiros']) {
            case 'totalRetirado':
                ConsultarTotalRetirado();
                break;
            case 'porUsuario':
                consultarRetirosPorUsuario();
                break;
            case 'entreFechas':
                consultarRetirosEntreFechas();
                break;
            case 'tipoDeCuenta':
                consultarRetirosPorTipoCuenta();
                break;
            case 'moneda':
                consultarRetirosPorMoneda();
                break;
            case 'operacionesUsuario':
                consultarOperacionesPorUsuario();
                break;    
            default:
            echo "la accion no se encuentra entre las opciones. Indicar si la consulta de Retiro es:<br>
            <br>totalRetirado<br>porUsuario<br>entreFechas<br>tipoDeCuenta<br>moneda<br>operacionesUsuario";
            break;    
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {

    if (isset($_GET['accion'])) {
        switch ($_GET['accion']) {
            case 'modificarCuenta':
                # code 5
                include_once "ModificarCuenta.php";       
                break;
            default:
                echo "accion no definida. Indicar si la accion es:<br>
                <br>modificarCuenta<br>";
            break;
        }
    } 
} else if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
    if (isset($_GET['accion'])) {
        switch ($_GET['accion']) {
            case 'BorrarCuenta':
                # code 5
                include_once "BorrarCuenta.php";       
                break;
            default:
                echo "accion no definida. Indicar si la accion es:<br>
                <br>BorrarCuenta<br>";
            break;
        }
    } 
}else{
    echo 'Falta el parametro accion';
}
?>