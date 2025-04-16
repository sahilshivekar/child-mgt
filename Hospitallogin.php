<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Registration - Child Vaccination System</title>
    <!-- Adding Bootstrap and FontAwesome -->
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
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            color: #0056b3;
        }

        /* Header Styles */
        header {
            background-color: rgba(43, 62, 80, 0.8);
            padding: 10px;
            color: white;
            position: relative;
        }
        /* Header format small and top-right text */
        header .system-name {
            position: absolute;
            top: 0;
            left: 20px;
            font-size: 18px;
            font-weight: bold;
        }
        nav ul {
            list-style-type: none;
            display: flex;
            gap: 20px;
            position: absolute;
            top: 10px;
            right: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        /* Form Styles */
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        /* Footer Styles */
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
    <div class="container">
        <div class="system-name">
            Child Vaccination System
        </div>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Main Content - Hospital Registration Form -->
<div class="container mt-5">
    <h2>Register as Hospital</h2>
    <form action="funchsptl.php" method="POST">
    <div class="form-group">
        <label for="hospital_name">Hospital Name *</label>
        <input type="text" id="hospital_name" name="hospital_name" required>
    </div>
    <div class="form-group">
        <label for="email">Email *</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="contact">Contact *</label>
        <input type="text" id="contact" name="contact" required>
    </div>
    <div class="form-group">
        <label for="password">Password *</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="cpassword">Confirm Password *</label>
        <input type="password" id="cpassword" name="cpassword" required>
    </div>
    <div class="form-group">
        <label for="hospital_type">Hospital Type *</label>
        <select id="hospital_type" name="hospital_type" required>
            <option value="public">Public</option>
            <option value="private">Private</option>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" name="register">Register</button>
    </div>
    <div class="form-group">
        <p>Already have an account? <a href="hospitaluser.php">Login Now</a></p>
    </div>
</form>

</div>

<!-- Footer -->
<div class="footer">
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
</div>

<!-- Including Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
