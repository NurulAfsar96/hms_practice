<!-- view/auth/register.php -->
<?php include('../partials/header.php'); ?>

<h2>Register</h2>
<form action="../../controller/authController.php" method="POST">
    <!-- First Name -->
    <input type="text" name="first_name" placeholder="Enter First Name" required><br>
    
    <!-- Last Name -->
    <input type="text" name="last_name" placeholder="Enter Last Name" required><br>
    
    <!-- Email -->
    <input type="email" name="email" placeholder="Enter Email" required><br>
    
    <!-- Password -->
    <input type="password" name="password" placeholder="Enter Password" required><br>
    
    <!-- Confirm Password -->
    <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
    
    <!-- User Type -->
    <label for="user_type">Register As:</label>
    <select name="user_type" required>
        <option value="admin">Admin</option>
        <option value="doctor">Doctor</option>
        <option value="receptionist">Receptionist</option>
        <option value="patient">Patient</option>
    </select><br><br>

    <!-- Submit Button -->
    <button type="submit" name="register">Register</button><br>
</form>

<!-- Login Page Link as a Button -->
<p>Already have an account?</p>
<a href="login.php" class="login-btn">Go to Login</a>

<?php include('../partials/footer.php'); ?>
