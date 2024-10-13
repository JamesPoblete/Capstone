<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'dbconnection.php';  // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $usertype = $_POST['usertype']; // Capture user type
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    // Validate that passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.'); window.history.back();</script>";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Connect to the database
    $pdo = connectDB();

    // Check if the username already exists
    $checkSql = "SELECT * FROM account WHERE user_name = :username";
    $checkStmt = $pdo->prepare($checkSql);
    $checkStmt->execute([':username' => $username]);

    if ($checkStmt->rowCount() > 0) {
        echo "<script>alert('Username already exists.'); window.history.back();</script>";
        exit();
    }

    // Insert the new user
    $sql = "INSERT INTO account (user_name, user_pass, name, user_type) VALUES (:username, :password, :name, :usertype)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ':username' => $username,
            ':password' => $hashed_password,
            ':name' => $name,
            ':usertype' => $usertype // Include user type in the insert
        ]);

        // Display success message using SweetAlert
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
                Swal.fire({
                  title: 'Create Account Successfully',
                  icon: 'success',
                  confirmButtonText: 'OK',
                  confirmButtonColor: '#3085d6',
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = 'login.html'; // Redirect to login page
                  }
                });
              </script>";
    } catch (PDOException $e) {
        // Handle any errors that occur during the execution
        echo "<script>alert('Error: " . addslashes($e->getMessage()) . "');</script>";
    }
}
?>
