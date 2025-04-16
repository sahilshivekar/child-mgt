<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Child - Child Vaccination System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'IBM Plex Sans', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

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
            margin-top: 50px;
            max-width: 600px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-submit {
            width: 100%;
            background-color: #5bc0de;
            color: white;
            font-weight: bold;
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
                <li><a href="admin-panel.php">Go Back</a></li>
                <li><a href="Home.php">Home</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Form Section -->
    <div class="container">
        <h2>Add Child</h2>
        <form action="add_child_backend.php" method="POST">
            <div class="form-group">
                <label for="childName">Child Name:</label>
                <input type="text" class="form-control" id="childName" name="childName" placeholder="Enter child's name" required>
            </div>

            <div class="form-group">
                <label for="bloodGroup">Blood Group:</label>
                <select class="form-control" id="bloodGroup" name="bloodGroup" required>
                    <option value="" disabled selected>Select blood group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>

            <div class="form-group">
                <label for="childWeight">Weight (kg):</label>
                <input type="number" class="form-control" id="childWeight" name="childWeight" placeholder="Enter child's weight" required>
            </div>

            <div class="form-group">
                <label for="birthDate">Birth Date:</label>
                <input type="date" class="form-control" id="birthDate" name="birthDate" required>
            </div>

            <button type="submit" class="btn btn-submit">Submit</button>
        </form>
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
