<?php
// Database connection parameters
$conn = mysqli_connect("localhost", "root", "", "gym");

// Check connection
if($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Capture and Sanitize Data
    // We use mysqli_real_escape_string to prevent SQL Injection
    $name     = mysqli_real_escape_string($conn, $_POST['name']);
    $age      = mysqli_real_escape_string($conn, $_POST['age']);
    $phone    = mysqli_real_escape_string($conn, $_POST['phone']);
    $plan     = mysqli_real_escape_string($conn, $_POST['plan']);
    $comments = mysqli_real_escape_string($conn, $_POST['comments']);
    
    $gender   = isset($_POST['gender']) ? mysqli_real_escape_string($conn, $_POST['gender']) : "Not Specified";
    $trainer  = isset($_POST['trainer']) ? mysqli_real_escape_string($conn, $_POST['trainer']) : "None";

    // 2. Create the SQL Query
    $sql = "INSERT INTO members (name, age, gender, phone, plan, trainer, comments) 
            VALUES ('$name', '$age', '$gender', '$phone', '$plan', '$trainer', '$comments')";

    // 3. Execute the Query
    if(mysqli_query($conn, $sql)){
        echo "<h3>✅ Data stored successfully in database!</h3>";
        
        // Optional: Echo the data back to the user like before
        echo "Name: " . $name . "<br>";
        echo "Plan: " . $plan . "<br>";
    } else{
        echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
    }
} else {
    echo "No data submitted.";
}

// 4. Close connection
mysqli_close($conn);
?>