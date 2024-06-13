<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taboo_shop";

// Подключение к базе данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Получение данных из формы
$video_id = $_POST['video_id'];

// Подготовка и выполнение запроса к базе данных для вставки новой записи
$sql = "INSERT INTO videos (video_id) VALUES ('$video_id')";

if ($conn->query($sql) === TRUE) {
    echo "Видео успешно добавлено";
} else {
    echo "Ошибка при добавлении видео: " . $conn->error;
}

$conn->close();
?>