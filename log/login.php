<!doctype html>
<html lang="en">
    <head>
        <title>Iniciar Sesión - Kikos</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="../css/login.css">
    </head>

    <body>
        <div class="login-container">
            <div class="login-card">
                <!-- Logo Section -->
                <div class="logo-section">
                    <img src="../img/ShoppingBagLogo.png" alt="Kikos Logo" class="logo">
                    <h2 class="brand-title">Kikos</h2>
                    <p class="brand-subtitle">Sistema de Gestión de Inventario</p>
                </div>

                <!-- Login Form -->
                <form action="authenticate.php" method="POST" class="login-form">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person"></i>
                            </span>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn-login">
                            <i class="bi bi-box-arrow-in-right me-2"></i>
                            Iniciar Sesión
                        </button>
                    </div>
                </form>

                <!-- Additional Options -->
                <div class="login-options">
                    <a href="#" class="forgot-password" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                        <i class="bi bi-key me-1"></i>
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>

                <!-- Footer -->
                <div class="login-footer">
                    <small class="text-muted">© 2025 Kikos. Todos los derechos reservados.</small>
                </div>
            </div>
        </div>

        <!-- Modal para Cambiar Contraseña -->
        <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="changePasswordModalLabel">
                            <i class="bi bi-key me-2"></i>Cambiar Contraseña
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="change_password.php" method="POST" id="changePasswordForm">
                            <div class="mb-3">
                                <label for="username_change" class="form-label">Nombre de Usuario</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input type="text" class="form-control" id="username_change" name="username" placeholder="Ingresa tu nombre de usuario" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="ci_change" class="form-label">Cédula de Identidad</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-card-text"></i>
                                    </span>
                                    <input type="text" class="form-control" id="ci_change" name="ci" placeholder="Ingresa tu CI para verificación" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="new_password" class="form-label">Nueva Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Ingresa tu nueva contraseña" required>
                                    <button class="btn btn-outline-secondary" type="button" id="toggleNewPassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirmar Nueva Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock-fill"></i>
                                    </span>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirma tu nueva contraseña" required>
                                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="alert alert-info" role="alert">
                                <i class="bi bi-info-circle me-2"></i>
                                <small>La contraseña debe tener al menos 8 caracteres e incluir letras y números.</small>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" form="changePasswordForm" class="btn btn-primary">
                            <i class="bi bi-check-circle me-2"></i>Cambiar Contraseña
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
        <script src="../js/login.js"></script>
    </body>
</html>
