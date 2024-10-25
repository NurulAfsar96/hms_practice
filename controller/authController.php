<!-- controller/authController.php -->
<?php
session_start();


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // শুধু ইমেইল এবং পাসওয়ার্ড মেলানো দেখানো হচ্ছে
    // বাস্তবে ডাটাবেস থেকে ডেটা রিট্রিভ করতে হবে।
    if ($email == "admin@example.com" && $password == "admin123") {
        $_SESSION['user_type'] = "admin";
        header("Location: ../view/dashboard/admin_dashboard.php");
    } elseif ($email == "doctor@example.com" && $password == "doctor123") {
        $_SESSION['user_type'] = "doctor";
        header("Location: ../view/dashboard/doctor_dashboard.php");
    } elseif ($email == "receptionist@example.com" && $password == "receptionist123") {
        $_SESSION['user_type'] = "receptionist";
        header("Location: ../view/dashboard/receptionist_dashboard.php");
    } elseif ($email == "patient@example.com" && $password == "patient123") {
        $_SESSION['user_type'] = "patient";
        header("Location: ../view/dashboard/patient_dashboard.php");
    } else {
        echo "Invalid credentials!";
    }
}
?>
