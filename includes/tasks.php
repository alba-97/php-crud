<div class="container mt-5">
  <h3 class="text-center mb-4">Lista de tareas</h3>

  <?php
  if (isset($_SESSION['message'])) {
  ?>
    <div class="alert alert-<?php echo $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
      <?php echo $_SESSION['message']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
  }
  ?>

  <div class="table-responsive">
    <table class="table table-striped table-hover align-middle shadow-sm">
      <thead class="table-dark">
        <tr>
          <th scope="col">Título</th>
          <th scope="col">Descripción</th>
          <th scope="col" class="text-center">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include_once('auth.php');
        requireLogin();

        $user_id = getUserId();
        $query = "SELECT * FROM tasks WHERE user_id = $user_id";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
              <td class="fw-semibold"><?php echo htmlspecialchars($row['title']); ?></td>
              <td><?php echo htmlspecialchars($row['description']); ?></td>
              <td class="text-center">
                <a href="editar/<?php echo $row['id']; ?>" class="btn btn-sm btn-outline-primary me-1">
                  Editar
                </a>
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete(<?php echo $row['id']; ?>)">
                  Eliminar
                </button>
              </td>
            </tr>
          <?php
          }
        } else {
          ?>
          <tr>
            <td colspan="4" class="text-center text-muted py-4">No hay tareas registradas</td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmar eliminación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Está seguro que desea eliminar esta tarea?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <form action="actions/delete.php" method="POST" class="d-inline">
          <input type="hidden" name="id" id="deleteId">
          <button type="submit" name="delete" class="btn btn-danger">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  function confirmDelete(id) {
    document.getElementById('deleteId').value = id;
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteModal.show();
  }
</script>