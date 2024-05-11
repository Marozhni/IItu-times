<?php
require_once('db.php');

// Получение данных из формы
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM happy WHERE username='$username' AND password='$password'";

$result = mysqli_query($conn, $sql);

// Проверка, найден ли пользователь
if (mysqli_num_rows($result) == 1) {
    // Пользователь найден, перенаправляем на главную страницу 
    header("Location: index.html");
    exit(); 
} else {
    // Пользователь не найден, выводим сообщение об ошибке
    echo "Invalid username or password";
}
?>
