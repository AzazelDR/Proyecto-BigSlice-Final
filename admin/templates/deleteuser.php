<?php 
if(isset($_POST['update'])){
    if($db){
        $dui=$_POST['dui'];

        $nEstado = 2;
        $update = "UPDATE usuarios SET  estado = '$nEstado' WHERE dui = '$dui'";
        $resultinsert=mysqli_query($db,$update);

    }if($resultinsert){
        ?>
<div class=" col-md" style="z-index: 11">
    <div id="liveToast" class="toast bg-dark text-white" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-dark text-white">
            <img src="../assets/img/favicon.png" class="rounded me-2" alt="BD" style="height: 20px;">
            <strong class="me-auto">BigSlice</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Usuario Eliminado
        </div>
    </div>
</div>

<script>
function redirc() {
    window.location.href = "../admin/Usuarios.php";
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
}
?>