<!DOCTYPE html>
<html lang="en">

<head>
    <title>Detail Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

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
        background-color: transparent;
        animation: fadeIn 1s ease-in-out; /* Fade-in animation for container */
    }

    .card {
        background: rgba(255, 255, 255, 0.34);
        border-radius: 16px;
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.59);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out; /* Add transition for hover effects */
        animation: fadeInUp 1s ease-in-out; /* Fade-in with upward movement */
    }

    .card:hover {
        transform: translateY(-10px); /* Lift the card slightly on hover */
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.2); /* Deepen shadow on hover */
    }

    .card img {
        height: 200px;
        object-fit: contain;
        border-radius: 16px 16px 0 0;
        animation: fadeInUp 1.2s ease-in-out; /* Fade-in for image */
    }

    h1, h2, h3, h4, h5 {
        color: #000;
        animation: fadeIn 1.5s ease-in-out; /* Fade-in for headings */
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

    <?php
    // Retrieve details from URL parameters
    $id = isset($_GET['id']) ? $_GET['id'] : 'Unknown Artifact';
    $price = isset($_GET['price']) ? $_GET['price'] : 'Unknown Price';
    $description = isset($_GET['description']) ? $_GET['description'] : 'No description available.';
    $image = isset($_GET['image']) ? $_GET['image'] : 'assets/img/default.png'; // Fallback image if not provided
    ?>

    <section>
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="<?php echo htmlspecialchars($image); ?>" alt="Card image cap" id="product-detail">
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2"><?php echo htmlspecialchars($id); ?></h1>
                            <p class="h3 py-2"><?php echo htmlspecialchars($price); ?></p>
                            <p class="py-2">
                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                            </p>
                            <h6>Description:</h6>
                            <p><?php echo htmlspecialchars($description); ?></p>
                          
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <a href="temp.php" class="btn btn-success btn-lg">Back</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
