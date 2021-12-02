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

if($_varsesion == null || $_varsesion == ''){
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

    <title>Ordenar</title>
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
                        <?php include('../commond/validateBtn/validateSessBtn.php') ?>

                        <li class="nav-item">
                            <a class="nav-link active" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="../main/contacto.php">Contactanos</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="../commond/templates/LogOut.php">Salir</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="p-md-5 pt-5 mt-3 mt-md-5  mx-md-5">
        <div class="p-4 bg-dark text-white rounded-2 mx-md-5">
            <form class="row g-3 " action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
                <div class="col-md-6">
                    <label for="inputDui" class="form-label">Dui</label>
                    <input type="text" class="form-control" name="dui" id="inputDui" required>
                </div>
                <div class="col-md-6">
                    <label for="inputNit" class="form-label">Nit</label>
                    <input type="text" class="form-control" name="nit" id="inputNit" required>
                </div>
                <div class=" col-md-12">
                    <label for="inputComida" class="form-label">Comida</label>
                    <select class="form-select" size="3" name="Comida" aria-label="Default select example" required>
                        <option selected disabled value="">Seleccionar</option>
                        <?php if ($database) {
	                                $consultaPr = "SELECT * From producto";
	                                $resultadoPr = mysqli_query($db,$consultaPr);


	                                if ($resultadoPr) {
                                        
                                        foreach ($resultadoPr as $rowPr ) {
                            ?>
                        <option value="<?php echo $rowPr['Nombre'] ?>"><?php echo $rowPr['Nombre'] ?>
                        </option>
                        <?php
                                        }
                                    }
                                }
                            ?>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="inputCantidad" class="form-label">Cantidad</label>
                    <input type="text" class="form-control" name="cantidad" id="inputCantidad" required>
                </div>

                <div class="col-md-12">
                    <label for="inputpago" class="form-label">Pago</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value="1" name="pago" id="inputpago1">
                        <label class="form-check-label" for="inputpago1">
                            Tarjeta
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value="2" name="pago" id="inputpago2" checked>
                        <label class="form-check-label" for="inputpago2">
                            Efectivo
                        </label>
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="inputDelivery" class="form-label">A domicilio</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value="Sí" name="delivery" id="inputDelivery1">
                        <label class="form-check-label" for="inputDelivery1">
                            Sí
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value="No" name="delivery" id="inputDelivery2"
                            checked>
                        <label class="form-check-label" for="inputDelivery2">
                            No
                        </label>
                    </div>
                </div>


                <div class="col-12">

                    <button type="submit" name="order" class="btn btn-primary">Ordenar</button>
                </div>
            </form>
        </div>
    </div>

    <div class=" container ">
        <div class="position-fixed top-50 end-0 p-3">
            <?php
            
 
    include("../commond/templates/jsbootstrap.php");
    if(isset($_POST['order'])){
        if(strlen($_POST['delivery'])>=1 &&
        strlen($_POST['pago'])>=1 &&
        strlen($_POST['cantidad'])>=1 &&
        strlen($_POST['Comida'])>=1 &&
        strlen($_POST['dui'])>=1 &&
        strlen($_POST['nit'])>=1){  

            $pago = trim($_POST['pago']);
            $cant = trim($_POST['cantidad']);
            $Comida = trim($_POST['Comida']);
            $dui=trim($_POST['dui']);
            $nit=trim($_POST['nit']);
            $FechaPedido = date("d/m/y"); 
            $envio = trim($_POST['delivery']);
            
            $user = "SELECT * FROM usuarios WHERE dui = '$dui' AND nit = '$nit'";
            $userOrdened =mysqli_query($db,$user);
            $orders =  "SELECT * FROM producto WHERE Nombre = '$Comida'";
            $Ordenes =mysqli_query($db,$orders);
            if($userOrdened && $Ordenes){
                $rowUser = $userOrdened->fetch_array(); 
                $rowOrder = $Ordenes->fetch_array();
                if(!$envio == null){
                    if($envio=='Sí'){ $nEnvio = 1;}else{$nEnvio = 0;}

                if(!$rowUser == null && !$rowOrder == null){
                    $idUser = $rowUser['Id'];
                    $precio = $rowOrder['Precio'];
                    $Tipo = $rowOrder['IdCatg'];
                    $totalP = $cant * $precio;
                    $insert = "INSERT INTO pedidos(idUser, Pedido,Tipo, Cantidad, Total, Envio, fecha_pedido, idPago) 
                VALUES ('$idUser','$Comida','$Tipo','$cant','$totalP','$nEnvio','$FechaPedido','$pago')";
                $result=mysqli_query($db,$insert);
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
                        Pedido Realizado, Total: $<?php echo $totalP ?>
                    </div>
                </div>
            </div>

            <script>
            function redirc() {
                window.location.href = "../index.php?Id=<?php echo $idUser ?>";
            }

            setTimeout("redirc()", 4000);
            </script>



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
                        Revise Campos erroneos
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
                        Dui o Nit erroneos
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
                        Dui o Nit erroneos
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
                        Revise Campos faltantes
                    </div>
                </div>
            </div>
            <?php
        }
    }


    ?>
        </div>
    </div>
    <?php include("../commond/templates/jsbootstrap.php") ?>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/successOrder.js"></script>

</body>

</html>