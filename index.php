<?php
$database = include("conf/BigSliceDB.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/style.css">
<link rel="shortcut icon" href="assets/img/favicon.png">
    <title>Inicio</title>
</head>

<body style="background: url(assets/img/back.jpg);">
    <nav class="navbar navbar-dark fixed-top" style="background: url(assets/img/imgheader.jpg);">
        <div class="container-fluid">
            <h1> <a class="navbar-brand "> <img src="assets/img/favicon.png" class="img-fluid px-2"
                        style="height: 45px;">
                    <?php if(isset($_GET['Id'])){ $idUser = $_GET['Id']; $database = include("conf/BigSliceDB.php");
             if ($database) { $consulta = "SELECT * From usuarios where id = '$idUser' ";
                $resultado = mysqli_query($db, $consulta); if ($resultado) { $row = $resultado->fetch_array();         
                    ?><?php echo $row['Nombre']; }}}else{?>BIGSLICE <?php }?></a>
            </h1>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end bg-dark text-light" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">BigSliceSV</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <?php include('main/validateBtnMain/validateSessBtn.php') ?>

                        <li class="nav-item">
                        <a class="nav-link active" href="main/Ordenar.php">Ordenar</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="main/contacto.php">Contactanos</a>
                        </li>
                        <?php 
                    if(isset($_SESSION['rol'])){
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="commond/templates/LogOut.php">Salir</a>
                        </li>
                        <?php
                    }
                    ?>

                    </ul>

                </div>
            </div>
        </div>
    </nav>
    <div class="container pt-5 mt-4 mb-1">
        <div class="row gx-0 pt-lg-5 mt-lg-5 mx-md-5" id="panels">
            <div class="col-md-6 ">
                <?php
include("main/templates/menu.php");
?>
            </div>
            <div class="col-md-6 ">
                <?php
include("main/templates/delivery.php");
include("main/templates/redes.php");

?>
            </div>
        </div>
    </div>
    <?php include("commond/templates/jsbootstrap.php") ?>
    </script>
</body>

</html>