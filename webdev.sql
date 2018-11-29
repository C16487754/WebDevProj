<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

//sql to create table 
$sql = "CREATE TABLE Users (
	email VARCHAR(20) PRIMARY KEY NOT NULL,
	userName VARCHAR(20) NOT NULL,
	password VARCHAR(20) NOT NULL
)";

$sql = "CREATE TABLE Movies (
	title VARCHAR(20) PRIMARY KEY NOT NULL,
	releaseDate VARCHAR(20) NOT NULL,
	director VARCHAR(20) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "INSERT INTO Users (email, userName, password)
VALUES ('luke@gmail.com', 'McQ', '1234')";

$sql = "INSERT INTO Users (email, userName, password)
VALUES ('calvin@gmail.com', 'calvin', '4321')";

$sql = "INSERT INTO Movies (releaseDate, title, director)
VALUES ('20/06/1975', 'Jaws', ' Steven Spielberg')";

$sql = "INSERT INTO Movies (releaseDate, title, director)
VALUES ('03/03/1994', 'The Shawshank Redemption', 'Frank Darabont')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//Reading data from the database
$sql = "SELECT email, userName, password FROM Users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "email: " . $row["email"]. " - userName: " . $row["userName"]. " " . $row["password"]. "<br>";
    }
} else {
    echo "0 results";
}

// sql to delete a record
$sql = "DELETE FROM Movies WHERE title == Jaws";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

//Update the database
$sql = "UPDATE Users SET userName='luke_mac' WHERE email == luke@gmail.com";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}


$conn->close();
?>