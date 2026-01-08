<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "natural heal project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$success_message = "";
$error_message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $disease = trim($_POST['disease']);
    $appointment_date = $_POST['Appt_Date'];
    
    // Basic validation
    if (empty($name) || empty($email) || empty($phone) || empty($disease) || empty($appointment_date)) {
        $error_message = "All fields are required!";
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO appointments (name, email, phone, disease, appointment_date) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $phone, $disease, $appointment_date);
        
        if ($stmt->execute()) {
            $success_message = "Appointment booked successfully!";
            // Clear form data after successful submission
            $name = $email = $phone = $disease = $appointment_date = "";
        } else {
            $error_message = "Error: " . $stmt->error;
        }
        
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment - Natural Heal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="disease.php">Treatments</a></li>
            <li><a href="#diet">Diet</a></li>
            <li><a href="#yoga">Yoga</a></li>
            <li><a href="#doctors">Doctors</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>

    <!-- Appointment Section -->
    <section class="appointment-section">
        <div class="container">
            <h1>Book Your Appointment</h1>
            <p class="subtitle">Schedule your consultation with our natural healing experts</p>
            
            <!-- Success/Error Messages -->
            <?php if (!empty($success_message)): ?>
                <div class="message success-message">
                    <h3>✅ <?php echo $success_message; ?></h3>
                    <p>We will contact you soon to confirm your appointment details.</p>
                </div>
            <?php endif; ?>
            
            <?php if (!empty($error_message)): ?>
                <div class="message error-message">
                    <h3>❌ <?php echo $error_message; ?></h3>
                </div>
            <?php endif; ?>
            
            <div class="form-container">
                <form method="POST" action="">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="disease">Disease/Condition *</label>
                            <input type="text" id="disease" name="disease" value="<?php echo isset($disease) ? htmlspecialchars($disease) : ''; ?>" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="appointment_date">Preferred Appointment Date *</label>
                        <input type="date" id="Appt_Date" name="Appt_Date" value="<?php echo isset($appointment_date) ? $appointment_date : ''; ?>" required>
                    </div>
                    
                    <button type="submit" name="submit">Book Appointment</button>
                </form>
            </div>
            
            <div class="info-section">
                <h3>What to Expect</h3>
                <ul>
                    <li>📞 We'll contact you within 24 hours to confirm your appointment</li>
                    <li>🏥 Our natural healing experts will provide personalized consultation</li>
                    <li>🌿 Receive customized treatment plans and dietary recommendations</li>
                    <li>📋 Follow-up sessions to track your progress</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; Natural Heal 2025</p>
    </footer>

    <style>
        /* Additional styles for appointment.php */
        .appointment-section {
            background: linear-gradient(135deg, #e8f5e8, #f0f8f0);
            padding: 4rem 2rem;
            min-height: 80vh;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .appointment-section h1 {
            font-size: 2.5rem;
            color: #2c5530;
            text-align: center;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .subtitle {
            text-align: center;
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 3rem;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .form-row {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .form-row .form-group {
            flex: 1;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-size: 1.1rem;
            color: #2c5530;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 1rem;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #2c5530;
            box-shadow: 0 0 5px rgba(44, 85, 48, 0.3);
        }

        button {
            background-color: #2c5530;
            color: white;
            padding: 1.2rem 3rem;
            border: none;
            border-radius: 8px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-top: 1rem;
        }

        button:hover {
            background-color: #4a7c59;
        }

        .message {
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            text-align: center;
        }

        .success-message {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        .error-message {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }

        .info-section {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .info-section h3 {
            color: #2c5530;
            margin-bottom: 1rem;
            text-align: center;
        }

        .info-section ul {
            list-style: none;
            padding: 0;
        }

        .info-section li {
            margin-bottom: 0.8rem;
            padding: 0.5rem 0;
            font-size: 1.1rem;
            color: #555;
        }

        @media (max-width: 768px) {
            .appointment-section {
                padding: 2rem 1rem;
            }

            .appointment-section h1 {
                font-size: 2rem;
            }

            .form-row {
                flex-direction: column;
                gap: 0;
            }

            .form-container, .info-section {
                padding: 1.5rem;
            }
        }
    </style>
</body>
</html>
