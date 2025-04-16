<html>
 <head>
  <title>
   Child Vaccination Management System
  </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .header {
            background-color: #00bcd4;
            color: white;
            padding: 10px 0;
            text-align: center;
            position: relative;
        }
        .header .emergency {
            position: absolute;
            right: 10px;
            top: 10px;
            font-size: 14px;
        }
        .header .emergency i {
            margin-right: 5px;
        }
        .availability {
            background-color: #00bcd4;
            color: white;
            text-align: center;
            padding: 5px 0;
            font-size: 14px;
        }
        .title {
            background-color: black;
            color: white;
            text-align: center;
            padding: 10px 0;
            font-size: 24px;
        }
        .navbar {
            display: flex;
            justify-content: flex-end;
            background-color: white;
            padding: 10px 20px;
        }
        .navbar a {
            color: black;
            text-decoration: none;
            margin-left: 20px;
            font-size: 14px;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
        .carousel {
            position: relative;
        }
        .carousel img {
            width: 100%;
            height: auto;
        }

        /* Image slider section */
        .slider {
            position: relative;
            width: 100%;
            text-align: center;
            margin-top: 20px;
        }
        .slider img {
            width: 50%;
            height: auto;
            border-radius: 5px;
        }
        .slider p {
            font-size: 16px;
            margin-top: 10px;
        }
        .slider .left, .slider .right {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
        .slider .left {
            left: 10px;
        }
        .slider .right {
            right: 10px;
        }
        .footer {
            background-color: rgb(252, 248, 248);
            color: rgb(10, 0, 0);
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
            color:rgb(14, 1, 1);
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
            color: rgb(10, 0, 0);
        }
        .footer .note {
            font-size: 12px;
            margin-top: 20px;
        }

        /* Style for the heading above the slider */
        .heading {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            margin-top: 40px;
            margin-bottom: 20px;
        }
  </style>
 </head>
 <body>
  <div class="title">
   Vaccination For Every Child
  </div>
  <div class="navbar">
  <a href="index.php">PARENT</a>
  <a href="Hospitallogin.php">HOSPITAL</a>
  <a href="admin.php">ADMIN</a>
  <a href="contact.html">CONTACT US</a>
</div>
  <div class="carousel">
   <img alt="Doctors performing surgery in a hospital setting" height="768" src="https://www.unicef.org/india/sites/unicef.org.india/files/styles/hero_extended/public/UN0622108.jpg.webp?itok=4N5l5kSB" width="1366"/>
  </div>

  <!-- New Heading -->
  <div class="heading">
    Know your child's vaccination schedule
  </div>

  <!-- Image Slider Section -->
  <div class="slider">
    <button class="left" onclick="showPrevious()">
      <i class="fas fa-chevron-left"></i>
    </button>

    <div class="image-container">
      <img id="slider-image" src="https://www.unicef.org/india/sites/unicef.org.india/files/styles/media_large_image/public/Immunization%20Schedule%20-%20FB-18_0.jpg.webp?itok=azMM4EGX" alt="Vaccine schedule poster">
      <p id="slider-text">.</p>
    </div>

    <button class="right" onclick="showNext()">
      <i class="fas fa-chevron-right"></i>
    </button>
  </div>
<hr>
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
        <h3>WELLNESS CENTERS</h3>
        <a href="#">For Parents</a>
        <a href="#">For Kids</a>
        <a href="#">For Teens</a>
    </div>
    <div class="column">
        <div class="social">
            <i class="fab fa-facebook-f"></i>
            <i class="fas fa-times"></i>
            <i class="fab fa-youtube"></i>
        </div>
        <div class="note">
            Note: All information on Nemours® KidsHealth® is for educational purposes only. For specific medical advice, diagnoses, and treatment, consult your doctor. © 1995-2024. The Nemours Foundation. Nemours Children's Health®, Kids
        </div>
    </div>
</div>
 
    &copy; 2024 Child Vaccination Management System. All rights reserved. |
    <a href="#">Privacy Policy</a> | 
    <a href="#">Terms of Service</a> | 
  </div>

  <!-- JavaScript to handle the slider -->
  <script>
    const images = [
      {
        src: "https://www.unicef.org/india/sites/unicef.org.india/files/styles/media_large_image/public/Immunization%20Schedule%20-%20FB-18_0.jpg.webp?itok=azMM4EGX",
        text: "The bacille Calmette-Guérin (BCG) vaccine has existed for 80 years and is one of the most widely used of all current vaccines"
      },
      {
        src: "https://www.unicef.org/india/sites/unicef.org.india/files/styles/media_large_image/public/Immunization%20Schedule%20-%20FB-19.jpg.webp?itok=WWb4-pig",
        text: "Hepatitis B is a potentially life-threatening liver infection caused by the hepatitis B virus (HBV)"
      },
      {
        src: "https://www.unicef.org/india/sites/unicef.org.india/files/styles/media_large_image/public/Immunization%20Schedule%20-%20FB-20.jpg.webp?itok=13INv3_e",
        text: "The oral polio vaccine (OPV) is given to help prevent polio"
      },
      {
        src: "https://www.unicef.org/india/sites/unicef.org.india/files/styles/media_large_image/public/Immunization%20Schedule%20-%20FB-21_0.jpg.webp?itok=-rGZRfDb",
        text: " Giving pentavalent vaccine reduces the number of pricks to a child"
      },
      {
        src: "https://www.unicef.org/india/sites/unicef.org.india/files/styles/media_large_image/public/Immunization%20Schedule%20-%20FB-22_1.jpg.webp?itok=K1xWIr9w",
        text: "The Rotavirus vaccine protects against rotavirus infections"
      },
      {
        src: "https://www.unicef.org/india/sites/unicef.org.india/files/styles/media_large_image/public/Immunization%20Schedule%20-%20FB-23_0.jpg.webp?itok=z67O56os",
        text: "The Polio vaccine, given multiple times, almost always protects a child for life"
      },
      {
        src: "https://www.unicef.org/india/sites/unicef.org.india/files/styles/media_large_image/public/Immunization%20Schedule%20-%20FB-24.jpg.webp?itok=5MgwMvRM",
        text: "The vaccine is a vaccine against measles, mumps,  and rubella (German measles)"
      },
      {
        src: "https://www.unicef.org/india/sites/unicef.org.india/files/styles/media_large_image/public/Immunization%20Schedule%20-%20FB-25.jpg.webp?itok=raCYXKdY",
        text: "This vaccines is against three infectious diseases in humans: diphtheria, pertussis and tetanus"
      },
      {
        src: "https://www.unicef.org/india/sites/unicef.org.india/files/styles/media_large_image/public/Immunization%20Schedule%20-%20FB-26.jpg.webp?itok=EsBzMye4",
        text: "Td vaccine is a combination of tetanus and diphtheria with lower concentration of diphtheria antigen (d)."
      },
      {
        src: "https://www.unicef.org/india/sites/unicef.org.india/files/styles/media_large_image/public/Immunization%20Schedule%20-%20FB-27.jpg.webp?itok=R2mBhPSf",
        text: ""
      }
    ];

    let currentIndex = 0;

    function showNext() {
      currentIndex = (currentIndex + 1) % images.length;
      updateSlider();
    }

    function showPrevious() {
      currentIndex = (currentIndex - 1 + images.length) % images.length;
      updateSlider();
    }

    function updateSlider() {
      document.getElementById("slider-image").src = images[currentIndex].src;
      document.getElementById("slider-text").textContent = images[currentIndex].text;
    }
  </script>
 </body>
</html>