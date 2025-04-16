<?php
include 'db.php'; // Include your database connection

// Fetch children for dropdown
$children = [];
$child_sql = "SELECT id, name FROM children"; // Ensure this table exists and is populated
$child_result = $conn->query($child_sql);
if ($child_result && $child_result->num_rows > 0) {
    while ($row = $child_result->fetch_assoc()) {
        $children[] = $row;
    }
} else {
    echo "<div class='alert alert-warning' role='alert'>No children found in the database.</div>";
}

// Fetch hospitals for dropdown
$hospitals = [];
$hospital_sql = "SELECT hospital_name FROM hospitals"; // Ensure this table exists and is populated
$hospital_result = $conn->query($hospital_sql);
if ($hospital_result && $hospital_result->num_rows > 0) {
    while ($row = $hospital_result->fetch_assoc()) {
        $hospitals[] = $row;
    }
} else {
    echo "<div class='alert alert-warning' role='alert'>No hospitals found in the database.</div>";
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $child_id = intval($_POST['child_id']);
    $hospital_name = $conn->real_escape_string($_POST['hospital_name']);
    $appointment_date = $_POST['appointment_date'];
    $mobile_number = $conn->real_escape_string($_POST['mobile_number']);
    $vaccine_name = $conn->real_escape_string($_POST['vaccine_name']);

    // Insert into appointments table
    $insert_sql = "INSERT INTO appointments (child_id, hospital_name, appointment_date, mobile_number, vaccine_name) VALUES ($child_id, '$hospital_name', '$appointment_date', '$mobile_number', '$vaccine_name')";
    
    if ($conn->query($insert_sql) === TRUE) {
        // Show confirmation message and redirect
        echo "<script>alert('Appointment booked successfully!'); window.location.href='admin-panel.php';</script>";
        exit();
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error booking appointment: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
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
    </style>
    <script>
        // Fetch vaccines based on the selected age group
        function fetchVaccinesByAge(ageGroup) {
            if (ageGroup !== "") {
                // AJAX call to get vaccines based on the age group
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "fetch_vaccines.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                        document.getElementById("vaccine_name").innerHTML = this.responseText;
                    }
                }
                xhr.send("age_group=" + encodeURIComponent(ageGroup));
            } else {
                document.getElementById("vaccine_name").innerHTML = "<option value=''>Select a vaccine</option>";
            }
        }
    </script>
</head>
<body>

    <header>
        <h1>Book Appointment</h1>
    </header>

    <div class="content">
        <div class="container mt-3">
            <h2>Select Appointment Details</h2>
            <form method="POST">
                <div class="form-group">
                    <label for="child_id">Select Child:</label>
                    <select name="child_id" class="form-control" required>
                        <option value="">Select a child</option>
                        <?php foreach ($children as $child): ?>
                            <option value="<?php echo $child['id']; ?>"><?php echo htmlspecialchars($child['name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="hospital_name">Select Hospital:</label>
                    <select name="hospital_name" class="form-control" required>
                        <option value="">Select a hospital</option>
                        <?php foreach ($hospitals as $hospital): ?>
                            <option value="<?php echo htmlspecialchars($hospital['hospital_name']); ?>"><?php echo htmlspecialchars($hospital['hospital_name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="age_group">Select Age Group:</label>
                    <select name="age_group" class="form-control" onchange="fetchVaccinesByAge(this.value)" required>
                        <option value="">Select an age group</option>
                        <option value="Birth">Birth</option>
                        <option value="6 Weeks">6 Weeks</option>
                        <option value="10 Weeks">10 Weeks</option>
                        <option value="14 Weeks">14 Weeks</option>
                        <option value="9 Months">9 Months</option>
                        <option value="16-24 Months">16-24 Months</option>
                        <option value="2 Years">2 Years</option>
                        <option value="2.5 Years">2.5 Years</option>
                        <option value="3 Years">3 Years</option>
                        <option value="3.5 Years">3.5 Years</option>
                        <option value="4 Years">4 Years</option>
                        <option value="4.5 Years">4.5 Years</option>
                        <option value="5 Years">5 Years</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="vaccine_name">Select Vaccine:</label>
                    <select name="vaccine_name" id="vaccine_name" class="form-control" required>
                        <option value="">Select a vaccine</option>
                        <!-- Vaccines will be populated here dynamically -->
                    </select>
                </div>

                <div class="form-group">
                    <label for="appointment_date">Select Appointment Date:</label>
                    <input type="date" name="appointment_date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="mobile_number">Mobile Number:</label>
                    <input type="text" name="mobile_number" class="form-control" required pattern="[0-9]{10}" title="Please enter a valid 10-digit mobile number.">
                </div>

                <button type="submit" class="btn btn-primary">Book Appointment</button>
            </form>
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
