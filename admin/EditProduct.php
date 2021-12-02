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
    <title>Usuarios</title>
</head>

<body style="background: url(../assets/img/back.jpg);">
    <nav class="navbar navbar-expand-lg navbar-dark text-light " style="background: url(../assets/img/imgheader.jpg);">

        <div class="container-fluid">
            <h1> <a class="navbar-brand "><img src="../assets/img/favicon.png" class="img-fluid px-2"
                        style="height: 45px;">
                    BIGSLICE</a>
            </h1>
        </div>
    </nav>

    <?php 

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $database = include("../conf/BigSliceDB.php");
    include("../conf/BigSliceDB.php");  
    
    if ($database) {
        $consulta = "SELECT * From producto where Id = '$id' ";
        $resultado = mysqli_query($db, $consulta);


        if ($resultado) {
        $row = $resultado->fetch_array();

        ?>
    <div class="p-md-4 mt-md-3 pt-md-1 pt-0 mt-0">
        <div class=" p-4 container bg-dark text-white align-content-center bg-light rounded-2 col col-sm-6">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>?id=<?php echo $id ?>" method="POST">

                <h3 class="text-center">Actualizar Producto</h3>

                <div class="row gy-0 gx-2">

                    <div class="mb-3 col-lg-6 col-md-5">
                        <label for="1" class="form-label">Nombre</label>
                        <input type="text" class="form-control" value="<?php echo $row['Nombre'] ?>" name="Nombre"
                            id="1" required>


                    </div>
                    <div class="mb-3 col-lg-6 col-md-5">
                    <label for="1" class="form-label">Precio</label>
                                        <div class="input-group">
                                            <div class="input-group-text">$</div>
                                            <input type="text" class="form-control" value="<?php echo $row['Precio'] ?>" name="Precio"
                            id="1" required>
                                        </div>
                        
                    </div>
                    <div class="mb-3 col-lg-12 col-md-2">
                        <label for="4" class="form-label">Categoria</label>
                        <select class="form-select" name="idCatg" aria-label="Default select example" required>
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
                <button type="submit" class="btn btn-outline-success" name="update">Actualizar</button>
                <a class="btn btn-outline-warning" type="button" href="../admin/Productos.php"><i
                        class="bi bi-arrow-return-left"></i> Volver</a>
            </form>


        </div>
        <div class=" container ">

            <div class="position-fixed top-50 end-0 p-3">
                <?php include("../admin/templates/updateProduct.php");?>
            </div>
        </div>
    </div>
    <?php

        }
    }
}
else{
?>
    <script>
    window.location.href = "../admin/Usuarios.php";
    </script>
    <?php 

        } include("../commond/templates/jsbootstrap.php"); ?>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/login.js"></script>

</body>

</html>