<?php
if(isset($_POST['save'])){
    $Precio = $_POST['Precio'];
    $Nombre = $_POST['Nombre'];
    $idCatg = $_POST['idCatg'];
    $insert1 = "INSERT INTO producto ( Nombre, Precio, idCatg) VALUES('$Nombre', '$Precio','$idCatg')";

    $result1=mysqli_query($db,$insert1);
    if($result1){
        ?>
<div class=" col-md" style="z-index: 11">
    <div id="liveToast" class="toast bg-dark text-white" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-dark text-white">
            <img src="../assets/img/favicon.png" class="rounded me-2" alt="BD" style="height: 20px;">
            <strong class="me-auto">BigSlice</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Producto Creado
        </div>
    </div>
</div>

<script>
function redirc() {
    window.location.href = "../admin/Productos.php";
}

setTimeout("redirc()", 2000);
</script>



<?php
                }else{
                    ?>
<div class=" col-md" style="z-index: 11">
    <div id="liveToast" class="toast bg-dark text-white" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-dark text-white">
            <img src="../assets/img/favicon.png" class="rounded me-2" alt="BD" style="height: 20px;">
            <strong class="me-auto">BigSlice</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Verifique datos erroneos
        </div>
    </div>
</div>
<?php
    }

}
?>