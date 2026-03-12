<?php
    include 'db_connect.php';

    $sql = "INSERT INTO user (user_id, user_firstname, user_lastname, user_age, user_height, user_weight, user_bmi)
            VALUES ('001', 'Tlou', 'Pheme', '29', '166', '82', '31.6')";

    mysqli_query($conn, $sql);

    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Results</title>
</head>
<body>
    <div class="result-container">
        <?php
        if(isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["age"]) && isset($_POST["weight"]) && isset($_POST["height"])) 
        {    
            $firstName = htmlspecialchars($_POST["firstName"]);
            $lastName = htmlspecialchars($_POST["lastName"]);
            $age = htmlspecialchars($_POST["age"]);
            $weight = floatval($_POST["weight"]);
            $height = floatval($_POST["height"]);
            
            $heightInMeters = $height / 100; 
            $bmi = $weight / ($heightInMeters * $heightInMeters);
            $bmi = round($bmi, 1); 
            
            if($bmi < 18.5) 
            {
                $category = "Underweight";
                $categoryClass = "underweight";
                $advice = "Consider consulting with a healthcare provider about healthy ways to gain weight.";
            } 
            elseif($bmi >= 18.5 && $bmi < 25) 
            {
                $category = "Normal weight";
                $categoryClass = "normal";
                $advice = "Great job! Maintain your healthy weight with a balanced diet and regular exercise.";
            } 
            elseif($bmi >= 25 && $bmi < 30) 
            {
                $category = "Overweight";
                $categoryClass = "overweight";
                $advice = "Consider incorporating more physical activity and making healthy food choices.";
            } 
            else 
            {
                $category = "Obese";
                $categoryClass = "obese";
                $advice = "It's recommended to consult with a healthcare provider for personalized advice.";
            }
        ?>
            
        <h2>Your BMI Results</h2>
            
        <div class="user-details">
            <p><strong>First Name:</strong> <?php echo $firstName; ?></p>
            <p><strong>Last Name:</strong> <?php echo $lastName; ?></p>
            <p><strong>Age:</strong> <?php echo $age; ?> years</p>
            <p><strong>Weight:</strong> <?php echo $weight; ?> kg</p>
            <p><strong>Height:</strong> <?php echo $height; ?> cm</p>
        </div>
            
        <div class="bmi-result">
            <div>Your BMI is</div>
            <div class="bmi-number"><?php echo $bmi; ?></div>
            <div class="bmi-category <?php echo $categoryClass; ?>"><?php echo $category; ?></div>
        </div>
            
        <div class="bmi-scale">
            <h3>BMI Categories</h3>
            <div class="scale-item underweight">Underweight: < 18.5</div>
            <div class="scale-item normal">Normal weight: 18.5 - 24.9</div>
            <div class="scale-item overweight">Overweight: 25 - 29.9</div>
            <div class="scale-item obese">Obese: ≥ 30</div>
        </div>
            
        <div class="user-details">
            <p><strong>Health Advice:</strong> <?php echo $advice; ?></p>
        </div>
            
        <?php
        } 

        else 
        {
            echo '<div class="error">';
            echo '<h3>No data received</h3>';
            echo '<p>Please fill out the BMI calculator form first.</p>';
            echo '</div>';
        }
        ?>
        
        <a href="index.php" class="back-btn">← Calculate Again</a>
    </div>
</body>
</html>