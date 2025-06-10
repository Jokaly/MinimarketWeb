<?php
    include '../../connection/bd.php';

    // Obtener los datos del formulario
    $name = $_POST['name'];
    $isPerishable = $_POST['isPerishable'];
    $description = $_POST['description'] ?? null; // Permitir que sea opcional
    $userID = 1; // Asignar un valor fijo para userID, puedes cambiarlo según tu lógica

    try {
        // Insertar en la base de datos
        $query = "INSERT INTO category (name, isPerishable, description, userID, registerDate) VALUES (:name, :isPerishable, :description, :userID, NOW())";
        $stmt = $pdo->prepare($query);
        
        // Vincular todos los parámetros
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':isPerishable', $isPerishable);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':userID', $userID);

        if ($stmt->execute()) {
            header("Location: select.php?message=Categoría insertada correctamente");
            exit;
        } else {
            echo "Error al insertar el registro.";
        }
    } catch (PDOException $e) {
        echo "Error en la base de datos: " . $e->getMessage();
    }
?>