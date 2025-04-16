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

// Fetch all appointments along with children's details
$sql = "SELECT a.id AS appointment_id, c.name AS child_name, 
               c.age, c.weight, 
               a.hospital_name, a.appointment_date, 
               a.mobile_number 
        FROM appointments a 
        JOIN children c ON a.child_id = c.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Children's Appointment Report</title>
    <link rel="stylesheet" href="style.css"> <!-- Optional: link to your CSS file -->
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
            <a href="admindashboard.php">Go Back</a>
        </div>
        <h1>Children's Appointment Report</h1>

        <table>
            <tr>
                <th>Appointment ID</th>
                <th>Child Name</th>
                <th>Age</th>
                <th>Weight</th>
                <th>Hospital Name</th>
                <th>Appointment Date</th>
                <th>Mobile Number</th>
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['appointment_id']; ?></td>
                        <td><?php echo $row['child_name']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['weight']; ?></td>
                        <td><?php echo $row['hospital_name']; ?></td>
                        <td><?php echo $row['appointment_date']; ?></td>
                        <td><?php echo $row['mobile_number']; ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No appointments found.</td>
                </tr>
            <?php endif; ?>
        </table>

        <?php $conn->close(); ?>
    </div>
</body>
</html>
