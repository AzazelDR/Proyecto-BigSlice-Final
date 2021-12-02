<div class=" container ">
<div class="position-fixed top-50 end-0 p-3">

<?php
if(isset($_POST['send'])){
    if(!empty(isset($_POST['nombre'])) 
    && !empty(isset($_POST['email']))
    && !empty(isset($_POST['mensaje']))){

        //$destino = 'axel.f.reyes.a@gmail.com';
        $nombre = $_POST['nombre'];
        $correo = $_POST['email'];
        //$asunto = "Contacto de informacion";
        $mensaje = $_POST['mensaje'];

        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
        $cabeceras .= 'To: BigSlice <bigslice503@gmail.com>' . "\r\n";
        $cabeceras .= 'From: '.$nombre . '<'. $correo .'>' ."\r\n";
        
        $para = 'axel.f.reyes.a@gmail.com';
        
        $título = 'Mensaje de Contacto';
        
        $message = '
        <html>
        <head>
          <title>Mensaje de Contacto</title>
        </head>
        <body>
         '. $mensaje . '
        </body>
        </html>
        ';
        
        mail($para, $título, $message, $cabeceras);
                ?>
<div class=" col-md" style="z-index: 11">
    <div id="liveToast" class="toast bg-dark text-white" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-dark text-white">
            <img src="../assets/img/favicon.png" class="rounded me-2" alt="BD" style="height: 20px;">
            <strong class="me-auto">BigSlice</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Correo Enviado
        </div>
    </div>
</div>

<script>
function redirc() {
    window.location.href = "../index.php";
}

setTimeout("redirc()", 2000);
</script>


<?php
//mail($destino,"Contacto",$contenido);

}
}

?>
</div>
</div>