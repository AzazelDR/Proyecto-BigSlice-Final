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
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/img/favicon.png">
    <title>Productos</title>
</head>

<body style="background: url(../assets/img/back.jpg);">
    <nav class="navbar navbar-dark fixed-top" style="background: url(../assets/img/imgheader.jpg);">
        <div class="container-fluid">
            <h1> <a class="navbar-brand "><img src="../assets/img/favicon.png" class="img-fluid px-2"
                        style="height: 45px;">
                    BIGSLICE</a>
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
                            <a href="../admin/Pedidos.php" class="nav-link active">Pedidos</a>
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
            <h1 class="p-2 text-center text-danger bg-warning rounded-pill ">Productos</h1>
        </div>
    </div>
    <div class="p-4 container align-content-center table-responsive rounded-2 col-md col-md-12 rounded-2">
        <table class="table table-dark table-striped align-middle table-bordered table-responsive">

            <thead class="table-light ">
                <a class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#exampleModal" role="button">Agregar
                    Producto <i class="bi bi-plus-square"></i></a>
                <div class="m-1"></div>
                <tr class="text-center">
                    <th scope="col">&nbsp;&nbsp;#&nbsp;&nbsp;</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $database = include("../conf/BigSliceDB.php");

                include("../admin/templates/tableProduct.php");
            ?>
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        <div class="p-md-4 mt-md-3 pt-md-1 pt-0 mt-0 ">
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">

                                <div class="row gy-0 gx-2">

                                    <div class="mb-3 col-lg-12 col-md-12">
                                        <label for="1" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="Nombre" id="1" required>


                                    </div>
                                    <div class="mb-3 col-lg-6 col-md-5 input-group">
                                        <label class="form-label" for="autoSizingInputGroup">Precio</label>
                                        <div class="input-group">
                                            <div class="input-group-text">$</div>
                                            <input type="text" class="form-control" name="Precio"
                                                id="autoSizingInputGroup">
                                        </div>
                                    </div>
                                    <div class="mb-3 col-lg-12 col-md-2">
                                        <label for="4" class="form-label">Categoria</label>
                                        <select class="form-select" name="idCatg" aria-label="Default select example"
                                            required>
                                            <option selected disabled value="">Seleccionar</option>
                                            <?php if ($database) {
	                                $consultaCatg = "SELECT * From categoria";
	                                $resultadoCatg = mysqli_query($db,$consultaCatg);
	                                if ($resultadoCatg) {
                                        
                                        foreach ($resultadoCatg as $rowCatg ) {
                            ?>
                                            <option value="<?php echo $rowCatg['Id'] ?>">
                                                <?php echo $rowCatg['categoria'] ?>
                                            </option>
                                            <?php
                                        }
                                    }
                                }
                            ?>
                                        </select>

                                    </div>
                                </div>



                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" name="save">Guardar</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class=" container ">
            <div class="position-fixed top-50 end-0 p-3">
                <?php include("../admin/templates/createProduct.php");?>
            </div>
        </div>

        <script src="../assets/js/bootstrap.js"></script>
        <script src="../assets/js/login.js"></script>
        <?php include("../commond/templates/jsbootstrap.php");  ?>
</body>

</html>