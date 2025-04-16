<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'hospitalms');

// Check if form is submitted to add or update a hospital
if (isset($_POST['add_hospital'])) {
    $hospital_name = $_POST['hospital_name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Hash the password before storing
    $hospital_type = $_POST['hospital_type'];

    // Insert or update hospital based on whether ID is set
    if (!isset($_POST['id']) || empty($_POST['id'])) {
        $sql = "INSERT INTO hospitals (hospital_name, email, contact, password, hospital_type) 
                VALUES ('$hospital_name', '$email', '$contact', '$password', '$hospital_type')";
    } else {
        $id = $_POST['id'];
        $sql = "UPDATE hospitals SET hospital_name='$hospital_name', email='$email', contact='$contact', 
                hospital_type='$hospital_type' WHERE id=$id";
    }

    if ($conn->query($sql)) {
        header("Location: add-hospital.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

// Check if a delete request is made
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM hospitals WHERE id=$id");
    header("Location: add-hospital.php");
    exit();
}

// Search query
$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT * FROM hospitals WHERE hospital_name LIKE '%$search%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Hospital - Child Vaccination System</title>
    <!-- Bootstrap and basic styles -->
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

        .container {
            margin: 30px auto;
            max-width: 800px;
        }

        .hospital-list {
            margin-top: 30px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .search-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .search-bar input {
            width: 70%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .search-bar button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .hospital-list table {
            width: 100%;
            text-align: left;
        }

        .hospital-list table th, .hospital-list table td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .hospital-list .action-buttons a {
            margin-right: 10px;
            color: #007bff;
        }

        .hospital-list .action-buttons a:hover {
            text-decoration: underline;
        }

        .back-button {
            position: absolute;
            top: 15px;
            right: 15px;
        }

        .back-button a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #007bff;
            border-radius: 5px;
        }

        .add-update-btn {
            text-align: center;
            margin-top: 30px;
        }

        .add-update-btn button {
            padding: 15px 30px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-update-btn button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header>
        <h1>Manage Hospitals</h1>
        <div class="back-button">
            <a href="admindshbrd.php">Go Back</a>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <!-- Hospital List -->
        <div class="hospital-list">
            <h2>Hospitals</h2>
            <div class="search-bar">
                <form method="GET" action="add-hospital.php">
                    <input type="text" name="search" placeholder="Search by hospital name" value="<?php echo $search; ?>">
                    <button type="submit">Search</button>
                </form>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['hospital_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['contact']; ?></td>
                        <td><?php echo $row['hospital_type']; ?></td>
                        <td class="action-buttons">
                            <a href="javascript:void(0)" onclick="editHospital(<?php echo $row['id']; ?>, '<?php echo $row['hospital_name']; ?>', '<?php echo $row['email']; ?>', '<?php echo $row['contact']; ?>', '<?php echo $row['hospital_type']; ?>')">Edit</a>
                            <a href="add-hospital.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <!-- Add/Update Hospital Button -->
        <div class="add-update-btn">
            <button data-toggle="modal" data-target="#addUpdateModal">Add/Update Hospital</button>
        </div>
    </div>

    <!-- Add/Update Hospital Modal -->
    <div class="modal fade" id="addUpdateModal" tabindex="-1" role="dialog" aria-labelledby="addUpdateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="add-hospital.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUpdateModalLabel">Add/Update Hospital</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="hospital_id" name="id" value="">
                        <div class="form-group">
                            <label for="hospital_name">Hospital Name</label>
                            <input type="text" id="modal_hospital_name" name="hospital_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="modal_email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact</label>
                            <input type="text" id="modal_contact" name="contact" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="modal_password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="hospital_type">Hospital Type</label>
                            <select id="modal_hospital_type" name="hospital_type" class="form-control" required>
                                <option value="public">Public</option>
                                <option value="private">Private</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="add_hospital" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <script>
        // Function to populate the modal with existing hospital data for editing
        function editHospital(id, name, email, contact, type) {
            $('#hospital_id').val(id);
            $('#modal_hospital_name').val(name);
            $('#modal_email').val(email);
            $('#modal_contact').val(contact);
            $('#modal_hospital_type').val(type);
            $('#addUpdateModal').modal('show');
        }
    </script>
</body>

</html>
