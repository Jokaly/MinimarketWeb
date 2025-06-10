<?php
    include '../../connection/bd.php'; // Asegúrate de que 'bd.php' configure correctamente la conexión PDO

    // Obtener el ID de la categoría a actualizar
    $id = $_POST['id'];
    
    // Obtener los demás datos del formulario
    $name = $_POST['name'];
    $isPerishable = $_POST['isPerishable'];
    $description = $_POST['description'] ?? null; // Permitir que sea opcional
    $userID = 1; // Asignar un valor fijo para userID, puedes cambiarlo según tu lógica

    try {
        // Consulta para actualizar la categoría
        $query = "UPDATE category SET 
                    name = :name,
                    isPerishable = :isPerishable,
                    description = :description,
                    userID = :userID,
                    lastUpdate = NOW()
                  WHERE id = :id";

        // Preparar y ejecutar la consulta
        $stmt = $pdo->prepare($query);
        
        // Vincular los parámetros
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':isPerishable', $isPerishable);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':userID', $userID);

        // Ejecutar la actualización
        if ($stmt->execute()) {
            header("Location: select.php?message=Categoría actualizada correctamente");
            exit;
        } else {
            echo "Error al actualizar el registro.";
        }
    } catch (PDOException $e) {
        echo "Error en la base de datos: " . $e->getMessage();
    }
?>
