<?php
// Database connection variables
$servername = "localhost";
$username = "root";
$password = "Sprocket005.";
$dbname = "hotel_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$street = $_POST['street'];
$street_number = $_POST['street-number'];
$city = $_POST['city'];
$post_code = $_POST['post-code'];
$country = $_POST['country'];
$arrive = $_POST['arrive'];
$depart = $_POST['depart'];
$people = $_POST['people'];
$room = $_POST['room'];
$bedding = $_POST['bedding'];
$comments = $_POST['comments'];

// Prepare SQL statement
$sql = "INSERT INTO bookings (name, email, phone, street, street_number, city, post_code, country, arrive, depart, people, room, bedding, comments)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Initialize prepared statement
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssisss", $name, $email, $phone, $street, $street_number, $city, $post_code, $country, $arrive, $depart, $people, $room, $bedding, $comments);

// Execute the statement
if ($stmt->execute()) {
    echo "Booking successfully saved!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
