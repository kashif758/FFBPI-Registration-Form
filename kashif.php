<?php
$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "kashif");

    if ($conn->connect_error) {
        $error = "Connection failed: " . $conn->connect_error;
    } else {
        $name       = $_POST['name'];
        $roll       = $_POST['roll'];
        $number     = $_POST['number'];
        $gmail      = $_POST['gmail'];
        $department = $_POST['department'];
        $cgpa       = $_POST['cgpa'];

        $sql = "INSERT INTO students (name, roll, number, gmail, department, cgpa)
                VALUES ('$name', '$roll', '$number', '$gmail', '$department', '$cgpa')";

        if ($conn->query($sql) === TRUE) {
            $success = "🎮 Student data uploaded successfully!";
        } else {
            $error = "⚠️ Error: " . $conn->error;
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>🎮 Gamer Student Form</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Orbitron', sans-serif;
            background-image: url('https://freefiremobile-a.akamaihd.net/common/web_event/official2.ff.garena.all/img/20228/db30dbcb5e9c7f33094ebe70899b8743.jpg'); /* Change if you want */
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #00ffcc;
        }

        .form-box {
            background: rgba(0, 0, 0, 0.7);
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 0 25px #00ffcc;
            border: 2px solid #00ffcc;
            width: 100%;
            max-width: 500px;
            backdrop-filter: blur(6px);
            text-align: center;
        }

        h2 {
            margin-bottom: 25px;
            font-size: 28px;
            color: #00ffcc;
            text-shadow: 0 0 10px #00ffcc;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            text-align: left;
        }

        input, select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 10px;
            background: #111;
            border: 2px solid #00ffcc;
            color: #00ffcc;
            font-size: 14px;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #ff00ff;
            box-shadow: 0 0 10px #ff00ff;
        }

        input[type="submit"], .view-btn {
            background: linear-gradient(45deg, #00ffcc, #00ffff);
            color: #000;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            padding: 12px 20px;
            border-radius: 10px;
            margin-top: 10px;
            display: inline-block;
            text-decoration: none;
            font-size: 16px;
        }

        input[type="submit"]:hover, .view-btn:hover {
            background: linear-gradient(45deg, #ff00ff, #00ffff);
            transform: scale(1.05);
            color: #fff;
        }

        .message {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
            text-align: center;
        }

        .success {
            background-color: rgba(0, 255, 204, 0.1);
            color: #00ffcc;
            border: 1px solid #00ffcc;
        }

        .error {
            background-color: rgba(255, 0, 100, 0.1);
            color: #ff4f9f;
            border: 1px solid #ff4f9f;
        }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Gamer Registration</h2>

        <?php if ($success): ?>
            <div class="message success"><?php echo $success; ?></div>
        <?php elseif ($error): ?>
            <div class="message error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="post" action="kashif.php">
            <label>Name</label>
            <input type="text" name="name" required>

            <label>Roll</label>
            <input type="text" name="roll" required>

            <label>Number</label>
            <input type="text" name="number" required>

            <label>Gmail</label>
            <input type="email" name="gmail" required>

            <label>Department</label>
            <select name="department" required>
                <option value="">-- Select --</option>
                <option value="Computer">💻 Computer</option>
                <option value="Civil">🏗 Civil</option>
                <option value="EEE">⚡ EEE</option>
            </select>

            <label>CGPA</label>
            <input type="text" name="cgpa" required>

            <input type="submit" value="Deploy Student 🚀">
        </form>

        <!-- View Students button -->
        <a href="view_students.php" class="view-btn">🎮 View Students</a>
    </div>
</body>
</html>
