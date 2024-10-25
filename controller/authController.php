<?php
// controller/authController.php

include '../../model/database/db.php';

session_start();

class AuthController {
    private $conn;

    public function register($first_name, $last_name, $email, $password, $user_type) {
    // Check if email already exists
    $checkEmail = $this->conn->prepare("SELECT email FROM users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $checkEmail->store_result();

    if ($checkEmail->num_rows > 0) {
        $checkEmail->close(); // Close checkEmail if email already exists
        return "Email already exists. Please try another one.";
    } else {
        // Initialize $hashed_password here
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->conn->prepare("INSERT INTO users (first_name, last_name, email, password, user_type) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $first_name, $last_name, $email, $hashed_password, $user_type);

        if ($stmt->execute()) {
            $stmt->close(); // Close stmt after successful execution
            $checkEmail->close();
            return "Registration successful. You can now <a href='login.php'>login</a>.";
        } else {
            $error = "Error: " . $stmt->error; // Capture error message
            $stmt->close(); // Close stmt in case of error
            $checkEmail->close();
            return $error;
        }
    }
}


    public function __construct($db) {
        $this->conn = $db;
    }

    public function login($email, $password) {
    // Prepare the SQL statement
    $stmt = $this->conn->prepare("SELECT id, first_name, last_name, password, user_type FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    
    // Store result
    $stmt->store_result();
    $id=$first_name= $last_name= $hashed_password= $user_type=null;

    // Check if any rows were returned
    if ($stmt->num_rows > 0) {
        // Bind the result variables
        $stmt->bind_result($id, $first_name, $last_name, $hashed_password, $user_type);
        $stmt->fetch();

        // Check if hashed_password is not null and verify password
        if ($hashed_password && password_verify($password, $hashed_password)) {
            // Store session variables
            $_SESSION['user_id'] = $id;
            $_SESSION['user_type'] = $user_type;
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;

            // Close the statement before redirecting
            $stmt->close();

            // Redirect based on user type using concatenation
            header("Location: ../dashboard/" . $user_type . "_dashboard.php");
            exit();
        } else {
            $stmt->close(); // Close statement if password is invalid
            return "Invalid password. Please try again.";
        }
    } else {
        $stmt->close(); // Close statement if no account is found
        return "No account found with this email.";
    }
}


}
