<?php
session_start(); // Start the session to store user login information

// Initialize a message variable for feedback
$message = '';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hardcoded username and password
    $stored_username = 'yelan';
    $stored_password = 'yelan';

    // Validate login
    if ($username === $stored_username && $password === $stored_password) {
        // Store user login info in session
        $_SESSION['loggedin_user'] = $username;

        // Redirect to temp.php
        header("Location: temp.php");
        exit(); // Ensure no further execution after redirect
    } else {
        $message = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Genshin Impact Artifacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <style>
    body {
        background-image: url('../temp/assets/img/sumeru.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        font-family: Inter;
        height: 100vh;
        margin: 0;
        overflow: hidden;
    }

    .container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 100vh;
        padding: 0 20px;
        animation: fadeIn 1s ease-in-out; /* Fade-in animation on entrance */
    }

    /* Card Styling with Transition */
    .card {
        width: 100%;
        max-width: 400px;
        background: rgba(255, 255, 255, 0.34);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(5.1px);
        -webkit-backdrop-filter: blur(5.1px);
        border: 1px solid rgba(255, 255, 255, 0.59);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        animation: fadeInUp 0.8s ease-in-out; /* Fade-in animation for cards */
    }

    .card:hover {
        transform: translateY(-10px); /* Lift the card slightly on hover */
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.2); /* Deepen shadow */
    }

    .header-image {
        max-width: 100%;
        height: auto;
        padding: 20px;
        animation: fadeInDown 1s ease-in-out; /* Fade-in from top for header image */
    }

    /* Form Fields */
    .form-control {
        border-radius: 10px;
        transition: box-shadow 0.3s ease, border-color 0.3s ease;
        animation: fadeIn 1s ease-in-out; /* Fade-in animation for form fields */
    }

    .form-control:focus {
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.5); /* Blue glow on focus */
        border-color: #007bff; /* Border color changes on focus */
    }

    /* Button with Transition */
    .btn-primary {
        background-color: #007bff;
        border: none;
        transition: background-color 0.3s ease, transform 0.3s ease;
        animation: fadeIn 1s ease-in-out; /* Fade-in for buttons */
    }

    .btn-primary:hover {
        background-color: #0056b3;
        transform: scale(1.05); /* Slightly enlarge button on hover */
    }

    /* Links */
    a {
        color: #007bff;
        transition: color 0.3s ease;
    }

    a:hover {
        color: #0056b3; /* Darker blue on hover */
    }

    /* Fade-in animations */
    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInDown {
        0% {
            opacity: 0;
            transform: translateY(-20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

</style>

</head>
<body>

<div class="container">
    <!-- Genshin logo on the left -->
    <div class="col-md-6 d-flex justify-content-center align-items-center">
        <img src="/temp/assets/img/genshinlogo.png" alt="Genshin Impact" class="header-image">
    </div>

    <!-- Login form on the right -->
    <div class="col-md-6 d-flex justify-content-center">
        <div class="card p-4">
            <h2 class="text-center mb-4" style="font-family: Cinzel Decorative">Login</h2>
            <!-- Display the login status message -->
            <?php if (!empty($message)): ?>
                <div class="alert alert-info text-center"><?= htmlspecialchars($message) ?></div>
            <?php endif; ?>

            <form action="" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <p class="text-center mt-3">
                    Don't have an account? <a href="register.php">Register here</a>.
                </p>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
