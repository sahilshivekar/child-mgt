<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMS - Child Vaccination System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="Styleindex.css"> <!-- Add the new CSS here -->

    <style>
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
        
        /* Header Styles */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px 20px;
            background-color: rgba(43, 62, 80, 0.8);
            color: white;
        }
        header .logo img {
            height: 50px;
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

        /* Additional styling */
        .container {
            margin-top: 25px; /* To ensure the content doesn't overlap with the header */
        }

    </style>
    <script>
        // Validation functions go here (no changes needed)
    </script>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="">
          <li>Child Vaccination System</li>
        </div>
        <nav>
            <ul>
                <li><a href="Home.php">Home</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Registration Form -->
    <div class="container register">
        <h3 class="register-heading">Register as Parent</h3>
        <form method="post" action="func2.php" onsubmit="return validateForm()">
            <div class="row register-form">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="First Name *" name="fname" onkeydown="return alphaOnly(event);" required/>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Your Email *" name="email" id="email" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password *" id="password" name="password" onkeyup="check();" required/>
                    </div>
                    <div class="form-group">
                        <div class="maxl">
                            <label class="radio inline">
                                <input type="radio" name="gender" value="Male" checked>
                                <span> Male </span>
                            </label>
                            <label class="radio inline">
                                <input type="radio" name="gender" value="Female">
                                <span> Female </span>
                            </label>
                        </div>
                        <a href="index1.php">Already have an account? Login Now</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Last Name *" name="lname" onkeydown="return alphaOnly(event);" required/>
                    </div>
                    <div class="form-group">
                        <input type="tel" minlength="10" maxlength="10" name="contact" class="form-control" id="contact" placeholder="Contact *" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password *" name="cpassword" onkeyup="check();" required/>
                        <span id="message"></span>
                    </div>
                    <input type="submit" class="btnRegister" name="patsub1" value="Register"/>
                </div>
            </div>
        </form>
    </div>

    <hr>
    <!-- Footer -->
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
