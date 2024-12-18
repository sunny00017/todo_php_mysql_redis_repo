<?php
// Include the database connection file
include('db.php');

// Connect to Redis
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Check if the email is already cached in Redis
    $cachedData = $redis->get("user:$email");

    if ($cachedData) {
        echo "This user has already been registered (from cache).";
    } else {
        // Prepare the SQL query to insert data into the database
        $sql = "INSERT INTO users (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";

        if ($conn->query($sql) === TRUE) {
            // Inserted successfully, cache the email in Redis
            $redis->set("user:$email", 'registered');  // Cache the email with the value 'registered'
            echo "New record created successfully.";
            header("Location: display.php"); // Redirect to display page
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

