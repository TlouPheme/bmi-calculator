<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>BMI Calculator</title>
</head>
<body>
    <form action="results.php" method="post">
        <h2>BMI Calculator</h2>
        <label for="firstName">First name:</label>
        <input type="text" id="firstName" name="firstName" pattern="[A-Za-z ]+" required>
        <br>
        <br>
        <label for="lastName">Last name:</label>
        <input type="text" id="lastName" name="lastName" pattern="[A-Za-z ]+" required>
        <br>
        <br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" min="12" required>
        <br>
        <br>
        <label for="weight">Weight:</label>
        <input type="number" id="weight" name="weight">
        <br>
        <br>
        <label for="height">Height:</label>
        <input type="number" id="height" name="height">
        <br>
        <br>
        <button type="submit">Calculate</button>
    </form>
</body>
</html>