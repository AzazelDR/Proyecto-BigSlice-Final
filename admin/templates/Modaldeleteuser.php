<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $row['Id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ">
            <form class="row g-3" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
                    <div class="mb-3 row">
                        <label for="staticDui" class="col-sm-2 col-form-label">Dui</label>
                        <div class="col-sm-10">
                            <input type="text" name="dui" readonly class="form-control-plaintext" id="staticDui"
                                value="<?php echo $row['dui'] ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticName" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticName"
                                value="<?php echo $row['Nombre'] ?> ">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticLname" class="col-sm-2 col-form-label">Apellido</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticLname"
                                value="<?php echo $row['Apellido'] ?> ">
                        </div>
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-outline-success" name="update">Confirmar</button>
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
