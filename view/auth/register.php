<!-- view/auth/register.php -->
<?php
include('../../model/database/db.php'); // Database connection
include('../partials/header.php'); // Header file
include('../../controller/authController.php'); // Auth controller

$authController = new AuthController($conn);
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    $message = $authController->register($first_name, $last_name, $email, $password, $user_type);
}

$conn->close();
?>

<link rel="stylesheet" href="../../assets/css/register.css">

<div class="form-container">
    <h2>Register</h2>
    <form action="" method="POST">
        <input type="text" name="first_name" placeholder="Enter First Name" required>
        <input type="text" name="last_name" placeholder="Enter Last Name" required>
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        
        <label for="user_type">Register As:</label>
        <select name="user_type" required>
            <option value="admin">Admin</option>
            <option value="doctor">Doctor</option>
            <option value="receptionist">Receptionist</option>
            <option value="patient">Patient</option>
        </select>
        
        <button type="submit" name="register">Register</button>
    </form>
    <?php if ($message): ?>
        <p style="color: red; text-align: center;"><?php echo $message; ?></p>
    <?php endif; ?>
    <div class="register-link">
        <span>Already have an account?</span>
        <a href="login.php">Login here</a>
    </div>
</div>

<?php include('../partials/footer.php'); ?>
