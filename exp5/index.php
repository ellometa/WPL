<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form id="registerForm">
            <p>Name:</p>
            <input type="text" id="name" name="name">
            <span class="error" id="nameError">Need a name</span>

            <p>Email:</p>
            <input type="email" id="email" name="email">
            <span class="error" id="emailError">Invalid email</span>

            <p>Password:</p>
            <input type="password" id="password" name="password">
            <span class="error" id="passwordError">Invalid password format</span>

            <p>Age:</p>
            <input type="number" id="age" name="age">
            <span class="error" id="ageError">Age 18-100</span>

            <p id="msg"></p>

            <div class="submit-buttons">
                <button type="submit" formmethod="POST" formaction="post_registration.php">Submit using POST</button>
                <button type="submit" formmethod="GET" formaction="get_registration.php">Submit using GET</button>
                <button type="submit" formmethod="POST" formaction="request_registration.php">Submit using REQUEST</button>
            </div>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
