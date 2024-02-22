<?php
/*TODO: Requerimientos */
require_once("../config/cors.php");
require_once("../models/sucursal.models.php");
error_reporting(0);

$Sucursal = new Sucursales;
switch ($_GET["op"]) {
    /*TODO: Procedimiento para listar todos los registros */
    case 'todos':
        $datos = array();
        $datos = $Sucursal->todos();
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    /*TODO: Procedimiento para insertar un registro */
    case 'insertar':
        $Nombre = $_POST["Nombre"];
        $Direccion = $_POST["Direccion"];
        $Ciudad = $_POST["Ciudad"];
        $insertado = $Sucursal->Insertar($Nombre, $Direccion, $Ciudad);
        if ($insertado) {
            echo json_encode(array("mensaje" => "Sucursal insertada correctamente."));
        } else {
            echo json_encode(array("error" => "Error al insertar la sucursal."));
        }
        break;
    /*TODO: Procedimiento para sacar un registro */
    case 'uno':
        $idSucursal = $_POST["idSucursal"];
        $datos = array();
        $datos = $Sucursal->uno($idSucursal);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
    /*TODO: Procedimiento para actualizar un registro
    case 'actualizar':
        $idSucursal = $_POST["idSucursal"];
        $Nombre = $_POST["Nombre"];
        $Direccion = $_POST["Direccion"];
        $Ciudad = $_POST["Ciudad"];
        $actualizado = $Sucursal->Actualizar($idSucursal, $Nombre, $Direccion, $Ciudad);
        if ($actualizado) {
            echo json_encode(array("mensaje" => "Sucursal actualizada correctamente."));
        } else {
            echo json_encode(array("error" => "Error al actualizar la sucursal."));
        }
        break;
    */
    /*TODO: Procedimiento para eliminar un registro
    case 'eliminar':
        $idSucursal = $_POST["idSucursal"];
        $eliminado = $Sucursal->Eliminar($idSucursal);
        if ($eliminado) {
            echo json_encode(array("mensaje" => "Sucursal eliminada correctamente."));
        } else {
            echo json_encode(array("error" => "Error al eliminar la sucursal."));
        }
        break;
    */
}
?>
