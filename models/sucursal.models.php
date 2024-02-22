<?php
//TODO: Requerimientos 
require_once('../config/conexion.php');
class Sucursales
{
    /*TODO: Procedimiento para sacar todos los registros*/
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `Sucursales`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    /*TODO: Procedimiento para sacar un registro*/
    public function uno($SucursalId)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `Sucursales` WHERE `SucursalId`=$SucursalId";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }
    /*TODO: Procedimiento para insertar */
    public function Insertar($Nombre, $Direccion, $Telefono, $Correo, $Parroquia, $Canton, $Provincia)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "INSERT INTO `Sucursales`(`Nombre`, `Direccion`, `Telefono`, `Correo`, `Parroquia`, `Canton`, `Provincia`) VALUES('$Nombre','$Direccion','$Telefono','$Correo','$Parroquia','$Canton','$Provincia')";

        if (mysqli_query($con, $cadena)) {
            $con->close();
            return "ok";
        } else {
            $error = mysqli_error($con);
            $con->close();
            return $error;
        }
    }
    /*TODO: Procedimiento para actualizar */
    public function Actualizar()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = ""; // No hay ninguna cadena de actualización definida
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return "ok";
        } else {
            $con->close();
            return 'error al actualizar el registro';
        }
    }
    /*TODO: Procedimiento para Eliminar */
    public function Eliminar($idAccesos)
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = ""; // No hay ninguna cadena de eliminación definida
        if (mysqli_query($con, $cadena)) {
            $con->close();
            return true;
        } else {
            $con->close();
            return false;
        }
    }
    
}

// Mostrar los registros de sucursales en una tabla HTML
$sucursal = new Sucursales();
$datos = $sucursal->todos();

echo "<table border='1'>
<tr>
<th>Nombre</th>
<th>Dirección</th>
<th>Teléfono</th>
<th>Correo</th>
<th>Parroquia</th>
<th>Cantón</th>
<th>Provincia</th>
</tr>";

while ($row = mysqli_fetch_assoc($datos)) {
    echo "<tr>";
    echo "<td>" . $row['Nombre'] . "</td>";
    echo "<td>" . $row['Direccion'] . "</td>";
    echo "<td>" . $row['Telefono'] . "</td>";
    echo "<td>" . $row['Correo'] . "</td>";
    echo "<td>" . $row['Parroquia'] . "</td>";
    echo "<td>" . $row['Canton'] . "</td>";
    echo "<td>" . $row['Provincia'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
