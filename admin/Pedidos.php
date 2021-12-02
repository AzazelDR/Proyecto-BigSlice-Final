<?php 
$database = include("../conf/BigSliceDB.php");
session_start();
if(!isset($_SESSION['rol'])){

    ?>

<script language="JavaScript">
window.location = "../commond/Login.php";
</script>

<?php
    die();
}else{
    $_varsesion = $_SESSION['rol'];

if($_varsesion == null || $_varsesion == '' || $_varsesion == 1){
    ?>

<script language="JavaScript">
window.location = "../commond/Login.php";
</script>

<?php
    die();
    
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets//css/style.css">
        <link rel="shortcut icon" href="../assets/img/favicon.png">
    <title>Pedidos</title>
</head>

<body style="background: url(../assets/img/back.jpg);">
    <nav class="navbar navbar-dark fixed-top" style="background: url(../assets/img/imgheader.jpg);">
        <div class="container-fluid">
            <h1> <a class="navbar-brand "><img src="../assets/img/favicon.png" class="img-fluid px-2"
                        style="height: 45px;">
                    BIGSLICE </a>
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

                        <li class="nav-item">
                            <a href="../admin/inicio.php" class="nav-link active">Panel de Control</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/Productos.php" class="nav-link active">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/Usuarios.php" class="nav-link active">Usuarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="../commond/templates/LogOut.php">Salir</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="mt-md-4 pt-3 mt-5 mt-md-2 container align-content-center col-sm col-sm-4">
        <div class="pt-md-5 mt-md-5 pt-4">
            <h1 class="p-2 text-center text-danger bg-warning rounded-pill ">Registro de Pedidos</h1>
        </div>
    </div>
    <div class="p-4 container align-content-center table-responsive rounded-2 col-md col-md-12 rounded-2">
        <table class="table table-dark table-striped align-middle table-bordered table-responsive">

            <thead class="table-light ">

                <tr class="text-center">
                    <th scope="col">&nbsp;&nbsp;#&nbsp;&nbsp;</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Pedido</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total</th>
                    <th scope="col">Envio</th>
                    <th scope="col">Pago</th>
                    <th scope="col">Registro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $database = include("../conf/BigSliceDB.php");

                include("../admin/templates/tablePedido.php");
            ?>
            </tbody>
        </table>
        <!-- Modal new and Modal edit -->
    </div>
    <?php include("../commond/templates/jsbootstrap.php");  ?>
</body>

</html>