<?php 
if(isset($_SESSION['rol'])){
    $_varsesion = $_SESSION['rol'];

    if($_varsesion == null || $_varsesion == ''){
                            
    }else{
            ?>
            <a href="main/Ordenar.php" class="btn btn-danger" role="button">Ordenar</a>
           <?php
        }        
    }
?>