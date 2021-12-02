<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign In BS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/style.css">
<link rel="shortcut icon" href="../assets/img/favicon.png">

</head>

<body style="background: url(../assets/img/back.jpg);">
    <nav class="navbar navbar-expand-lg navbar-dark text-light " style="background: url(../assets/img/imgheader.jpg);">

        <div class="container-fluid">
            <h1> <a class="navbar-brand " href="#"> <img src="../assets/img/favicon.png" class="img-fluid px-2"
                        style="height: 45px;">
                    BIGSLICE</a>
            </h1>

        </div>
    </nav>
    <div class="position-fixed top-50 start-50 translate-middle">
        <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-person-plus"></i> Registrarse
        </button>

    </div>
    <div class=" container ">

    <div class="position-absolute top-0 end-0 p-3">

            <?php
include("../conf/BigSliceDB.php");

if(isset($_POST['registro'])){
    if(strlen($_POST['email'])>=1 && 
    strlen($_POST['pass'])>=1 && 
    strlen($_POST['name'])>=1 && 
    strlen($_POST['Lname'])>=1 && 
    strlen($_POST['dui'])>=1 &&
    strlen($_POST['nit'])>=1 &&
    strlen($_POST['Contacto'])>=1 && 
    strlen($_POST['edad'])>=1 &&
    strlen($_POST['Direccion'])>=1 
    ){  
        $edad=trim($_POST['edad']);
        $email = trim($_POST['email']);
        $pass=trim($_POST['pass']);
        $name=trim($_POST['name']);
        $Lname = trim($_POST['Lname']);
        $dui=trim($_POST['dui']);
        $nit=trim($_POST['nit']);
        $Contacto=trim($_POST['Contacto']);
        $Direccion=trim($_POST['Direccion']);
        $rol = 1;
        $fecha_regist = date("d/m/y");
        if($edad<18){

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
                        Debe ser Mayor de 18 años
                    </div>
                </div>
            </div>
            <?php
    
            
        }else{
            $select = "SELECT * FROM usuarios WHERE mail = '$email' AND dui = '$dui' AND nit = '$nit'";
            $selected =mysqli_query($db,$select);
            $filaS=mysqli_num_rows($selected);
    
            if(!$filaS){
            $consulta = "INSERT INTO usuarios(Nombre,Apellido, dui,nit,edad,mail,pass,telf,direccion, fecha_regist,rol) 
            VALUES ('$name','$Lname','$dui','$nit','$edad','$email','$pass','$Contacto','$Direccion','$fecha_regist','$rol')";
            $result=mysqli_query($db,$consulta);
            if($result){
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
                        Cuenta Creada
                    </div>
                </div>
            </div>
            <script>
            function redirc() {
                window.location.href = "../commond/Login.php";
            }

            setTimeout("redirc()", 2000);
            </script>

            <?php
            }
            else{
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
                        Datos erroneos
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
                        Cuenta Existente
                    </div>
                </div>
            </div>
            <?php
        }
        }   
    }
}

?>
        </div>
    </div>
    <div class="modal fade bg-warning bg-opacity-10" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content bg-dark text-white">

                <div class="modal-body">
                    <form class="row  gx-2 gy-2 needs-validation" method="post"
                        action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                        <div class="col-md-6">
                            <label for="inputDui" class="form-label"><i class="bi bi-file-person"></i> Dui</label>
                            <input type="text" class="form-control" id="inputDui" name="dui" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputNit" class="form-label"><i class="bi bi-file-person-fill"></i> Nit</label>
                            <input type="text" class="form-control" id="inputNit" name="nit" required>
                        </div>

                        <div class="col-md-6">
                            <label for="inputName" class="form-label"><i class="bi bi-cursor-text"></i> Nombre
                                </label>
                            <input type="text" class="form-control" name="name" id="inputName" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputLName" class="form-label"><i class="bi bi-cursor-text"></i> Apellido
                                </label>
                            <input type="text" class="form-control" name="Lname" id="inputLName" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputMail" class="form-label"><i class="bi bi-envelope"></i> Correo</label>
                            <input type="email" class="form-control" name="email" id="inputMail" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword" class="form-label"><i class="bi bi-key"></i> Contraseña</label>
                            <input type="password" class="form-control" name="pass" id="inputPassword" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputTel" class="form-label"><i class="bi bi-telephone"></i> Telefono</label>
                            <input type="text" class="form-control" name="Contacto" id="inputTel" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputAge" class="form-label"><i class="bi bi-123"></i> Edad</label>
                            <input type="text" class="form-control" id="inputAge" name="edad" required>
                        </div>
                        <div class="mb-3">
                            <label for="textAreaAddress" class="form-label"><i class="bi bi-map"></i> Direccion</label>
                            <textarea class="form-control" id="textAreaAddress" name="Direccion" rows="3"
                                required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" value="ingresar" name="registro"><i
                                    class="bi bi-person-plus"></i> Registrarse</button>
                        </div>
                        <div class="mt-2">
                            <label for="exampleInputEmail1" class="form-label">¿Ya tienes cuenta? Inicia sesion <a
                                    href="../commond/Login.php">aqui</a></label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i>
                        Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <?php include("../commond/templates/jsbootstrap.php") ?>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/login.js"></script>

</body>

</html>