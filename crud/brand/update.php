<?php
    include '../../connection/bd.php'; // Asegúrate de que 'bd.php' configure correctamente la conexión PDO

    // Obtener el ID de la marca a actualizar
    $id = $_POST['id'];
    
    // Obtener los demás datos del formulario
    $name = $_POST['name'];
    $description = $_POST['description'] ?? null; // Permitir que sea opcional
    $userID = 1; // Asignar un valor fijo para userID, puedes cambiarlo según tu lógica

    try {
        // Iniciar la consulta base
        $query = "UPDATE brand SET 
                    name = :name,
                    description = :description,
                    userID = :userID,
                    lastUpdate = NOW()";

        // Si se subió un nuevo logo, agregarlo a la actualización
        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['logo']['tmp_name'];
            $fileName = $_FILES['logo']['name'];
            $fileSize = $_FILES['logo']['size'];
            $fileType = $_FILES['logo']['type'];

            // Extensiones permitidas
            $allowedExtensions = ['png', 'jpeg', 'jpg'];
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            if (in_array($fileExtension, $allowedExtensions)) {
                if ($fileSize <= 2 * 1024 * 1024) { // 2MB máximo
                    $logo = file_get_contents($fileTmpPath);
                    $query .= ", logo = :logo";
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
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':userID', $userID);

        // Si hay logo nuevo, vincular el parámetro
        if (isset($logo)) {
            $stmt->bindParam(':logo', $logo, PDO::PARAM_LOB);
        }

        // Ejecutar la actualización
        if ($stmt->execute()) {
            header("Location: select.php?message=Marca actualizada correctamente");
            exit;
        } else {
            echo "Error al actualizar el registro.";
        }
    } catch (PDOException $e) {
        echo "Error en la base de datos: " . $e->getMessage();
    }
?>
