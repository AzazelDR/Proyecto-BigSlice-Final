<?php
if ($database) {

	$consulta = "SELECT * From usuarios WHERE estado = 1";
	$resultado = mysqli_query($db,$consulta);


	if ($resultado) {
    $i=1;
    foreach ($resultado as $row ) {
      # code...
	    ?>
<tr data-id="<?php echo $row['Id'] ?>" class="text-center">
    <td><?php echo $i++?></td>
    <td><?php echo $row['Nombre'] ?></td>
    <td><?php echo $row['Apellido'] ?></td>
    <td><?php echo $row['dui'] ?></td>
    <td><?php echo $row['nit']?></td>
    <td><?php echo $row['edad'] ?></td>
    <td><?php echo $row['mail'] ?></td>
    <td><?php echo $row['pass'] ?></td>
    <td><?php echo $row['telf'] ?></td>
    <td><?php echo $row['direccion']?></td>
    <td><?php if($row['rol']==1){ $nRol = 'usuario'; echo $nRol;}else{$nRol = 'admin'; echo $nRol;}?></td>
    <td><?php echo $row['fecha_regist'] ?></td>
    <td class="col-1">
        <a href="EditUser.php?id=<?php echo $row['Id'] ?>"
            class="btn btn-outline-primary " role="button">
            <i class="bi bi-pencil-square"></i></a>
<div class="m-1"></div>
            <a class="btn btn-outline-danger "data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['Id'] ?>" role="button">
            <i class="bi bi-person-x"></i></a>
    </td>
</tr>

<?php
include("../admin/templates/Modaldeleteuser.php");
	    }
	}
}
?>