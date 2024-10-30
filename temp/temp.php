<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin_user'])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

$username = $_SESSION['loggedin_user'];

// Handle logout action
if (isset($_POST['logout'])) {
    // Destroy the session to log out the user
    session_destroy();
    header("Location: index.php"); // Redirect to index.php after logging out
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genshin Impact Artifacts</title>
    <!-- Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <style>
    /* Background image for the entire body */
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

    /* Floating logout button */
    .logout-btn {
        position: absolute;
        top: 20px;
        right: 20px;
        animation: fadeIn 1s ease-in-out; /* Fade-in for logout button */
    }

    /* Container for cards that allows scrolling */
    .scrollable-container {
        height: 100vh;
        overflow-y: auto;
        padding: 20px;
        animation: fadeIn 1s ease-in-out; /* Fade-in animation for scrollable container */
    }

    /* Custom CSS for card styling */
    .card {
        margin: 20px 0;
        text-align: center;
        background: rgba(255, 255, 255, 0.34);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(5.1px);
        -webkit-backdrop-filter: blur(5.1px);
        border: 1px solid rgba(255, 255, 255, 0.59);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out; /* Hover transition for card */
        animation: fadeInUp 1.2s ease-in-out; /* Fade-in with upward movement for card */
    }

    .card:hover {
        transform: translateY(-10px); /* Lift the card slightly on hover */
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.2); /* Deepen shadow on hover */
    }

    .card img {
        height: 200px;
        object-fit: contain;
        border-radius: 16px 16px 0 0;
        animation: fadeInUp 1.5s ease-in-out; /* Fade-in with upward movement for image */
    }

    /* Style for the description text */
    .card-text {
        max-height: 100px;
        overflow-y: auto;
        background-color: #efefef;
        padding: 10px;
        border-radius: 10px;
    }

    .card-title {
        font-family: 'Cinzel Decorative';
        background-color: white;
        padding: 10px;
        border-radius: 10px;
        margin-bottom: 10px;
        animation: fadeIn 1.5s ease-in-out; /* Fade-in animation for card titles */
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

    .header-image {
        display: block;
        margin: 0 auto;
        max-width: 100%;
        height: auto;
        padding: 20px 0;
        animation: fadeInDown 1s ease-in-out; /* Fade-in with downward movement for header image */
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

    <!-- Logout Button -->
    <form method="post" class="logout-btn">
        <button type="submit" name="logout" class="btn btn-primary">Logout</button>
    </form>
   
    <div class="scrollable-container">
        <div class="container">
            <img src="/temp/assets/img/genshinlogo.png" alt="Genshin Impact" class="header-image">
            <div class="row">
                <?php
                // Associative array to store card details and links
                $cards = [
                    [
                        'id' => 'Pale Flame',
                        'price' => 'Physical DMG +25%',
                        'description' => 'When an Elemental Skill hits an opponent, ATK is increased by 9% for 7s. This effect stacks up to 2 times and can be triggered once every 0.3s. Once 2 stacks are reached, the 2-set effect is increased by 100%.',
                        'image' => '/temp/assets/img/paleflame.png',
                        'link' => 'paleflame.php', 
                    ],
                    [
                        'id' => 'Defenders Will',
                        'price' => 'Base DEF +30%',
                        'description' => 'Increases Elemental RES by 30% for each element present in the party. When a character attacks an enemy affected by Cryo, their CRIT Rate is increased by 20%. If the enemy is Frozen, CRIT Rate is increased by an additional 20%.',
                        'image' => '/temp/assets/img/defenderswill.png',
                        'link' => 'defenderswill.php', 
                    ],
                    [
                        'id' => 'Blizzard Strayer',
                        'price' => 'Cryo DMG Bonus +15%',
                        'description' => 'When a character attacks an enemy affected by Cryo, their CRIT Rate is increased by 20%. If the enemy is Frozen, CRIT Rate is increased by an additional 20%.',
                        'image' => '/temp/assets/img/blizzardstrayer.png',
                        'link' => 'blizzardstrayer.php', 
                    ],
                    [
                        'id' => 'Crimson Witch',
                        'price' => 'Pyro DMG Bonus +15%',
                        'description' => 'Increases Overloaded and Burning DMG by 40%. Increases Vaporize and Melt DMG by 15%. Using an Elemental Skill increases 2-Piece Set effects by 50% for 10s. Max 3 stacks.',
                        'image' => '/temp/assets/img/crimsonwtch.png',
                        'link' => 'crimson.php', 
                    ],
                    [
                        'id' => 'The Exile',
                        'price' => 'Energy Recharge +20%',
                        'description' => 'Using an Elemental Burst regenerates 2 Energy for other party members every 2s for 6s. This effect cannot stack.',
                        'image' => '/temp/assets/img/exile.png',
                        'link' => 'theexile.php',
                    ],
                    [
                        'id' => 'Maiden Beloved',
                        'price' => 'Healing Effectiveness +15%',
                        'description' => 'Using an Elemental Skill or Burst increases healing received by all party members by 20% for 10s.',
                        'image' => '/temp/assets/img/maidenbeloved.png',
                        'link' => 'maidenbeloved.php',
                    ],
                    [
                        'id' => 'Noblesse Oblige',
                        'price' => 'Elemental Burst DMG +20%',
                        'description' => 'Using an Elemental Burst increases all party members ATK by 20% for 12s. This effect cannot stack.',
                        'image' => '/temp/assets/img/noblisse.png',
                        'link' => 'nob.php',
                    ],
                    [
                        'id' => 'Ocean-Clam',
                        'price' => 'Healing Bonus +15%',
                        'description' => 'When the character equipping this artifact set heals a character in the party, a Sea-Dyed Foam will appear for 3 seconds, accumulating the amount of HP recovered from healing. At the end of the duration, the Sea-Dyed Foam will explode, dealing DMG to nearby opponents based on 90% of the accumulated healing.',
                        'image' => '/temp/assets/img/oceanhued.png',
                        'link' => 'oceanclam.php', 
                    ],

                ];

                // Loop through the associative array and display each artifact card
                foreach ($cards as $card) {
                    echo "<div class='col-md-3'>";
                    echo "<div class='card'>";
                    echo "<img class='card-img-top' src='{$card['image']}' alt='Artifacts'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>{$card['id']}</h5>";
                    echo "<p class='card-text'>{$card['description']}</p>";
                    echo "<p>{$card['price']}</p>";
                    // Pass all necessary details in the URL
                    echo "<a href='detail.php?id={$card['id']}&price={$card['price']}&description=".urlencode($card['description'])."&image=".urlencode($card['image'])."' class='btn btn-primary'>Detail</a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
