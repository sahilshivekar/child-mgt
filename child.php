<?php
// Database connection
$host = "localhost"; // or your database host
$db_name = "hospitalms";
$username = "your_db_username"; // replace with your database username
$password = "your_db_password"; // replace with your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['childName'];
    $age = $_POST['childAge'];
    $bloodGroup = $_POST['bloodGroup'];
    $weight = $_POST['childWeight'];
    $birthDate = $_POST['birthDate'];

    // Prepare an insert statement
    $sql = "INSERT INTO children (name, age, blood_group, weight, birth_date) VALUES (:name, :age, :blood_group, :weight, :birth_date)";
    
    if ($stmt = $pdo->prepare($sql)) {
        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':blood_group', $bloodGroup);
        $stmt->bindParam(':weight', $weight);
        $stmt->bindParam(':birth_date', $birthDate);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            echo "Child added successfully.";
        } else {
            echo "Error: Could not execute the query: $sql. " . print_r($stmt->errorInfo());
        }
    }
    // Close statement
    unset($stmt);
}

// Close connection
unset($pdo);
?>
