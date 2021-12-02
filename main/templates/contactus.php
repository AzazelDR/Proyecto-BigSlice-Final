<div class="container mt-1 mb-0 bg-primary col-md-6 rounded mb-md-3">
    <div class="pt-5 mx-lg-5 px-4 pb-4">
        <h3 class="card-title row justify-content-center pb-3">Enviar Comentarios</h5>
            <form class="row g-3" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                <div class="col-12">
                    <label for="name" class="form-label">Nombre completo</label>
                    <input type="text" class="form-control" id="name" name="nombre" required>
                </div>

                <div class="col-md-12">
                    <label for="Email" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="Email" name="email" required>
                </div>
                <label for="floatingTextarea">Mensaje</label>

                <div class=" p-2" id="tx">
                    <textarea class="form-control" name="mensaje" placeholder="Escribe tu mensaje"
                        id="floatingTextarea"></textarea>
                </div>
                <div class="col-12">
                    <button class="btn btn-danger" type="submit" id="boton" name="send">Enviar</button>
                </div>
            </form>
    </div>
</div>

<?php

include("../main/templates/enviar.php");
include("../commond/templates/jsbootstrap.php"); ?>
<script src="../assets/js/bootstrap.js"></script>
<script src="../assets/js/login.js"></script>