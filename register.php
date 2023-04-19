<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql-bd";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if (empty($username) || empty($password)) {
        echo "Введите имя пользователя и пароль.";
    } else {
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "Пользователь с таким именем уже существует.";
        } else {
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            if (mysqli_query($conn, $sql)) {
                echo "Вы успешно зарегистрировались.";
            } else {
                echo "Ошибка: " . mysqli_error($conn);
            }
        }
    }
}
mysqli_close($conn);

?>