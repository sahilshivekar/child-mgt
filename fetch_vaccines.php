<?php
include 'db.php'; // Include your database connection

if (isset($_POST['age_group'])) {
    $age_group = $conn->real_escape_string($_POST['age_group']);

    // Fetch vaccines for the selected age group
    $vaccine_sql = "SELECT vaccine_name FROM vaccines WHERE age_group = '$age_group'";
    $vaccine_result = $conn->query($vaccine_sql);

    if ($vaccine_result && $vaccine_result->num_rows > 0) {
        while ($row = $vaccine_result->fetch_assoc()) {
            echo "<option value='" . htmlspecialchars($row['vaccine_name']) . "'>" . htmlspecialchars($row['vaccine_name']) . "</option>";
        }
    } else {
        echo "<option value=''>No vaccines available for this age group</option>";
    }
} else {
    echo "<option value=''>Select an age group first</option>";
}
?>
