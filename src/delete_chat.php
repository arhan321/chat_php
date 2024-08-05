<?php
require 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $conn->real_escape_string($_POST['id']);

    $sql = "DELETE FROM messages WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Message deleted successfully";
    } else {
        echo "Error deleting message: " . $conn->error;
    }
}

$conn->close();
?>
