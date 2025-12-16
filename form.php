<html>
<body>
        <?php
        // Database connection parameters
        $conn = mysqli_connect("localhost", "root", "", "student");

        // Check connection
        if($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        // Taking values from the form data (input)
        $first_name = $_REQUEST['first_name'];
        $last_name = $_REQUEST['last_name'];
        $gender = $_REQUEST['gender'];
        $mobile_no = $_REQUEST['mobile_no'];
        $email = $_REQUEST['email'];

        // Performing insert query execution
        $sql = "INSERT INTO details VALUES ('$first_name', '$last_name', '$gender', '$mobile_no', '$email')";

        if(mysqli_query($conn, $sql)) {
            echo "<h3>Data stored in database successfully.</h3>";
            echo nl2br("\n$first_name\n$last_name\n$gender\n$mobile_no\n$email");
        } else {
            echo "ERROR: Hush! Sorry $sql. " . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
        ?>   
</body>
</html>