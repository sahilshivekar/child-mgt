<?php
include 'db.php'; // Include your database connection

// Fetch vaccines from the database
$vaccines = [];
$vaccine_sql = "SELECT * FROM vaccines"; // Retrieve all vaccines
$vaccine_result = $conn->query($vaccine_sql);

if ($vaccine_result && $vaccine_result->num_rows > 0) {
    while ($row = $vaccine_result->fetch_assoc()) {
        $vaccines[] = $row; // Store each vaccine in the array
    }
} else {
    echo "<div class='alert alert-warning' role='alert'>No vaccines found in the database.</div>";
}

$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccines - Admin Dashboard</title>
    <!-- Including Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #2b3e50;
            padding: 15px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .nav-links {
            list-style: none;
            display: flex;
            gap: 15px;
        }

        header .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .vaccine-container {
            padding: 40px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header>
        <h1>Child Vaccination System</h1>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="contact_messages.php">Contact Messages</a></li>
        </ul>
    </header>

    <!-- Vaccines List -->
    <div class="container mt-5 vaccine-container">
        <h2>Vaccines Available</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Vaccine Name</th>
                    <th>Age Group</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($vaccines)): ?>
                    <?php foreach ($vaccines as $vaccine): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($vaccine['id']); ?></td>
                            <td><?php echo htmlspecialchars($vaccine['vaccine_name']); ?></td>
                            <td><?php echo htmlspecialchars($vaccine['age_group']); ?></td>
                            <td><?php echo htmlspecialchars($vaccine['quantity']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No vaccines available.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer class="text-center">
        <p>&copy; <?php echo date("Y"); ?> Child Vaccination System. All rights reserved.</p>
    </footer>

    <!-- Including Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>
