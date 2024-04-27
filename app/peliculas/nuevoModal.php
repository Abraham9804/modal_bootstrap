<!-- Modal -->
<div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo registro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="insert.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="id" name="id">
            <div class="mb-3">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descripcion">Descripcion:</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="genero">Genero:</label>
                <select name="genero" id="genero" class="form-select" required>
                    <option value="">Seleccionar...</option>
                    <?php $regData = sqlGeneros($con);
                            if($regData->num_rows>0){
                                while($genero = $regData->fetch_assoc()){ ?>
                                    <option value="<?= $genero['id_genero'];?>"><?= $genero['nombre']?></option>
                                <?php } 
                            } ?>
                        
                </select>
            </div>
            
            <div class="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>