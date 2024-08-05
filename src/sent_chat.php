<?php
require 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO messages (username, message) VALUES ('$username', '$message')";
    $conn->query($sql);
}

$sql = "SELECT username, message, timestamp FROM messages ORDER BY timestamp DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>" . htmlspecialchars($row['username']) . ":</strong> " . htmlspecialchars($row['message']) . " <br><small>" . $row['timestamp'] . "</small></p>";
    }
} else {
    echo "No messages yet.";
}

$conn->close();
?>
