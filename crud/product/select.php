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
        <title>Productos</title>
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
                                        <li><a class="dropdown-item" href="#">Ver Productos</a></li>
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
                                    <i class="bi bi-plus-circle me-2"></i>Agregar Producto
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
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Unidad Medida</th>
                                    <th scope="col">Precio Venta</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <th class="text-center align-middle" scope="row">1</th>
                                    <td class="d-flex justify-content-center align-middle"><img class="image-profile" src="../../img/bombombum.jpg" alt=""></td>
                                    <td class="text-center align-middle">Leche Pil</td>
                                    <td class="text-center align-middle">MILILITRO</td>
                                    <td class="text-center align-middle">12</td>
                                    <td class="text-center align-middle">10</td>
                                    <td class="text-center align-middle">
                                        <div class="d-flex justify-content-center">
                                            <a href="update.php?id" class="btn btnUpdate">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="update.php?id" class="btn btnUpdate">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="delete.php?id" class="btn btnDelete">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr> -->
                                <?php
                                    include '../../connection/bd.php';
                                    // Conexión a la base de datos
                                    $query = "SELECT * FROM product WHERE status = 1";
                                    $stmt = $pdo->query($query);

                                    // Verifica si hay resultados
                                    if ($stmt->rowCount() > 0) {
                                        // Itera sobre cada fila de resultados
                                        foreach ($stmt as $row) {
                                            echo "<tr>";
                                            echo "<th class='text-center align-middle' scope='row'>" . htmlspecialchars($row['id']) . "</th>";
                                            echo "<td class='d-flex justify-content-center'><img class='image-profile rounded' src='data:image/jpeg;base64," . base64_encode($row['img']) . "' alt=''></td>";
                                            echo "<td class='text-center align-middle'>" . htmlspecialchars($row['name']) . "</td>";
                                            echo "<td class='text-center align-middle'>" . htmlspecialchars($row['measureUnit']) . "</td>";
                                            echo "<td class='text-center align-middle'>" . htmlspecialchars($row['salePrice']) . "</td>";
                                            echo "<td class='text-center align-middle'>" . htmlspecialchars($row['stock']) . "</td>";
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
                                            
                                            // Obtener categorías antes del bucle de productos
                                            if (!isset($categorias)) {
                                                $stmtCat = $pdo->prepare("SELECT id, name FROM category WHERE status = 1");
                                                $stmtCat->execute();
                                                $categorias = $stmtCat->fetchAll(PDO::FETCH_ASSOC);
                                            }

                                            // Obtener marcas antes del bucle de productos
                                            if (!isset($brands)) {
                                                $stmtBrand = $pdo->prepare("SELECT id, name FROM brand WHERE status = 1");
                                                $stmtBrand->execute();
                                                $brands = $stmtBrand->fetchAll(PDO::FETCH_ASSOC);
                                            }

                                            // Modal para cada producto
                                            echo '<div class="modal fade" id="updateModal' . htmlspecialchars($row['id']) . '" tabindex="-1" aria-labelledby="updateModalLabel' . htmlspecialchars($row['id']) . '" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="updateModalLabel' . htmlspecialchars($row['id']) . '">Actualizar Producto</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="update.php" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '">
                                                                
                                                                <img class="image-product" src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" alt="">
                                                                
                                                                <div class="mb-3">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">Nombre</span>
                                                                        <input type="text" class="form-control" id="name" name="name" value="' . htmlspecialchars($row['name']) . '" required>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">Código</span>
                                                                        <input type="text" class="form-control" id="code" name="code" value="' . htmlspecialchars($row['code']) . '" required>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">Unidad de Medida</span>
                                                                        <select class="form-select" id="measureUnit" name="measureUnit" required>
                                                                            <option value="GRAMO"' . ($row['measureUnit'] == 'GRAMO' ? ' selected' : '') . '>GRAMO</option>
                                                                            <option value="KILOGRAMO"' . ($row['measureUnit'] == 'KILOGRAMO' ? ' selected' : '') . '>KILOGRAMO</option>
                                                                            <option value="UNIDAD"' . ($row['measureUnit'] == 'UNIDAD' ? ' selected' : '') . '>UNIDAD</option>
                                                                            <option value="MILILITRO"' . ($row['measureUnit'] == 'MILILITRO' ? ' selected' : '') . '>MILILITRO</option>
                                                                            <option value="LITRO"' . ($row['measureUnit'] == 'LITRO' ? ' selected' : '') . '>LITRO</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">Precio de Venta</span>
                                                                        <input type="number" class="form-control" id="salePrice" name="salePrice" value="' . htmlspecialchars($row['salePrice']) . '" required>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">Precio de Compra</span>
                                                                        <input type="number" class="form-control" id="costPrice" name="costPrice" value="' . htmlspecialchars($row['costPrice']) . '" required>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">Cantidad</span>
                                                                        <input type="number" class="form-control" id="stock" name="stock" value="' . htmlspecialchars($row['stock']) . '" required>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">Imagen</span>
                                                                        <input type="file" class="form-control" id="img" name="img">
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">Categoría</span>
                                                                        <select class="form-select" id="categoryID" name="categoryID" required>
                                                                            <option value="">Seleccione una categoría</option>';
                                                                            foreach ($categorias as $cat) {
                                                                                $selected = $cat['id'] == $row['categoryID'] ? 'selected' : '';
                                                                                echo '<option value="' . $cat['id'] . '" ' . $selected . '>' . htmlspecialchars($cat['name']) . '</option>';
                                                                            } echo
                                                                        '</select>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">Marca</span>
                                                                        <select class="form-select" id="brandID" name="brandID" required>
                                                                            <option value="">Seleccione una marca</option>';
                                                                            foreach ($brands as $brand) {
                                                                                $selected = $brand['id'] == $row['brandID'] ? 'selected' : '';
                                                                                echo '<option value="' . $brand['id'] . '" ' . $selected . '>' . htmlspecialchars($brand['name']) . '</option>';
                                                                            } echo
                                                                        '</select>
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
                            <h5 class="modal-title" id="insertModalLabel">Agregar Nuevo Producto</h5>
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
                                        <span class="input-group-text">Código</span>
                                        <input type="text" class="form-control" id="code" name="code" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text">Unidad de Medida</span>
                                        <select class="form-select" id="measureUnit" name="measureUnit" required>
                                            <option value="">Seleccione una unidad</option>
                                            <option value="GRAMO">GRAMO</option>
                                            <option value="KILOGRAMO">KILOGRAMO</option>
                                            <option value="UNIDAD">UNIDAD</option>
                                            <option value="MILILITRO">MILILITRO</option>
                                            <option value="LITRO">LITRO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text">Precio de Venta</span>
                                        <input type="number" class="form-control" id="salePrice" name="salePrice" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text">Precio de Compra</span>
                                        <input type="number" class="form-control" id="costPrice" name="costPrice" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text">Cantidad</span>
                                        <input type="number" class="form-control" id="stock" name="stock" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text">Imagen</span>
                                        <input type="file" class="form-control" id="img" name="img" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text">Categoría</span>
                                        <select class="form-select" id="categoryID" name="categoryID" required>
                                            <option value="">Seleccione una categoría</option>
                                            <?php
                                            $stmtCat = $pdo->prepare("SELECT id, name FROM category WHERE status = 1");
                                            $stmtCat->execute();
                                            while($cat = $stmtCat->fetch()) {
                                                echo '<option value="' . htmlspecialchars($cat['id']) . '">' . htmlspecialchars($cat['name']) . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="input-group">
                                        <span class="input-group-text">Marca</span>
                                        <select class="form-select" id="brandID" name="brandID" required>
                                            <option value="">Seleccione una marca</option>
                                            <?php
                                            $stmtBrand = $pdo->prepare("SELECT id, name FROM brand WHERE status = 1");
                                            $stmtBrand->execute();
                                            while($brand = $stmtBrand->fetch()) {
                                                echo '<option value="' . htmlspecialchars($brand['id']) . '">' . htmlspecialchars($brand['name']) . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="modal-footer">            
                                    <button class="btnInsert" type="submit" data-bs-toggle="modal" data-bs-target="#insertModal">Guardar</button>
                                    <button class="btnInsert" type="button" data-bs-dismiss="modal">Cancelar</button>
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

