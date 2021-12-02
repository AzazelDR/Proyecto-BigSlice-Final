<?php
if ($database) {

	$consulta = "SELECT * From pedidos";
	$resultado = mysqli_query($db,$consulta);


	if ($resultado) {
    $i=1;
    foreach ($resultado as $row ) {
	    ?>
<tr data-id="<?php echo $row['Id'] ?>" class="text-center">
    <td><?php echo $i++?></td>
    <td><?php $user = "SELECT * From usuarios WHERE id = '$row[idUser]'"; $userResult = mysqli_query($db,$user);
	if ($userResult) {foreach ($userResult as $rowUser ) { echo $rowUser['Nombre'];?> <?php echo $rowUser['Apellido'];}}?>
    </td>
    <td><?php echo $row['Pedido'] ?></td>
    <td><?php $catg = "SELECT * From categoria WHERE id = '$row[Tipo]'"; $Result = mysqli_query($db,$catg);
	if ($Result) {foreach ($Result as $rowT ) { echo $rowT['categoria'];}}?></td>

    <td><?php echo $row['Cantidad']?></td>
    <td>$<?php echo $row['Total'] ?></td>
    <td><?php if($row['Envio']==1){ $nEnvio = 'Si'; echo $nEnvio;}else{$nEnvio = 'No'; echo $nEnvio;}?></td>
    <td><?php if($row['idPago']==1){ $nPago = 'Tarjeta'; echo $nPago;}else{$nPago = 'Efectivo'; echo $nPago;}?></td>
    <td><?php echo $row['fecha_pedido'] ?></td>
    <!--<td>/**/</td>-->
</tr>

<?php
	    }
	}
}
?>