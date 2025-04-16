<?php
// Connect to the database
$host = 'localhost'; // Your database host
$dbname = 'hospitalms'; // Your database name
$username = 'root'; // Default XAMPP username
$password = ''; // Default XAMPP password

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Initialize the query
$sql = "SELECT * FROM children";
$whereClauses = [];

// Handle search functionality
if (!empty($_POST['search'])) {
    $searchTerm = $conn->real_escape_string($_POST['search']);
    $whereClauses[] = "(id LIKE '%$searchTerm%' OR name LIKE '%$searchTerm%' OR email LIKE '%$searchTerm%' OR phone LIKE '%$searchTerm%')";
}

// Filter by time frame
if (!empty($_POST['filter'])) {
    $filter = $_POST['filter'];
    $dateCondition = "";
    switch ($filter) {
        case 'daily':
            $dateCondition = "DATE(birth_date) = CURDATE()";
            break;
        case 'weekly':
            $dateCondition = "YEARWEEK(birth_date, 1) = YEARWEEK(CURDATE(), 1)";
            break;
        case 'monthly':
            $dateCondition = "MONTH(birth_date) = MONTH(CURDATE()) AND YEAR(birth_date) = YEAR(CURDATE())";
            break;
    }
    if ($dateCondition) {
        $whereClauses[] = $dateCondition;
    }
}

if (!empty($whereClauses)) {
    $sql .= " WHERE " . implode(' AND ', $whereClauses);
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child Report</title>
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .search-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .search-container input[type="text"],
        .search-container select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 48%;
        }

        .search-container input[type="submit"] {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #5cb85c;
            color: #fff;
            cursor: pointer;
        }

        .search-container input[type="submit"]:hover {
            background-color: #4cae4c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #5bc0de;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .go-back {
            text-align: right;
            margin-bottom: 20px;
        }

        .go-back a {
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .go-back a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="go-back">
            <a href="admindshbrd.php">Go Back</a>
        </div>
        <h1>Child Report</h1>
        <form method="post" action="" class="search-container">
            <input type="text" name="search" placeholder="Search by ID, Name, Email, or Phone">
            <select name="filter">
                <option value="">All</option>
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
                <option value="monthly">Monthly</option>
            </select>
            <input type="submit" value="Filter">
        </form>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Blood Group</th>
                <th>Weight</th>
                <th>Birth Date</th>
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['blood_group']; ?></td>
                        <td><?php echo $row['weight']; ?></td>
                        <td><?php echo $row['birth_date']; ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No results found.</td>
                </tr>
            <?php endif; ?>
        </table>

        <?php $conn->close(); ?>
    </div>
</body>
</html>
