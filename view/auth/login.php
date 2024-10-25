<!-- view/auth/login.php -->
<?php include('../partials/header.php'); ?>

<h2>Login</h2>
<form action="../controller/authController.php" method="POST">
    <input type="email" name="email" placeholder="Enter Email" required><br>
    <input type="password" name="password" placeholder="Enter Password" required><br><br>
    <button type="submit" name="login">Login</button><br>
    <p>New User? <a href="register.php">Register here</a></p>
</form>

<?php include('../partials/footer.php'); ?>
