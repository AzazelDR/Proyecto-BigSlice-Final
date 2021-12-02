<?php 
if(isset($_SESSION['rol'])){
    $_varsesion = $_SESSION['rol'];

    if($_varsesion == null || $_varsesion == '' || $_varsesion == 1){
                            
    }else{
            ?>
            <li class="nav-item">
            <a href="../admin/inicio.php" class="nav-link active">Panel de Control</a>
            </li>
           <?php
        }        
    }
?>