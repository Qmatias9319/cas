<?php
include("../../connections/conexion.php");
$id = intval($_POST["id"]);
$sql = "DELETE FROM tblModulo WHERE idModulo =" . $id . ";";
$query_delete = sqlsrv_query($con, $sql);
if ($query_delete) {
  echo 1;
} else {
  echo 2;
}
?>