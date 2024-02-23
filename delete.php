<?php
include 'db.php';

// Delete task
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM tasks WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

header("Location: index.php");
?>
