<?php
if ($database) {

	$consulta = "SELECT * From producto";
	$resultado = mysqli_query($db,$consulta);


	if ($resultado) {
    $i=1;
    foreach ($resultado as $row ) {
      # code...
	    ?>
<tr data-id="<?php echo $row['Id'] ?>" class="text-center">
    <td class=" col-1"><?php echo $i++?></td>
    <td class=" col-5"><?php echo $row['Nombre'] ?></td>
    <td class=" col-1">$<?php echo $row['Precio'] ?></td>
    <td class=" col-1"><?php if(isset($row['IdCatg'])){ $Id = $row['IdCatg'];	$consult2 = "SELECT * From categoria WHERE Id = '$Id'";
	$result = mysqli_query($db,$consult2); if ($result) {$row2 = $result->fetch_array(); echo $row2['categoria'];}} ?>
    </td>

    <td class=" col-1">
        <a href="EditProduct.php?id=<?php echo $row['Id'] ?>" class="btn btn-outline-light " role="button">
            <i class="bi bi-pencil-square"></i></a>
    </td>
</tr>

<?php
	    }
	}
}
?>