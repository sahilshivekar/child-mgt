<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Child Vaccination System</title>
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

        .dashboard-container {
            padding: 40px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
        }

        .dashboard-item {
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            font-size: 1.3rem;
        }

        .dashboard-item:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Dashboard colors */
        .child-report {
            background-color: #ff5722;
        }

        .vaccine-report {
            background-color: #ffc107;
        }

        .booking {
            background-color: #9c27b0;
        }

        .add-hospital {
            background-color: #3f51b5;
        }

        .add-vaccine {
            background-color: #e91e63;
        }

        .dashboard-item i {
            font-size: 40px;
            margin-bottom: 15px;
        }

        /* Adjust font size */
        .dashboard-item p {
            font-size: 1.1rem;
            margin: 0;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header>
        <h1>Child Vaccination System</h1>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </header>

    <!-- Main Dashboard Content -->
    <div class="dashboard-container">
        <div class="dashboard-grid">
            <a href="child_report.php" class="dashboard-item child-report">
                <i class="fas fa-child"></i>
                <p>Child Report</p>
            </a>

            <a href="vaccinereprt.php" class="dashboard-item vaccine-report">
                <i class="fas fa-syringe"></i>
                <p>Vaccine Report</p>
            </a>

            <a href="appointment_report.php" class="dashboard-item booking">
                <i class="fas fa-calendar-alt"></i>
                <p>Booking</p>
            </a>

            <a href="AddHospital.php" class="dashboard-item add-hospital">
                <i class="fas fa-plus-circle"></i>
                <p>Add Hospital</p>
            </a>

            <a href="vaccines.php" class="dashboard-item add-vaccine">
                <i class="fas fa-plus-square"></i>
                <p>Add Vaccine</p>
            </a>
        </div>
    </div>

    <!-- Including Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>
