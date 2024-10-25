<!-- view/auth/login.php -->
<?php
include('../../model/database/db.php'); // Database connection
include('../partials/header.php'); // Header file
include('../../controller/authController.php'); // Auth controller

$authController = new AuthController($conn);
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $message = $authController->login($email, $password);
}

$conn->close();
?>

<link rel="stylesheet" href="../../assets/css/login.css">

<div class="form-container">
    <h2>Login</h2>
    <form action="" method="POST">
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit" name="login">Login</button>
    </form>
    <?php if ($message): ?>
        <p style="color: red; text-align: center;"><?php echo $message; ?></p>
    <?php endif; ?>
    <div class="register-link">
        <span>New User?</span>
        <a href="register.php">Register here</a>
    </div>
</div>

<?php include('../partials/footer.php'); ?>
