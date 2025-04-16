<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMS - Child Vaccination System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            font-family: 'IBM Plex Sans', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        /* Header Styling */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px 20px;
            background-color: rgba(43, 62, 80, 0.8);
            color: white;
        }

        header nav ul {
            list-style-type: none;
            display: flex;
            gap: 20px;
        }

        header nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            margin-top: 25px;
        }

        /* Dashboard Section */
        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            padding: 40px;
        }

        .dashboard-item {
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            color: white;
            transition: transform 0.3s;
            text-decoration: none;
            font-weight: bold;
            display: flex;
            align-items: center; /* Align logo and text vertically */
            justify-content: center; /* Center content horizontally */
        }

        .dashboard-item img {
            height: 30px; /* Set the height for the logos */
            margin-right: 10px; /* Space between the logo and the text */
        }

        .dashboard-item:hover {
            transform: translateY(-5px);
        }

        .add-child {
            background-color: #5bc0de; /* Light blue */
        }

        .view-child {
            background-color: #5cb85c; /* Green */
        }

        .booking {
            background-color: #f0ad4e; /* Yellow */
        }

        .appointment {
            background-color: #d9534f; /* Red */
        }

        .my-profile {
            background-color: #337ab7; /* Dark blue */
        }

        /* Footer Styling */
        .footer {
            background-color: rgba(43, 62, 80, 0.8);
            color: white;
            padding: 40px 20px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .footer .column {
            flex: 1;
            min-width: 200px;
            margin: 10px;
        }

        .footer .column h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .footer .column a {
            color: white;
            text-decoration: none;
            display: block;
            margin-bottom: 5px;
        }

        .footer .social {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .footer .social i {
            font-size: 24px;
            color: white;
        }

        .footer .note {
            font-size: 12px;
            margin-top: 20px;
        }

        /* Responsive Design */
        @media(max-width: 768px) {
            .dashboard {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <div>
            <h1>Child Vaccination System</h1>
        </div>
        <nav>
            <ul>
                <li><a href="Home.php">Home</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Dashboard Section -->
    <div class="container">
        <div class="dashboard">
            <a href="add_child.php" class="dashboard-item add-child">
                <h3>Add Child</h3>
            </a>
            <a href="children.php" class="dashboard-item view-child">
                <h3>View Child</h3>
            </a>
            <a href="booking.php" class="dashboard-item booking">
                <h3>Booking</h3>
            </a>
            <a href="viewbooking.php" class="dashboard-item appointment">
                <h3>Appointment</h3>
            </a>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="column">
            <h3>WHO WE ARE</h3>
            <a href="#">About Us</a>
        </div>
        <div class="column">
            <h3>WORKING WITH US</h3>
            <a href="#">Partners</a>
            <a href="#">Editorial Policy</a>
            <a href="#">Permissions Guidelines</a>
            <a href="#">Contact Us</a>
        </div>
        <div class="column">
            <h3>LEGAL & PRIVACY</h3>
            <a href="#">Privacy Policy & Terms of Use</a>
            <a href="#">Notice of Nondiscrimination</a>
        </div>
        <div class="column">
            <h3>ALL CATEGORIES</h3>
            <a href="#">For Parents</a>
            <a href="#">For Kids</a>
            <a href="#">For Teens</a>
        </div>
        <div class="column">
            <h3>WELLNESS CENTERS</h3>
            <a href="#">For Parents</a>
            <a href="#">For Kids</a>
            <a href="#">For Teens</a>
        </div>
        <div class="column">
            <div class="social">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-youtube"></i>
            </div>
            <div class="note">
                Note: All information on KidsHealth is for educational purposes only. For specific medical advice, diagnoses, and treatment, consult your doctor.
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
