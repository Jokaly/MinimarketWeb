<?php
    include '../../connection/bd.php';

    // Obtener los datos del formulario
    $name = $_POST['name'];
    $password = $_POST['password'];
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
    $currentUserID = 1; // ID del usuario que está creando el registro, puedes cambiarlo según tu lógica

    try {
        // Hashear la contraseña
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Insertar en la base de datos
        $query = "INSERT INTO user (name, password, role, ci, names, firstLastName, secondLastName, email, gender, dateOfBirth, maritalStatus, address, userID, registerDate) 
                  VALUES (:name, :password, :role, :ci, :names, :firstLastName, :secondLastName, :email, :gender, :dateOfBirth, :maritalStatus, :address, :userID, NOW())";
        
        $stmt = $pdo->prepare($query);
        
        // Vincular todos los parámetros
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':password', $hashedPassword);
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

        if ($stmt->execute()) {
            header("Location: select.php?message=Usuario insertado correctamente");
            exit;
        } else {
            echo "Error al insertar el registro.";
        }
    } catch (PDOException $e) {
        echo "Error en la base de datos: " . $e->getMessage();
    }
?>