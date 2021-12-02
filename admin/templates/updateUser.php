<?php
$database = include("../conf/BigSliceDB.php");
include("../conf/BigSliceDB.php");

if(isset($_POST['update'])){
        if($db){
            $id = $_GET['id'];
            $email=$_POST['mail'];
            $pass=$_POST['pass'];
            $dui=$_POST['dui'];
            $nit=$_POST['nit'];
            $telf=$_POST['telf'];
            $edad = $_POST['edad'];
            $estado = $_POST['estado'];
            $dirc = $_POST['direccion'];
            $name = $_POST['name'];
            $Lname = $_POST['Lname'];
            $rol = $_POST['rol'];
            if($edad>=18){
            $consulta = "SELECT * FROM usuarios WHERE Id = '$id'";
            $result=mysqli_query($db,$consulta);
            $fila=mysqli_num_rows($result);

            if($fila){
                if($rol=='usuario'){ $nRol = 1;}else{$nRol = 2;}
                if($estado=='Activo'){ $nEstado = 1;}else{$nEstado = 2;}

                $update = "UPDATE usuarios SET Nombre = '$name',Apellido = '$Lname', dui ='$dui',nit ='$nit' ,telf = $telf, mail = '$email',pass ='$pass', edad = $edad, direccion = '$dirc', rol = '$nRol', estado = '$nEstado' WHERE id = '$id'";
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
            ?> 
            
            <div class=" col-md" style="z-index: 11">
    <div id="liveToast" class="toast bg-dark text-white" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-dark text-white">
            <img src="../assets/img/favicon.png" class="rounded me-2" alt="BD" style="height: 20px;">
            <strong class="me-auto">BigSlice</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            La edad debe ser mayor a 18
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