<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vaccine - Child Vaccination System</title>
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
                <li><a href="home.php">Home</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Form Section -->
    <div class="container">
        <h2>Add Vaccine</h2>
        <form action="add_vaccine_backend.php" method="POST" onsubmit="return confirmSubmit()">
            <div class="form-group">
                <label for="vaccineName">Vaccine Name:</label>
                <input type="text" class="form-control" id="vaccineName" name="vaccineName" placeholder="Enter vaccine name" required>
            </div>

            <div class="form-group">
                <label for="ageGroup">Age Group:</label>
                <select class="form-control" id="ageGroup" name="ageGroup" required>
                    <option value="" disabled selected>Select age group</option>
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
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter vaccine quantity" min="0" required>
            </div>

            <button type="submit" class="btn btn-submit">Submit</button>
        </form>
    </div>

    <script>
        function confirmSubmit() {
            // This function can be enhanced to include more validation
            alert("Vaccine added successfully!");
            return true; // Proceed with form submission
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
