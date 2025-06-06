<?php
    include '../../connection/bd.php';

    $name = $_POST['name'];
    $code = $_POST['code'];
    $measureUnit = $_POST['measureUnit'];
    $salePrice = $_POST['salePrice'];
    $costPrice = $_POST['costPrice'];
    $stock = $_POST['stock'];
    $userID = 1; // Asignar un valor fijo para userID, puedes cambiarlo según tu lógica
    $categoryID = $_POST['categoryID'];
    $brandID = $_POST['brandID'];

    // Validar la imagen
    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['img']['tmp_name'];
        $fileName = $_FILES['img']['name'];
        $fileSize = $_FILES['img']['size'];
        $fileType = $_FILES['img']['type'];

        // Extensiones permitidas
        $allowedExtensions = ['png', 'jpeg', 'jpg'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (in_array($fileExtension, $allowedExtensions)) {
            // Limitar el tamaño de la imagen (por ejemplo, 2MB)
            if ($fileSize <= 2 * 1024 * 1024) {
                // Leer el contenido del archivo
                $img = file_get_contents($fileTmpPath);

                try {
                    // Insertar en la base de datos
                    $query = "INSERT INTO product (code, name, measureUnit, stock, salePrice, costPrice, img, userID, categoryID, brandID) VALUES (:code, :name, :measureUnit, :stock, :salePrice, :costPrice, :img, :userID, :categoryID, :brandID)";
                    $stmt = $pdo->prepare($query);
                    
                    // Vincular todos los parámetros
                    $stmt->bindParam(':code', $code);
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':measureUnit', $measureUnit);
                    $stmt->bindParam(':stock', $stock);
                    $stmt->bindParam(':salePrice', $salePrice);
                    $stmt->bindParam(':costPrice', $costPrice);
                    $stmt->bindParam(':img', $img, PDO::PARAM_LOB);
                    $stmt->bindParam(':userID', $userID);
                    $stmt->bindParam(':categoryID', $categoryID);
                    $stmt->bindParam(':brandID', $brandID);

                    if ($stmt->execute()) {
                        header("Location: select.php?message=Producto insertado correctamente");
                        exit;
                    } else {
                        echo "Error al insertar el registro.";
                    }
                } catch (PDOException $e) {
                    echo "Error en la base de datos: " . $e->getMessage();
                }
            } else {
                echo "El tamaño de la imagen excede el límite permitido (2MB).";
            }
        } else {
            echo "Formato de imagen no permitido. Solo se aceptan .png, .jpeg, .jpg.";
        }
    } else {
        echo "Error al subir la imagen.";
    }
?>