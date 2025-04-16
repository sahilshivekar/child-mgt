<?php
session_start();

// Check if hospital is logged in, otherwise redirect to login page
if (!isset($_SESSION['hospital_id'])) {
    header('Location: hospitallogin.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Dashboard</title>

    <!-- Inline CSS for styling -->
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Header Styling */
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #007BFF;
            color: white;
        }

        .logo img {
            max-height: 50px;
        }

        .welcome-message h2 {
            margin: 0;
        }

        .header-nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .header-nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        .header-nav ul li a:hover {
            text-decoration: underline;
        }

        /* Dashboard Content Styling */
        .dashboard-container {
            margin: 20px;
        }

        .dashboard-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Footer Styling */
        .footer-container {
            text-align: center;
            padding: 20px;
            background-color: #007BFF;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>

    <!-- Inline JavaScript for interaction -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Welcome alert when the page is loaded
            const hospitalName = "<?php echo isset($_SESSION['hospital_name']) ? $_SESSION['hospital_name'] : 'Hospital'; ?>";
            alert(`Welcome, ${hospitalName}!`);

            // Logout confirmation
            const logoutBtn = document.getElementById('logout-btn');
            logoutBtn.addEventListener('click', function(event) {
                if (!confirm("Are you sure you want to log out?")) {
                    event.preventDefault(); // Prevents the logout action
                }
            });
        });
    </script>
</head>
<body>

    <!-- Header Section -->
    <header>
        <div class="header-container">
            <!-- Hospital Logo -->
            <div class="logo">
                <img src="path-to-your-logo.png" alt="Hospital Logo">
            </div>

            <!-- Welcome Message -->
            <div class="welcome-message">
                <?php
                if (isset($_SESSION['hospital_name'])) {
                    echo "<h2>Welcome, " . $_SESSION['hospital_name'] . "!</h2>";
                } else {
                    echo "<h2>Welcome to the Hospital Dashboard</h2>";
                }
                ?>
            </div>

            <!-- Navigation Menu -->
            <nav class="header-nav">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="hospital_appointments.php">View Appointments</a></li>
                    <li><a href="logout.php" id="logout-btn">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Dashboard Main Content -->
    <div class="dashboard-container">
        <h1>Hospital Dashboard</h1>

        <section class="dashboard-content">
            <h2>Overview</h2>
            <ul>
        <li>Total vaccinations administered show the program's reach and effectiveness.</li>
        <li>The vaccination coverage rate indicates areas needing improvement.</li>
        <li>Upcoming vaccinations help ensure timely administration.</li>
        <li>Monitoring missed appointments aids in identifying trends for increased attendance.</li>
        <li>Monthly trends provide insights to adjust outreach strategies.</li>
        <li>Community engagement is vital for participation in vaccination campaigns.</li>
        <li>Patient education resources should be available for parents regarding vaccinations.</li>
        <li>Collaboration with local health authorities enhances outreach and education efforts.</li>
    </ul>
        </section>
    </div>

    <!-- Footer Section -->
    <footer>
        <div class="footer-container">
            <p>&copy; 2024 Hospital Management System. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>
