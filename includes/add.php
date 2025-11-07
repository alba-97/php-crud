<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h4 class="card-title text-center mb-4">Agregar tarea</h4>

          <form action="../actions/add.php" method="POST">
            <div class="mb-3">
              <label for="title" class="form-label">Título</label>
              <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Descripción</label>
              <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>

            <?php include('message.php'); ?>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary" name="save">Agregar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>