<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disease Information - Natural Heal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="#treatments">Treatments</a></li>
            <li><a href="#diet">Diet</a></li>
            <li><a href="#yoga">Yoga</a></li>
            <li><a href="#doctors">Doctors</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>

    <!-- Disease Information Section -->
    <section class="disease-section">
        <div class="container">
            <h1>Disease Information & Natural Remedies</h1>
            
            <div class="form-container">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="disease">Enter Disease Name:</label>
                        <input type="text" id="disease" name="disease" placeholder="e.g., back pain" required>
                    </div>
                    <button type="submit" name="submit">Get Information</button>
                </form>
            </div>

            <?php
            if (isset($_POST['submit']) && !empty($_POST['disease'])) {
                $disease = strtolower(trim($_POST['disease']));
                
                if ($disease === 'back pain') {
                    echo '<div class="result-container">';
                    echo '<h2>Natural Remedies for Back Pain</h2>';
                    
                    // Yoga Poses
                    echo '<div class="remedy-section">';
                    echo '<h3>🧘 Yoga Poses</h3>';
                    echo '<ul>';
                    echo '<li><strong>Bhujangasana (Cobra Pose)</strong> - Strengthens the spine and improves flexibility</li>';
                    echo '<li><strong>Setu Bandhasana (Bridge Pose)</strong> - Stretches the spine and relieves tension</li>';
                    echo '</ul>';
                    echo '</div>';
                    
                    // Diet
                    echo '<div class="remedy-section">';
                    echo '<h3>🥛 Diet Recommendations</h3>';
                    echo '<ul>';
                    echo '<li><strong>Warm milk</strong> - Rich in calcium and helps with bone health</li>';
                    echo '<li><strong>Calcium-rich foods</strong> - Leafy greens, dairy products, nuts, and seeds</li>';
                    echo '</ul>';
                    echo '</div>';
                    
                    // Herbal Remedies
                    echo '<div class="remedy-section">';
                    echo '<h3>🌿 Herbal Remedies</h3>';
                    echo '<ul>';
                    echo '<li><strong>Turmeric milk</strong> - Anti-inflammatory properties help reduce pain</li>';
                    echo '<li><strong>Ginger tea</strong> - Natural pain reliever and anti-inflammatory</li>';
                    echo '</ul>';
                    echo '</div>';
                    
                    echo '</div>';
                } else {
                    echo '<div class="no-data-container">';
                    echo '<h2>No Data Available Yet</h2>';
                    echo '<p>We are continuously expanding our database of natural remedies. Please check back later for information about "' . htmlspecialchars($_POST['disease']) . '".</p>';
                    echo '<p>Currently, we have detailed information for: <strong>Back Pain</strong></p>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; Natural Heal 2025</p>
    </footer>

    <style>
        /* Additional styles for disease.php */
        .disease-section {
            background: linear-gradient(135deg, #e8f5e8, #f0f8f0);
            padding: 4rem 2rem;
            min-height: 70vh;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
        }

        .disease-section h1 {
            font-size: 2.5rem;
            color: #2c5530;
            margin-bottom: 2rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-size: 1.2rem;
            color: #2c5530;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 1rem;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1.1rem;
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
            padding: 1rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #4a7c59;
        }

        .result-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: left;
        }

        .result-container h2 {
            color: #2c5530;
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2rem;
        }

        .remedy-section {
            margin-bottom: 2rem;
            padding: 1.5rem;
            background-color: #f8f9fa;
            border-radius: 10px;
            border-left: 4px solid #2c5530;
        }

        .remedy-section h3 {
            color: #2c5530;
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .remedy-section ul {
            list-style: none;
            padding-left: 0;
        }

        .remedy-section li {
            margin-bottom: 0.8rem;
            padding-left: 1rem;
            position: relative;
        }

        .remedy-section li:before {
            content: "•";
            color: #2c5530;
            font-weight: bold;
            position: absolute;
            left: 0;
        }

        .no-data-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
        }

        .no-data-container h2 {
            color: #2c5530;
            margin-bottom: 1rem;
        }

        .no-data-container p {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .disease-section {
                padding: 2rem 1rem;
            }

            .disease-section h1 {
                font-size: 2rem;
            }

            .form-container, .result-container, .no-data-container {
                padding: 1.5rem;
            }
        }
    </style>
</body>
</html>




