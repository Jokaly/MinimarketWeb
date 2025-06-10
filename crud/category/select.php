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
        <title>Categorías</title>
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
                        <a class="navbar-brand" href="#">
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
                                        <li><a class="dropdown-item" href="../category/select.php">Categorías</a></li>
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
                                    <a class="nav-link" href="#">Usuarios</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Reportes</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Profile Section -->
                    <div class="navbar-section">
                        <div class="d-flex align-items-center justify-content-end">
                            <h1 id="username">Username</h1>
                            <img id="imgProfile" src="../../img/bombombum.jpg" alt="Profile">
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
                                    <i class="bi bi-plus-circle me-2"></i>Agregar Categoría
                                </button>
                            </div>
                            <div class="col-6">
                                <form class="d-flex" role="search">
                                    <div class="input-group">
                                        <input class="form-control" type="search" placeholder="Buscar productos" aria-label="Search"/>
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
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Expirable</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include '../../connection/bd.php';
                                    // Conexión a la base de datos
                                    $query = "SELECT * FROM category WHERE status = 1";
                                    $stmt = $pdo->query($query);

                                    // Verifica si hay resultados
                                    if ($stmt->rowCount() > 0) {
                                        // Itera sobre cada fila de resultados
                                        foreach ($stmt as $row) {
                                            echo "<tr>";
                                            echo "<th class='text-center align-middle' scope='row'>" . htmlspecialchars($row['id']) . "</th>";
                                            echo "<td class='text-center align-middle'>" . htmlspecialchars($row['name']) . "</td>";
                                            echo "<td class='text-center align-middle'>" . htmlspecialchars($row['isPerishable']) . "</td>";
                                            echo "<td class='text-center align-middle'>" . htmlspecialchars($row['description']) . "</td>";
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

                                            // Modal para cada categoría
                                            echo '<div class="modal fade" id="updateModal' . htmlspecialchars($row['id']) . '" tabindex="-1" aria-labelledby="updateModalLabel' . htmlspecialchars($row['id']) . '" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="updateModalLabel' . htmlspecialchars($row['id']) . '">Actualizar Categoría</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="update.php" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '">
                                                                
                                                                <div class="mb-3">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">Nombre</span>
                                                                        <input type="text" class="form-control" id="name" name="name" value="' . htmlspecialchars($row['name']) . '" required>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">Expirable</span>
                                                                        <select class="form-select" id="isPerishable" name="isPerishable" required>
                                                                            <option value="SI"' . ($row['isPerishable'] == 'SI' ? ' selected' : '') . '>SI</option>
                                                                            <option value="NO"' . ($row['isPerishable'] == 'NO' ? ' selected' : '') . '>NO</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">Descripción</span>
                                                                        <textarea class="form-control" id="description" name="description">' . htmlspecialchars($row['description']) . '</textarea>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="modal-footer">
                                                                    <button class="btnInsert" type="submit" data-bs-toggle="modal">Guardar</button>
                                                                    <button class="btnInsert" type="button" data-bs-dismiss="modal">Cancelar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';
                                        }
                                    } else {
                                        echo "<tr><td colspan='7' class='text-center'>No hay productos disponibles</td></tr>";
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

            <!-- Modal para Insertar Producto -->
            <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="insertModalLabel">Agregar Nueva Categoría</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="insert.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text">Nombre</span>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text">Expirable</span>
                                        <select class="form-select" id="isPerishable" name="isPerishable" required>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text">Descripción</span>
                                        <textarea class="form-control" id="description" name="description"></textarea>
                                    </div>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>

                                    <!-- <button class="btnInsert" type="submit" data-bs-toggle="modal" data-bs-target="#insertModal">Guardar</button>
                                    <button class="btnInsert" type="button" data-bs-dismiss="modal">Cancelar</button> -->
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

