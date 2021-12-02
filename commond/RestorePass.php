<!DOCTYPE html>
<html lang="en">

<head>
    <title>Restablecer Contraseña</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
        <link rel="stylesheet" href="../assets/css/style.css">
<link rel="shortcut icon" href="../assets/img/favicon.png" />
</head>

<body style="background: url(../assets/img/back.jpg)">
    <nav class="navbar navbar-expand-lg navbar-dark text-light " style="background: url(../assets/img/imgheader.jpg);">

        <div class="container-fluid">
            <h1> <a class="navbar-brand " href="#"> <img
                        src="../assets/img/favicon.png" class="img-fluid px-2" style="height: 45px;">
                    BIGSLICE</a>
            </h1>

        </div>
    </nav>
    <div class="position-absolute top-50 start-50 translate-middle">
        <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-arrow-repeat"></i> Restablecer Contraseña
        </button>
    </div>
    <div class=" container ">

        <div class="position-absolute top-0 end-0 p-3">

            <?php
include("../conf/BigSliceDB.php");

if(isset($_POST['send'])){
    if(isset($_POST['dui'], $_POST["newpass"]) and $_POST["dui"] <> "" and $_POST["newpass"] <> "" and $_POST["email"] <> "" ){
        if($db){

            $email=$_POST['email'];
            $newpass=$_POST['newpass'];
            $dui=$_POST['dui'];
            $consulta = "SELECT mail,dui FROM usuarios WHERE mail='$email' AND dui='$dui'";
            $result=mysqli_query($db,$consulta);
            $fila=mysqli_num_rows($result);

            if($fila){
                $insert = "UPDATE usuarios SET pass ='$newpass' WHERE mail='$email' AND dui ='$dui'";
                $resultinsert=mysqli_query($db,$insert);
                if($resultinsert){
                ?>
            <div class=" col-md" style="z-index: 11">
                <div id="liveToast" class="toast bg-dark text-white" role="alert" aria-live="assertive"
                    aria-atomic="true">
                    <div class="toast-header bg-dark text-white">
                        <img src="../assets/img/favicon.png" class="rounded me-2" alt="BD" style="height: 20px;">
                        <strong class="me-auto">BigSlice</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Contraseña Recuperada
                    </div>
                </div>
            </div>
            <script>
            function redirc() {
                window.location.href = "../commond/Login.php";
            }

            setTimeout("redirc()", 2000);
            </script>

            <script src="../assets/js/bootstrap.js"></script>
            <script src="../assets/js/login.js"></script>

            <?php
                }else{
                ?>

            <div class=" col-md" style="z-index: 11">
                <div id="liveToast" class="toast bg-dark text-white" role="alert" aria-live="assertive"
                    aria-atomic="true">
                    <div class="toast-header bg-dark text-white">
                        <img src="../assets/img/favicon.png" class="rounded me-2" alt="BD" style="height: 20px;">
                        <strong class="me-auto">BigSlice</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Error al Recuperar Contraseña
                    </div>
                </div>
            </div>
            <?php
                }

            }else{
            ?>

            <div class=" col-md" style="z-index: 11">
                <div id="liveToast" class="toast bg-dark text-white" role="alert" aria-live="assertive"
                    aria-atomic="true">
                    <div class="toast-header bg-dark text-white">
                        <img src="../assets/img/favicon.png" class="rounded me-2" alt="BD" style="height: 20px;">
                        <strong class="me-auto">BigSlice</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        La cuenta no existe
                    </div>
                </div>

            </div>
            <?php
            }
            mysqli_free_result($result);
            mysqli_close($db);

        }else{
        die("Error en conexion".mysqli_connect_error());
        }
    }else{
        ?>

            <div class=" col-md" style="z-index: 11">
                <div id="liveToast" class="toast bg-dark text-white" role="alert" aria-live="assertive"
                    aria-atomic="true">
                    <div class="toast-header bg-dark text-white">
                        <img src="../assets/img/favicon.png" class="rounded me-2" alt="BD" style="height: 20px;">
                        <strong class="me-auto">BigSlice</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Datos faltantes
                    </div>
                </div>
            </div>
            <?php
    }
}
?>

        </div>
    </div>
    <div class="modal fade bg-warning bg-opacity-10" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content bg-dark text-white">

                <div class="modal-body mt-2">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"><i class="bi bi-envelope"></i>
                                Correo</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Nunca compartiremos tu correo con nadie.</div>
                        </div>
                        <div class="mb-3">
                            <label for="dui" class="form-label"><i class="bi bi-file-person"></i> Dui</label>
                            <input type="text" class="form-control" name="dui" id="dui">
                        </div>
                        <div class="mb-3">
                            <label for="newpass" class="form-label"><i class="bi bi-key"></i> Nueva Contraseña</label>
                            <input type="password" class="form-control" name="newpass" id="newpass">
                        </div>
                        <button type="submit" class="btn btn-outline-success" name="send" value="ingresar"> <i
                                class="bi bi-arrow-counterclockwise"></i> Restablecer</button>
                    </form>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"><i
                            class="bi bi-x-circle"></i> Cerrar</button>
                    <a class="btn btn-outline-warning" type="button" href="../commond/Login.php"><i
                            class="bi bi-arrow-return-left"></i> Volver</a>

                </div>
            </div>
        </div>
    </div>
    <?php include("../commond/templates/jsbootstrap.php") ?>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/login.js"></script>

</body>

</html>