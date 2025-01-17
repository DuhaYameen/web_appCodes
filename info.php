<?php
$servername = "10.0.2.15";
$username = "duhayameen";
$password = "duhayameen";
$dbname = "dictionary";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $word = $_POST["word"];
    $sql = "SELECT output_word FROM words WHERE input_word=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $word);
    $stmt->execute();
    $stmt->bind_result($output_word);
    $stmt->fetch();

    if ($output_word) {
        echo "Match found: " . $output_word;
    } else {
        echo "No match found.";
    }
    $stmt->close();
}

$conn->close();
?>


