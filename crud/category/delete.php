<?php
    include '../../connection/bd.php'; // Asegúrate de que 'bd.php' configure correctamente la conexión PDO

    $id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("UPDATE category SET status = 0 WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: select.php?message=Categoría eliminada correctamente");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>