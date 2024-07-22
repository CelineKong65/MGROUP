<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contactus.css">
</head>
<body>
    <header>
        <a id="back" href="../mgroup/homepage.php"><b>BACK TO HOME</b></a>
        <h1>Property Shop</h1>
    </header>

    <section>
        <main>
            <div class="message">
                <h2>Get In Touch</h2>
                <p style="margin-top: 20px;">We'd love to hear from you!</p>
                <p>Whether you have questions, suggestions, or just want to say hello,</p>
                <p>feel free to reach out to us using the contact information below.</p>
            </div>

            <div style="padding: 5%;">
                <h2>Contact Us</h2>
                <form action="contactus.php" method="POST" class="contact-form">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>

                    <button type="submit">Send Message</button>
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "mgroup";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $message = $_POST['message'];

                    // Prepare and bind
                    $stmt = $conn->prepare("INSERT INTO messages (user_name, user_email, user_message) VALUES (?, ?, ?)");
                    $stmt->bind_param("sss", $name, $email, $message);

                    if ($stmt->execute()) {
                        echo "<p>Message sent successfully.</p>";
                    } else {
                        echo "<p>Error: " . $stmt->error . "</p>";
                    }

                    $stmt->close();
                    $conn->close();
                }
                ?>
            </div>
        </main>

        <div>
            <h2 class="map"><b>Online real time address</b></h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.7366635432413!2d102.27239867547486!3d2.2520662521811188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d1e56077ee9033%3A0x32b760229ad25d0f!2sIxora%20Apartment!5e0!3m2!1sen!2smy!4v1716647187425!5m2!1sen!2smy" width="1519" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <footer>
        <nav>
            <ul>
                <li><a href="../mgroup/homepage.php">Home</a></li>
                <li><a href="../mgroup/aboutus.html">About</a></li>
                <li><a href="../mgroup/contactus.php">Contact</a></li>
            </ul>
        </nav>
        <p>&copy; 2019-2024 Stationery Shop. All rights reserved. Company</p>
    </footer>
</body>
</html>