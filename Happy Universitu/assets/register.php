<?php   
require_once('db.php');

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$repeatpassword = $_POST['repeatpassword'];

if (!empty($username) && !empty($password) && !empty($email) && !empty($repeatpassword)) {
    if ($password === $repeatpassword) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Prepare the SQL statement using prepared statements
        $sql = "INSERT INTO `happy` (username, password, email) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sss", $username, $hashed_password, $email);
        
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            header("Location: index.html");
            exit(); 
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Passwords do not match";
    }
} else {
    echo "Please fill in all fields";
}
?>
