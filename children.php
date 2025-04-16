<?php
include 'db.php'; // Include the database connection

// Function to update IDs
function updateIDs($conn) {
    $sql = "SELECT * FROM children ORDER BY id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $new_id = 1; // Start ID from 1
        while ($row = $result->fetch_assoc()) {
            $update_sql = "UPDATE children SET id = $new_id WHERE id = " . $row['id'];
            $conn->query($update_sql);
            $new_id++; // Increment the new ID
        }
    }
}

// Check if a delete request has been made
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']); // Get the ID of the child to delete
    $delete_sql = "DELETE FROM children WHERE id = $delete_id";

    if ($conn->query($delete_sql) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>Record deleted successfully!</div>";
        updateIDs($conn); // Call the function to update IDs
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error deleting record: " . $conn->error . "</div>";
    }
}

// Handle search
$search_query = "";
if (isset($_POST['search'])) {
    $search_query = $conn->real_escape_string($_POST['search']); // Escape search input to prevent SQL injection
}

// SQL query to fetch data from the children table based on search
$sql = "SELECT * FROM children WHERE name LIKE '%$search_query%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Children Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header, footer {
            background-color: #007bff; /* Primary color */
            color: white;
            text-align: center;
            padding: 1rem;
        }
        footer {
            background-color: #343a40; /* Dark color */
        }
        .content {
            flex: 1;
            overflow-y: auto; /* Enable vertical scrolling */
            padding: 20px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Children Management System</h1>
    </header>

    <div class="content">
        <div class="container mt-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Children Data</h2>
                <a href="admin-panel.php" class="btn btn-secondary">Go Back</a>
            </div>

            <form method="POST" class="mb-4">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search by name" value="<?php echo htmlspecialchars($search_query); ?>">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>

            <?php
            // Check if there are results and output data
            if ($result->num_rows > 0) {
                echo "<ul class='list-group'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li class='list-group-item'>
                            <strong>ID:</strong> " . $row["id"] . "<br>
                            <strong>Name:</strong> " . htmlspecialchars($row["name"]) . "<br>
                            <strong>Age:</strong> " . htmlspecialchars($row["age"]) . "<br>
                            <strong>Blood Group:</strong> " . htmlspecialchars($row["blood_group"]) . "<br>
                            <strong>Weight:</strong> " . htmlspecialchars($row["weight"]) . " kg<br>
                            <strong>Birth Date:</strong> " . htmlspecialchars($row["birth_date"]) . "<br>
                            <a href='children.php?delete_id=" . $row["id"] . "' class='btn btn-danger btn-sm mt-2' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>
                          </li>";
                }
                echo "</ul>";
            } else {
                echo "<div class='alert alert-warning' role='alert'>No data found</div>";
            }
            ?>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Children Management System. All rights reserved.</p>
    </footer>

</body>
</html>

<?php
$conn->close(); // Close the database connection
?>
