<?php
    include __DIR__ . '\navbar.php'; ; 
    include __DIR__ . '\header.php';
    include __DIR__ . '\features.php';
    include __DIR__ . '\footer.php';
    ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARTIFACTS</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Cinzel Decorative and Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Cinzel+Decorative:wght@400;700;900&family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
            body {
            background-image: url('../temp/assets/img/sumeru.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden;
        }

        /* Keyframe for Fade-In Effect */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px); /* Slight move from the bottom */
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Navigation Bar */
        .navbar {
            background-color: rgba(31, 31, 31, 1);
            padding: 10px 20px;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 999;
        }

        .navbar-brand img {
            height: 50px;
            width: auto;
            transition: transform 0.3s ease-in-out;
        }

        .navbar-brand img:hover {
            transform: scale(1.1); /* Slightly increase size on hover */
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 500;
            margin-left: 15px;
            transition: color 0.3s ease-in-out;
        }

        .navbar-nav .nav-link:hover {
            color: #007bff !important;
        }

        .navbar-brand {
            font-family: 'Cinzel Decorative', serif;
            font-weight: 700;
            font-size: 1.5rem;
            color: #007bff !important;
        }

        .btn-account {
            background-color: #007bff;
            color: white;
            font-weight: 500;
            border: none;
            padding: 8px 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-account:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            position: relative;
            animation: fadeIn 1.2s ease-in-out; /* Fade-in animation for hero */
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-family: 'Cinzel Decorative', serif;
            font-size: 3.5rem;
            font-weight: 700;
        }

        .hero p {
            font-family: 'Inter', sans-serif;
            font-size: 1.2rem;
            margin-top: 20px;
            margin-bottom: 40px;
        }

        /* Features Section */
        .features {
            padding: 100px 0;
            animation: fadeIn 1.4s ease-in-out; /* Fade-in animation for features section */
        }

        .features h2 {
            font-family: 'Cinzel Decorative', serif;
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            color: white;
            margin-bottom: 50px;
        }

        /* Card Styling */
        .card {
            margin: 20px 0;
            text-align: center;
            background: rgba(255, 255, 255, 0.34);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5.1px);
            -webkit-backdrop-filter: blur(5.1px);
            border: 1px solid rgba(255, 255, 255, 0.59);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            animation: fadeIn 1.6s ease-in-out; /* Fade-in animation for cards */
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.2);
        }

        .card img {
            height: 200px;
            object-fit: contain;
            border-radius: 16px 16px 0 0;
        }

        .card-title {
            font-family: 'Cinzel Decorative', serif;
            background-color: white;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
            color: #007bff;
        }

        .card-text {
            font-family: 'Inter', sans-serif;
            max-height: 100px;
            overflow-y: auto;
            background-color: #efefef;
            padding: 10px;
            border-radius: 10px;
        }

        /* Custom scrollbar styling */
        .card-text::-webkit-scrollbar {
            width: 8px;
        }

        .card-text::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 10px;
        }

        .card-text::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }

        /* Footer */
        footer {
            background-color: rgba(31, 31, 31, 0.8);
            color: white;
            padding: 20px 0;
            text-align: center;
            animation: fadeIn 2s ease-in-out; /* Fade-in animation for footer */
        }

        footer a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        footer a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1rem;
            }
        }
    </style>
</head>