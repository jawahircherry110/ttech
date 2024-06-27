<?php

session_start();

// Create connection
$conn = new mysqli("localhost", "root", "", "t.school");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $pass = $_POST['pasword'];

    // Check if username or password is empty
    if (empty($name) || empty($pass)) {
        echo "Username or password is empty";
    } else {
        // Prepare and execute SQL query
        $sql = "SELECT * FROM user WHERE username=? AND pasword=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $name, $pass);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if any result is returned
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Debugging: Display fetched user type
            echo "Fetched usertype: " . $row["usertype"] . "<br>";

            // Check user type
            if ($row["usertype"] == "student") {
                $_SESSION['username'] = $name;
                $_SESSION['usertype'] = "student";
                header("Location: studenthome.php");
                exit();
            } elseif ($row["usertype"] == "admin") {
                $_SESSION['username'] = $name;
                $_SESSION['usertype'] = "admin";
                header("Location: adminhome.php");
                exit();
            } else {
                // Invalid user type
                $message = "<span style='color: white;'>Invalid user type</span>";
                $_SESSION['loginMessage'] = $message;
                header("location:login.php");
            }
        } else {
            // Debugging: Indicate no matching user found
            echo "No matching user found<br>";

            // Invalid username or password
            $message = "<span style='color: white;'>Username or password error</span>";
            $_SESSION['loginMessage'] = $message;
            header("location:login.php");
        }

        // Close statement
        $stmt->close();
    }
}

// Close connection
$conn->close();
?>
