<?php
include 'db.php';

// Add task
if (isset($_POST['task_name'])) {
    $taskName = $_POST['task_name'];
    $sql = "INSERT INTO tasks (task_name) VALUES ('$taskName')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Get tasks
$sql = "SELECT id, task_name, is_completed FROM tasks";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Task App</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h2>Task List</h2>

<form class='new-task-form' method="POST" action="">
    <input class='input-task-name' type="text" name="task_name" placeholder="Add new task">
    <button class='add-task-button' type="submit">Add Task</button>
</form>

<ul class='task-list'>
<?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='task-row'><li>" . $row["task_name"] . " <a href='delete.php?id=" . $row["id"] . "'class='delete-btn'>Delete</a></li></div>";
    }
} else {
    echo "<p>0 results</p>";
}
?>
</ul>

</body>
</html>
<?php $conn->close(); ?>
