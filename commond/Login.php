<?php 
include("../conf/BigSliceDB.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>login BS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/img/favicon.png" />
</head>

<body style="background: url(../assets/img/back.jpg)">
    <nav class="navbar navbar-expand-lg navbar-dark text-light " style="background: url(../assets/img/imgheader.jpg);">

        <div class="container-fluid">
            <h1> <a class="navbar-brand " href="#"> <img src="../assets/img/favicon.png" class="img-fluid px-2"
                        style="height: 45px;">
                    BIGSLICE </a>
            </h1>
        </div>
    </nav>

    <div class="position-absolute top-50 start-50 translate-middle">
        <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-box-arrow-in-right"></i> Logearse
        </button>
    </div>

    <div class="modal fade bg-warning bg-opacity-10" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content bg-dark text-white">

                <div class="modal-body  mt-2">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label"><i class="bi bi-envelope"></i>
                                Correo</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                aria-describedby="emailHelp" required>
                            <div id="emailHelp" class="form-text">Nunca compartiremos tu correo con nadie.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label"><i class="bi bi-key"></i>
                                Contraseña</label>
                            <input type="password" class="form-control" name="pass" id="exampleInputPassword1" required>
                        </div>
                        <button type="submit" class="btn btn-outline-primary" name="send" value="ingresar"><i
                                class="bi bi-box-arrow-in-right"></i> Entrar</button>
                    </form><br>
                    <label for="exampleInputEmail1" class="form-label">¿Olvidaste tu clave? Recuperala <a
                            href="../commond/RestorePass.php">aqui</a></label> <br>
                    <label for="exampleInputEmail1" class="form-label">¿Sin cuenta? Registrate <a
                            href="../commond/signin.php">aqui</a></label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"><i
                            class="bi bi-x-circle"></i> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class=" container ">
    <div class="position-absolute top-0 end-0 p-3">
            <?php
            
    if(isset($_POST['email']) && isset($_POST['pass'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $query = "SELECT * FROM usuarios WHERE mail = '$email' AND pass = '$pass'";
        $result =mysqli_query($db,$query);
        $fila=mysqli_num_rows($result);

        if($result){
            $row = $result->fetch_array();

            if(isset($row['rol'])){
                $rol = $row['rol'];
               
            $_SESSION['rol'] = $rol;
            if($_SESSION['rol'] == 1){
                ?>

                <script language="JavaScript">
                function redireccionarPagina() {
                    window.location = "../index.php?Id=<?php echo $row['Id']; ?>";
                }
                setTimeout("redireccionarPagina()", 2000);
                </script>
    
                
                <div class=" col-md" style="z-index: 11">
                    <div id="liveToast" class="toast bg-dark text-white" role="alert" aria-live="assertive"
                        aria-atomic="true">
                        <div class="toast-header bg-dark text-white">
                            <img src="../assets/img/favicon.png" class="rounded me-2" alt="BD" style="height: 20px;">
                            <strong class="me-auto">BigSlice</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Sesion Iniciada
                        </div>
                    </div>
                </div>
                <?php
                }else{
                    if($_SESSION['rol'] == 2){
                        ?>

                <script language="JavaScript">
                function redireccionarPagina() {
                    window.location = "../admin/inicio.php?Id=<?php echo $row['Id']; ?>";
                }
                setTimeout("redireccionarPagina()", 2000);
                </script>
    
                
                <div class=" col-md" style="z-index: 11">
                    <div id="liveToast" class="toast bg-dark text-white" role="alert" aria-live="assertive"
                        aria-atomic="true">
                        <div class="toast-header bg-dark text-white">
                            <img src="../assets/img/favicon.png" class="rounded me-2" alt="BD" style="height: 20px;">
                            <strong class="me-auto">BigSlice</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Sesion Iniciada
                        </div>
                    </div>
                </div>
                <?php
                    }
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
                        Usuario o Contraseña incorrectos
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
                        Error al iniciar sesion
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        </div>
    </div>
    <?php
    }
    ?>
    <?php include("../commond/templates/jsbootstrap.php") ?>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/login.js"></script>
</body>

</html>