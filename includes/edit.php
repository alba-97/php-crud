<?php

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM tasks WHERE id = $id";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $title = $row['title'];
    $description = $row['description'];
  }
}
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h4 class="card-title text-center mb-4">Editar tarea</h4>

          <form action="../actions/edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <div class="mb-3">
              <label for="title" class="form-label">Título</label>
              <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Descripción</label>
              <textarea class="form-control" id="description" name="description" rows="3" required><?php echo htmlspecialchars($description); ?></textarea>
            </div>

            <?php include('message.php'); ?>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary" name="save">Editar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>