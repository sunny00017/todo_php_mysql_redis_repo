<?php
// Include the database connection file
include('db.php');

// Fetch all users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Registered Users</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Registered Users</h2>
        
        <?php
        if ($result->num_rows > 0) {
            // Display data in a table
            echo "<table><tr><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Created At</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["phone"]."</td><td>".$row["address"]."</td><td>".$row["created_at"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No records found";
        }
        ?>
        
    </div>
</body>
</html>

<?php
$conn->close();
?>

