<?php
require 'conn.php';

$sql = "SELECT id, username, message, timestamp FROM messages ORDER BY timestamp DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>" . htmlspecialchars($row['username']) . ":</strong> " . htmlspecialchars($row['message']) . " <br><small>" . $row['timestamp'] . "</small> <button class='delete-btn' data-id='" . $row['id'] . "'>Delete</button></p>";
    }
} else {
    echo "No messages yet.";
}

$conn->close();
?>
