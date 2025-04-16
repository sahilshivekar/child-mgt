<?php
include 'db.php'; // Include your database connection

// Fetch all bookings from the database
$bookings = [];
$booking_sql = "SELECT appointments.id, children.name AS child_name, hospitals.hospital_name, appointments.appointment_date, appointments.mobile_number 
                FROM appointments 
                JOIN children ON appointments.child_id = children.id 
                JOIN hospitals ON appointments.hospital_name = hospitals.hospital_name"; // Adjust as necessary
$booking_result = $conn->query($booking_sql);

if ($booking_result && $booking_result->num_rows > 0) {
    while ($row = $booking_result->fetch_assoc()) {
        $bookings[] = $row;
    }
} else {
    echo "<div class='alert alert-warning' role='alert'>No bookings found in the database.</div>";
}

// Handle booking deletion
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $delete_sql = "DELETE FROM appointments WHERE id = $delete_id";

    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('Booking deleted successfully!'); window.location.href='view_bookings.php';</script>";
        exit();
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error deleting booking: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
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
            padding: 20px;
        }
        .booking-details {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

    <header>
        <h1>View Bookings</h1>
    </header>

    <div class="content">
        <div class="container mt-3">
            <?php if (!empty($bookings)): ?>
                <?php foreach ($bookings as $booking): ?>
                    <div class="booking-details">
                        <h4>Booking Details</h4>
                        <p><strong>Child Name:</strong> <?php echo htmlspecialchars($booking['child_name']); ?></p>
                        <p><strong>Hospital Name:</strong> <?php echo htmlspecialchars($booking['hospital_name']); ?></p>
                        <p><strong>Appointment Date:</strong> <?php echo htmlspecialchars($booking['appointment_date']); ?></p>
                        <p><strong>Mobile Number:</strong> <?php echo htmlspecialchars($booking['mobile_number']); ?></p>
                        <a href="view_bookings.php?delete_id=<?php echo $booking['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this booking?');">Delete Booking</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class='alert alert-warning' role='alert'>No bookings found in the database.</div>
            <?php endif; ?>
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
