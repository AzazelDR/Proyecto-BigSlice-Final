<?php
$database = include("../conf/BigSliceDB.php");
include("../conf/BigSliceDB.php");

if(isset($_POST['update'])){
        if($db){
            $id = $_GET['id'];
            
            $Precio = $_POST['Precio'];
            $Nombre = $_POST['Nombre'];
            $idCatg = $_POST['idCatg'];
            $consulta = "SELECT * FROM producto WHERE Id = '$id'";
            $result=mysqli_query($db,$consulta);
            $fila=mysqli_num_rows($result);

            if($fila){
                

                $update = "UPDATE producto SET Nombre = '$Nombre',Precio = '$Precio',idCatg = '$idCatg' WHERE Id = '$id'";
                $resultinsert=mysqli_query($db,$update);
                if($resultinsert){
                ?>
<div class=" col-md" style="z-index: 11">
    <div id="liveToast" class="toast bg-dark text-white" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-dark text-white">
            <img src="../assets/img/favicon.png" class="rounded me-2" alt="BD" style="height: 20px;">
            <strong class="me-auto">BigSlice</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Datos Cambiados
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
}else{?>
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
            Datos de cuenta inexistentes
        </div>
    </div>
</div>
<?php
            }
       
        }else{
        die("Error en conexion".mysqli_connect_error());
        }
    
}
?>