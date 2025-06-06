<?php
    include '../../connection/bd.php'; // Asegúrate de que 'bd.php' configure correctamente la conexión PDO

    // Obtener el ID del producto a actualizar
    $id = $_POST['id'];
    
    // Obtener los demás datos del formulario
    $name = $_POST['name'];
    $code = $_POST['code'];
    $measureUnit = $_POST['measureUnit'];
    $salePrice = $_POST['salePrice'];
    $costPrice = $_POST['costPrice'];
    $stock = $_POST['stock'];
    $userID = 1; // Asignar un valor fijo para userID, puedes cambiarlo según tu lógica
    $categoryID = $_POST['categoryID'];
    $brandID = $_POST['brandID'];

    try {
        // Iniciar la consulta base
        $query = "UPDATE product SET 
                    code = :code,
                    name = :name,
                    measureUnit = :measureUnit,
                    stock = :stock,
                    salePrice = :salePrice,
                    costPrice = :costPrice,
                    userID = :userID,
                    categoryID = :categoryID,
                    brandID = :brandID";

        // Si se subió una nueva imagen, agregarla a la actualización
        if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['img']['tmp_name'];
            $fileName = $_FILES['img']['name'];
            $fileSize = $_FILES['img']['size'];
            $fileType = $_FILES['img']['type'];

            // Extensiones permitidas
            $allowedExtensions = ['png', 'jpeg', 'jpg'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            if (in_array($fileExtension, $allowedExtensions)) {
                if ($fileSize <= 2 * 1024 * 1024) { // 2MB máximo
                    $img = file_get_contents($fileTmpPath);
                    $query .= ", img = :img";
                } else {
                    die("El tamaño de la imagen excede el límite permitido (2MB).");
                }
            } else {
                die("Formato de imagen no permitido. Solo se aceptan .png, .jpeg, .jpg.");
            }
        }

        // Completar la consulta con la condición WHERE
        $query .= " WHERE id = :id";

        // Preparar y ejecutar la consulta
        $stmt = $pdo->prepare($query);
        
        // Vincular los parámetros básicos
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':measureUnit', $measureUnit);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':salePrice', $salePrice);
        $stmt->bindParam(':costPrice', $costPrice);
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':categoryID', $categoryID);
        $stmt->bindParam(':brandID', $brandID);

        // Si hay imagen nueva, vincular el parámetro
        if (isset($img)) {
            $stmt->bindParam(':img', $img, PDO::PARAM_LOB);
        }

        // Ejecutar la actualización
        if ($stmt->execute()) {
            header("Location: select.php?message=Producto actualizado correctamente");
            exit;
        } else {
            echo "Error al actualizar el registro.";
        }
    } catch (PDOException $e) {
        echo "Error en la base de datos: " . $e->getMessage();
    }
?>
