<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$user = "root";
$pass = "";
$db = "comment";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Page</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Neuton:ital,wght@0,200;0,300;0,400;0,700;0,800;1,400&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="navbar-container">
                <img class="logo" src="WhatsApp Image 2024-07-19 at 05.28.42.jpeg" alt="logo">
                <ul class="nav-links">
                    <li><a href="index.html"><span class="material-symbols-outlined">home</span>Home</a></li>
                    <li><a href="about.html"><span class="material-symbols-outlined">info</span>About us</a></li>
                    <li><a href="#"><span class="material-symbols-outlined">comment</span>Comment</a></li>
                    <li><a href="content.html"><span class="material-symbols-outlined">web</span>Content</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="comment-section">
            <h2>Berikan Pendapat Kamu ya..</h2>
            <form id="commentForm" action="index.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                
                <label for="comment">Comment:</label>
                <textarea id="comment" name="comment" rows="4" required></textarea>
                
                <button type="submit" name="submit" value="submit">Submit</button>
            </form>
<?php
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $comment = $_POST['comment'];

    if(!empty($username) && !empty($comment)) {
        $result = mysqli_query($conn, "INSERT INTO form(username, comment) VALUES('$username', '$comment')");

    }
}
?>
        </div>
        <div id="commentDisplay" class="comment-display">
            <h3>Komentar :</h3>
<?php
$result = mysqli_query($conn, "SELECT * FROM form");

if (mysqli_num_rows($result) > 0) {
    while ($r = mysqli_fetch_assoc($result)) {
?>
            <div class="comment-box">
                <p class="username"><?= htmlspecialchars($r['username']); ?>:</p>
                <p><?= htmlspecialchars($r['comment']); ?></p>
            </div>
<?php
    }
} else {
    echo "<p>Tidak ada komentar.</p>";
}
?>
        </div>
    </div>

    <footer>
        <p><span>Hak Cipta &copy; 2024 - Junior Web Programer</span></p>
        <div class="footer-logo">
            <img src="download.png" alt="JWP Logo" width="100" height="50"> 
        </div>
        <div class="footer-logo">
            <img src="Logo_Kementerian_Ketenagakerjaan_(2016).png" alt="JWP Logo" width="50" height="50"> 
        </div>
    </footer>
</body>
</html>
