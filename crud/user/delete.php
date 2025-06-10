<?php
    include '../../connection/bd.php'; // Asegúrate de que 'db.php' configure correctamente la conexión PDO

    $id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("UPDATE user SET status = 0 WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: select.php?message=Producto eliminado correctamente");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>