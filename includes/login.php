<div class="container mt-5">
    <?php include('message.php'); ?>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h3 class="text-center mb-0">Iniciar Sesión</h3>
                </div>
                <div class="card-body">
                    <form action="/actions/login.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark" name="login">Iniciar Sesión</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p class="mb-0">¿No tienes una cuenta? <a href="/register" class="text-dark">Registrarse</a></p>
                </div>
            </div>
        </div>
    </div>
</div>