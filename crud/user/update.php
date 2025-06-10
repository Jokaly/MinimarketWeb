<?php
    include '../../connection/bd.php'; // Asegúrate de que 'bd.php' configure correctamente la conexión PDO

    // Obtener el ID del usuario a actualizar
    $id = $_POST['id'];
    
    // Obtener los demás datos del formulario
    $name = $_POST['name'];
    $role = $_POST['role'];
    $ci = $_POST['ci'];
    $names = $_POST['names'];
    $firstLastName = $_POST['firstLastName'];
    $secondLastName = $_POST['secondLastName'] ?? null; // Permitir que sea opcional
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $maritalStatus = $_POST['maritalStatus'];
    $address = $_POST['address'];
    $password = $_POST['password'] ?? ''; // Contraseña opcional
    $currentUserID = 1; // ID del usuario que está realizando la actualización

    try {
        // Iniciar la consulta base
        $query = "UPDATE user SET 
                    name = :name,
                    role = :role,
                    ci = :ci,
                    names = :names,
                    firstLastName = :firstLastName,
                    secondLastName = :secondLastName,
                    email = :email,
                    gender = :gender,
                    dateOfBirth = :dateOfBirth,
                    maritalStatus = :maritalStatus,
                    address = :address,
                    userID = :userID,
                    lastUpdate = NOW()";

        // Si se proporcionó una nueva contraseña, agregarla a la actualización
        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query .= ", password = :password";
        }

        // Completar la consulta con la condición WHERE
        $query .= " WHERE id = :id";

        // Preparar y ejecutar la consulta
        $stmt = $pdo->prepare($query);
        
        // Vincular los parámetros básicos
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':ci', $ci);
        $stmt->bindParam(':names', $names);
        $stmt->bindParam(':firstLastName', $firstLastName);
        $stmt->bindParam(':secondLastName', $secondLastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':dateOfBirth', $dateOfBirth);
        $stmt->bindParam(':maritalStatus', $maritalStatus);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':userID', $currentUserID);

        // Si hay contraseña nueva, vincular el parámetro
        if (!empty($password)) {
            $stmt->bindParam(':password', $hashedPassword);
        }

        // Ejecutar la actualización
        if ($stmt->execute()) {
            header("Location: select.php?message=Usuario actualizado correctamente");
            exit;
        } else {
            echo "Error al actualizar el registro.";
        }
    } catch (PDOException $e) {
        echo "Error en la base de datos: " . $e->getMessage();
    }
?>
