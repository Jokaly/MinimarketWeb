<?php
    include '../../connection/bd.php';

    // Obtener los datos del formulario
    $name = $_POST['name'];
    $description = $_POST['description'] ?? null; // Permitir que sea opcional
    $userID = 1; // Asignar un valor fijo para userID, puedes cambiarlo según tu lógica

    // Validar el logo
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['logo']['tmp_name'];
        $fileName = $_FILES['logo']['name'];
        $fileSize = $_FILES['logo']['size'];
        $fileType = $_FILES['logo']['type'];

        // Extensiones permitidas
        $allowedExtensions = ['png', 'jpeg', 'jpg'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (in_array($fileExtension, $allowedExtensions)) {
            // Limitar el tamaño de la imagen (por ejemplo, 2MB)
            if ($fileSize <= 2 * 1024 * 1024) {
                // Leer el contenido del archivo
                $logo = file_get_contents($fileTmpPath);

                try {
                    // Insertar en la base de datos
                    $query = "INSERT INTO brand (name, logo, description, userID, registerDate) VALUES (:name, :logo, :description, :userID, NOW())";
                    $stmt = $pdo->prepare($query);
                    
                    // Vincular todos los parámetros
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':logo', $logo, PDO::PARAM_LOB);
                    $stmt->bindParam(':description', $description);
                    $stmt->bindParam(':userID', $userID);

                    if ($stmt->execute()) {
                        header("Location: select.php?message=Marca insertada correctamente");
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
        echo "Error al subir la imagen del logo.";
    }
?>