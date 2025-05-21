<?php
// Connect to database
$conn = new mysqli("localhost", "root", "", "kashif");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all students
$sql = "SELECT * FROM students ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>🎮 Student Data View</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap');

        body {
            font-family: 'Orbitron', sans-serif;
            background-image: url('https://c4.wallpaperflare.com/wallpaper/367/388/878/pubg-playerunknowns-battlegrounds-2017-games-games-wallpaper-preview.jpg'); /* Same gaming bg */
            background-size: cover;
            background-position: center;
            color: #00ffcc;
            min-height: 100vh;
            padding: 30px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            text-shadow: 0 0 10px #00ffcc;
        }

        table {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            border-collapse: collapse;
            background: rgba(0, 0, 0, 0.8);
            box-shadow: 0 0 25px #00ffcc;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #00ffcc;
        }

        th {
            background: #00ffcc;
            color: #000;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }

        tr:hover {
            background: rgba(255, 0, 255, 0.2);
            cursor: default;
        }

        .no-data {
            color: #ff4f9f;
            text-align: center;
            font-size: 1.2em;
            margin-top: 40px;
            text-shadow: 0 0 8px #ff4f9f;
        }

        a.back-link {
            display: block;
            width: max-content;
            margin: 20px auto;
            color: #00ffcc;
            text-decoration: none;
            font-weight: bold;
            text-shadow: 0 0 10px #00ffcc;
            transition: color 0.3s;
        }

        a.back-link:hover {
            color: #ff00ff;
            text-shadow: 0 0 12px #ff00ff;
        }
    </style>
</head>
<body>
    <h2>🎮 Registered Students</h2>

    <?php if ($result && $result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Number</th>
                    <th>Gmail</th>
                    <th>Department</th>
                    <th>CGPA</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['roll']); ?></td>
                    <td><?php echo htmlspecialchars($row['number']); ?></td>
                    <td><?php echo htmlspecialchars($row['gmail']); ?></td>
                    <td><?php echo htmlspecialchars($row['department']); ?></td>
                    <td><?php echo htmlspecialchars($row['cgpa']); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="no-data">No student data found. ⚠️</p>
    <?php endif; ?>

    <a class="back-link" href="kashif.php">← Back to Registration</a>
</body>
</html>

<?php
$conn->close();
?>
