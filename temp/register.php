<?php
session_start(); // Start the session

// Initialize an empty message
$register_message = '';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate passwords match
    if ($password !== $confirm_password) {
        $register_message = "Passwords do not match!";
    } else {
        // Initialize users array in session if not already set
        if (!isset($_SESSION['users'])) {
            $_SESSION['users'] = [];
        }

        // Check if username already exists
        foreach ($_SESSION['users'] as $user) {
            if ($user['username'] === $username) {
                $register_message = "Username already exists!";
                break;
            }
        }

        // If no error, register the user
        if (empty($register_message)) {
            $_SESSION['users'][] = ['username' => $username, 'password' => $password];
            $register_message = "Registration successful!.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Genshin Impact Artifacts</title>
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
        animation: fadeInBody 1s ease-in-out; /* Fade-in animation for body */
    }

    .container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 100vh;
        padding: 0 20px;
        animation: fadeIn 1s ease-in-out; /* Fade-in animation for container */
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
        animation: fadeInUp 0.8s ease-in-out; /* Fade-in with upward movement for cards */
    }

    .card:hover {
        transform: translateY(-10px); /* Lift the card slightly on hover */
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.2); /* Deepen shadow */
    }

    .header-image {
        max-width: 100%;
        height: auto;
        padding: 20px;
        animation: fadeInDown 1s ease-in-out; /* Fade-in with downward movement for header image */
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

    /* Keyframe animations */
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

    @keyframes fadeInBody {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
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

    <!-- Registration form on the right -->
    <div class="col-md-6 d-flex justify-content-center">
        <div class="card p-4">
            <h2 class="text-center mb-4" style="font-family: Cinzel Decorative">Register</h2>

            <!-- Display registration message -->
            <?php if (!empty($register_message)): ?>
                <div class="alert alert-info text-center"><?= htmlspecialchars($register_message) ?></div>
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
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
                <p class="text-center mt-3">
                    Already have an account? <a href="login.php">Login here</a>.
                </p>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>