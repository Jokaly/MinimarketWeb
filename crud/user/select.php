<?php
include '../../connection/bd.php';

// session_start();
// // Verifica si la sesión está activa y si la variable 'nombre' está definida
// if (!isset($_SESSION['nombre'])) {
//     header('Location: credentials/login.php');
//     exit();
// }

// $nombre = $_SESSION['nombre'];
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Usuarios</title>
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
        <link rel="stylesheet" href="../../css/dashboard.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg py-2 px-4">
                <div class="container-fluid">
                    <!-- Logo Section -->
                    <div class="navbar-section">
                        <a class="navbar-brand" href="../../index.html">
                            <img id="img-logo" src="../../img/ShoppingBagLogo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                            <span class="brand-text fw-bold">Kikos</span>
                        </a>
                    </div>

                    <!-- Hamburger button for mobile -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Navigation Links Section -->
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <div class="navbar-section">
                            <ul class="navbar-nav justify-content-center">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Productos
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="../product/select.php">Ver Productos</a></li>
                                        <li><a class="dropdown-item" href="../category/select.php">Categorias</a></li>
                                        <li><a class="dropdown-item" href="../brand/select.php">Marcas</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Proveedores</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Ventas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../user/select.php">Usuarios</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Reportes</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Profile Section -->
                    <div class="navbar-section">
                        <div class="d-flex align-items-center justify-content-end position-relative">
                            <h1 id="username">Username</h1>
                            <button class="btn p-0 border-0 bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#profileCollapse" aria-expanded="false" aria-controls="profileCollapse">
                                <img id="imgProfile" src="../../img/bombombum.jpg" alt="Profile">
                            </button>
                            <div class="collapse position-absolute top-100 end-0 mt-2" id="profileCollapse" style="z-index: 1050;">
                                <div class="card" style="min-width: 200px; background-color: #f8f9fa; border: 1px solid #dee2e6; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);">
                                    <div class="card-body p-2">
                                        <a href="#" class="btn btn-link text-decoration-none w-100 text-start p-2" style="color: #0f480b !important; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#e9ecef'" onmouseout="this.style.backgroundColor='transparent'">
                                            <i class="bi bi-person me-2" style="color: #ff6b00 !important;"></i>Mi Perfil
                                        </a>
                                        <a href="#" class="btn btn-link text-decoration-none w-100 text-start p-2" style="color: #0f480b !important; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#e9ecef'" onmouseout="this.style.backgroundColor='transparent'">
                                        <i class="bi bi-key me-2" style="color: #ff6b00 !important;"></i>Cambiar Contraseña
                                        </a>
                                        <a href="#" class="btn btn-link text-decoration-none w-100 text-start p-2" style="color: #0f480b !important; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#e9ecef'" onmouseout="this.style.backgroundColor='transparent'">
                                            <i class="bi bi-box-arrow-right me-2" style="color: #ff6b00 !important;"></i>Cerrar Sesión
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <div class="container-fluid mt-4">
                
                <div class="card text-center">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="col-6 d-flex justify-content-start">
                                <button class="btnInsert" type="button" data-bs-toggle="modal" data-bs-target="#insertModal">
                                    <i class="bi bi-plus-circle me-2"></i>Agregar Usuario
                                </button>
                            </div>
                            <div class="col-6">
                                <form class="d-flex" role="search">
                                    <div class="input-group">
                                        <input class="form-control" type="search" placeholder="Buscar usuarios" aria-label="Search"/>
                                        <span class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 py-0">
                        <table class="table table-striped">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Nombre Completo</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Rol</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include '../../connection/bd.php';
                                    // Conexión a la base de datos
                                    $query = "SELECT * FROM user WHERE status = 1";
                                    $stmt = $pdo->query($query);

                                    // Verifica si hay resultados
                                    if ($stmt->rowCount() > 0) {
                                        // Itera sobre cada fila de resultados
                                        foreach ($stmt as $row) {
                                            echo "<tr>";
                                            echo "<th class='text-center align-middle' scope='row'>" . htmlspecialchars($row['id']) . "</th>";
                                            echo "<td class='text-center align-middle'>" . htmlspecialchars($row['name']) . "</td>";
                                            echo "<td class='text-center align-middle'>" . htmlspecialchars($row['names'] . ' ' . $row['firstLastName']) . "</td>";
                                            echo "<td class='text-center align-middle'>" . htmlspecialchars($row['email']) . "</td>";
                                            echo "<td class='text-center align-middle'>" . htmlspecialchars($row['role']) . "</td>";
                                            echo "<td class='text-center align-middle'>
                                                    <div class='d-flex justify-content-center'>
                                                        <button type='button' class='btn btnUpdate' data-bs-toggle='modal' data-bs-target='#updateModal" . htmlspecialchars($row['id']) . "'>
                                                            <i class='bi bi-pencil-square'></i>
                                                        </button>
                                                        <a href='delete.php?id=" . htmlspecialchars($row['id']) . "' class='btn btnDelete'>
                                                            <i class='bi bi-trash'></i>
                                                        </a>
                                                    </div>
                                                </td>";
                                            echo "</tr>";

                                            // Modal para cada usuario
                                            echo '<div class="modal fade" id="updateModal' . htmlspecialchars($row['id']) . '" tabindex="-1" aria-labelledby="updateModalLabel' . htmlspecialchars($row['id']) . '" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="updateModalLabel' . htmlspecialchars($row['id']) . '">Actualizar Usuario</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="update.php" method="POST">
                                                                <input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '">
                                                                
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <div class="input-group">
                                                                                <span class="input-group-text">Usuario</span>
                                                                                <input type="text" class="form-control" id="name" name="name" value="' . htmlspecialchars($row['name']) . '" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <div class="input-group">
                                                                                <span class="input-group-text">CI</span>
                                                                                <input type="text" class="form-control" id="ci" name="ci" value="' . htmlspecialchars($row['ci']) . '" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <div class="input-group">
                                                                                <span class="input-group-text">Nombres</span>
                                                                                <input type="text" class="form-control" id="names" name="names" value="' . htmlspecialchars($row['names']) . '" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <div class="input-group">
                                                                                <span class="input-group-text">Primer Apellido</span>
                                                                                <input type="text" class="form-control" id="firstLastName" name="firstLastName" value="' . htmlspecialchars($row['firstLastName']) . '" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <div class="input-group">
                                                                                <span class="input-group-text">Segundo Apellido</span>
                                                                                <input type="text" class="form-control" id="secondLastName" name="secondLastName" value="' . htmlspecialchars($row['secondLastName']) . '">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <div class="input-group">
                                                                                <span class="input-group-text">Email</span>
                                                                                <input type="email" class="form-control" id="email" name="email" value="' . htmlspecialchars($row['email']) . '" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <div class="input-group">
                                                                                <span class="input-group-text">Género</span>
                                                                                <select class="form-select" id="gender" name="gender" required>
                                                                                    <option value="M"' . ($row['gender'] == 'M' ? ' selected' : '') . '>Masculino</option>
                                                                                    <option value="F"' . ($row['gender'] == 'F' ? ' selected' : '') . '>Femenino</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <div class="input-group">
                                                                                <span class="input-group-text">Fecha Nacimiento</span>
                                                                                <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" value="' . date('Y-m-d', strtotime($row['dateOfBirth'])) . '" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <div class="input-group">
                                                                                <span class="input-group-text">Estado Civil</span>
                                                                                <select class="form-select" id="maritalStatus" name="maritalStatus" required>
                                                                                    <option value="Soltero"' . ($row['maritalStatus'] == 'Soltero' ? ' selected' : '') . '>Soltero</option>
                                                                                    <option value="Casado"' . ($row['maritalStatus'] == 'Casado' ? ' selected' : '') . '>Casado</option>
                                                                                    <option value="Divorciado"' . ($row['maritalStatus'] == 'Divorciado' ? ' selected' : '') . '>Divorciado</option>
                                                                                    <option value="Viudo"' . ($row['maritalStatus'] == 'Viudo' ? ' selected' : '') . '>Viudo</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <div class="input-group">
                                                                                <span class="input-group-text">Rol</span>
                                                                                <select class="form-select" id="role" name="role" required>
                                                                                    <option value="Administrador"' . ($row['role'] == 'Administrador' ? ' selected' : '') . '>Administrador</option>
                                                                                    <option value="Vendedor"' . ($row['role'] == 'Vendedor' ? ' selected' : '') . '>Vendedor</option>
                                                                                    <option value="Cajero"' . ($row['role'] == 'Cajero' ? ' selected' : '') . '>Cajero</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="mb-3">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">Dirección</span>
                                                                        <textarea class="form-control" id="address" name="address" required>' . htmlspecialchars($row['address']) . '</textarea>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="mb-3">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">Nueva Contraseña</span>
                                                                        <input type="password" class="form-control" id="password" name="password" placeholder="Dejar vacío para mantener actual">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="modal-footer">
                                                                    <button class="btnInsert" type="submit">Guardar</button>
                                                                    <button class="btnInsert" type="button" data-bs-dismiss="modal">Cancelar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';
                                        }
                                    } else {
                                        echo "<tr><td colspan='6' class='text-center'>No hay usuarios disponibles</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-body-secondary">
                        1 - 20 de 100 resultados
                    </div>
                </div>
            </div>

            <!-- Modal para Insertar Usuario -->
            <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="insertModalLabel">Agregar Nuevo Usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="insert.php" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text">Usuario</span>
                                                <input type="text" class="form-control" id="name" name="name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text">CI</span>
                                                <input type="text" class="form-control" id="ci" name="ci" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text">Nombres</span>
                                                <input type="text" class="form-control" id="names" name="names" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text">Primer Apellido</span>
                                                <input type="text" class="form-control" id="firstLastName" name="firstLastName" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text">Segundo Apellido</span>
                                                <input type="text" class="form-control" id="secondLastName" name="secondLastName">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text">Email</span>
                                                <input type="email" class="form-control" id="email" name="email" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text">Género</span>
                                                <select class="form-select" id="gender" name="gender" required>
                                                    <option value="">Seleccione género</option>
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Femenino</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text">Fecha Nacimiento</span>
                                                <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text">Estado Civil</span>
                                                <select class="form-select" id="maritalStatus" name="maritalStatus" required>
                                                    <option value="">Seleccione estado civil</option>
                                                    <option value="Soltero">Soltero</option>
                                                    <option value="Casado">Casado</option>
                                                    <option value="Divorciado">Divorciado</option>
                                                    <option value="Viudo">Viudo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text">Rol</span>
                                                <select class="form-select" id="role" name="role" required>
                                                    <option value="">Seleccione rol</option>
                                                    <option value="Administrador">Administrador</option>
                                                    <option value="Vendedor">Vendedor</option>
                                                    <option value="Cajero">Cajero</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text">Dirección</span>
                                        <textarea class="form-control" id="address" name="address" required></textarea>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text">Contraseña</span>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
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
        <script src="../../js/validations.js"></script>
    </body>
</html>
